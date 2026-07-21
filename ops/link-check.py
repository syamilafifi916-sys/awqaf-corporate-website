#!/usr/bin/env python3
"""RC-WEB-001 internal link + asset checker for the static export (dist/).

Parses every dist/**/*.html, resolves internal links/assets (root-relative or
https://awqaf.my/...) to files in dist/, and reports anything missing. External
links (other hosts, mailto:, tel:, #anchors) are listed but not fetched.
"""
import os
import re
import sys
from html.parser import HTMLParser

DIST = os.path.join(os.path.dirname(__file__), "..", "dist")
DIST = os.path.abspath(DIST)
BASE = "https://awqaf.my"

ATTRS = {"href", "src", "content"}  # content covers og:image/url meta


class Extract(HTMLParser):
    def __init__(self):
        super().__init__()
        self.urls = []

    def handle_starttag(self, tag, attrs):
        d = dict(attrs)
        for a in ("href", "src"):
            if a in d and d[a]:
                self.urls.append(d[a])
        # meta property=og:image / canonical
        if tag == "meta" and d.get("property") in ("og:image", "og:url") and d.get("content"):
            self.urls.append(d["content"])
        if tag == "link" and d.get("rel") == "canonical" and d.get("href"):
            self.urls.append(d["href"])


def to_dist_path(url):
    """Return (kind, dist_path_or_None). kind: internal|external|anchor|scheme."""
    if url.startswith("#") or url.strip() == "":
        return ("anchor", None)
    if url.startswith("mailto:") or url.startswith("tel:") or url.startswith("data:"):
        return ("scheme", None)
    if url.startswith(BASE):
        path = url[len(BASE):] or "/"
    elif url.startswith("http://") or url.startswith("https://"):
        return ("external", None)
    elif url.startswith("/"):
        path = url
    else:
        return ("external", None)  # protocol-relative or odd
    path = path.split("#")[0].split("?")[0]
    if path == "/" or path == "":
        return ("internal", os.path.join(DIST, "index.html"))
    # asset with extension → file; route → dir/index.html
    last = path.rstrip("/").split("/")[-1]
    if "." in last:
        return ("internal", os.path.join(DIST, path.lstrip("/")))
    return ("internal", os.path.join(DIST, path.strip("/"), "index.html"))


def main():
    html_files = []
    for root, _dirs, files in os.walk(DIST):
        for f in files:
            if f.endswith(".html"):
                html_files.append(os.path.join(root, f))

    broken = []
    external = set()
    checked = 0
    for hf in html_files:
        with open(hf, encoding="utf-8", errors="replace") as fh:
            p = Extract()
            p.feed(fh.read())
        for url in p.urls:
            kind, target = to_dist_path(url)
            if kind == "external":
                external.add(url.split("?")[0])
                continue
            if kind != "internal":
                continue
            checked += 1
            if not os.path.exists(target):
                broken.append((os.path.relpath(hf, DIST), url, os.path.relpath(target, DIST)))

    print(f"HTML pages scanned : {len(html_files)}")
    print(f"internal refs check: {checked}")
    print(f"broken internal    : {len(broken)}")
    print(f"external refs (info): {len(external)}")
    for e in sorted(external):
        print(f"    external: {e}")
    if broken:
        print("\nBROKEN:")
        for src, url, tgt in broken:
            print(f"    {src}  ->  {url}   (missing {tgt})")
        sys.exit(1)
    print("\nOK: 0 broken internal links, 0 missing assets.")
    sys.exit(0)


if __name__ == "__main__":
    main()
