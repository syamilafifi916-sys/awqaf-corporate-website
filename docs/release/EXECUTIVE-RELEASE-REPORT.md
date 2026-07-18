# AWQAF Holdings Berhad — Executive Release Report
**Prepared for:** Board of Directors / Launch Approval Committee
**Mode:** Release management — gate closure only. Public website design is frozen.
**Date:** 18 July 2026 · **Status:** FROZEN

---

## Executive Dashboard (one page)

| Dimension | Status | One-line summary |
|---|:---:|---|
| **Product** | 🟢 READY | Design frozen, feature-complete; homepage + Founder page signed off. |
| **Engineering** | 🟢 COMPLETE | Build compiles; 38/38 tests pass (350 assertions); security headers, SEO, 404 all verified. |
| **Content** | 🟡 SUBSTANTIALLY VERIFIED | All 20 annual/audited PDFs load (0 failures); a few facts await management confirmation. |
| **Governance** | 🔴 PENDING | Privacy/PDPA + Terms not yet published; trademark ® status to confirm. |
| **Production** | 🔴 NOT PROVISIONED | No host / DNS / secrets yet; TLS, monitoring, backups-restore pending environment. |
| **Launch Readiness** | 🟡 ON HOLD | Product is ready; launch pending RC-01 → RC-04 closure. |

**Legend:** 🟢 complete · 🟡 in progress / partial · 🔴 not started / blocked

---

## Overall Product Status

> ### ✅ PRODUCT READY
> ### ⏸ PUBLIC LAUNCH ON HOLD
> *Pending completion of RC-01 to RC-04.*

The product is complete and evidenced. The remaining work is **governance, production provisioning, and management/Board decisions** — not engineering defects. Gate recommendations below distinguish three states:

- **Engineering complete** — nothing further for the delivery team to build.
- **Awaiting management decision** — a fact, approval, or sign-off owned by management/Legal/Board.
- **Awaiting production environment** — depends on host / DNS / secrets being provisioned.

---

## 🟠 RC-01 — Governance & Legal
**Owner:** Company Secretary / Legal

| Checklist item | Status | Evidence |
|---|---|---|
| Privacy Notice / PDPA published | 🔴 Not present | No route/page exists |
| Terms of Use published | 🔴 Not present | No route/page exists |
| Footer legal links | 🔴 Pending pages | Footer has no Privacy/Terms links |
| Trademark ® verified or removed | 🟡 Decision needed | ® used on `/berita` ("Waqaf Korporat®", "Formula Waqaf Korporat®") |
| Consent mechanism (if analytics added) | 🟡 Deferred to RC-02 | No trackers present today |

**Executed:** Scope confirmed; ® usage located. **Delivery team can, on request:** draft PDPA + Terms and scaffold pages/routes/footer links, marked *pending legal approval*.
**Gate state:** **Awaiting management decision** — legal drafting/sign-off + trademark confirmation. Engineering scaffolding available on demand.

---

## 🟠 RC-02 — Production Readiness
**Owner:** Head of Technology / DevOps

| Checklist item | Status | Evidence |
|---|---|---|
| Test suite green | 🟢 Complete | **38 passed, 350 assertions** (`pest`) |
| Production build compiles | 🟢 Complete | `npm run build` ✓ |
| Security headers | 🟢 Complete | `X-Content-Type-Options: nosniff`, `X-Frame-Options: SAMEORIGIN`, `Referrer-Policy: strict-origin-when-cross-origin`, `Permissions-Policy` present |
| sitemap / robots / 404 | 🟢 Complete | sitemap 200 (21 `<loc>`), robots 200, unknown path → 404 |
| Accessibility (static evidence) | 🟢 Complete (desk) | Semantic sections, `aria-hidden`/`role=img`/alt text, focus-visible rings; formal AT/keyboard pass on staging |
| Host / DNS / secrets | 🔴 Pending environment | None provisioned |
| Prod config (`APP_ENV=production`, `APP_DEBUG=false`, HTTPS `APP_URL`) | 🔴 Pending environment | Current: `local` / `true` / `http://localhost:8080` |
| TLS / HTTPS + HSTS | 🔴 Pending environment | HSTS emits over HTTPS; middleware ready |
| Error monitoring (Sentry) + uptime | 🔴 Pending environment | Env-gated; needs DSN + monitor |
| Backup taken + restore drill | 🔴 Pending environment | `ops/backup.sh` ready; drill not run |
| Lighthouse on live domain | 🔴 Pending environment | Not runnable without a live domain |
| Analytics + Search Console + sitemap submit | 🔴 Pending environment | Needs domain + accounts |
| Content-Security-Policy header | 🟡 Recommended (P2) | Not emitted; delivery team can add pre-launch |

