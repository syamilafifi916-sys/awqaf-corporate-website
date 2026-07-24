# Project Handover — AWQAF Corporate Website

Everything an engineer needs to understand, deploy, and maintain the site.

## 1. What it is

A public corporate/institutional website for AWQAF Holdings Berhad — profile, Waqaf
Korporat model, investment portfolios, welfare programmes, leadership, founder, and a
Transparency Centre with downloadable Annual Reports & Audited Financial Statements. Content
is Malay (BM). It ships as a **static site** with **no runtime backend**.

## 2. Architecture

- **Build-time app:** Laravel 13 (PHP 8.4) + Inertia 2 + Vue 3 + Tailwind CSS 3.x, Ziggy 2
  for routes, Filament 3 for an internal `/admin` (excluded from the static export),
  PostgreSQL (used only during the build crawl). Docker via Laravel Sail.
- **Static export:** `php artisan site:export` (`app/Console/Commands/ExportStatic.php`)
  crawls every public route through the HTTP kernel and writes `dist/<route>/index.html`,
  forcing the production base URL and resetting SEO/Ziggy state per page. Wrapped by
  `ops/build-static.sh`.
- **Runtime:** Cloudflare Pages serves `dist/` (static HTML/CSS/JS). No PHP/DB/Redis live.
- **Reports:** hosted as **GitHub Release assets** (free, no 25 MB cap); the app links to
  them via `REPORTS_BASE_URL`.
- **Client rendering:** pages hydrate from an Inertia `data-page` payload (Vue renders the
  DOM in-browser), so the static HTML body is thin; SEO tags + JSON-LD are server-rendered
  into `<head>`.

```
Build (local/CI, PHP+DB)                 Runtime (free)
  build-static.sh                          Cloudflare Pages  ← dist/ (static)
   ├─ npm run build (Vite)                  GitHub Releases   ← report PDFs (reports-v1)
   ├─ artisan site:export → dist/
   └─ prune dist/storage/reports (if REPORTS_BASE_URL set)
```

## 3. Folder structure (key paths)

| Path | Purpose |
|------|---------|
| `resources/js/Pages/` | Vue pages (Welcome, Portfolio/*, Program/*, Korporat/*, Ketelusan, Hubungi…) |
| `resources/js/Layouts/PublicLayout.vue` | Header nav + footer (site chrome) |
| `resources/data/portfolios.php`, `programmes.php`, `leadership.php` | Content data (PHP arrays) |
| `database/seeders/ReportSeeder.php` | Report metadata (year/type/title/file_path) |
| `app/Models/Report.php` | `url` accessor — `REPORTS_BASE_URL + basename` or local fallback |
| `app/Console/Commands/ExportStatic.php` | Static exporter (routes → dist/) |
| `app/Support/Seo.php` | Per-page SEO/meta/JSON-LD |
| `config/services.php` | `services.reports.base_url`, `services.portal.*` |
| `ops/build-static.sh` | Build → export → free-tier prune |
| `ops/link-check.py` | Internal link + asset integrity |
| `ops/verify-report-links.sh` | Report verifier (auto-detects github/r2/local) |
| `ops/verify-r2-reports.sh` | R2-only report verifier (alternative host) |
| `ops/cloudflare/_headers`, `_redirects` | Security headers + legacy 301s (copied into dist/) |
| `storage/app/public/reports/*.pdf` | 20 source report PDFs (upload source) |
| `docs/deployment/`, `docs/release/` | Runbooks, RC audits, this release package |

## 4. Configuration

| Env var | Meaning | Prod value |
|---------|---------|-----------|
| `REPORTS_BASE_URL` | Report host base. Empty → local `/storage/reports`. | `https://github.com/<ORG>/<REPO>/releases/download/reports-v1` |
| `BASE_URL` (build arg) | Canonical origin baked into export | `https://awqaf.my` |
| `PORTAL_URL` / `PORTAL_READY` | Member portal link + gate (currently "Akan Dibuka") | portal URL / `false` |
| runtime env | none — the deployed site is fully static | — |

## 5. Deploy & maintain

- **Deploy:** [DEPLOYMENT-OPERATOR-GUIDE.md](DEPLOYMENT-OPERATOR-GUIDE.md).
- **After any rebuild:** `python3 ops/link-check.py` + `ops/verify-report-links.sh`.
- **Add/rotate reports, versioning, rollback:** [OPERATION-HANDBOOK.md](OPERATION-HANDBOOK.md).
- **Tests:** `./vendor/bin/sail artisan test` — 35 pass; 3 pre-existing content-assertion
  failures (`CorporateQaTest`, `PortfolioProgrammeTest`) that predate the deployment work
  and are unrelated to it (proven by stashing in RC-WEB-002/003). They assert on content
  that earlier approved refinements intentionally changed; update or retire them if desired.

## 6. Known limitations

- Report PDFs must live off-Pages (25 MB per-file limit) — hence GitHub Releases.
- Lighthouse Performance is unverified on production infra until the first Pages preview
  (local numbers understate; CLS is 0).
- Accessibility is 96–100; reaching a perfect 100 needs a decorative-label contrast change
  held back by the visual freeze.
- No CSP/HSTS baked yet (baseline headers present); add + test at the edge.
- No web manifest (favicons/OG present); PWA install not yet supported.
- The build requires PHP+PostgreSQL (Sail/CI) — it cannot run inside the Pages build image;
  build offline and Direct-Upload `dist/`.

## 7. Future roadmap (non-blocking)

- Re-measure + record Lighthouse on Pages; add CSP/HSTS; web manifest + 192/512 icons.
- Skip-to-content link; include director bios in sitemap; self-host the Figtree font;
  exclude bundled Filament admin assets from the upload.
- Member Portal launch — flip `PORTAL_READY` and wire `PORTAL_URL` when the portal is live.
- Optional: a GitHub Actions workflow to build `dist/` and Direct-Upload to Pages on tag.
