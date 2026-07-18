# Portfolio & Programme — Official Image Asset Request

**Purpose:** collect official, permission-cleared photographs/renderings so the
portfolio pages can move from text-led editorial to text + imagery.
**Owner (to complete):** AWQAF Communications / Marketing.
**Hard rule:** **No AI-generated or stock imagery.** Only official AWQAF-owned or
formally licensed assets. See `public/images/portfolio/README.md`.

Until every field below is supplied and cleared, the affected portfolio entry
**stays text-led** (no blank image boxes are shown). The data model already
carries `image` fields (currently `null`) ready to receive the files.

---

## What we need

| # | Asset | Target file (drop into `public/images/portfolio/`) | Data slot |
|---|-------|-----------------------------------------------------|-----------|
| 1 | **Al-Hamra / education project** — official photograph(s) | `al-hamra-integrated-school.jpg` | `portfolios.php` → `pendidikan.image` |
| 2 | **AMIIS** — authorised rendering(s) or project photograph(s) | `amiis.jpg` | `pendidikan` (new `amiis_image` slot on receipt) |
| 3 | **CURVES Bukit Jelutong** — official photograph(s) | `curves-bukit-jelutong.jpg` | `kesihatan-kesejahteraan.branches[0].image` |
| 4 | **CURVES Setia Alam** — official photograph(s) | `curves-setia-alam.jpg` | `kesihatan-kesejahteraan.branches[1].image` |
| 5 | **CURVES Bangi Sentral** — official photograph(s) | `curves-bangi-sentral.jpg` | `kesihatan-kesejahteraan.branches[2].image` |

## Per-asset metadata (required before publishing)

For **each** asset above, provide:

- [ ] **File** — high-resolution (min. 1600px on the long edge), landscape preferred.
- [ ] **Source owner** — who owns/holds the image (entity or individual).
- [ ] **Usage permission** — written confirmation the image may be published on the
      public AWQAF website (scope: web, marketing). Note any expiry or restriction.
- [ ] **Caption** — the exact caption to display (BM and/or EN).
- [ ] **Photographer credit** — required? If yes, the exact credit line to show.

### Asset record template (copy per asset)

```
Asset:                 # e.g. CURVES Setia Alam
File supplied:         [ ] yes  (filename: __________________)
Source owner:          __________________
Usage permission:      [ ] cleared for public web   granted by: __________  date: ______
Caption (BM):          __________________
Caption (EN):          __________________
Photographer credit:   [ ] not required   [ ] required → credit line: __________
```

---

## AMIIS — note for management confirmation

AMIIS is presented publicly **only** as a school that Sekolah Al-Hamra
participated in establishing as a **strategic partner** (with MAINPP and Yayasan
Islam Pulau Pinang), per public 2025 sources. The public copy makes **no claim**
that AWQAF owns, operates, or controls AMIIS.

Before publishing any AMIIS imagery or stronger positioning, confirm:
- [ ] The exact commercial / governance relationship between AWQAF (or Al-Hamra)
      and AMIIS.
- [ ] Al-Hamra's current operational status.
- [ ] Whether AMIIS renderings/photos are cleared for AWQAF to publish, and under
      whose permission.

(Internal caveat is recorded in `resources/data/portfolios.php` on the
`pendidikan` entry; it is intentionally **not** shown in public-facing copy.)

---

## Once assets are received

1. Drop the cleared files into `public/images/portfolio/`.
2. Set the corresponding `image` field(s) in `resources/data/portfolios.php`.
3. A small, guarded image render is added to `Portfolio/Show.vue`
   (`v-if="…image"`) so imagery appears **only** where a real, cleared asset
   exists — never a blank placeholder.
4. Rebuild, verify mobile, and re-run the test suite.