**Executed:** Verified headers, green suite, build, SEO endpoints, 404; fixed one stale test (approved-portrait allowlist).
**Gate state:** **Engineering complete for everything runnable pre-environment; remainder awaiting production environment.** A single provisioning step (host + DNS + secrets) unlocks all red items.

---

## 🟠 RC-03 — Corporate Content Verification
**Owner:** Corporate Communications Director / Finance

| Checklist item | Status | Evidence |
|---|---|---|
| All annual reports + audited financials load | 🟢 Verified | 20 PDFs (10 annual + 10 audited), **0/20 serve failures**; 20 DB records, years 2015–2024 |
| Contact details accurate/official | 🟡 Confirmation needed | On `/hubungi`: Bukit Jelutong address, `admin@awqaf.my`, `03-7832 6644` — displayed, confirm current |
| Company registration (SSM) number | 🟡 Awaiting number | Not present; supply the number to display |
| 30% / 70% allocation ratio + effective date | 🟡 Board approval | Labelled "subject to review" |
| Content freshness (latest report + news) | 🟡 Confirmation needed | Latest report 2024; newsroom items 2024 — confirm 2025 exists / refresh |
| Board/leadership + portfolio/programme figures | 🟡 Confirmation needed | 9 board members rendered; figures sourced to reports |

*Chairman portrait provenance — **resolved.** Management has confirmed the portrait originates from an official AWQAF photograph and underwent background removal only. Item closed.*

**Executed:** Proved every report and audited-statement PDF loads — the most launch-critical content criterion — with zero failures.
**Gate state:** **Content assets verified (engineering complete); remaining items awaiting management decision.**

---

## 🔴 RC-04 — Executive Acceptance
**Owner:** CEO → Board

| Checklist item | Status |
|---|---|
| Signed RC-01, RC-02, RC-03 attestations | 🔴 Pending upstream gates |
| Launch-day runbook + named owner + rollback authority | 🟡 Runbook exists; owner/authority to be named |
| Board Go/No-Go resolution | 🔴 Convene once 01–03 close |

**Gate state:** **Awaiting management decision** — cannot convene until RC-01–03 produce signed attestations.

---

## 🟢 RC-05 — Post-Launch Monitoring (First 7 Days)
*Outside the launch-approval process. Operational readiness plan for the week after go-live.*
**Owner:** Head of Technology / DevOps (with Comms on standby)

| Area | Plan | Frequency (first 7 days) |
|---|---|---|
| **Uptime** | External uptime monitor on `/` and key routes; alert on 2 consecutive failures. | Continuous; daily review |
| **Monitoring** | Sentry error stream reviewed; triage new/spiking errors; watch 5xx rate. | Twice daily |
| **Analytics** | Confirm analytics recording; watch traffic, top pages, bounce, referral spikes (bot vs. real). | Daily |
| **Broken links** | Full link crawl of all 21 routes + report-PDF downloads; fix any 4xx/5xx. | Day 1, Day 3, Day 7 |
| **404 review** | Review 404 log for real misses (bad inbound links, renamed URLs); add redirects where warranted. | Daily |
| **Hotfix procedure** | Fix-forward on a hotfix branch → CI green → deploy; if regression, execute the runbook's fast rollback (< 5 min) to the previous tagged release. Named on-call owner + rollback authority for the week. | On demand |

**Exit of RC-05:** After 7 stable days (no unresolved 5xx spikes, monitors green, no open Sev-1), transition to steady-state operations.

---

## Consolidated critical path
1. **Provision production (host + DNS + secrets)** → unlocks all RC-02 *pending-environment* items (TLS, prod config, monitoring, restore drill, Lighthouse, analytics). *Largest single unlock.* — *Tech*
2. **Legal drafts + trademark ruling** → RC-01. — *Legal / Co-Sec*
3. **Management fact pack:** SSM number, contact confirmation, 30/70 ratio + effective date, latest report/news currency, board/figure confirmation → RC-03. — *Comms / Finance*
4. **Board convenes** once 1–3 are signed → RC-04. RC-05 activates at go-live.

## Delivery-team actions available now (no external input required)
- **RC-01:** draft PDPA + Terms, scaffold pages/routes/footer links (*pending legal approval*).
- **RC-02:** add `Content-Security-Policy` header; produce a written static-accessibility checklist as pre-staging evidence.
- Assemble the verified evidence (PDF-load log, headers, green suite) into the RC evidence pack for the Board paper.

---
*Report frozen. Changes only on management/Board direction or when a gate's evidence materially changes.*
