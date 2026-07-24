#!/usr/bin/env bash
#
# Post-deploy verification for the Transparency Centre report PDFs on Cloudflare R2.
# Run AFTER the bucket is uploaded and REPORTS_BASE_URL / the custom domain is live.
#
# For every local report PDF it checks the public R2 URL for:
#   - HTTP 200 with NO redirect (--max-redirs 0 catches redirect loops / misroutes)
#   - Content-Type: application/pdf
#   - Content-Length byte-exact match vs the local source file
#     (proves correct filename AND that large >25 MB files transferred intact)
#
# Usage:
#   ops/verify-r2-reports.sh https://reports.awqaf.my
#   REPORTS_BASE_URL=https://<bucket>.r2.dev ops/verify-r2-reports.sh
#
# Exit code 0 = PASS (all files OK), 1 = FAIL (one or more problems).

set -uo pipefail

BASE="${1:-${REPORTS_BASE_URL:-}}"
SRC_DIR="storage/app/public/reports"

if [[ -z "$BASE" ]]; then
  echo "ERROR: pass the base URL as arg 1 or set REPORTS_BASE_URL." >&2
  echo "  e.g. ops/verify-r2-reports.sh https://reports.awqaf.my" >&2
  exit 2
fi
BASE="${BASE%/}" # strip any trailing slash

if [[ ! -d "$SRC_DIR" ]]; then
  echo "ERROR: source dir '$SRC_DIR' not found (run from the project root)." >&2
  exit 2
fi

# Portable local file size (Linux stat -c / BSD stat -f).
local_size() { stat -c%s "$1" 2>/dev/null || stat -f%z "$1"; }

pass=0 fail=0
printf '%-42s %-6s %-18s %-9s %s\n' "FILE" "HTTP" "CONTENT-TYPE" "SIZE" "RESULT"
printf '%s\n' "--------------------------------------------------------------------------------------------"

for f in "$SRC_DIR"/*.pdf; do
  name="$(basename "$f")"
  url="$BASE/$name"
  want_size="$(local_size "$f")"

  # HEAD, no redirects followed. Capture status + content-type + content-length.
  read -r code ctype clen < <(
    curl -sI --max-redirs 0 "$url" \
      | awk '
          BEGIN{c="000";t="-";l="-"}
          /^HTTP\//{split($0,a," ");c=a[2]}
          tolower($1)=="content-type:"{t=$2; sub(/;.*/,"",t)}
          tolower($1)=="content-length:"{l=$2; gsub(/\r/,"",l)}
          END{print c, t, l}
        '
  )

  ok="OK"
  [[ "$code" == "200" ]]                || ok="FAIL:http=$code"
  [[ "$ctype" == "application/pdf" ]]   || ok="${ok}${ok:+ }FAIL:ctype=$ctype"
  [[ "$clen" == "$want_size" ]]         || ok="${ok}${ok:+ }FAIL:size=$clen!=$want_size"

  if [[ "$ok" == "OK" ]]; then pass=$((pass+1)); else fail=$((fail+1)); fi
  printf '%-42s %-6s %-18s %-9s %s\n' "$name" "$code" "$ctype" "$clen" "$ok"
done

echo
echo "checked=$((pass+fail))  pass=$pass  fail=$fail"
if [[ "$fail" -eq 0 ]]; then
  echo "RESULT: PASS — all report PDFs resolve from R2 (200, application/pdf, byte-exact)."
  exit 0
else
  echo "RESULT: FAIL — $fail file(s) failed. See rows above."
  exit 1
fi
