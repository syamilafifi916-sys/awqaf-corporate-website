# RC-WEB-001 — Final Web Release-Candidate Report

Branch `release/corporate-static-v1`. Continues AWQAF-CORPORATE-STATIC-001
(not repeated). Scope: PDF audit, report-hosting decision, **measured**
Lighthouse, accessibility/SEO/JSON-LD validation, link + asset integrity, and
only low-risk fixes. **No Cloudflare Pages deployment and no DNS changes.**

## Acceptance-minimum status
| Item | Status |
|------|--------|
| PDF audit completed | ✅ [PDF-AUDIT.md](PDF-AUDIT.md) — 20 files, 6 over 25 MB |
| Report hosting decision completed | ✅ [REPORT-HOSTING-DECISION.md](REPORT-HOSTING-DECISION.md) — **Cloudflare R2** |
| Lighthouse measured | ✅ [LIGHTHOUSE.md](LIGHTHOUSE.md) — 4 pages, raw scores |
| Accessibility validated | ✅ measured; 2 clean fixes applied; residual documented |
| SEO and JSON-LD validated | ✅ meta complete on 30/30 pages; **40/40 JSON-LD blocks valid** |
| 0 broken internal links | ✅ [LINK-ASSET-CHECK.md](LINK-ASSET-CHECK.md) — 469 refs, 0 broken |
| 0 missing assets | ✅ 0 missing |
| Final RC-WEB-001 report committed | ✅ this document |

## Low-risk fixes applied (source)
1. **Homepage `<dl>` → semantic grid** (`Welcome.vue`): the definition list
   contained a CTA link (not a `<dt>`/`<dd>` pair) → invalid list. Now a plain
   grid of `<p>` — visually identical. Homepage A11y **96 → 100**.
2. **Footer heading order** (`PublicLayout.vue`): footer column headings
   `<h4>` → `<h2>` (same styling classes, zero visual change) to stop the
   `h2 → h4` skip. Reports page A11y **98 → 100**.

Only these two files changed (`git diff --stat`: 2 files, +9 −7). No content,
no design redesign, no domain/financial code.

## Measured results (summary)
- **SEO: 100** on all 4 measured pages; meta + valid JSON-LD on all 30 pages.
- **Accessibility: 96–100** (Utama 100, Laporan 100; Maklumat-Korporat & Hubungi 96).
- **Best Practices: 96** (sole deduction = sandboxed bunny.net font DNS failure — not a real-user error).
- **Performance: 77–86 locally** — understated by preview-server limits
  (no gzip, no cache) that Cloudflare Pages fixes automatically; CLS 0.

## Integrity checks
- Build: 30 pages + sitemap + robots, all HTTP 200; every page self-contained
  (Ziggy/`route()` present); no `localhost` and no raw `<?php` in output.
- Links/assets: 0 broken / 0 missing across 469 internal refs.
- JSON-LD: 40 blocks, 0 invalid (Organization on all pages; Person on `/korporat/pengasas`).
- Portal CTA still renders non-clickable "Akan Dibuka"; contact via `mailto:`/`tel:`.

## Known limitations (documented, not blocking)
1. **Report PDFs → R2 required.** 6 files exceed the 25 MB Pages limit; decision
   is R2 (REPORT-HOSTING-DECISION). Until wired, `/storage/reports/*` 404s in prod.
2. **Color-contrast on decorative micro-labels** (2 pages, A11y 96). One utility
   class (`text-slate-400/500` uppercase eyebrow labels) is used on both light
   and dark backgrounds; a blanket change regresses the dark cases, so a proper
   light/dark-aware token pass is needed. Low severity (non-body labels).
3. **bunny.net webfont is a third-party dependency.** Self-hosting Figtree would
   remove the external request, the sandbox console errors, and a render-blocking
   resource (lifts Best Practices to 100 and helps Performance). Low-risk follow-up.
4. **Performance to be re-measured on the first Pages preview** (with real CDN
   compression + caching) for production-representative numbers.

## Recommendation
RC-WEB-001 acceptance minimum is **met**. The static site is link-clean,
asset-complete, SEO/JSON-LD valid, and accessibility-validated with the
low-risk fixes applied. The **one deploy-time prerequisite** is R2 hosting for
the oversized report PDFs (Pages upload excludes `dist/storage`).

**Suggested next step:** proceed to a **Cloudflare Pages preview** deployment
(review-only) and re-measure Performance there — unless you prefer to first do
the small font self-hosting + contrast token pass. Awaiting your call; no deploy
performed.
