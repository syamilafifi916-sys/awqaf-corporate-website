# RC-WEB-004 — First Production Deployment (Cloudflare Pages + GitHub Releases)

**Project:** AWQAF Corporate Website · **Branch:** `release/corporate-static-v1`
**Goal:** publish `awqaf.my` on **zero paid infrastructure** — Cloudflare Pages (static
site) + GitHub Release Assets (large report PDFs). No R2, no VPS, no custom object store.

This runbook ties together, and is the authoritative order-of-operations for, the first
deploy. Depth for each host lives in
[GITHUB-RELEASES-DEPLOYMENT.md](GITHUB-RELEASES-DEPLOYMENT.md) and
[CLOUDFLARE-PAGES.md](../CLOUDFLARE-PAGES.md).

**No application code / UI / UX / design / copy / layout / component / DB / model change**
was required. Changes in this task are deployment tooling + docs only:
`ops/verify-report-links.sh` (new), `ops/build-static.sh` (free-tier prune step), docs.

---

## 1. GitHub Release Checklist (Objective 1 + 2)

**Release:** tag `reports-v1` · title **AWQAF Reports v1** · description: *Annual Reports
& Audited Financial Statements. Original PDF documents. No modification.*
(See [RELEASE-NOTES-reports-v1.md](RELEASE-NOTES-reports-v1.md).)

Pre-upload assertions — all verified against `storage/app/public/reports/`:

- [x] **20 PDFs** present (10 Annual Reports + 10 Audited Financial Statements, 2015–2024).
- [x] **Filenames identical to `basename(file_path)`** — `Annual-Report-AWQAF-<year>.pdf`,
      `Audited-financial-statement-<year>.pdf`; DB↔disk parity 20/20, 0 missing.
- [x] **No duplicates** — 20 unique names.
- [x] **No hidden files uploaded** — a `.DS_Store` exists in the folder and MUST be
      excluded (the `*.pdf` glob below already excludes it).
- [x] **No compression / modification / rename** — upload originals as-is.
- [x] Largest asset 165,654,933 B (~158 MiB) < GitHub's 2 GiB/asset limit; assets don't
      count against repo size and are free on public repos.

Upload (authenticated to `<ORG>/<REPO>`):

```bash
gh release create reports-v1 storage/app/public/reports/*.pdf \
  --title "AWQAF Reports v1" \
  --notes-file docs/deployment/RC-1/RELEASE-NOTES-reports-v1.md \
  --repo <ORG>/<REPO>

# assert 20 assets, names only
gh release view reports-v1 --repo <ORG>/<REPO> --json assets --jq '.assets|length, (.[].name)'
```

## 2. REPORTS_BASE_URL (verified — no code change)

```
REPORTS_BASE_URL=https://github.com/<ORG>/<REPO>/releases/download/reports-v1
```

`Report::url` emits `REPORTS_BASE_URL + "/" + basename(file_path)`. Verified: with this
base, all 20 rows produce the correct release URLs (incl. the 158 MiB 2017 file); with it
empty, the local `/storage/reports/*.pdf` fallback is unchanged.

## 3. Cloudflare Pages Deployment Guide (Objective: Pages)

The static site is produced by **crawling the running Laravel app** (needs PHP+DB), so it
is built **locally or in CI**, then the `dist/` folder is **direct-uploaded** to Pages
(the "connect a Git repo + Node build" flow does not apply).

| Setting | Value |
|---------|-------|
| Build model | Direct Upload (Wrangler) — build offline, upload `dist/` |
| Build command | `REPORTS_BASE_URL=… BASE_URL=https://awqaf.my ./ops/build-static.sh` (local/CI) |
| **Output directory** | **`dist`** |
| Runtime env vars | none (fully static; no PHP/DB/Redis at runtime) |
| Build-time env | `REPORTS_BASE_URL` (reports host), `BASE_URL` (canonical origin) |
| Node version | 22 (Vite asset build only) |

Steps:
1. **Set the reports host + build:**
   ```bash
   export REPORTS_BASE_URL=https://github.com/<ORG>/<REPO>/releases/download/reports-v1
   BASE_URL=https://awqaf.my ./ops/build-static.sh
   ```
   `build-static.sh` now **auto-removes `dist/storage/reports`** when `REPORTS_BASE_URL`
   is set, so `dist/` contains no file > 25 MB (free-tier safe).
2. **Create the Pages project** (dashboard → Workers & Pages → Create → Pages → Direct
   Upload), e.g. `awqaf-corporate`.
3. **Upload:** `npx wrangler pages deploy dist --project-name awqaf-corporate`.
4. **Open the `*.pages.dev` preview** and run the Production Verification Guide (§5).
5. **Custom domain (optional):** add `awqaf.my` + `www.awqaf.my` (Pages → Custom domains);
   Cloudflare provisions DNS + TLS. Canonical is apex `awqaf.my`; redirect `www → apex`.
   The site already emits `<link rel="canonical" href="https://awqaf.my…">`.
6. `_headers` and `_redirects` are emitted into `dist/` automatically (security headers +
   legacy 301s).

## 4. Deployment Checklist (order of operations)

