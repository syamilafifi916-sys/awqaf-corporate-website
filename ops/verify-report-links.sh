#!/usr/bin/env bash
#
# verify-report-links.sh — unified Transparency Centre report-PDF verifier.
#
# Verifies that every report PDF resolves from whichever backend is in use, and
# AUTO-DETECTS the backend (GitHub Releases / Cloudflare R2 / local storage).
# Does NOT replace ops/verify-r2-reports.sh (that one is R2-only, strict).
#
# Backend resolution order:
#   1. explicit arg 1               e.g. verify-report-links.sh <BASE_URL>
#   2. $REPORTS_BASE_URL            (same value the app/export uses)
#   3. auto-detect from the exported Reports page
#        dist/korporat/laporan-tahunan/index.html
#   4. fall back to local storage
#
# Backend rules (by base URL):
#   github  base contains github.com + /releases/download/
#             → follow redirects, final HTTP 200, Content-Length > 0, body is a PDF (%PDF)
#   r2      any other http(s) base
#             → HTTP 200, Content-Type application/pdf, body is a PDF (%PDF)
#   local   empty base, or a base ending in /storage (same-origin), or a filesystem path
#             → the file exists in storage/app/public/reports and is non-empty
#
# The file set is the 20 source PDFs in storage/app/public/reports (keyed by
# basename — exactly what Report::url emits). Exit 0 = PASS, 1 = FAIL, 2 = usage.

set -uo pipefail

SRC_DIR="storage/app/public/reports"
DIST_HTML="dist/korporat/laporan-tahunan/index.html"
CURL_MAX_TIME="${CURL_MAX_TIME:-40}"

# ── portable local file size ─────────────────────────────────────────────────
local_size() { stat -c%s "$1" 2>/dev/null || stat -f%z "$1"; }

# ── resolve base ─────────────────────────────────────────────────────────────
BASE="${1:-${REPORTS_BASE_URL:-}}"
SOURCE="arg/env"

if [[ -z "$BASE" && -f "$DIST_HTML" ]]; then
  # Pull one baked report URL out of the exported page. Inertia's data-page is
  # HTML-attribute-encoded, so quotes appear as &quot; (not literal ") and
  # slashes are literal. Stop the match at a quote, ampersand (&quot;), or space
  # so we capture exactly one URL; then defensively unescape any \/ → /.
  url="$(grep -oE 'https://[^"&\\ ]+\.pdf' "$DIST_HTML" | head -1 | sed 's#\\/#/#g')"
  if [[ -n "$url" ]]; then
    BASE="${url%/*}"          # strip trailing /<filename>.pdf → base
    SOURCE="auto (dist HTML)"
  fi
fi
BASE="${BASE%/}"              # normalise: no trailing slash

# ── detect backend ───────────────────────────────────────────────────────────
# A same-origin /storage[/reports] base is really the local backend (the PDFs
# ship inside dist/); collapse it to the local check.
backend="local"
case "$BASE" in
  *github.com*/releases/download/*) backend="github" ;;
  */storage/reports|*/storage)      BASE=""; backend="local" ;;
  http://*|https://*)               backend="r2" ;;
  "")                               backend="local" ;;
  *)                                backend="local" ;;   # filesystem-ish
esac

if [[ ! -d "$SRC_DIR" ]]; then
  echo "ERROR: '$SRC_DIR' not found — run from the project root." >&2
  exit 2
fi

echo "Backend : $backend"
echo "Base    : ${BASE:-<local storage: $SRC_DIR>}"
echo "Resolved: $SOURCE"
echo

# ── remote helpers ───────────────────────────────────────────────────────────
# Last HTTP status after following redirects.
http_status()      { curl -sIL -m "$CURL_MAX_TIME" -o /dev/null -w '%{http_code}' "$1"; }
# Last Content-Length header after following redirects (0 if absent).
http_length()      { curl -sIL -m "$CURL_MAX_TIME" "$1" | awk 'tolower($1)=="content-length:"{v=$2} END{gsub(/\r/,"",v); print (v==""?0:v)}'; }
# Last Content-Type header after following redirects.
http_ctype()       { curl -sIL -m "$CURL_MAX_TIME" "$1" | awk 'tolower($1)=="content-type:"{v=$2} END{sub(/;.*/,"",v); gsub(/\r/,"",v); print v}'; }
# First 4 bytes of the body (follow redirects, ranged GET) — expect "%PDF".
is_pdf_body()      { [[ "$(curl -sL -m "$CURL_MAX_TIME" -r 0-3 "$1" 2>/dev/null | head -c4)" == "%PDF" ]]; }

pass=0 fail=0
printf '%-42s %s\n' "FILE" "RESULT"
printf '%s\n' "-------------------------------------------------------------------"

for f in "$SRC_DIR"/*.pdf; do
  [[ -e "$f" ]] || { echo "ERROR: no PDFs in $SRC_DIR" >&2; exit 2; }
  name="$(basename "$f")"
  detail="OK" ok=1

  case "$backend" in
    github)
      url="$BASE/$name"
      code="$(http_status "$url")"; clen="$(http_length "$url")"
      [[ "$code" == "200" ]]        || { ok=0; detail="FAIL http=$code"; }
      [[ "${clen:-0}" -gt 0 ]]      || { ok=0; detail="$detail; len=$clen"; }
      if [[ $ok -eq 1 ]] && ! is_pdf_body "$url"; then ok=0; detail="FAIL not-a-PDF (%PDF missing)"; fi
      ;;
    r2)
      url="$BASE/$name"
      code="$(http_status "$url")"; ctype="$(http_ctype "$url")"
      [[ "$code" == "200" ]]                 || { ok=0; detail="FAIL http=$code"; }
      [[ "$ctype" == "application/pdf" ]]    || { ok=0; detail="$detail; ctype=$ctype"; }
      if [[ $ok -eq 1 ]] && ! is_pdf_body "$url"; then ok=0; detail="FAIL not-a-PDF"; fi
      ;;
    local)
      [[ -f "$f" ]]                 || { ok=0; detail="FAIL missing"; }
      [[ "$(local_size "$f")" -gt 0 ]] 2>/dev/null || { ok=0; detail="FAIL empty"; }
      ;;
  esac

  if [[ $ok -eq 1 ]]; then pass=$((pass+1)); else fail=$((fail+1)); fi
  printf '%-42s %s\n' "$name" "$detail"
done

echo
echo "backend=$backend  checked=$((pass+fail))  pass=$pass  fail=$fail"
if [[ $fail -eq 0 && $((pass+fail)) -eq 20 ]]; then
  echo "RESULT: PASS — all 20 report PDFs verified via '$backend'."
  exit 0
elif [[ $fail -eq 0 ]]; then
  echo "RESULT: PASS (with warning) — $pass verified but expected 20; check the source set."
  exit 0
else
  echo "RESULT: FAIL — $fail file(s) did not verify via '$backend'."
  exit 1
fi
