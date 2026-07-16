# AWQAF Corporate Website — Final QA

Date: **16 July 2026**. Reviewed against a staging build (`sail npm run build`, Pest suite,
route scan). Perspectives considered: potential waqif, existing member, government agency,
regulator, board member, corporate partner, media.

> Honesty note: automated Lighthouse and axe audits were **not executed** this session — the
> headless browser tooling was unavailable (see §8). Every other result below was run and is
> reproducible. Nothing is marked "pass" that was not executed.

---

## 1. Homepage review — 8.7/10

- Looks institutional: dark cinematic hero + a calm, alternating light/dark section rhythm. ✔
- AWQAF's role is clear within the first two screens (hero + "Tentang AWQAF"). ✔
- Not a donation campaign: a single "Wakaf Sekarang" CTA, no aggressive fundraising copy. ✔
- No duplicated content: Founder, detailed board, news preview, report archive, and the
  "Imej Institusi" placeholder were removed. ✔
- Waqaf Korporat model is visible as a dedicated 30/70 preview section. ✔
- Wakaf Sekarang easy to find (hero primary + header + footer). ✔
- Portal Pewakaf clearly separated as the *member* entry, distinct from contribution. ✔

Deductions:
- **Hero readability depends on a supplied mockup image** whose left side has baked-in text; the
  heavy gradient masks it, but a clean background plate would be more robust. Severity: low.
  Correction: request a text-free hero plate. Content-blocked.
- Portfolio/programme preview icons are decorative; acceptable but not distinctive. Severity: trivial.

## 2. Navigation review — 9.2/10

- 5 grouped top-level items + Wakaf Sekarang + Portal Pewakaf. No redundant items. ✔
- Berita removed from nav; Dokumen Korporat removed from Muat Turun. ✔
- No orphan routes (Berita retained but intentionally unlinked; still reachable/tested). ✔
- Accessible dropdowns: `aria-haspopup`/`aria-expanded`, single-open, Escape closes, focus-visible
  rings, grouped mobile drawer with both CTAs full-width. ✔
- Consistent BM terminology. ✔

Deduction:
- At exactly 1024px the header carries 5 nav items + 2 action buttons; padding was reduced to fit,
  but it is dense. Severity: low. Correction: verified via screenshot at 1024 (see evidence); if a
  future label lengthens, push Portal Pewakaf to `xl`. Code-blocked only if it wraps.

## 3. Typography review — 9/10

- Heading scale consistent (`text-3xl/4xl/5xl`), tabular-nums on figures, generous line-height,
  paragraph width capped (`max-w-2xl/3xl`) for readability. ✔
- Numbers formatted consistently (RM + thousands separators; percentages large and bold). ✔

Deduction: body copy on a few portfolio pages is dense; acceptable for an institutional site.

## 4. Corporate tone review — 9/10

