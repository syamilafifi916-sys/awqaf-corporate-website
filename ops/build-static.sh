#!/usr/bin/env bash
# AWQAF corporate — build the static site into dist/ (STATIC-001).
# Requires the Sail stack (PHP + PostgreSQL) — the crawl renders the live
# app. NOT runnable in Cloudflare Pages' build image; run locally or in CI
# with PHP+DB, then deploy dist/ via Wrangler.
#
#   ./ops/build-static.sh                    # base = https://awqaf.my
#   BASE_URL=https://staging.awqaf.my ./ops/build-static.sh
set -euo pipefail
SAIL="${SAIL:-./vendor/bin/sail}"
BASE_URL="${BASE_URL:-https://awqaf.my}"

# REPORTS_BASE_URL must be visible to Laravel inside Sail, not only in the host
# shell. Otherwise the exporter bakes /storage/reports URLs while the host-side
# cleanup may still remove those PDFs from dist/.
HOST_REPORTS_BASE_URL="${REPORTS_BASE_URL:-}"
CONTAINER_REPORTS_BASE_URL="$($SAIL artisan tinker --execute="echo (string) env('REPORTS_BASE_URL');" 2>/dev/null || true)"

if [ -n "$HOST_REPORTS_BASE_URL" ] && [ "$CONTAINER_REPORTS_BASE_URL" != "$HOST_REPORTS_BASE_URL" ]; then
  echo "ERROR: REPORTS_BASE_URL differs between the host shell and Laravel Sail."
  echo "Host:      $HOST_REPORTS_BASE_URL"
  echo "Container: ${CONTAINER_REPORTS_BASE_URL:-<empty>}"
  echo "Set REPORTS_BASE_URL in .env (or otherwise pass it into Sail) before building."
  exit 1
fi

EFFECTIVE_REPORTS_BASE_URL="${CONTAINER_REPORTS_BASE_URL:-$HOST_REPORTS_BASE_URL}"

$SAIL artisan migrate --force
$SAIL artisan db:seed --class=ReportSeeder --force   # static reports list
$SAIL npm run build                                  # Vite production assets
$SAIL artisan view:clear
$SAIL artisan config:clear                            # pick up REPORTS_BASE_URL
$SAIL artisan site:export --base="$BASE_URL"

# When reports are hosted off-Pages (REPORTS_BASE_URL set — GitHub Releases or
# R2), Report::url already points at that host, so the local PDF copies must NOT
# ship: they would re-trip Cloudflare Pages' 25 MB per-file limit. Drop them so
# `dist/` is a clean, free-tier-safe upload. When REPORTS_BASE_URL is empty the
# copies stay (local/Laravel fallback needs them).
if [ -n "$EFFECTIVE_REPORTS_BASE_URL" ] && [ -d dist/storage/reports ]; then
  rm -rf dist/storage/reports
  echo "REPORTS_BASE_URL set → removed dist/storage/reports (served from \$REPORTS_BASE_URL)."
fi

echo
echo "dist/ is ready."
if [ -n "$EFFECTIVE_REPORTS_BASE_URL" ]; then
  echo "Reports host: $EFFECTIVE_REPORTS_BASE_URL  (dist/ is free-tier-safe: no file > 25MB)"
else
  echo "NOTE: REPORTS_BASE_URL is empty — report PDFs remain in dist/storage/reports"
  echo "and exceed Cloudflare Pages' 25MB limit. Set REPORTS_BASE_URL (GitHub"
  echo "Releases, free) before a Pages deploy. See docs/deployment/RC-1/."
fi
echo "Verify reports:  ops/verify-report-links.sh   (auto-detects backend)"
echo "Deploy:  npx wrangler pages deploy dist --project-name awqaf-corporate"
