# Operation Handbook — AWQAF Corporate Website

How to operate the site after Go-Live: adding future reports, versioning report releases,
and rolling back. No UI or content changes are needed for any of this — reports are data +
a GitHub release.

## Mental model

- The website is **static** (Cloudflare Pages). It is rebuilt from the Laravel app and
  re-uploaded when content changes.
- Report **metadata** (year, type, title, `file_path`) lives in
  `database/seeders/ReportSeeder.php` → the `reports` table.
- Report **files** live in a **GitHub Release** (`reports-v1`). The site links to them via
  `REPORTS_BASE_URL + "/" + basename(file_path)`.
- So a new report = (1) add the PDF as a release asset, (2) add its metadata row, (3)
  rebuild + redeploy.

## Add a future report (annual report or financial statement)

1. **Place the PDF** locally with the exact naming convention:
   - Annual report: `storage/app/public/reports/Annual-Report-AWQAF-<year>.pdf`
   - Financial statement: `storage/app/public/reports/Audited-financial-statement-<year>.pdf`
   - Original file, **no compression, no rename** — filenames must match the seeder.
2. **Register the metadata** in `database/seeders/ReportSeeder.php` (add the `<year>` to the
   annual-report and/or financial-statement list, matching the existing pattern), then:
   ```bash
   ./vendor/bin/sail artisan db:seed --class=ReportSeeder --force
   ```
3. **Upload the asset** to the current release (keeps existing URLs stable):
   ```bash
   gh release upload reports-v1 storage/app/public/reports/<new-file>.pdf --repo <ORG>/<REPO>
   ```
4. **Rebuild + redeploy** (see the [Operator Guide](DEPLOYMENT-OPERATOR-GUIDE.md) Steps 3–6):
   ```bash
   export REPORTS_BASE_URL="https://github.com/<ORG>/<REPO>/releases/download/reports-v1"
   BASE_URL=https://awqaf.my ./ops/build-static.sh
   ops/verify-report-links.sh          # PASS
   npx wrangler pages deploy dist --project-name <PAGES_PROJECT>
   ```
5. **Verify** the new report appears on `/korporat/laporan-tahunan` and downloads.

## Replace / correct an existing report file

Same filename → same URL, so no re-export is strictly needed for the link, but rebuild if
the metadata changed:
```bash
gh release upload reports-v1 storage/app/public/reports/<file>.pdf --clobber --repo <ORG>/<REPO>
ops/verify-report-links.sh          # re-verify that file
```

## Versioning: reports-v2, reports-v3

Use a new release tag when you want an immutable, clearly-versioned set (e.g. a yearly
refresh, or a bulk re-issue). Old exported builds keep resolving against the old tag.

1. Create the new release with the full current set:
   ```bash
   gh release create reports-v2 storage/app/public/reports/*.pdf \
     --title "AWQAF Reports v2" --repo <ORG>/<REPO>
   ```
2. Point the build at it and redeploy:
   ```bash
   export REPORTS_BASE_URL="https://github.com/<ORG>/<REPO>/releases/download/reports-v2"
   BASE_URL=https://awqaf.my ./ops/build-static.sh
   npx wrangler pages deploy dist --project-name <PAGES_PROJECT>
   ```
3. Keep `reports-v1` for audit history; delete only after `reports-v2` is verified live.

**Rule:** the release tag in `REPORTS_BASE_URL` and the tag holding the assets must match.
Filenames stay identical across versions.

## Rollback

| Scenario | Action |
|----------|--------|
| Bad website deploy | Cloudflare Pages → Deployments → roll back to the previous deployment (one click), or `npx wrangler pages deploy` the last known-good `dist/`. |
| One corrupt report | `gh release upload reports-v1 <file>.pdf --clobber` — URL unchanged; re-verify. |
| Whole report set bad | Point `REPORTS_BASE_URL` back to the previous tag (or `reports-v1`); rebuild + redeploy. |
| Reports host outage | Temporarily set `REPORTS_BASE_URL` to a working mirror/R2 (see [R2 runbook](../../deployment/RC-1/R2-DEPLOYMENT.md)); rebuild + redeploy. |
| Emergency same-origin | Unset `REPORTS_BASE_URL` → links fall back to `/storage/reports/*.pdf` (only viable on a Laravel/self-host, not Pages, due to the 25 MB limit). |

## Routine tasks

- **Security headers / HSTS / CSP:** managed in `ops/cloudflare/_headers` (redeploy to
  apply) and the Cloudflare SSL/TLS dashboard (HSTS). Adding a CSP requires testing against
  the bunny.net font + inline Inertia payload.
- **Content edits** (copy, new director, portfolio text): edit the relevant
  `resources/data/*.php` or Vue page, rebuild, redeploy. (Outside routine ops; treat as a
  new change under version control.)
- **Verify anytime:** `ops/verify-report-links.sh` (reports) and `python3 ops/link-check.py`
  (internal links) after any rebuild.
