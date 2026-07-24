# R2 Deployment Runbook — Transparency Centre Report PDFs

**Project:** AWQAF Corporate Website · **Branch:** `release/corporate-static-v1`
**Role:** Deployment Engineer · **Date:** 2026-07-24
**Depends on:** RC-WEB-002 (`3b5463a`) — `REPORTS_BASE_URL` support in `Report::url`.

## Status: **CODE + ARTIFACTS PASS · LIVE DEPLOYMENT BLOCKED (credentials)**

The application, the source PDFs, the generated URLs, and the verification tooling
are all validated and ready. The **live steps — creating the R2 bucket, uploading
files, and the `reports.awqaf.my` DNS record — could not be executed here**: this
environment has no Cloudflare account access and no `wrangler`/`rclone`/`aws` CLI, and
credentials must not be entered on the account's behalf. The commands below are ready
to run by an operator authenticated to the AWQAF Cloudflare account; the final
PASS/FAIL is produced by `ops/verify-r2-reports.sh` once they are.

---

## 1. Bucket structure

Bucket name: **`reports`**. PDFs live **flat at the bucket root** (no `reports/`
prefix) — `Report::url` emits `REPORTS_BASE_URL + basename(file_path)`, so the object
key is the bare filename.

```
reports/                                  (R2 bucket)
├── Annual-Report-AWQAF-2015.pdf
├── Annual-Report-AWQAF-2016.pdf
├── …
├── Annual-Report-AWQAF-2024.pdf
├── Audited-financial-statement-2015.pdf
├── …
└── Audited-financial-statement-2024.pdf   (20 objects, no sub-folders)
```

Do **not** upload `storage/app/public/reports/.DS_Store` (macOS junk present in the
source dir). The upload commands below already exclude it.

## 2. Source inventory (upload manifest)

- **PDFs to upload:** **20** (10 Annual Reports 2015–2024 + 10 Audited Financial
  Statements 2015–2024).
- **Total size:** ~460 MB.
- **Largest file:** `Annual-Report-AWQAF-2017.pdf` — **165,654,933 bytes (~158 MiB)**.
- **Files over Cloudflare Pages' 25 MB limit (6)** — the reason for R2:
  `Annual-Report-AWQAF-2017` (158 MiB), `-2024` (73 MiB), `Audited-financial-statement-2021`
  (42 MiB), `Annual-Report-AWQAF-2018` (36 MiB), `-2016` (31 MiB), `-2020` (25 MiB).
- **DB ↔ disk parity:** 20 `Report` rows, **0 missing on disk**.

R2 has **no per-object size limit** relevant here (single-part up to 5 GB; multipart to
5 TiB), so all six oversized files are fine.

## 3. Example URLs (what the site emits)

With `REPORTS_BASE_URL=https://reports.awqaf.my`, all 20 links resolve to the flat root:

```
https://reports.awqaf.my/Annual-Report-AWQAF-2017.pdf          (158 MiB — the big one)
https://reports.awqaf.my/Annual-Report-AWQAF-2024.pdf
https://reports.awqaf.my/Audited-financial-statement-2021.pdf
…
https://reports.awqaf.my/Audited-financial-statement-2022.pdf
```

Fallback (empty `REPORTS_BASE_URL`, local dev / Laravel hosting) is unchanged:
`http://localhost:8080/storage/reports/<file>.pdf`.

---

## 4. Deployment commands

Run from the project root, authenticated to the AWQAF Cloudflare account. Use **one**
of the tool options.

### Option A — Wrangler (Cloudflare-native)

```bash
# One-time: install + auth
npm i -g wrangler
wrangler login

# Create the bucket
wrangler r2 bucket create reports

# Upload all 20 PDFs (flat, root keys; .DS_Store skipped by the glob)
for f in storage/app/public/reports/*.pdf; do
  wrangler r2 object put "reports/$(basename "$f")" \
    --file "$f" --content-type application/pdf
done
```

### Option B — rclone (fast bulk sync; R2 via S3 API)

