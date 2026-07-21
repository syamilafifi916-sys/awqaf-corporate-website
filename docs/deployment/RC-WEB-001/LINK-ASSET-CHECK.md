# RC-WEB-001 — Link & Asset Check

Tool: `ops/link-check.py` — parses every `dist/**/*.html`, resolves internal
links/assets (root-relative or `https://awqaf.my/...`) to files in `dist/`, and
fails if any target is missing.

## Result
```
HTML pages scanned : 30
internal refs check: 469
broken internal    : 0
external refs (info): 2   (https://fonts.bunny.net — webfont CDN)
OK: 0 broken internal links, 0 missing assets.
```

- **0 broken internal links.**
- **0 missing assets** — every referenced `/build`, `/css`, `/js`, `/images`,
  `/storage`, favicon, `sitemap.xml`, `robots.txt`, and page route resolves to a
  file in `dist/`.
- Only external reference is **fonts.bunny.net** (the Figtree webfont). Legit,
  but it is a third-party runtime dependency — see the self-hosting recommendation.

## Re-run
```bash
python3 ops/link-check.py     # exit 0 = clean
```
Run after every `ops/build-static.sh`.
