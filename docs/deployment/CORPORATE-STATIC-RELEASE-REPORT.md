# Corporate Static Release Report — awqaf.my (STATIC-001)

## 1. Existing architecture
Laravel 13 + Inertia 2 + Vue 3 + Tailwind 4 (Vite), Filament 3 staff panel at
`/admin`, `spatie/laravel-sitemap`, Ziggy. Public content is file-based
(`resources/data/{leadership,portfolios,programmes,founder}.php`) plus inline
arrays; the only DB dependency is the `Report` model (annual reports /
financial statements), seeded from a static list. No public auth (ADR-001).

## 2. Selected static strategy
**Crawl-to-static** — a new `php artisan site:export` renders every public
route through the HTTP kernel and writes `dist/<route>/index.html`, then
bundles the Vite assets, public images, storage, and Cloudflare config. The
result runs on Cloudflare Pages with no PHP/DB/Redis. `/admin` is excluded.
SEO meta is prerendered in `<head>`; page bodies hydrate client-side (Vue),
with clean per-route HTML so deep links and refresh work without an SPA
catch-all.

## 3. Files changed
- `app/Console/Commands/ExportStatic.php` (new) — the exporter.
- `ops/build-static.sh` (new) — build wrapper; `ops/cloudflare/_redirects`,
  `ops/cloudflare/_headers` (new).
- `config/services.php`, `app/Http/Middleware/HandleInertiaRequests.php` —
  `portalReady` flag; portal URL not exposed while postponed.
- `resources/js/Layouts/PublicLayout.vue`, `resources/js/Pages/Welcome.vue`,
  `Waqaf/Monthly.vue`, `Waqaf/HowToContribute.vue`, `Hubungi.vue` — portal CTAs
  → non-clickable "Akan Dibuka".
- `app/Support/Seo.php` — `reset()` for the exporter.
- `resources/views/app.blade.php` — fix raw-PHP JSON-LD leak (`@context`).
- `.gitignore` — ignore `/dist`; `docs/deployment/*` (new docs).

## 4. Routes included (30 pages + sitemap + robots)
`/`, 4× `/wakaf/*`, `/korporat/maklumat-korporat`, `/korporat/pengasas`,
`/korporat/lembaga-pengarah` + 9 directors, `/korporat/laporan-tahunan`,
`/ketelusan`, `/portfolio` + 4, `/program` + 3, `/berita`, `/hubungi`,
`/sitemap.xml`, `/robots.txt`.

## 5. Routes omitted
- `/admin` (Filament staff panel — needs PHP+DB; excluded from public build).
- Legacy paths handled as 301 redirects via `_redirects` (not pages).

## 6. Dynamic features removed / adapted
- **Auth:** none on the public site (already ADR-001); nothing to remove.
- **Portal CTAs:** now render "Akan Dibuka" (no link) — postponed portal.
- **Reports (DB):** data frozen into the static pages at crawl time; PDFs
  bundled under `dist/storage/reports` (see limitation §11).
- **sitemap.xml / robots.txt:** dynamic routes exported as static files.
- **Contact:** already server-free (`mailto:` + `tel:`); no form backend.

## 7. Build result
`vite build` OK; `site:export` wrote 30 HTML pages + sitemap + robots, all
HTTP 200. No `localhost` and no raw `<?php` in any output HTML; every page is
self-contained (full Ziggy definition present).

## 8. Test result (local static preview)
Served `dist` (root-relative preview) and verified in-browser:
- Home, reports, portfolio, ketelusan, hubungi — all 200 and render.
- **No console errors** (sampled home / reports / portfolio).
- Reports page: `route()` defined, body renders, **20 PDF links** resolve to
  bundled files.
- Portal CTA shows **"Akan Dibuka"** (×2 on home: nav + hero); no
  member/login/localhost links anywhere.
- Mobile 375px (portfolio detail): **no horizontal overflow**, images load
  (0 broken).

## 9. Lighthouse result
Not run in this environment (no headless Lighthouse available). Structural
prerequisites in place: prerendered meta, semantic headings, immutable asset
caching, lazy images, no backend bundle. Recommend running Lighthouse against
the first Pages preview.

## 10. Cloudflare Pages configuration
Root `awqaf-holdings-website`; output `dist`; build via `ops/build-static.sh`
locally/CI (PHP+DB needed — not Pages-native); deploy with
`wrangler pages deploy dist`. No runtime env/secrets. `_redirects` + `_headers`
in the output. Full guide: `docs/deployment/CLOUDFLARE-PAGES.md`.

## 11. Known gaps
- **Report PDFs exceed Pages' 25 MB/file limit** (several 26–161 MB; ~481 MB
  total). Must be hosted on **Cloudflare R2** (or similar) and served under
  `awqaf.my/storage/reports/…`; exclude `dist/storage` from the Pages upload.
  Files are official records — not re-compressed.
- Page bodies are client-rendered (non-SSR). SEO meta is prerendered and
  Google renders JS; if fully-prerendered bodies are later required, add
  Inertia SSR to the crawl.
- Lighthouse not measured locally (see §9).
- A 404 page is not exported (Pages shows a default); optional to add.

## 12. Exact manual actions still required
1. Host report PDFs on R2; point `/storage/reports/*` there; exclude
   `dist/storage` from upload.
2. Create the Pages project and run the first **preview** deploy (review only).
3. Run Lighthouse on the preview; address any <90.
4. (Reviewer) approve, then configure `awqaf.my` / `www.awqaf.my` + canonical
   redirect + verify HTTPS/DNS. **Do not change DNS before approval.**

## 13. Readiness
**READY for preview deployment.** The corporate site builds and runs as a fully
static bundle with no Laravel runtime, all approved pages work, the portal is
cleanly postponed, contacts are server-free, and governance boundaries hold.
The one deploy-time dependency is R2 hosting for the oversized report PDFs.
The Member Portal remains untouched and undeployed.
