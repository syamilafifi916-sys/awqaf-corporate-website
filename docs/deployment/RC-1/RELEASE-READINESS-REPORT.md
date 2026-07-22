# RC-1 — Release Readiness Report

**Project:** AWQAF Corporate Website
**Branch:** `release/corporate-static-v1`
**Role:** Production Release Engineer
**Date:** 2026-07-23
**Design status:** APPROVED — frozen (no redesign, no colour, no layout, no copy changes performed).

---

## VERDICT

**Overall: FAIL (as-is for a Cloudflare Pages deploy) — one Critical blocker.**

The website itself — all 30 pages, navigation, CTAs, content, SEO, responsiveness,
accessibility — is production-quality. The single blocker is a **hosting-platform
limit on the report PDFs**, not a defect in the site.

**Go / No-Go: NO-GO until Critical #1 is resolved.** Once the oversized report PDFs
are moved off Cloudflare Pages (R2, already the RC-WEB-001 decision) and Performance
is re-measured on a Pages preview, this flips to **GO**.

---

## Scorecard

| # | Area | Result | Notes |
|---|------|--------|-------|
| 1 | Build (`npm install` + `npm run build`) | ✅ PASS | 0 errors, 0 warnings. 1428 modules, built in ~19 s. |
| 2 | Static export | ✅ PASS | 30 pages + `sitemap.xml` + `robots.txt`, all HTTP 200. |
| 3 | Broken links | ✅ PASS | 469 internal refs, **0 broken, 0 missing assets**. |
| 4 | Images | ✅ PASS (1 minor) | 0 missing; all have `alt`; CLS controlled. Founder portrait lacks dims. |
| 5 | SEO | ✅ PASS (1 minor) | Unique titles + descriptions, canonical, OG, Twitter, JSON-LD, sitemap, robots. |
| 6 | Accessibility | ⚠️ CONDITIONAL | 96–100 (RC-WEB-001). 100 unreachable under the colour freeze (see M-2). |
| 7 | Performance (Lighthouse) | ⚠️ UNVERIFIED | Must be re-measured on the Pages preview (local numbers understate). |
| 8 | Cross-browser | ⚠️ PARTIAL | Verified on Chromium engine. Safari/Firefox/Edge = manual pre-launch step. |
| 9 | Responsive (320→1920) | ✅ PASS | **0 horizontal overflow** at every width, incl. dense pages at 320. |
| 10 | Production assets | ⚠️ 1 GAP | favicon/apple-touch-icon/OG present; **web manifest missing**. |
| 11 | Security | ✅ PASS (2 rec.) | Headers + no mixed content + no console errors. No CSP/HSTS (hardening). |
| 12 | Final QA (leftovers) | ✅ PASS | 0 TODO/FIXME/console.log/debugger. `.DS_Store`/README junk in `dist/` **fixed**. |

---

## CRITICAL ISSUES (must fix before launch)

### C-1 — Six report PDFs exceed Cloudflare Pages' 25 MB per-file limit
Cloudflare Pages **hard-rejects any file > 25 MB**. The transparency downloads are
linked same-origin (`Report::url` → `Storage::disk('public')->url()` →
`/storage/reports/<file>.pdf`), and these six shipped files are over the limit:

| File | Size |
|------|------|
| Annual-Report-AWQAF-2017.pdf | **161 MB** |
| Annual-Report-AWQAF-2024.pdf | 81 MB |
| Audited-financial-statement-2021.pdf | 42 MB |
| Annual-Report-AWQAF-2018.pdf | 37 MB |
| Annual-Report-AWQAF-2016.pdf | 31 MB |
| Annual-Report-AWQAF-2020.pdf | 25 MB (at the limit) |

**Impact:** on a Pages deploy these six downloads **404**. The Transparency Centre
(Pusat Ketelusan) and Reports page are core trust features, so this is launch-blocking.

**Fix (do not alter the PDFs):** host reports on **Cloudflare R2** (the RC-WEB-001
decision) — upload `storage/app/public/reports/*` to an R2 bucket, expose it on a
public domain, and repoint `Report::url` at that base (e.g. a `REPORTS_BASE_URL`
config). Then exclude `dist/storage/reports` from the Pages upload. Do **not**
recompress audited financial statements to fit the limit.

---

## MEDIUM ISSUES

