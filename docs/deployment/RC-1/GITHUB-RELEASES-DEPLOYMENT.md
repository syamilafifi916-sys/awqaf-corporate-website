# Deployment Guide — Report PDFs via GitHub Releases (RC-WEB-003)

**Project:** AWQAF Corporate Website · **Branch:** `release/corporate-static-v1`
**Supersedes:** the Cloudflare R2 strategy in [R2-DEPLOYMENT.md](R2-DEPLOYMENT.md) (kept
as an alternative). **Depends on:** RC-WEB-002 (`3b5463a`) — `REPORTS_BASE_URL` in
`Report::url`.

## Objective

Host the corporate website **completely free**:

- **Cloudflare Pages** — the static site (30 pages, all < 25 MB).
- **GitHub Release Assets** — the large Annual Report / Audited Financial Statement PDFs
  (up to ~158 MiB), which cannot ship inside the 25 MB-limited Pages build.

No paid object storage, no R2, no custom DNS. This is a **deployment-architecture and
documentation change only** — no UI, design, copy, report metadata, database, or
application-code change.

## Why it needs zero code change

`Report::url` (RC-WEB-002) already builds the download link as:

```
REPORTS_BASE_URL + "/" + basename(file_path)
```

A GitHub Release asset URL has exactly that shape:

```
https://github.com/<ORG>/<REPO>/releases/download/<tag>/<filename>
```

So pointing `REPORTS_BASE_URL` at a release tag makes the existing accessor emit correct
asset URLs. **Only the env-var value changes.**

---

## 1. REPORTS_BASE_URL example

```
REPORTS_BASE_URL=https://github.com/<ORG>/<REPO>/releases/download/reports-v1
```

e.g. `https://github.com/awqaf-holdings/awqaf-corporate-website/releases/download/reports-v1`

**Verified generated URLs** (existing code, base set to the example above):

```
…/releases/download/reports-v1/Annual-Report-AWQAF-2017.pdf        (158 MiB — largest)
…/releases/download/reports-v1/Annual-Report-AWQAF-2024.pdf
…/releases/download/reports-v1/Audited-financial-statement-2021.pdf
…  (all 20, flat, original filenames)
```

## 2. Release asset naming rules

- **Release tag / name:** `reports-v1`.
- **Original filenames only** — upload exactly as stored: `Annual-Report-AWQAF-<year>.pdf`
  and `Audited-financial-statement-<year>.pdf`. `basename(file_path)` must match the asset
  name character-for-character, or the link 404s.
- **No compression, no modification, no renaming** of the PDFs.
- GitHub sanitises asset names by replacing spaces and some punctuation. Our filenames use
  only `A–Z a–z 0–9 - .` (no spaces), so GitHub stores them **unchanged** — safe.
- **One release, flat assets** — all 20 PDFs attached to the single `reports-v1` release;
  there are no folders in release assets, which matches the flat `basename` scheme.
- **Limits (well within):** GitHub allows up to **2 GiB per asset**; our largest is
  165,654,933 bytes (~158 MiB). Release assets **do not count against repository size** and
  are free on public repositories.

## 3. GitHub Release upload steps

The 20 source PDFs live in `storage/app/public/reports/` (do **not** upload the
`.DS_Store` in that folder). Run authenticated to the target repo.

### Option A — GitHub CLI (recommended)

```bash
# One-time: gh auth login

# Create the release and attach all 20 PDFs in one shot (title/notes are metadata only,
# not shown on the website). --clobber lets you re-upload a corrected asset later.
gh release create reports-v1 \
  storage/app/public/reports/*.pdf \
  --title "AWQAF Reports v1" \
  --notes "Annual Reports & Audited Financial Statements 2015–2024. Original PDFs, unmodified. Consumed by the corporate site via REPORTS_BASE_URL." \
  --repo <ORG>/<REPO>

# Verify 20 assets attached
gh release view reports-v1 --repo <ORG>/<REPO> --json assets \
  --jq '.assets | length, (.[].name)'
```

If the release already exists, add/replace assets instead:

```bash
gh release upload reports-v1 storage/app/public/reports/*.pdf --clobber --repo <ORG>/<REPO>
```

### Option B — Web UI

1. Repo → **Releases** → **Draft a new release**.
2. **Tag:** `reports-v1` (create new tag on the release branch). **Title:** any (metadata only).
3. **Attach binaries** → drag all 20 PDFs from `storage/app/public/reports/`.
4. **Publish release.**

## 4. Wire the site + build

```bash
# In the Pages build/export environment (env var or CI secret):
REPORTS_BASE_URL=https://github.com/<ORG>/<REPO>/releases/download/reports-v1

php artisan config:clear
php artisan site:export --base=https://awqaf.my
```

Then deploy `dist/` to Cloudflare Pages. Because the reports are served from GitHub,
**exclude `dist/storage/reports`** from the Pages upload (delete it after export, or omit
the path) so the 25 MB limit is never touched.

