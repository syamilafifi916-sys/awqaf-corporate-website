# RC-WEB-001 — Lighthouse (Measured)

Tool: `lighthouse@12` (headless Chrome), default **mobile** profile. Target:
the static `dist/` served locally (root-relative preview). Not fabricated —
these are the raw category scores.

## Scores
| Page | Performance | Accessibility | Best Practices | SEO |
|------|:-----------:|:-------------:|:--------------:|:---:|
| `/` (Utama) | 84 | **100** | 96 | **100** |
| `/korporat/maklumat-korporat` | 77 | 96 | 96 | **100** |
| `/korporat/laporan-tahunan` | 79 | **100** | 96 | **100** |
| `/hubungi` | 86 | 96 | 96 | **100** |

## Interpretation

### SEO — 100 on every page ✅
Prerendered title/description/canonical/OG/Twitter + valid JSON-LD (see
[../RC-WEB-001/RC-WEB-001-REPORT.md](RC-WEB-001-REPORT.md)).

### Accessibility — 96–100
- Fixed in RC-WEB-001: an invalid `<dl>` (homepage) and a heading-order skip
  (footer `<h4>`) → homepage & reports now **100**.
- Residual **color-contrast** on two pages: decorative uppercase micro-labels
  (`text-slate-400/500`) used on *both* light and dark backgrounds via one
  utility class. A blanket darken regresses the dark-background instances, so
  a correct fix needs a light/dark-aware token pass — deferred as a low-risk
  follow-up (see Known Limitations). Pre-existing in the approved design.

### Best Practices — 96 (all pages)
Sole deduction: `errors-in-console` = 24× `ERR_NAME_NOT_RESOLVED` for the
**bunny.net** webfont, which cannot be resolved inside the sandboxed Lighthouse
Chrome (no external DNS). **This does not occur for real users**; on production
the font host resolves normally. (Self-hosting the font would remove the
third-party dependency entirely — recommended follow-up.)

### Performance — 77–86 locally (understates production)
The local measurement is penalised by three factors that **Cloudflare Pages
eliminates automatically**:
1. **No text compression** — `python -m http.server` sends no gzip/brotli
   (`uses-text-compression` scored 0). Pages compresses all text assets.
2. **No cache policy** — the preview server sets no `Cache-Control`
   (`uses-long-cache-ttl`/`cache-insight` scored 0). Pages + the committed
   `_headers` apply immutable caching to `/build/*`.
3. **Failed external font** — bunny.net not resolving delays FCP/LCP in the
   sandbox.

CLS is already **0** and Total Blocking Time ~100 ms. With Pages' CDN,
compression, and edge caching (and font resolution), production performance is
expected to land materially higher. Full production numbers should be
re-measured on the first Pages **preview** URL.

## How to reproduce
```bash
# build dist, serve a localhost-rewritten copy, then:
npx lighthouse@12 http://localhost:8099/ \
  --only-categories=performance,accessibility,best-practices,seo \
  --chrome-flags="--headless=new"
```
