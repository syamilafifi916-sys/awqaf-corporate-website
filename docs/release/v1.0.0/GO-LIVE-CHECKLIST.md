# Final Go-Live Checklist — AWQAF Corporate Website v1.0.0

Tick each box in order. Commands + expected results are in the
[Deployment Operator Guide](DEPLOYMENT-OPERATOR-GUIDE.md). Placeholders: `<ORG>/<REPO>` =
the GitHub repo hosting this site; `<PAGES_PROJECT>` = the Cloudflare Pages project name
(e.g. `awqaf-corporate`).

## A. Pre-flight (local / CI, PHP+DB present)
- [ ] On branch `release/corporate-static-v1`, working tree clean.
- [ ] `./vendor/bin/sail up -d` (or CI has PHP 8.4 + PostgreSQL).
- [ ] `git --no-pager log --oneline -1` recorded as the release commit.

## B. GitHub Release (reports)
- [ ] Authenticated: `gh auth status` OK for `<ORG>/<REPO>`.
- [ ] 20 source PDFs present in `storage/app/public/reports/` (no `.DS_Store` uploaded).
- [ ] Release **`reports-v1`** created, title **AWQAF Reports v1**, 20 assets attached,
      original filenames.
- [ ] `gh release view reports-v1` shows **20** assets, names == `basename(file_path)`.

## C. Environment variables (build-time)
- [ ] `REPORTS_BASE_URL=https://github.com/<ORG>/<REPO>/releases/download/reports-v1`
- [ ] `BASE_URL=https://awqaf.my` (canonical origin baked into export).

## D. Static export (free-tier-safe)
- [ ] `REPORTS_BASE_URL=… BASE_URL=https://awqaf.my ./ops/build-static.sh` succeeds.
- [ ] Script printed "removed dist/storage/reports".
- [ ] `grep -c "releases/download/reports-v1" dist/korporat/laporan-tahunan/index.html` → **20**.
- [ ] `grep -c "storage/reports" dist/korporat/laporan-tahunan/index.html` → **0**.
- [ ] `find dist -type f -size +25M` → **empty**.

## E. Verification (pre-upload)
- [ ] `python3 ops/link-check.py` → **0 broken, 0 missing**.
- [ ] `ops/verify-report-links.sh` → **PASS** (auto-detects `github`, 20/20).

## F. Cloudflare Pages
- [ ] Pages project `<PAGES_PROJECT>` exists (Direct Upload).
- [ ] `npx wrangler pages deploy dist --project-name <PAGES_PROJECT>` succeeds.
- [ ] `*.pages.dev` preview URL opens.

## G. Custom domain + DNS (optional but recommended)
- [ ] `awqaf.my` and `www.awqaf.my` added under Pages → Custom domains (auto DNS+TLS).
- [ ] `www.awqaf.my → awqaf.my` redirect configured; apex is canonical.
- [ ] HSTS enabled in SSL/TLS → Edge Certificates (see [handbook](OPERATION-HANDBOOK.md)).

## H. Smoke test (live)
- [ ] Run the [Post-Deployment Checklist](POST-DEPLOYMENT-CHECKLIST.md) end to end.
- [ ] `ops/verify-report-links.sh https://github.com/<ORG>/<REPO>/releases/download/reports-v1` → PASS on the live host.
- [ ] Lighthouse on the live URL — Performance > 95 (Desktop + Mobile), SEO 100, BP 100,
      A11y ≥ 96. **Record the numbers** (this is the P1 gate).

## I. Rollback ready
- [ ] Previous good Pages deployment noted (`wrangler pages deployment list`) for one-click
      rollback; report rollback path understood ([handbook](OPERATION-HANDBOOK.md) §Rollback).

**Go-Live is complete when A–H are all ticked and the Lighthouse numbers are recorded.**
