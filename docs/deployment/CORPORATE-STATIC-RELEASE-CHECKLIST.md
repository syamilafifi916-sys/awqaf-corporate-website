# Corporate Static Release Checklist — awqaf.my

Verified during preparation (STATIC-001). ✅ done · ⚠️ action at deploy.

## Content
- [x] Approved text only — content sourced from `resources/data/*.php` and
      existing pages; nothing invented.
- [x] Correct organisation details (AWQAF Holdings Berhad primary brand).
- [x] Correct board details — 9 directors from `resources/data/leadership.php`.
- [x] Correct contacts — `admin@awqaf.my`, `03-7832 6644` (mailto/tel).
- [x] No dummy content — production build has no lorem/coming-soon/placeholder
      (grep-clean); the only "Akan Dibuka" is the approved portal-postponement.

## Design
- [x] Logo correct (existing brand assets, favicon, apple-touch-icon).
- [x] Responsive — verified 375px (no horizontal overflow) and desktop.
- [x] Mobile navigation present (PublicLayout off-canvas menu).
- [x] No broken layouts / no overlapping text on sampled pages.

## Technical
- [x] Production build passes (`vite build` + `site:export`, 30 pages + sitemap + robots).
- [x] Static preview passes (served from `dist`, all routes 200, render OK).
- [x] No backend dependency — no PHP/DB/Redis at runtime; no auth/session.
- [x] No broken links — no `localhost`/member/portal links; portal CTA is a
      non-clickable "Akan Dibuka".
- [x] Metadata present — title/description/canonical/OG/Twitter/JSON-LD per page.
- [x] Sitemap present (`/sitemap.xml`).
- [x] Robots present (`/robots.txt`, disallows `/admin`).
- [x] SSL plan documented (Cloudflare-managed; see CLOUDFLARE-PAGES.md).
- [x] No console errors on sampled pages (home, reports, portfolio).
- [x] JSON-LD valid (fixed raw-PHP `@context` leak).
- [ ] ⚠️ Report PDFs (>25 MB several) hosted on R2, not bundled into Pages.

## Governance
- [x] Member Portal not deployed and not modified (separate frozen repo).
- [x] No private member data in the corporate build.
- [x] No private documents (only public annual reports / statements).
- [x] No payment collection / no BayarCash / no login or registration.
- [x] No unsupported claims — figures come from approved data files only.
