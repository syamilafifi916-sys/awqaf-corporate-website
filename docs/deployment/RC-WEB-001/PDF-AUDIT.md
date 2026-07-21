# RC-WEB-001 — Report PDF Audit

Source: `storage/app/public/reports/`. Measured file sizes (bytes → MB).
**Cloudflare Pages hard limit: 25 MB per file.**

| File | Size | > 25 MB? |
|------|-----:|:--------:|
| Annual-Report-AWQAF-2015.pdf | 14.6 MB | — |
| Annual-Report-AWQAF-2016.pdf | 30.9 MB | ⛔ |
| Annual-Report-AWQAF-2017.pdf | 158.0 MB | ⛔ |
| Annual-Report-AWQAF-2018.pdf | 36.4 MB | ⛔ |
| Annual-Report-AWQAF-2019.pdf | 7.4 MB | — |
| Annual-Report-AWQAF-2020.pdf | 25.1 MB | ⛔ |
| Annual-Report-AWQAF-2021.pdf | 11.4 MB | — |
| Annual-Report-AWQAF-2022.pdf | 3.1 MB | — |
| Annual-Report-AWQAF-2023.pdf | 12.3 MB | — |
| Annual-Report-AWQAF-2024.pdf | 73.0 MB | ⛔ |
| Audited-financial-statement-2015.pdf | 8.1 MB | — |
| Audited-financial-statement-2016.pdf | 8.7 MB | — |
| Audited-financial-statement-2017.pdf | 4.8 MB | — |
| Audited-financial-statement-2018.pdf | 3.1 MB | — |
| Audited-financial-statement-2019.pdf | 9.2 MB | — |
| Audited-financial-statement-2020.pdf | 3.5 MB | — |
| Audited-financial-statement-2021.pdf | 41.6 MB | ⛔ |
| Audited-financial-statement-2022.pdf | 1.4 MB | — |
| Audited-financial-statement-2023.pdf | 4.0 MB | — |
| Audited-financial-statement-2024.pdf | 3.4 MB | — |

## Summary
- **20 files, ~460 MB total.**
- **6 files exceed the 25 MB per-file limit** (Annual Reports 2016, 2017, 2018, 2020, 2024; Financial Statement 2021).
- The largest single file (Annual Report 2017, 158 MB) also exceeds Cloudflare's overall practical asset expectations.

## Implication
These PDFs **cannot** be served from Cloudflare Pages. They are official,
audited documents and must **not** be re-compressed or altered. → see
[REPORT-HOSTING-DECISION.md](REPORT-HOSTING-DECISION.md).
