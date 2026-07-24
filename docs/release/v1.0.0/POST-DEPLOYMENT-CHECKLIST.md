# Post-Deployment Checklist — AWQAF Corporate Website v1.0.0

Run against the live host (`*.pages.dev` first, then `https://awqaf.my`). Replace `<HOST>`
with the live origin.

## Homepage
- [ ] `<HOST>/` returns 200; hero + all sections render; no layout shift.
- [ ] Hero image + AWQAF logo load; impact figures visible.

## Navigation
- [ ] Every top-nav group + dropdown item resolves (Mengenai AWQAF, Waqaf Korporat,
      Portfolio Pelaburan, Program & Inisiatif, Muat Turun).
- [ ] "Wakaf Sekarang" CTA works; Portal shows "Akan Dibuka" (expected until portal launch).
- [ ] Footer links (Wakaf / Korporat / Laporan columns) all resolve.
- [ ] Mobile menu opens/closes; focus trap + Esc work.

## Portfolio & Programmes
- [ ] `/portfolio` + 4 detail pages (pendidikan, kesihatan-kesejahteraan, hartanah, fintech).
- [ ] `/program` + 3 detail pages (yayasan-zuriatcare, eduwaqf, awqaf4health).

## Reports (Publications)
- [ ] `/korporat/laporan-tahunan` lists all reports; `/ketelusan` hub loads.
- [ ] `ops/verify-report-links.sh https://github.com/<ORG>/<REPO>/releases/download/reports-v1` → PASS (20/20).
- [ ] Manually open **Annual-Report-AWQAF-2017.pdf** (~158 MiB) — downloads/opens correctly.
- [ ] Spot-open one Audited Financial Statement.

## SEO
- [ ] View source: `<title>` unique per page; `<meta name="description">` present.
- [ ] Canonical points to `https://awqaf.my/…` (not the `*.pages.dev` host).
- [ ] OpenGraph (`og:title/description/image/url`) + Twitter card present; OG image loads
      (`/images/og-default.jpg`, 1200×630).
- [ ] JSON-LD present (Organization sitewide; Person on `/korporat/pengasas`).

## robots / sitemap
- [ ] `<HOST>/robots.txt` returns 200; allows all except `/admin`; references the sitemap.
- [ ] `<HOST>/sitemap.xml` returns 200; URLs use `https://awqaf.my`; no `localhost`.

## Responsive
- [ ] No horizontal overflow at 320 / 375 / 390 / 768 / 1024 / 1280 / 1440 / 1920.
- [ ] No clipping or layout break on mobile or ultrawide.

## Console / Network
- [ ] DevTools console clean (no errors) on home, portfolio, programme, reports pages.
- [ ] No 404s in the Network tab (all 30 routes + assets 200).
- [ ] No mixed content (all resources https).

## Security headers (check response headers on `<HOST>/`)
- [ ] `X-Content-Type-Options: nosniff`
- [ ] `X-Frame-Options: SAMEORIGIN`
- [ ] `Referrer-Policy: strict-origin-when-cross-origin`
- [ ] `Permissions-Policy: camera=(), geolocation=(), microphone=(), payment=()`
- [ ] (After Step 8) HSTS present; CSP added + tested if configured (P2 item).

## Performance (P1 gate)
- [ ] Lighthouse on `<HOST>` — **Performance > 95** (Desktop + Mobile), SEO 100, Best
      Practices 100, Accessibility ≥ 96. **Record the four numbers** for the release record.

**Sign-off:** the deployment is verified when every box above is ticked and the Lighthouse
numbers are recorded. Any failure → consult the [Operation Handbook](OPERATION-HANDBOOK.md)
rollback section before retrying.
