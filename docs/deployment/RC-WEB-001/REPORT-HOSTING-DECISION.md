# RC-WEB-001 — Report Hosting Decision

## Problem
6 of 20 report PDFs exceed Cloudflare Pages' 25 MB per-file limit (up to
158 MB); ~460 MB total (see [PDF-AUDIT.md](PDF-AUDIT.md)). Files are official
audited documents — no re-compression permitted.

## Options considered
| Option | Verdict |
|--------|---------|
| Bundle PDFs into Pages | ❌ Impossible — 6 files break the 25 MB limit. |
| Re-compress the PDFs to fit | ❌ Not allowed — official records must stay byte-intact. |
| Split large PDFs | ❌ Alters official documents; poor UX. |
| **Cloudflare R2 (object storage) behind the same domain** | ✅ **Chosen.** |
| External generic file host / Google Drive | ➖ Works but weaker branding/control; R2 preferred for same-origin. |

## Decision: **Cloudflare R2**
Host all report PDFs on a Cloudflare **R2** bucket and serve them under the
site's own domain so existing links keep working unchanged.

- Bucket: e.g. `awqaf-corporate-reports`; upload `storage/app/public/reports/*`.
- Expose at `https://awqaf.my/storage/reports/*` via an R2 **custom domain** or
  a small Cloudflare Worker/route mapping `/storage/reports/*` → the bucket.
  (The site already emits links as `https://awqaf.my/storage/reports/<file>.pdf`,
  so no code change is needed once the route resolves to R2.)
- **Exclude `dist/storage/` from the Pages upload** so the Pages deployment
  stays lean (~15 MB).

R2 has no per-file 25 MB limit, no egress fees to Cloudflare's network, and
keeps everything on `awqaf.my` (branding + analytics + no third party).

## Consequence for the build/deploy
- `ops/build-static.sh` still copies PDFs into `dist/storage` for **local
  verification**; the deploy step uploads `dist` **minus `storage/`** to Pages,
  with `/storage/reports/*` served from R2.
- Until R2 is wired, report **download links will 404 in production** — this is
  the one remaining pre-deploy action (owner: DevOps/Infra).

## Status
**Decided (R2).** Provisioning is a deploy-time action, not part of RC-WEB-001.
