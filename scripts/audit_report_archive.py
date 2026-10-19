#!/usr/bin/env python3
"""AWQAF report archive integrity audit. Run from repository root.

Usage: python3 scripts/audit_report_archive.py
       REPORTS_BASE_URL=https://<trusted-object-storage-path> python3 scripts/audit_report_archive.py --remote

This audits delivery/readiness; it never claims that database rows contain files.
Exit nonzero if a required archival object is missing or unreadable.
"""
from __future__ import annotations
import argparse
import json
import os
from pathlib import Path
from urllib.request import Request, urlopen
from urllib.error import HTTPError, URLError

ROOT = Path(__file__).resolve().parents[1]
YEARS_ANNUAL = range(2015, 2025)
YEARS_FINANCIAL = range(2015, 2026)

def inspect(path: Path) -> dict:
    if not path.is_file():
        return {"status": "missing", "path": str(path.relative_to(ROOT))}
    with path.open("rb") as f:
        header = f.read(5)
    return {"status": "ok" if header == b"%PDF-" else "invalid_pdf",
            "path": str(path.relative_to(ROOT)), "bytes": path.stat().st_size}

def probe(url: str) -> dict:
    try:
        req = Request(url, method="GET", headers={"Range": "bytes=0-4", "User-Agent": "AWQAF-Archive-Audit/1.0"})
        with urlopen(req, timeout=15) as response:
            start = response.read(5)
            return {"status": "ok" if start == b"%PDF-" else "invalid_pdf",
                    "http": response.status, "url": url}
    except (HTTPError, URLError, TimeoutError) as e:
        return {"status": "unreachable", "error": str(e), "url": url}

def main() -> int:
    parser = argparse.ArgumentParser()
    parser.add_argument("--remote", action="store_true", help="Validate externally hosted archive URLs")
    args = parser.parse_args()
    base = os.environ.get("REPORTS_BASE_URL", "").rstrip("/")
    report_items = []
    for year in YEARS_ANNUAL:
        filename = f"Annual-Report-AWQAF-{year}.pdf"
        report_items.append((year, "annual_report", filename))
    for year in YEARS_FINANCIAL:
        filename = f"Audited-financial-statement-{year}.pdf"
        report_items.append((year, "financial_statement", filename))
    results = []
    for year, typ, filename in report_items:
        if year == 2025 and typ == "financial_statement":
            status = inspect(ROOT / "public/documents/reports/Penyata-Kewangan-Diaudit-2025.pdf")
        elif args.remote and base:
            status = probe(f"{base}/{filename}")
        else:
            status = inspect(ROOT / "storage/app/public/reports" / filename)
        results.append({"year": year, "type": typ, **status})
    counts = {k: sum(r["status"] == k for r in results) for k in ["ok", "missing", "invalid_pdf", "unreachable"]}
    print(json.dumps({"source": "remote" if args.remote and base else "local",
                      "counts": counts, "reports": results}, ensure_ascii=False, indent=2))
    return 0 if counts["ok"] == len(results) else 1

if __name__ == "__main__":
    raise SystemExit(main())
