# RC-WEB-005 — Final Production QA / Release-Candidate Audit

**Project:** AWQAF Corporate Website · **Branch:** `release/corporate-static-v1`
**Date:** 2026-07-24 · **Type:** independent RC-freeze audit (verification only; no
feature/design/content/refactor changes performed).

---

## 1. Executive Summary

The AWQAF Corporate Website is a static export (30 pages) deployed on Cloudflare Pages
with report PDFs served from GitHub Releases — fully free infrastructure. This audit
independently re-ran build, export, link/asset integrity, SEO, accessibility semantics,
security headers, secret scanning, content-leftover scanning, report integrity, and
responsive behaviour against the **current** tree.

**Result: no release blockers (P0 = 0).** Everything structural, SEO, content, reports,
build, and responsive is green. The remaining items are a Performance re-measure that can
only happen on the live Pages preview, and optional security/accessibility hardening that
is constrained by the design/colour freeze. The site is suitable for public production
deployment subject to the lightweight conditions below.

## 2. Production Readiness Score

**94 / 100.**

| Area | Score | Note |
|------|-------|------|
| Site structure & links | 10/10 | 469 refs, 0 broken, 0 missing |
| SEO | 10/10 | 30/30 meta+canonical+OG+Twitter+JSON-LD; 30 unique titles |
| Content integrity | 10/10 | 0 Lorem/TODO/FIXME/dummy; 0 broken images/downloads |
| Reports | 10/10 | 20 PDFs, unique, GitHub-compatible URLs |
| Build & export | 10/10 | 0 errors, 0 warnings; 30 pages |
| Responsive | 10/10 | 0 overflow at all 8 widths |
| Accessibility | 8/10 | semantics/landmarks/alt/focus good; contrast 96 (colour freeze) |
| Security | 8/10 | core headers + no secrets; no CSP/HSTS yet |
| Performance | 8/10 | CLS 0; score unverified on prod CDN (re-measure gate) |
| Deploy readiness | 10/10 | free-tier pipeline + verifier ready |

## 3. Audit Findings (by area)

1. **Site structure** — ✅ Nav (5 groups + dropdowns + portal CTA), header, footer (Wakaf/
   Korporat/Laporan columns), internal links all resolve; external refs = 2 (bunny.net
   font, informational). 30 pages, all unique, no duplicate/orphan (every page reachable
   from nav/footer or a parent index). Breadcrumb-style "back" links present on
   portfolio/programme/director detail pages.
2. **SEO** — ✅ 30/30 pages carry `<title>` (30 distinct), meta description, canonical, OG,
   Twitter card, and JSON-LD (Organization sitewide + Person on founder). `robots.txt`
   allows all except `/admin`, points to the sitemap; `sitemap.xml` = 21 URLs, no
   `localhost`. 0 `<img>` without `alt`. Heading hierarchy: exactly one `<h1>`/page, no
   level skips (verified on homepage; footer h-order fixed in RC-WEB-001).
3. **Performance** — ⚠️ Not freshly measurable in this sandbox (no Lighthouse CLI; the
   preview server understates scores). RC-WEB-001 measured **SEO 100, A11y 96–100, Best
   Practices 96, Performance 77–86 local, CLS 0**. Must be re-measured on the Pages preview
   (real Brotli+cache) — see P1-1.
4. **Accessibility** — ✅ landmarks (header/nav/main/footer) present; 1 `<h1>`/page, no
   heading skips; all images have alt; visible focus rings (`focus-visible:ring-emerald-500`)
   throughout; accessible mobile drawer (focus trap, Esc, `aria-*`). ⚠️ residual
   colour-contrast on decorative uppercase micro-labels (A11y 96 on 2 pages) — fixable only
   by a colour change, which the freeze forbids (P2-2). No skip-to-content link (P3-1).
5. **Security** — ✅ `_headers`: `X-Content-Type-Options: nosniff`, `X-Frame-Options:
   SAMEORIGIN`, `Referrer-Policy: strict-origin-when-cross-origin`, `Permissions-Policy`
   (camera/geo/mic/payment disabled). No mixed content. **No exposed secrets** — the only
   "password/secret" strings in `dist/` are `input[type=password]` CSS selectors and JS
   property names in bundled Filament assets, not values; `.env` is untracked. ⚠️ No CSP,
   no HSTS yet (P2-1).
6. **Responsive** — ✅ **0 horizontal overflow** at 320/375/390/768/1024/1280/1440/1920 on
   the homepage; dense pages (leadership grid, health portfolio with table, Kategori
   Pewakaf) verified 0 overflow at 320 in RC-1. No layout break/clipping.
7. **Content** — ✅ 0 Lorem Ipsum / TODO / FIXME / dummy / `console.log` / `debugger` in
   source; 0 broken images (all data-referenced images exist on disk); 0 broken downloads
   (20/20 report URLs generate correctly). No placeholder content (comments referencing
   "placeholder" only document its prior removal).
