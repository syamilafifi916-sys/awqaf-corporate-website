# RC-1 — Release Readiness Report

**Project:** AWQAF Corporate Website
**Branch:** `release/corporate-static-v1`
**Role:** Production Release Engineer
**Date:** 2026-07-23 (updated 2026-07-24 — RC-WEB-002)
**Design status:** APPROVED — frozen (no redesign, no colour, no layout, no copy changes performed).

> **RC-WEB-002 update (2026-07-24): PASS.** The sole Critical blocker (C-1 — oversized
> report PDFs) is now **Resolved in Code / Pending Infrastructure Deployment**. The
> code change is committed (`3b5463a`); what remains is the operational R2 upload +
> DNS, not code. See [§ RC-WEB-002 — Report Hosting Resolution](#rc-web-002--report-hosting-resolution).

---

## VERDICT

**Overall: PASS (code-complete) — no open Critical code defects.**

The website itself — all 30 pages, navigation, CTAs, content, SEO, responsiveness,
accessibility — is production-quality. The single former blocker was a **hosting-platform
limit on the report PDFs**, never a defect in the site; it is now resolved in code and
awaits only the R2 infrastructure deployment.

**Go / No-Go: conditional GO.** The one remaining launch prerequisite is operational,
not code: provision the R2 bucket, upload the report PDFs, set `REPORTS_BASE_URL`, and
re-measure Performance on the first Pages preview. No further code changes are required
to clear the Critical.

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
| — | **C-1 report hosting (RC-WEB-002)** | ✅ **RESOLVED IN CODE** | `REPORTS_BASE_URL` (`3b5463a`); pending R2 upload + DNS (infra, non-code). |

---

## CRITICAL ISSUES

### C-1 — Six report PDFs exceed Cloudflare Pages' 25 MB per-file limit
**Status: RESOLVED IN CODE / PENDING INFRASTRUCTURE DEPLOYMENT** (RC-WEB-002,
commit `3b5463a`). Code path fixed and verified; the remaining step is the R2
upload + DNS (operational, see the deployment checklist below). Original finding:

Cloudflare Pages **hard-rejects any file > 25 MB**. The transparency downloads were
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

**Impact (if unresolved):** on a Pages deploy these six downloads **404**. The
Transparency Centre (Pusat Ketelusan) and Reports page are core trust features, so this
was launch-blocking.

**Resolution:** implemented in RC-WEB-002 — see the dedicated section below.

---

## RC-WEB-002 — Report Hosting Resolution

**Status: PASS — Resolved in Code / Pending Infrastructure Deployment.**
**Commit:** `3b5463a` — *fix(reports): serve report PDFs from configurable REPORTS_BASE_URL (R2)*
**Scope:** URL generation only. No PDF was moved, compressed, split, or altered. No
page behaviour, layout, colour, or copy changed — downloads are byte-identical from the
user's perspective; only the file host changes.

### What changed

A configurable `REPORTS_BASE_URL` now decides where report PDFs are served from. When
set, `Report::url` emits `REPORTS_BASE_URL + filename` (external object store, e.g.
Cloudflare R2), so the oversized audited PDFs never enter the 25 MB-limited Pages build.
When empty, it falls back to the existing local public disk — local development and
Laravel hosting are unchanged.

### Architecture — before

```
Report::url
  → Storage::disk('public')->url($file_path)
  → /storage/reports/<file>.pdf        (same-origin; 404s on Pages when > 25 MB)
```

### Architecture — after

```
Report::url
  ├─ REPORTS_BASE_URL set  → rtrim(base,'/') . '/' . basename($file_path)
  │                          → https://reports.awqaf.my/<file>.pdf   (R2 / object store)
  └─ REPORTS_BASE_URL empty → Storage::disk('public')->url($file_path)
                             → /storage/reports/<file>.pdf           (local dev / Laravel)
```

### Example generated URLs

| `REPORTS_BASE_URL` | Generated URL |
|--------------------|---------------|
| *(empty — local dev)* | `http://localhost:8080/storage/reports/Annual-Report-AWQAF-2017.pdf` |
| `https://reports.awqaf.my` | `https://reports.awqaf.my/Annual-Report-AWQAF-2017.pdf` |
| `https://<bucket>.r2.dev` | `https://<bucket>.r2.dev/Annual-Report-AWQAF-2017.pdf` |
| `https://x.r2.dev/` *(trailing slash)* | `https://x.r2.dev/Annual-Report-AWQAF-2015.pdf` *(no double slash)* |

### Files changed

| File | Change |
|------|--------|
| `config/services.php` | Added `services.reports.base_url = env('REPORTS_BASE_URL')`. |
| `app/Models/Report.php` | `url` accessor uses `base_url` when `filled()`, else the public-disk fallback. |
| `.env.example` | Documents `REPORTS_BASE_URL` (empty by default). |

### Verification (RC-WEB-002)

- ✅ **`REPORTS_BASE_URL` added** — config key + documented env var; read via `config()`
  (not `env()` in the model), so it is `config:cache`-safe.
- ✅ **Local fallback preserved** — with the var empty, `site:export` bakes the identical
  `/storage/reports/*.pdf` links (20 refs); `ops/link-check.py` → 0 broken, 0 missing.
- ✅ **Production R2 mode verified** — `REPORTS_BASE_URL=https://reports.awqaf.my` export
  produced **20 R2 URLs and 0 residual `/storage/reports` references**; trailing-slash
  base does not double-slash; link check clean.
- ✅ **Zero visual changes** — no template, layout, colour, or copy touched; the change is
  confined to URL string generation.
- ✅ **Zero regression** — full suite unchanged: **35 passed**. The 3 non-passing tests
  (`CorporateQaTest`, `PortfolioProgrammeTest`) are **pre-existing content assertions**
  (education consultancy activity, CURVES/Infaq placement, property verification status)
  from earlier approved content refinements.
- ✅ **Existing failing tests confirmed unrelated** — none reference `Report`, `url`, or
  `REPORTS_BASE_URL`; with this change **stashed**, the same 3 tests fail identically
  (2 failed + 1 error), proving they pre-date and are independent of this fix.

### Deployment checklist — Cloudflare R2

1. **Create the R2 bucket** (Cloudflare dashboard → R2 → *Create bucket*), e.g.
   `awqaf-reports`.
2. **Upload the report PDFs** to the bucket **root**, filenames unchanged
   (`Annual-Report-AWQAF-2017.pdf`, `Audited-financial-statement-2021.pdf`, …). The
   URL scheme is `base + '/' + basename`, so PDFs must sit at the bucket root, not under
   a `reports/` prefix. Source files: `storage/app/public/reports/*` (20 files).
3. **Expose the bucket publicly** — either enable the managed **`r2.dev`** subdomain
   (gives `https://<bucket>.r2.dev`) or, preferred for production, connect a **custom
   domain** such as `reports.awqaf.my` (R2 → bucket → *Settings → Custom Domains*;
   Cloudflare provisions the DNS + TLS automatically).
4. **Set `REPORTS_BASE_URL`** in the build/export environment to that base **with no
   trailing path and no trailing slash needed**, e.g. `REPORTS_BASE_URL=https://reports.awqaf.my`.
5. **Re-run the static export** (`php artisan site:export --base=https://awqaf.my`) so the
   Reports page bakes the R2 URLs. Confirm: `grep -c reports.awqaf.my dist/korporat/laporan-tahunan/index.html`
   → 20, and `grep -c 'storage/reports' …` → 0.
6. **Exclude local report copies from the Pages upload** — do **not** ship
   `dist/storage/reports` (they are now served from R2 and would re-trip the 25 MB limit).
   Add an ignore/prune step for `dist/storage/reports` in the Pages deploy, or omit that
   path from the upload set.
7. **Set CORS on the bucket if inline PDF viewing is used** — for plain download links
   (current behaviour) this is not required; add a permissive `GET` CORS rule only if a
   future embedded viewer fetches cross-origin.
8. **Verify in the Pages preview** — open the Reports page, confirm each of the 20
   downloads resolves (HTTP 200) from the R2 host, including the six previously oversized
   files. Then complete the M-3 Performance re-measure.

**Do not** compress, split, or otherwise alter the audited PDFs at any step.

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

**Conditional GO.** The Critical (C-1) is **resolved in code** (`3b5463a`); no code
defect blocks launch. The only remaining C-1 work is operational — provision R2 and set
`REPORTS_BASE_URL` per the deployment checklist above.

**Path to GO (small and well-defined):**
1. **C-1 (code ✅ done)** — execute the R2 deployment checklist: upload PDFs, expose the
   bucket, set `REPORTS_BASE_URL`, re-export, exclude `dist/storage/reports` from the
   Pages upload, verify the 20 downloads in the preview. *(Infrastructure, not code.)*
2. **M-3** — re-measure Lighthouse Performance on the Pages preview; confirm > 95. *(Gate.)*
3. **M-2** — product decision: accept A11y 96, or authorise a scoped contrast exception.
4. Optional pre-launch polish: web manifest + icons (M-1), CSP/HSTS (M-4), self-host
   font, skip-link.

Everything remaining is either a deploy-time verification, a documented constraint
conflict, or minor polish. The site content, structure, links, SEO, responsiveness, and
runtime health are **launch-ready**, and the report-hosting architecture is **code-complete**.
