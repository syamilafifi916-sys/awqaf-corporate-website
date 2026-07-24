# Release Notes — AWQAF Corporate Website v1.0.0

**Version:** v1.0.0 · **Branch:** `release/corporate-static-v1` · **Status:** engineering
complete, ready for the project owner to deploy.

## Summary

First public release of the AWQAF Holdings Berhad corporate website — a premium, Malay-
language institutional site presenting the Waqaf Korporat model, investment portfolios,
welfare programmes, governance, and a Transparency Centre with audited reports. Delivered as
a static site running on **zero paid infrastructure**: Cloudflare Pages for the site and
GitHub Releases for the large report PDFs.

## Major features

- **30 pages:** homepage (idea → model → institution → evidence → invitation), Waqaf
  Korporat, 4 investment portfolios (Pendidikan, Kesihatan & Kesejahteraan, Hartanah,
  Fintech), 3 welfare programmes (Yayasan ZuriatCARE, EduWAQF, AWQAF4Health), leadership
  (9 director bios), founder, corporate info, contact, and the Transparency Centre.
- **Transparency Centre:** 20 downloadable documents — 10 Annual Reports + 10 Audited
  Financial Statements (2015–2024), original unmodified PDFs.
- **SEO:** unique titles + meta descriptions, canonical, OpenGraph, Twitter cards, and
  JSON-LD (Organization sitewide, Person on the founder page) on all 30 pages; sitemap +
  robots.
- **Accessibility:** semantic landmarks, single-h1 hierarchy, focus-visible states, an
  accessible mobile navigation drawer, alt text on all images.
- **Responsive** across 320–1920 px with no horizontal overflow.
- **Design system:** navy-primary / emerald-secondary institutional palette (60/25/15),
  Figtree type, consistent spacing — approved and frozen.
- **Security baseline:** `X-Content-Type-Options`, `X-Frame-Options`, `Referrer-Policy`,
  `Permissions-Policy` via Cloudflare `_headers`; legacy-path 301 redirects.

## Deployment strategy

- **Site:** static export (`artisan site:export` → `dist/`) deployed to **Cloudflare Pages**
  (Direct Upload). No PHP/DB/Redis at runtime.
- **Reports:** hosted as **GitHub Release `reports-v1`** assets; the app builds each link as
  `REPORTS_BASE_URL + "/" + filename`. Configurable, with a local `/storage/reports`
  fallback for development. Chosen because several PDFs (up to ~158 MiB) exceed Pages'
  25 MB per-file limit. **Total infrastructure cost: RM 0.**

## Known issues (non-blocking)

- Lighthouse **Performance** to be re-measured on the first Pages preview (local numbers
  understate; CLS 0).
- **Accessibility 96–100** — a perfect 100 needs a decorative-label contrast change held by
  the visual freeze (decision pending).
- **No CSP/HSTS** yet (baseline headers present) — add + test at the edge.
- **No web manifest** (favicons/apple-touch-icon/OG image present) — PWA install pending.
- 3 pre-existing content-assertion test failures, unrelated to deployment (see handover).

## Future improvements

CSP/HSTS, web manifest + icons, skip-to-content link, director bios in sitemap, self-host
Figtree font, exclude bundled Filament admin assets from upload, Member Portal launch
(`PORTAL_READY`), optional CI deploy workflow.

## Credits

Engineered under release candidates RC-1 and RC-WEB-001…006 on `release/corporate-static-v1`.
