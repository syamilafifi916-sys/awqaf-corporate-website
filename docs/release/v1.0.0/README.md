# AWQAF Corporate Website — Production Release Package v1.0.0

**Branch:** `release/corporate-static-v1` · **Status:** engineering complete, **READY FOR
DEPLOYMENT** (deployment executed by the project owner). Prepared under RC-WEB-006.

This folder is the complete, self-contained package to deploy and operate the AWQAF
Corporate Website on **zero paid infrastructure** (Cloudflare Pages + GitHub Releases).

| # | Document | Use it to… |
|---|----------|-----------|
| 1 | [GO-LIVE-CHECKLIST.md](GO-LIVE-CHECKLIST.md) | tick off every gate from build → live |
| 2 | [DEPLOYMENT-OPERATOR-GUIDE.md](DEPLOYMENT-OPERATOR-GUIDE.md) | run the deploy, command by command, with expected output |
| 3 | [POST-DEPLOYMENT-CHECKLIST.md](POST-DEPLOYMENT-CHECKLIST.md) | verify the live site after upload |
| 4 | [OPERATION-HANDBOOK.md](OPERATION-HANDBOOK.md) | add future reports, version `reports-v2/v3`, roll back |
| 5 | [PROJECT-HANDOVER.md](PROJECT-HANDOVER.md) | understand architecture, structure, config, maintenance |
| 6 | [RELEASE-NOTES-v1.0.0.md](RELEASE-NOTES-v1.0.0.md) | what shipped in v1.0.0 |
| 7 | [PROJECT-CLOSURE-REPORT.md](PROJECT-CLOSURE-REPORT.md) | objectives, metrics, lessons, outstanding items |

Deeper background (referenced, not required to deploy):
[RC-WEB-004 first-deploy runbook](../../deployment/RC-1/RC-WEB-004-FIRST-DEPLOYMENT.md) ·
[GitHub Releases hosting](../../deployment/RC-1/GITHUB-RELEASES-DEPLOYMENT.md) ·
[RC-WEB-005 final QA](../../deployment/RC-1/RC-WEB-005-FINAL-QA-AUDIT.md) ·
[Release Readiness Report](../../deployment/RC-1/RELEASE-READINESS-REPORT.md).

**Engineering verdict: READY FOR DEPLOYMENT. No engineering blocker (P0 = 0).** The one
gate that can only close on live infra is a Lighthouse Performance re-measure on the Pages
preview (P1). Deployment credentials (GitHub + Cloudflare) belong to the project owner and
were never available to engineering — no deployment result in this package is claimed as
executed.
