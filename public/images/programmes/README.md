# Program & Inisiatif — media assets

Official logos and photos for the three welfare programmes go here. The UI
renders **clearly-marked placeholders** ("Logo rasmi", "Imej Program")
until real assets are supplied by AWQAF. Do **not** substitute AI-generated
or stock imagery.

Recommended filenames (referenced once real assets are dropped in):

| Programme            | Logo                     | Photo                    |
| -------------------- | ------------------------ | ------------------------ |
| Yayasan ZuriatCARE   | `yayasan-zuriatcare.png` | `yayasan-zuriatcare.jpg` |
| EduWAQF              | `eduwaqf.png`            | `eduwaqf.jpg`            |
| AWQAF4Health         | `awqaf4health.png`       | `awqaf4health.jpg`       |

Once dropped in, wire them into `resources/data/programmes.php` (add `logo`
/ `image` keys) and update `Program/Show.vue` to render them in place of the
dashed placeholders.
