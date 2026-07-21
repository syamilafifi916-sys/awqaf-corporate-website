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

$SAIL artisan migrate --force
$SAIL artisan db:seed --class=ReportSeeder --force   # static reports list
$SAIL npm run build                                  # Vite production assets
$SAIL artisan view:clear
$SAIL artisan site:export --base="$BASE_URL"

echo
echo "dist/ is ready."
echo "NOTE: report PDFs in dist/storage/reports exceed Cloudflare Pages' 25MB"
echo "per-file limit — host those on R2 and exclude dist/storage before upload."
echo "Deploy:  npx wrangler pages deploy dist --project-name awqaf-corporate"