## 5. Production deployment checklist

- [ ] All **20** PDFs present in `storage/app/public/reports/` (10 Annual Reports +
      10 Audited Financial Statements, 2015–2024); `.DS_Store` **not** uploaded.
- [ ] Release **`reports-v1`** created on `<ORG>/<REPO>` with all 20 assets, **original
      filenames**, no compression/modification.
- [ ] `gh release view reports-v1 --json assets` shows **20** assets, names matching
      `basename(file_path)` exactly.
- [ ] `REPORTS_BASE_URL` set to `https://github.com/<ORG>/<REPO>/releases/download/reports-v1`
      (no trailing slash).
- [ ] `php artisan config:clear && php artisan site:export --base=https://awqaf.my` run.
- [ ] Exported Reports page bakes GitHub URLs — verify:
      `grep -c "releases/download/reports-v1" dist/korporat/laporan-tahunan/index.html` → **20**,
      `grep -c "storage/reports" dist/korporat/laporan-tahunan/index.html` → **0**.
- [ ] `python3 ops/link-check.py` → 0 broken internal links.
- [ ] `dist/storage/reports` excluded from the Cloudflare Pages upload.
- [ ] Pages deploy live; open the Reports page and confirm each of the 20 downloads
      resolves (see verification note below), including the six > 25 MB files.

### Verification note (GitHub Releases vs R2)

`ops/verify-r2-reports.sh` is **R2-specific** — it asserts *no redirect* and
`Content-Type: application/pdf`, which do **not** hold for GitHub Releases. A GitHub
asset URL returns **`302` → `objects.githubusercontent.com`** and serves
`Content-Type: application/octet-stream` with `Content-Disposition: attachment`, so the
browser still downloads the correct PDF. Verify GitHub-hosted assets by **following
redirects** and checking the final status + byte-exact size:

```bash
BASE="https://github.com/<ORG>/<REPO>/releases/download/reports-v1"
for f in storage/app/public/reports/*.pdf; do
  n="$(basename "$f")"
  code=$(curl -sIL -o /dev/null -w '%{http_code}' "$BASE/$n")
  clen=$(curl -sIL -o /dev/null -w '%{size_download}' -r 0-0 "$BASE/$n" >/dev/null 2>&1; \
         curl -sIL "$BASE/$n" | awk 'tolower($1)=="content-length:"{print $2}' | tail -1 | tr -d '\r')
  want=$(stat -f%z "$f" 2>/dev/null || stat -c%s "$f")
  [ "$code" = "200" ] && [ "$clen" = "$want" ] && echo "OK   $n" || echo "FAIL $n http=$code size=$clen/$want"
done
```

Expected: `200` and matching size for all 20 (proves correct filename + intact large files).

---

## 6. Rollback procedure

Because only `REPORTS_BASE_URL` selects the host, rollback is config-only — **no code,
DB, or content change**.

**A. Revert to the previous host (fastest):**
1. Set `REPORTS_BASE_URL` back to the prior value — the Cloudflare R2 base
   (`https://reports.awqaf.my`) if that was live, or **empty** to fall back to the local
   `/storage/reports/*.pdf` public disk (works on Laravel hosting; on Pages the oversized
   files would again 404, so empty is a dev/Laravel rollback, not a Pages rollback).
2. `php artisan config:clear && php artisan site:export --base=https://awqaf.my`; redeploy `dist/`.

**B. Fix a single bad / corrupted asset (keep the same URLs):**
```bash
gh release upload reports-v1 storage/app/public/reports/<file>.pdf --clobber --repo <ORG>/<REPO>
```
The download URL is unchanged, so no re-export is needed — just re-verify that file.

**C. Publish a corrected set under a new tag:**
1. `gh release create reports-v2 storage/app/public/reports/*.pdf --repo <ORG>/<REPO>`.
2. Point `REPORTS_BASE_URL=…/releases/download/reports-v2`; re-export; redeploy.
3. `reports-v1` can be retained for audit or deleted once `-v2` is verified.

Keep `reports-v1` immutable once verified; prefer a new tag over editing history so old
exported builds keep resolving.

---

## Verified (this task, no live release required)

- ✅ Existing `Report::url` emits correct GitHub Release URLs with the base set — **no code
  change**. Confirmed for all report rows including the 158 MiB 2017 report.
- ✅ Local fallback intact — empty `REPORTS_BASE_URL` → `/storage/reports/*.pdf`.
- ✅ Only `REPORTS_BASE_URL` changes; no application code, no database, no report metadata,
  no UI/design/copy touched.

## Blocked here (operator step)

- ⛔ Creating the GitHub Release + uploading the 20 PDFs — requires push/release access to
  `<ORG>/<REPO>`; not executable from this environment. Steps above are one-command ready.

**Commit:** see the RC-WEB-003 documentation commit recorded in the delivery summary.