### M-1 — Web manifest missing (checklist item 10)
No `site.webmanifest` / `<link rel="manifest">`. `favicon.ico`, `favicon.svg`,
`apple-touch-icon.png`, `theme-color`, and the 1200×630 OG image are all present, so
social previews and pinned icons work — only PWA/installability is absent.
**Not functionally blocking.** Recommend adding a manifest **with proper 192×192 and
512×512 PNG icons** (which don't yet exist) so it validates as installable; shipping a
manifest that points at missing icons would be worse than none.

### M-2 — Accessibility cannot reach the 100 target under the colour freeze
RC-WEB-001 measured A11y 96 on two pages (Maklumat-Korporat, Hubungi). The sole
deduction is **colour-contrast on decorative uppercase micro-labels**
(`text-slate-400/500` eyebrows). The same utility class is used on both light and
dark backgrounds, so the only fix is a light/dark-aware colour change — **explicitly
forbidden by "Do NOT modify colours."** Keyboard nav, focus order, landmarks, ARIA,
and headings all pass. **Decision required:** accept A11y 96, or authorise a scoped
contrast-token exception to the freeze.

### M-3 — Performance target unverified on production infrastructure
Local Lighthouse (RC-WEB-001) was 77–86, understated by the preview server (no gzip,
no caching); CLS was 0. Cloudflare Pages adds Brotli + edge caching automatically.
**Action:** re-run Lighthouse on the first Pages preview to confirm Performance > 95
before sign-off. This is a deploy-time verification gate, not a code defect.

### M-4 — No Content-Security-Policy / HSTS (checklist item 11)
Baseline headers are good (`X-Content-Type-Options`, `X-Frame-Options`,
`Referrer-Policy`, `Permissions-Policy`). A CSP and HSTS are recommended hardening for
a public institutional site. **Not baked here on purpose** — a mis-scoped CSP would
break the bunny.net webfont and the inline Inertia payload (introducing a defect
pre-launch). Add and **test** a CSP at the Cloudflare edge; enable HSTS in the SSL/TLS
dashboard so it also covers redirects.

---

## MINOR ISSUES

- **npm audit: 2 high** — `shell-quote` (DoS in `parse()`) via `concurrently`. Both are
  **devDependencies** used only by the local `dev` orchestration script; **zero
  production exposure** (static site, no Node runtime). Run `npm audit fix` at leisure.
- **No skip-to-content link** (WCAG 2.4.1 Bypass Blocks). Not a scored Lighthouse
  failure; recommend adding a visually-hidden skip link (invisible until focused, so it
  respects the visual freeze).
- **Founder portrait** (`Korporat/Founder.vue:26`) has no `width`/`height` or aspect
  class → mild CLS on that one image. Left unchanged to honour the freeze.
- **9 director bio pages excluded from `sitemap.xml`** (21 of 30 URLs listed). They stay
  crawlable via the leadership index and self-referential canonicals; add them to the
  sitemap for completeness if desired.
- **bunny.net webfont** is a render-blocking third-party request (the only external
  dependency). Self-hosting Figtree removes it, lifts Best Practices toward 100, and
  helps LCP.
- **Unused source images ship in `dist/images`** (`buku-biografi.png`,
  `awqaf-logo-source.jpg`, `chairman-siti-sadiah.webp`, the leadership `*.png` files
  with spaced filenames). Dead weight only — not referenced, not broken.

---

## FIX APPLIED DURING THIS REVIEW

**Junk pruned from the deployable artifact** (`app/Console/Commands/ExportStatic.php`).
`copyDirectory` was dragging `.DS_Store` (6×, leaks directory structure), dev
`README.md` notes (3×), and a malformed `awqaf-hero.webp.png` into `dist/`. Added a
`pruneJunk()` pass so every export is clean. **Build tooling only — no design, content,
colour, or layout touched.** Re-verified after the change: 30 pages, 0 broken links, 0
missing assets, no junk in `dist/`, no mixed content.

---

## VERIFICATION EVIDENCE

- **Build:** `npm install` + `npm run build` → 0 errors / 0 warnings.
- **Export + links:** 30 pages HTTP 200; `ops/link-check.py` → 469 refs, 0 broken, 0
  missing; no `localhost` and no insecure `http://` resource refs in output.
- **Images:** every data-referenced image (9 director + 3 portfolio + brand/hero/OG)
  exists on disk; all `<img>` carry `alt`; CLS reserved via `aspect-[]` or explicit dims.
- **SEO:** unique `<title>` and meta description per page; canonical, OG (+1200×630
  image, file present), Twitter card, `robots` meta; `robots.txt` allows all except
  `/admin` and points to the sitemap; JSON-LD Organization sitewide + Person on founder.
- **Responsive:** `documentElement.scrollWidth − innerWidth = 0` at 320/768/1920 on the
  homepage and at 320 on the leadership grid, health portfolio (with impact table), and
  Kategori Pewakaf. The impact table scrolls inside its own `overflow-x-auto`.
- **Runtime:** no console errors across homepage, leadership, portfolio, and
  Kategori-Pewakaf navigations.

---

## GO / NO-GO

**NO-GO for an immediate Cloudflare Pages launch as-is**, on the strength of Critical
C-1 alone (six report downloads would 404).

**Path to GO (small and well-defined):**
1. **C-1** — move report PDFs to R2 and repoint `Report::url`; exclude
   `dist/storage/reports` from the Pages upload. *(Blocking.)*
2. **M-3** — re-measure Lighthouse Performance on the Pages preview; confirm > 95. *(Gate.)*
3. **M-2** — product decision: accept A11y 96, or authorise a scoped contrast exception.
4. Optional pre-launch polish: web manifest + icons (M-1), CSP/HSTS (M-4), self-host
   font, skip-link.

Everything outside C-1 is either a deploy-time verification, a documented constraint
conflict, or minor polish. The site content, structure, links, SEO, responsiveness, and
runtime health are **launch-ready**.