```bash
# Configure once: rclone config → new remote "r2", type = s3, provider = Cloudflare,
# endpoint = https://<ACCOUNT_ID>.r2.cloudflarestorage.com, keys from an R2 API token.
rclone copy storage/app/public/reports/ r2:reports \
  --include "*.pdf" \
  --header-upload "Content-Type: application/pdf" \
  --progress
```

### Option C — aws-cli (S3-compatible endpoint)

```bash
export AWS_ENDPOINT_URL=https://<ACCOUNT_ID>.r2.cloudflarestorage.com
aws s3 cp storage/app/public/reports/ s3://reports/ \
  --recursive --exclude "*" --include "*.pdf" \
  --content-type application/pdf
```

> **Content-Type:** set it explicitly on upload (as above) so R2 returns
> `application/pdf`. Wrangler/rclone/aws will otherwise guess; being explicit
> guarantees task-6 passes.

## 5. Public access + DNS changes

Choose one way to expose the bucket, then set `REPORTS_BASE_URL` to match.

| Option | Public host | DNS change |
|--------|-------------|------------|
| **Custom domain (recommended)** | `https://reports.awqaf.my` | In R2 → bucket `reports` → *Settings → Custom Domains → Connect Domain* → `reports.awqaf.my`. Cloudflare **auto-creates the proxied CNAME + TLS** on the `awqaf.my` zone. No manual record needed if the zone is on this account. |
| **Managed r2.dev** | `https://pub-<hash>.r2.dev` | None. Enable *Public Development URL* on the bucket. Fine for staging; not a branded domain. |

Then set the build/export env and re-export:

```bash
# in the deploy/export environment (.env or CI secret)
REPORTS_BASE_URL=https://reports.awqaf.my       # or the pub-<hash>.r2.dev URL

php artisan config:clear
php artisan site:export --base=https://awqaf.my
```

**Also exclude the local report copies from the Pages upload** so the 25 MB limit is
not re-tripped and R2 is the single source: drop `dist/storage/reports` from the Pages
deploy (delete it after export, or omit that path from the upload set).

## 6. Verification (produces the PASS/FAIL)

After upload + DNS are live:

```bash
ops/verify-r2-reports.sh https://reports.awqaf.my
```

For each of the 20 files it asserts, against the R2 URL:
- **HTTP 200 with no redirect** (`--max-redirs 0` catches redirect loops / misroutes → task 4),
- **`Content-Type: application/pdf`** (task 6),
- **`Content-Length` byte-exact vs the local source** — proves the correct filename and
  that large >25 MB files transferred intact (tasks 2 + 7).

Exit 0 = PASS, 1 = FAIL (offending rows listed). Then re-run the site link check and
open the Reports page in the Pages preview to confirm every download button hits R2.

---

## Verified here (code side, no live bucket required)

- ✅ **20 R2 URLs generated correctly** for all reports via `Report::url` with the base set.
- ✅ **Production export baked R2 URLs** — 20 `reports.awqaf.my` refs, **0 residual
  `/storage/reports`** references in `dist/korporat/laporan-tahunan/index.html` (RC-WEB-002).
- ✅ **Fallback intact** — empty base → identical `/storage/reports/*.pdf` links, 0 broken.
- ✅ **Source inventory sound** — 20 PDFs, 0 missing vs DB, largest 165,654,933 bytes.
- ✅ **`ops/verify-r2-reports.sh`** syntax-checked and enumerates the 20 real files.

## Blocked here (needs the authenticated operator)

- ⛔ Create R2 bucket `reports` — Cloudflare account access required.
- ⛔ Upload the 20 PDFs — same.
- ⛔ `reports.awqaf.my` custom-domain / DNS — account-level change.
- ⛔ Live URL verification (200 / `application/pdf` / large-file download) — depends on the
  three steps above; run `ops/verify-r2-reports.sh` once they are done.

## Result

**PASS (code + tooling ready) / PENDING (live infra).** No application code change was
required for deployment. Hand the four blocked steps to an operator on the AWQAF
Cloudflare account; `ops/verify-r2-reports.sh` yields the final production PASS/FAIL.
