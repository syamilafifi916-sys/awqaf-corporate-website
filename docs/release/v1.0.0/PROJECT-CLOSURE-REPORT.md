# Project Closure Report — AWQAF Corporate Website v1.0.0

**Branch:** `release/corporate-static-v1` · **Prepared under:** RC-WEB-006 · **Date:** 2026-07-24

## 1. Project objective

Deliver a premium, trustworthy public corporate website for AWQAF Holdings Berhad —
presenting the Waqaf Korporat model, portfolios, welfare programmes, governance, and a
Transparency Centre of audited reports — deployable on **zero paid infrastructure**, with
no runtime backend, and maintainable by any engineer.

## 2. Achievements

- Full 30-page institutional site, content grounded in AWQAF Annual Reports (no fabricated
  figures), Malay-language, responsive, accessible, SEO-complete.
- Repeatable **static export pipeline** (crawl the Laravel app → `dist/`), verified
  self-contained (no localhost/PHP leakage; per-page SEO + Ziggy state fixed).
- **Free hosting architecture:** Cloudflare Pages + GitHub Releases, resolving the 25 MB
  Pages per-file limit for ~158 MiB audited PDFs without altering the documents.
- Configurable report hosting (`REPORTS_BASE_URL`) with a safe local fallback — one env var
  switches GitHub Releases / R2 / local, no code change.
- Deployment tooling: `build-static.sh` (free-tier-safe prune), `link-check.py`,
  `verify-report-links.sh` (backend-auto-detecting), `verify-r2-reports.sh`.
- Six release-candidate cycles (RC-1, RC-WEB-001…005) plus this closure package.

## 3. Architecture summary

Build-time Laravel 13 / PHP 8.4 / Inertia 2 + Vue 3 / Tailwind 3.x / Ziggy 2 / Filament 3
(admin, excluded) / PostgreSQL (build only) → static `dist/` on Cloudflare Pages; report
PDFs on GitHub Releases via `REPORTS_BASE_URL`. Details in
[PROJECT-HANDOVER.md](PROJECT-HANDOVER.md).

## 4. Final metrics (measured, RC-WEB-005 freeze)

| Metric | Result |
|--------|--------|
| Pages exported | 30 (all HTTP 200) |
| Internal refs / broken / missing | 469 / 0 / 0 |
| Build | 0 errors, 0 warnings (1428 modules) |
| SEO coverage | 30/30 title+desc+canonical+OG+Twitter+JSON-LD; 30 unique titles |
| Images missing alt | 0 |
| Responsive overflow (320–1920) | 0 at all 8 widths |
| Content leftovers (Lorem/TODO/FIXME/dummy/console.log) | 0 |
| Reports | 20 PDFs, 0 duplicates, DB↔disk parity 20/20 |
| Largest report | Annual-Report-AWQAF-2017.pdf ~158 MiB |
| Exposed secrets in `dist/` | 0 |
| Tests | 35 pass (+3 pre-existing unrelated content-test failures) |
| Security headers | XCTO, XFO, Referrer-Policy, Permissions-Policy |
| Infrastructure cost | RM 0 |
| Production readiness score | 94/100 |

## 5. Production readiness

**Engineering: complete. No P0 blocker.** The site is build-clean, link-clean,
asset-complete, SEO/JSON-LD valid, responsive, accessible (96–100), and free-tier
deployable. Remaining items are a live-only Performance re-measure (P1 gate) and optional
hardening (CSP/HSTS, A11y contrast decision, web manifest) — none block deployment.

## 6. Lessons learned

- **Host large binaries off the static platform.** Cloudflare Pages' 25 MB per-file limit
  would have silently 404'd audited reports; a configurable base URL + GitHub Releases
  solved it for free without touching the PDFs.
- **Config over code for host choices.** `REPORTS_BASE_URL` made R2→GitHub Releases a
  documentation change, not a refactor, and keeps local dev working.
- **Blanket fixes are risky under a shared design system.** A blanket contrast recolor in
  RC-WEB-001 regressed dark-background labels; the fix is light/dark-aware, deferred under
  the colour freeze.
- **Client-rendered Inertia needs backend-aware verification.** Report links live in an
  escaped `data-page` payload and GitHub assets 302 to a CDN with `octet-stream` — so the
  verifier follows redirects and detects the backend rather than assuming `application/pdf`.
- **Verify, don't assume, at freeze.** RC-WEB-005 re-ran every check against the live tree
  rather than trusting prior green states.

## 7. Outstanding items (owner-side / optional)

- **Deployment execution** — GitHub release upload, Pages upload, `awqaf.my` DNS: requires
  the owner's authenticated accounts (never available to engineering). Fully scripted +
  documented in this package. *No deployment result is claimed as executed.*
- **P1:** record Lighthouse Performance on the Pages preview (> 95 target).
- **P2:** CSP/HSTS; A11y 96→100 contrast decision; web manifest + icons.
- **P3:** skip-link, director bios in sitemap, self-host font, exclude Filament assets,
  Founder-portrait dimensions.

## 8. Closure statement

The engineering phase for AWQAF Corporate Website v1.0.0 is **complete**. Documentation is
sufficient for any engineer to deploy and maintain the site independently. Deployment is
handed to the project owner, to be executed with their GitHub and Cloudflare accounts using
the [Deployment Operator Guide](DEPLOYMENT-OPERATOR-GUIDE.md).

**Engineering verdict: READY FOR DEPLOYMENT.**
