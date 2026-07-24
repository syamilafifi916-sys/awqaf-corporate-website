# Deployment Operator Guide — AWQAF Corporate Website v1.0.0

Step-by-step, no assumptions. Every command and its expected result. Run from the project
root: `awqaf-holdings-website/`.

**Placeholders you must set once:**
- `<ORG>/<REPO>` — the GitHub repository (e.g. `awqaf-holdings/awqaf-corporate-website`).
- `<PAGES_PROJECT>` — Cloudflare Pages project name (e.g. `awqaf-corporate`).

**Accounts required (project owner):** GitHub (push + release to `<ORG>/<REPO>`),
Cloudflare (Pages + the `awqaf.my` DNS zone). Engineering never had these — nothing below
has been executed; you are running it for the first time.

---

## Step 0 — Prerequisites

```bash
git rev-parse --abbrev-ref HEAD        # expect: release/corporate-static-v1
./vendor/bin/sail up -d                # start PHP 8.4 + PostgreSQL (Docker)
gh auth status                         # expect: logged in, access to <ORG>/<REPO>
npx wrangler --version                 # any recent version; `wrangler login` if needed
```
Expected: branch is `release/corporate-static-v1`; Sail containers healthy; `gh` and
`wrangler` authenticated.

## Step 1 — Confirm the 20 report PDFs

```bash
ls storage/app/public/reports/*.pdf | wc -l          # expect: 20
find storage/app/public/reports -name '.DS_Store'     # note: exclude from upload
```
Expected: `20`. If a `.DS_Store` prints, that is fine — the upload glob (`*.pdf`) skips it.

## Step 2 — Create the GitHub Release `reports-v1`

```bash
gh release create reports-v1 storage/app/public/reports/*.pdf \
  --title "AWQAF Reports v1" \
  --notes-file docs/deployment/RC-1/RELEASE-NOTES-reports-v1.md \
  --repo <ORG>/<REPO>
```
Expected: `https://github.com/<ORG>/<REPO>/releases/tag/reports-v1` printed. Confirm assets:

```bash
gh release view reports-v1 --repo <ORG>/<REPO> --json assets --jq '.assets | length'
```
Expected: `20`. (If you must re-upload a file later: `gh release upload reports-v1
<file>.pdf --clobber --repo <ORG>/<REPO>`.)

## Step 3 — Set build-time environment variables

```bash
export REPORTS_BASE_URL="https://github.com/<ORG>/<REPO>/releases/download/reports-v1"
export BASE_URL="https://awqaf.my"
```
Expected: no output. (`REPORTS_BASE_URL` chooses the report host; `BASE_URL` is the
canonical origin baked into canonical/OG/sitemap.)

## Step 4 — Build the static site

```bash
./ops/build-static.sh
```
This runs migrate + seed (reports list) + Vite build + `site:export`, then — because
`REPORTS_BASE_URL` is set — removes `dist/storage/reports`.
Expected tail:
```
REPORTS_BASE_URL set → removed dist/storage/reports (served from $REPORTS_BASE_URL).
dist/ is ready.
Reports host: https://github.com/<ORG>/<REPO>/releases/download/reports-v1  (dist/ is free-tier-safe: no file > 25MB)
```

## Step 5 — Pre-upload verification

```bash
grep -c "releases/download/reports-v1" dist/korporat/laporan-tahunan/index.html   # expect: 20
grep -c "storage/reports"              dist/korporat/laporan-tahunan/index.html   # expect: 0
find dist -type f -size +25M                                                      # expect: (empty)
python3 ops/link-check.py                                                         # expect: 0 broken, 0 missing
ops/verify-report-links.sh                                                        # expect: RESULT: PASS (github, 20/20)
```
Expected: `20`, `0`, empty, `OK: 0 broken internal links, 0 missing assets`, and
`RESULT: PASS`. **Do not proceed if any differ.**

> Note: `ops/verify-report-links.sh` auto-detects `github` from the exported page and
> follows GitHub's 302 → `objects.githubusercontent.com`, expecting final HTTP 200 +
> non-empty body + `%PDF`. (`ops/verify-r2-reports.sh` is R2-only; do not use it here.)

## Step 6 — Deploy to Cloudflare Pages

First deploy only — create the project (dashboard → Workers & Pages → Create → Pages →
**Direct Upload**, name `<PAGES_PROJECT>`), then:

```bash
npx wrangler pages deploy dist --project-name <PAGES_PROJECT>
```
Expected: an upload summary and a deployment URL like
`https://<hash>.<PAGES_PROJECT>.pages.dev`. Open it — the homepage renders.

## Step 7 — Live smoke test

```bash
ops/verify-report-links.sh "https://github.com/<ORG>/<REPO>/releases/download/reports-v1"
```
Expected: `RESULT: PASS`. Then work through
[POST-DEPLOYMENT-CHECKLIST.md](POST-DEPLOYMENT-CHECKLIST.md) on the `*.pages.dev` URL,
including a Lighthouse run (record Performance/Accessibility/Best-Practices/SEO).

## Step 8 — Custom domain + DNS (optional, recommended)

1. Pages → your project → **Custom domains** → add `awqaf.my`, then `www.awqaf.my`.
   Cloudflare auto-creates the proxied DNS records + TLS on the `awqaf.my` zone.
2. Redirect `www.awqaf.my → awqaf.my` (apex is canonical; the site already emits
   `<link rel="canonical" href="https://awqaf.my…">`).
3. SSL/TLS → Edge Certificates → enable **HSTS** (covers redirects too).
4. Re-run Step 7's checklist against `https://awqaf.my`.

## Step 9 — Rollback (if needed)

```bash
npx wrangler pages deployment list --project-name <PAGES_PROJECT>
```
Roll back to a previous deployment in the dashboard (or re-deploy the last good `dist/`).
Report-asset and version rollback: see [OPERATION-HANDBOOK.md](OPERATION-HANDBOOK.md).

---

**You have deployed successfully when:** the `*.pages.dev` (and `awqaf.my`) homepage loads,
all 30 pages return 200, every report downloads, and the Lighthouse numbers are recorded.
Do not treat deployment as done until Step 7 passes on the live host.
