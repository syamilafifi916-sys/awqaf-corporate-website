# Cloudflare Pages — AWQAF Corporate Static Site

Deploys the static export of `awqaf.my` to Cloudflare Pages. **No PHP, DB,
Redis, or VPS at runtime.** Do not change DNS during preparation — this guide
is for the reviewer/DevOps to execute at deploy time.

## Build model (important)
The static site is produced by **crawling the running Laravel app**
(`ops/build-static.sh` → `php artisan site:export`), which needs PHP +
PostgreSQL. Cloudflare Pages' build image cannot run that. So:

- **Build locally or in CI** (where Sail/PHP+DB exist) → produces `dist/`.
- **Deploy `dist/` with Wrangler direct upload** (recommended), or via a
  GitHub Action that builds then uploads.

Pages "connect a Git repo + build command" does **not** apply here (the build
isn't a Node build). Use direct upload.

| Setting | Value |
|---------|-------|
| Root directory | `awqaf-holdings-website` |
| Build command | `./ops/build-static.sh` (run locally/CI, not in Pages) |
| Output directory | `dist` |
| Node version | 22 (for the Vite asset build step only) |
| Environment variables | none required at runtime |

## Deploy steps
1. **Create the Pages project** (dashboard → Workers & Pages → Create → Pages →
   Direct Upload), name e.g. `awqaf-corporate`.
2. **Build locally/CI:** `BASE_URL=https://awqaf.my ./ops/build-static.sh`.
3. **Host oversized reports on R2 first** (see Known limitation below), then
   exclude `dist/storage` from the upload if the PDFs are served from R2.
4. **Upload the build:**
   `npx wrangler pages deploy dist --project-name awqaf-corporate`.
5. **Configure the build/output** (if using CI): output dir `dist`.
6. **Complete the first preview deployment** and open the `*.pages.dev` URL.
7. **Add custom domains:** `awqaf.my` and `www.awqaf.my` (Pages → Custom domains).
8. **Canonical redirect:** pick apex `awqaf.my` as canonical; redirect
   `www.awqaf.my → awqaf.my` (Pages custom-domain redirect or a Bulk Redirect).
   The site already emits `<link rel="canonical" href="https://awqaf.my…">`.
9. **Verify HTTPS:** Cloudflare provisions the cert automatically; confirm the
   padlock and HSTS.
10. **Verify DNS:** the Pages custom domain creates the CNAME/records; confirm
    `awqaf.my` resolves to the Pages deployment. (Do not hand-edit registrar
    DNS during preparation.)
11. **Smoke test:** load `/`, `/portfolio`, `/ketelusan`, `/korporat/pengasas`,
    `/hubungi`, and a deep route refresh (e.g. `/portfolio/pendidikan`). Confirm
    the portal CTA shows "Akan Dibuka" and legacy `/info-awqaf/*` redirects work.
12. **Rollback:** Pages keeps every deployment — in the dashboard, "Rollback"
    to the previous deployment, or re-run `wrangler pages deploy` with the last
    good `dist/`.

## Routing & headers
- `dist/_redirects` — legacy path 301s (awqaf.com.my paths, moved programmes).
- `dist/_headers` — security headers + cache-control (immutable `/build/*`).
- **No SPA catch-all** — every route is exported as `<route>/index.html`, so
  Pages serves clean URLs and deep-link refreshes natively.

## Known limitation — report PDFs
`dist/storage/reports/*.pdf` total ~481 MB and several exceed Cloudflare Pages'
**25 MB per-file limit** (e.g. 161 MB, 81 MB). Do **not** bundle them into
Pages. Host the report PDFs on **Cloudflare R2** (or another object store) and
serve them under `awqaf.my/storage/reports/…` (R2 custom domain / Worker route),
or point the report links there. Then upload `dist/` without `dist/storage`.
The report files are official documents and must not be re-compressed/altered.