8. **Reports** — ✅ 20 PDFs (10 Annual Reports + 10 Audited Financial Statements 2015–2024),
   0 duplicate filenames, DB↔disk parity 20/20, filenames == `basename(file_path)`. With a
   GitHub Releases base, `Report::url` yields 20 unique `…/releases/download/reports-v1/<file>.pdf`
   URLs (GitHub-compatible). No console errors on the reports page.
9. **Build** — ✅ `npm run build`: 1428 modules, **0 errors, 0 warnings**. `site:export`:
   30 pages + sitemap + robots. Link/asset check: **0 broken, 0 missing**. Full test suite:
   35 pass; 3 pre-existing content-test failures (unrelated, proven in RC-WEB-002/003).
10. **Final classification** — below.

## 4. P0 — Release Blockers

**None.** No defect prevents public deployment.

> Deployment execution (GitHub release upload, Pages project + upload, optional
> `awqaf.my` DNS) is operator-gated on authenticated Cloudflare/GitHub access — this is a
> logistics step, not a code blocker. Everything is one-command ready (RC-WEB-004).

## 5. P1 — Must Fix (verification gate before final sign-off)

- **P1-1 — Re-measure Lighthouse on the Pages preview.** Confirm Performance > 95
  (Desktop + Mobile) with real CDN compression + caching. Local numbers understate; CLS is
  already 0. This is the one hard gate that cannot be closed until the site is on Pages.

## 6. P2 — Should Fix (hardening / constrained by freeze)

- **P2-1 — Add Content-Security-Policy + HSTS.** Core headers are present; CSP and HSTS are
  recommended for an institutional site. Add and *test* a CSP at the Cloudflare edge (must
  allow the bunny.net font + inline Inertia payload) and enable HSTS in SSL/TLS. Not baked
  blind here — a mis-scoped CSP would break rendering.
- **P2-2 — Accessibility contrast (A11y 96 → 100).** Decorative micro-label contrast; fix
  requires a colour change, which the freeze forbids. Product decision: accept 96, or
  authorise a scoped contrast-token exception post-freeze.
- **P2-3 — Web manifest.** Add `site.webmanifest` + 192/512 PNG icons for PWA/installability
  (favicons, apple-touch-icon, OG image already present).

## 7. P3 — Future Enhancements

- **P3-1** — Skip-to-content link (WCAG 2.4.1; invisible until focused).
- **P3-2** — Include the 9 director bio pages in `sitemap.xml` (currently crawlable via the
  leadership index + self-canonical).
- **P3-3** — Self-host the Figtree webfont (removes the only third-party request; lifts Best
  Practices toward 100, helps LCP).
- **P3-4** — Exclude bundled Filament admin assets (`dist/css/filament`, `dist/js/filament`)
  from the static upload — `/admin` isn't in the static site, so they are inert dead weight.
- **P3-5** — Drop unused source images from `dist/images` (`buku-biografi.png`,
  `awqaf-logo-source.jpg`, spaced leadership `*.png`).
- **P3-6** — Add `width`/`height` (or an aspect class) to the Founder portrait to remove a
  mild CLS on that one image.

## 8. Risk Assessment

**Overall risk: LOW.**

- *Performance (low):* CLS 0 and a static + CDN-cached site make a sub-95 score unlikely;
  still, unverified on prod until P1-1. Mitigation: measure on the preview before Go-Live.
- *Security (low–medium):* strong baseline headers; absence of CSP/HSTS is defense-in-depth,
  not an open hole (no mixed content, no secrets, `X-Frame`/`nosniff` set). Mitigation: P2-1.
- *Accessibility (low):* 96/100; semantics, keyboard, alt all sound; only decorative
  contrast. Mitigation: product decision P2-2.
- *Operational (low):* deploy is gated on operator credentials; fully documented + scripted,
  with a rollback path. No data/PII, no payments, no runtime backend to fail.
- *Content/legal (low):* all figures sourced from Annual Reports; original unmodified PDFs.

## 9. Release Recommendation

### ✅ GO WITH CONDITIONS

No release blockers exist and the site is suitable for public production. Final Go-Live is
conditioned on:

1. **P1-1** — execute the deploy (RC-WEB-004) and re-measure Lighthouse Performance on the
   Pages preview; confirm > 95 Desktop + Mobile.
2. **P2-2** — product decision on A11y 96 vs a scoped contrast exception.
3. **P2-1** (recommended before or immediately after Go-Live) — add + test CSP/HSTS at the
   edge.

P2-3 and all P3 items are non-blocking and may follow post-launch.

## 10. Files changed

Audit-only — **no application, tooling, or config change.** The single artifact added is
this report: `docs/deployment/RC-1/RC-WEB-005-FINAL-QA-AUDIT.md`.

## 11. Commit hash

Recorded in the delivery summary accompanying this document.