- Formal BM throughout; campaign phrases ("Sertai gerakan", "Bina legasi", "Amanah yang terus
  hidup") are absent. ✔
- Figures carry year + metric type + report + page. Cumulative vs annual kept distinct. ✔
- "Sejak 1998" removed as an AWQAF corporate fact; 1998 appears only as JCorp/WANCorp history on
  the Founder page. ✔

Deduction: the Waqaf Korporat intro still uses "inovasi"/"®" framing; factual and acceptable.

## 5. Visual review — 8.6/10

- Whitespace generous; borders/shadows restrained; consistent 4:5 portrait crops on the board. ✔
- No empty placeholder *sections* on the homepage (Imej Institusi removed). ✔

Deductions:
- **Logo/photo slots across portfolio, programme and CURVES-branch pages are dashed placeholders.**
  Severity: medium (cosmetic, not misleading — clearly labelled). Correction: supply official media.
  Content-blocked.
- Book cover on the Founder page is a placeholder. Severity: low. Content-blocked.

## 6. Content review — 8.4/10

- No duplicated info across pages (Founder/reports now single-sourced with contextual links). ✔
- Source notes present on all figures. ✔
- Strategy not stated as achievement; property projects labelled "Cadangan / tertakluk pengesahan";
  Damai Senior Care Centre shown only as historical; proposed healthcare not shown as completed. ✔

Deductions:
- **Education portfolio** carries an unresolved conflict: Company Profile presents Al-Hamra as
  current; LT2024 records it terminated. Handled honestly with a status note, but needs management
  resolution. Severity: medium. Content-blocked.
- Property and Fintech pages remain **thin on verified specifics** (no verified figures/projects).
  Severity: medium. Content-blocked (awaiting verified data).

## 7. Institutional trust review — 8.9/10

Trust is evidenced, not sloganed: audited-report archive (2015–2024, 20 links live), named board
with committees and Person schema, incorporation details, and source-cited figures. Weakness: media
gaps and two partial portfolio pages slightly reduce the sense of completeness.

## 8. Performance & technical review

**Executed:**
- Production build: **pass** (`✓ built`).
- Pest suite: **38 passed, 350 assertions**.
- Route scan: **24 pages HTTP 200; 4 legacy paths HTTP 301** (no broken internal links).
- Sitemap: **21 `<loc>` entries**, includes `/korporat/pengasas`, all portfolios and programmes.
- Canonical + OpenGraph (`og:image` = official portrait on Founder; per-page title/description):
  present in server-rendered `<head>`.
- Hero image: `preload` + `decoding="async"` + `fetchpriority="high"`; absolutely-positioned over a
  fixed-height section (no layout shift by construction); `bg-slate-950` fallback.
- Lazy-loading: board/portfolio portraits use `loading="lazy"`; above-the-fold hero is eager.

**NOT executed this session (tooling unavailable — must run before launch):**
- Lighthouse (Performance/LCP/CLS numeric scores).
- Automated axe/pa11y accessibility audit.
- Real-device responsive matrix and keyboard-only walkthrough on device.
- Hero image weight optimisation: `awqaf-hero.webp.png` is a **2.1 MB PNG (1536×1024)** — should be
  re-encoded to WebP/AVIF (~200–400 KB) before launch. Severity: medium. Code/content-blocked.

## 9. Final summary

### Strengths
- Clean, calm institutional IA; clear separation of contribution vs member portal.
- Evidence-based trust (audited reports, cited figures, named governance).
- Honest handling of unverified/ historical facts; no fabricated media or statistics.
- Accessible navigation and responsive layouts by construction.

### Weaknesses
- Missing official media (portfolio/programme/branch logos & photos; book cover).
- Two partial portfolio pages (Property, Fintech) and the Al-Hamra status conflict.
- Hero is a heavy PNG mockup rather than an optimised, text-free plate.
- Live contribution/payment channel not yet integrated (BayarCash out of scope).

### Launch blockers
1. **Re-encode the hero image** to WebP/AVIF (2.1 MB PNG is too heavy for an LCP hero). *Code/content.*
2. **Resolve Al-Hamra current status** (Company Profile vs LT2024). *Content.*
3. **Run Lighthouse + axe** and remediate any AA failures. *Process.*

### Post-launch improvements
- Supply and wire official portfolio/programme/branch media.
- Add verified Property/Fintech specifics.
- Re-introduce a stronger Berita archive.
- Add a formal legal/privacy page in the footer.
- Integrate the live contribution channel when BayarCash credentials arrive.

### Scores
| Dimension | Score | If < 9.5 — issue / severity / correction / blocked-by |
|-----------|-------|-------------------------------------------------------|
| Design | 8.8/10 | Placeholder media / medium / supply assets / content |
| Corporate Communications | 9.1/10 | Minor promo framing in Waqaf intro / low / trim / content |
| Institutional Trust | 8.9/10 | Media gaps + 2 partial pages / medium / supply data+media / content |
| Information Architecture | 9.2/10 | Dense header at 1024 / low / monitor labels / code |
| Content Quality | 8.4/10 | Al-Hamra conflict; thin Property/Fintech / medium / verify / content |
| Accessibility | 8.7/10 | Automated audit not yet run / medium / run axe/Lighthouse / process |
| Performance | 8.2/10 | 2.1 MB hero PNG; Lighthouse not run / medium / re-encode + measure / code+process |
| **Overall** | **8.7/10** | Gated on the 3 launch blockers above |

No launch-critical *code* defect was found. The primary gaps are **content/asset** and **process
(measurement)**, not architecture.
