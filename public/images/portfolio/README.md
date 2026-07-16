# Portfolio Pelaburan — media assets

Official logos and photos for the four investment portfolios go here. The UI
renders **clearly-marked placeholders** ("Logo rasmi", "Imej Portfolio")
until real assets are supplied by AWQAF. Do **not** substitute AI-generated
or stock imagery.

Recommended filenames (referenced once real assets are dropped in):

| Portfolio / unit                | Logo                        | Photo                          |
| ------------------------------- | --------------------------- | ------------------------------ |
| Pendidikan — AWQAF Education    | `awqaf-education.png`       | `awqaf-education.jpg`          |
| Pendidikan — Al-Hamra           | `al-hamra-integrated-school.png` | `al-hamra-integrated-school.jpg` |
| Kesihatan — AHB Wellness        | `ahb-wellness.png`          | `ahb-wellness.jpg`             |
| Kesihatan — CURVES              | `curves.png`                | `curves.jpg`                   |
| Hartanah                        | —                           | `property.jpg`                 |
| Fintech — AHB Fintech           | `ahb-fintech.png`           | `ahb-fintech.jpg`              |
| Fintech — Infaq                 | `infaq.png`                 | `infaq.jpg`                    |

Once dropped in, wire them into `resources/data/portfolios.php` (add `logo`
/ `image` keys) and update `Portfolio/Show.vue` to render them in place of
the dashed placeholders.
