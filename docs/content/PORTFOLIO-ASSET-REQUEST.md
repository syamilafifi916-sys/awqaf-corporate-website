# Portfolio — Official Image Asset Request

**Purpose:** collect official, permission-cleared photographs/renderings so the
portfolio pages display real project imagery.
**Owner (to complete):** AWQAF Communications / Marketing.
**Hard rule:** **No AI-generated or stock imagery.** Only official AWQAF-owned or
formally licensed assets.

**Status:** the gallery is **fully implemented**. The data model and the Portfolio
Show page already render polished editorial image blocks — but **only where a real
image exists** (no empty placeholders). The **only remaining step** is dropping the
authorised files into the paths below and setting the matching `image` field.

---

## What we need — exact files & paths

| # | Asset | Drop file at | Then set in `resources/data/portfolios.php` |
|---|-------|--------------|---------------------------------------------|
| 1 | **Al-Hamra** (pioneering education project) — official photo(s) | `public/images/portfolio/education/al-hamra.jpg` | `pendidikan.media[0].image = 'portfolio/education/al-hamra.jpg'` |
| 2 | **AMIIS** (subsequent strategic initiative) — authorised rendering/photo(s) | `public/images/portfolio/education/amiis.jpg` | `pendidikan.media[1].image = 'portfolio/education/amiis.jpg'` |
| 3 | **CURVES Bukit Jelutong** — official photo(s) | `public/images/portfolio/wellness/curves-bukit-jelutong.jpg` | `kesihatan-kesejahteraan.branches[0].image = 'portfolio/wellness/curves-bukit-jelutong.jpg'` |
| 4 | **CURVES Setia Alam** — official photo(s) | `public/images/portfolio/wellness/curves-setia-alam.jpg` | `…branches[1].image = 'portfolio/wellness/curves-setia-alam.jpg'` |
| 5 | **CURVES Bangi Sentral** — official photo(s) | `public/images/portfolio/wellness/curves-bangi-sentral.jpg` | `…branches[2].image = 'portfolio/wellness/curves-bangi-sentral.jpg'` |

The `image` value is a path **relative to `public/images/`** (e.g.
`portfolio/education/al-hamra.jpg`). Once set, the block renders automatically.

## Official sourcing references (for AWQAF to obtain assets — do NOT scrape)

- CURVES Bukit Jelutong: https://www.facebook.com/curvesbukitjelutong
- CURVES Setia Alam: https://www.facebook.com/profile.php?id=100067166107050
- CURVES Bangi Sentral: official page to be provided.

> Images from these pages must be obtained **with permission** from the page/asset
> owner. Do not copy images without a usage licence.

## Per-asset metadata (required before publishing)

For **each** asset, also provide (fields already exist in the data model —
`alt`, `caption`, `credit`):

- [ ] **File** — high-resolution (min. 1600px long edge), landscape preferred.
- [ ] **Source owner** — who owns/holds the image.
- [ ] **Usage permission** — written confirmation it may be published on the public
      AWQAF website; note any restriction/expiry.
- [ ] **Caption** — exact caption to display (a default is already set per asset).
- [ ] **Photographer credit** — if required, set the `credit` field to the exact line.

```
Asset:                 # e.g. CURVES Setia Alam
File supplied:         [ ] yes  (path: public/images/portfolio/wellness/curves-setia-alam.jpg)
Source owner:          __________________
Usage permission:      [ ] cleared for public web   granted by: __________  date: ______
Caption:               (default set; override if needed) __________________
Photographer credit:   [ ] not required   [ ] required → credit line: __________
```

---

## AMIIS — note for management confirmation

AMIIS is presented publicly **only** as a school that Sekolah Al-Hamra participated
in establishing as a **strategic partner** (with MAINPP and Yayasan Islam Pulau
Pinang), per public 2025 sources. The public copy makes **no claim** that AWQAF
owns, operates, or controls AMIIS. Before publishing AMIIS imagery or stronger
positioning, confirm:

- [ ] the exact commercial / governance relationship between AWQAF (or Al-Hamra) and AMIIS;
- [ ] Al-Hamra's current operational status;
- [ ] that AMIIS renderings/photos are cleared for AWQAF to publish, and under whose permission.

(Internal caveat is recorded in `resources/data/portfolios.php` on the `pendidikan`
entry; it is intentionally **not** shown in public-facing copy.)

---

## Implementation status (done)

- ✅ Data model: education `media[]` (Al-Hamra = *Projek perintis*, AMIIS =
  *Inisiatif strategik seterusnya*) and per-branch `image`/`alt`/`caption`/`credit`.
- ✅ `Portfolio/Show.vue`: education **project gallery** + **per-branch photo blocks**,
  each guarded by `v-if` so imagery shows only where a real asset exists.
- ✅ Folders created: `public/images/portfolio/education/`, `.../wellness/`.
- ⏳ **Remaining:** drop the five authorised files in and set the `image` fields.