- [ ] Working tree on `release/corporate-static-v1`, clean.
- [ ] GitHub Release `reports-v1` published with the 20 assets (§1).
- [ ] `REPORTS_BASE_URL` exported to the release base.
- [ ] `BASE_URL=https://awqaf.my ./ops/build-static.sh` → `dist/` built; script reports
      "removed dist/storage/reports".
- [ ] `grep -c "releases/download/reports-v1" dist/korporat/laporan-tahunan/index.html` → **20**.
- [ ] `grep -c "storage/reports" dist/korporat/laporan-tahunan/index.html` → **0**.
- [ ] `find dist -type f -size +25M` → **empty** (free-tier safe).
- [ ] `python3 ops/link-check.py` → 0 broken, 0 missing.
- [ ] `ops/verify-report-links.sh` → PASS (auto-detects `github`).
- [ ] `npx wrangler pages deploy dist --project-name awqaf-corporate`.
- [ ] Preview URL verified per §5; then attach custom domain.

## 5. Production Verification Guide (End-to-End)

Run against the deployed `*.pages.dev` (and again after the custom domain is live).

| Check | How |
|-------|-----|
| **Homepage** | Loads; hero + all sections render; no layout shift. |
| **Navigation** | Every top-nav group + dropdown link resolves (5 groups, portal CTA). |
| **Portfolio** | `/portfolio` + all 4 detail pages (pendidikan, kesihatan-kesejahteraan, hartanah, fintech). |
| **Programmes** | `/program` + all 3 (yayasan-zuriatcare, eduwaqf, awqaf4health). |
| **Publications** | `/korporat/laporan-tahunan` lists all reports; `/ketelusan` hub loads. |
| **Every report opens** | `ops/verify-report-links.sh` → PASS (200 + non-empty + %PDF for all 20). Spot-open the 158 MiB 2017 report in a browser. |
| **No broken links** | `python3 ops/link-check.py` (build) + click-through nav/footer/CTA. |
| **No missing assets** | link-check `0 missing`; images/logos/hero render. |
| **No console errors** | DevTools console clean on home, portfolio, programme, reports pages. |
| **No 404** | All 30 routes return 200 on the deployed host. |
| **Responsive** | 320/375/390/768/1024/1280/1440/1920 — no horizontal overflow, no clipping. |
| **Lighthouse** | Run on the Pages URL (real CDN gzip+cache). Targets: Perf > 95, A11y ≥ 96, BP 100, SEO 100. Re-measure here supersedes local numbers. |

Report-link verification (auto-detects backend from `dist/`, or pass the base):

```bash
ops/verify-report-links.sh
# or explicitly:
ops/verify-report-links.sh https://github.com/<ORG>/<REPO>/releases/download/reports-v1
```

## 6. Release Notes

See [RELEASE-NOTES-reports-v1.md](RELEASE-NOTES-reports-v1.md) — used as the GitHub
release description (`--notes-file`).

## 7. Deployment Rollback Guide

All report-host switches are **config-only** (no code/DB/content change).

- **Bad build / regression on Pages:** redeploy the previous good `dist/` —
  `wrangler pages deployment list` → promote/re-upload the prior deployment. Pages keeps
  deployment history; roll back in one click or re-run `pages deploy` with the last good build.
- **A single report asset wrong/corrupt:** `gh release upload reports-v1 <file>.pdf
  --clobber` — the URL is unchanged, so no re-export needed; re-verify that file.
- **Whole report set bad:** publish `reports-v2`, set `REPORTS_BASE_URL=…/reports-v2`,
  rebuild + redeploy. Keep `reports-v1` for audit.
- **Emergency: revert reports to same-origin** (e.g. moving back to a Laravel host): unset
  `REPORTS_BASE_URL` → `Report::url` falls back to `/storage/reports/*.pdf`. (On Pages the
  oversized files would again exceed 25 MB, so this is a Laravel/self-host rollback only.)
- **DNS:** custom-domain changes are reversible in the Pages dashboard; the `*.pages.dev`
  URL always remains as a fallback.

## 8. Production Readiness Summary

**Free-tier deployability: PASS (code + tooling + build ready).**
- Site: Cloudflare Pages (static, no runtime cost). Reports: GitHub Releases (free).
- `dist/` is free-tier-safe once `REPORTS_BASE_URL` is set (no file > 25 MB).
- No application-code regression: 35/35 non-content tests pass; the 3 pre-existing
  content-test failures are unrelated (proven in RC-WEB-002/003).
- Verifier supports all three backends with auto-detection; local PASS 20/20.

**Known issues / open items (carried from RC-1, none new):**
- **Live deploy is operator-gated** — GitHub release upload, Pages project + upload, and
  optional `awqaf.my` DNS need authenticated Cloudflare/GitHub access (not available in the
  build environment). All are one-command ready above.
- **Lighthouse Performance** to be re-measured on the Pages preview (M-3).
- **A11y 100** blocked by the colour freeze (M-2, decision pending).
- **Web manifest** (M-1), **CSP/HSTS** (M-4), skip-link, self-host font — optional polish.

**Next action:** operator runs §1 (release) → §3 (build+deploy) → §5 (verify), then
records the Lighthouse numbers. After that the site is live on free infrastructure and
ready for final Production QA.
