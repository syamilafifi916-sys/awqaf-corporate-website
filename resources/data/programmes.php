<?php

/**
 * AWQAF Holdings Berhad — Program & Inisiatif (kebajikan).
 *
 * Hanya tiga program manfaat sosial / kebajikan. Sumber: Company Profile AWQAF
 * (fakta diluluskan) dan Laporan Tahunan yang disahkan. Setiap angka disahkan
 * terhadap halaman PDF sumber dan dilabelkan tahun, jenis metrik, tajuk laporan
 * dan muka surat. CURVES dan Infaq TIDAK termasuk di sini — ia portfolio pelaburan.
 */

return [
    [
        'slug' => 'yayasan-zuriatcare',
        'name' => 'Yayasan ZuriatCARE',
        'organisation' => 'Yayasan ZuriatCARE (YZC)',
        'status' => 'Aktif',
        'beneficiaries' => 'Golongan yang memerlukan perlindungan sosial dan sokongan kesihatan mental, termasuk remaja berisiko. Penerima dikenal pasti menerusi program dan saluran rujukan Yayasan.',
        'funding' => 'Dibiayai daripada dana wakaf dan sumbangan yang disalurkan menerusi Kumpulan AWQAF.',
        'accountability' => 'Dana diterima dan agihan direkodkan serta dilaporkan dalam Laporan Tahunan AWQAF Holdings Berhad.',
        'waqf_link' => 'Sebahagian daripada komponen agihan kebajikan di bawah model Waqaf Korporat AWQAF.',
        'summary' => 'Yayasan kebajikan yang menjalankan program perlindungan sosial dan kesedaran kesihatan mental.',
        // Dua tarikh berbeza — tidak digabungkan.
        'launch_date' => '21 Jun 2015',
        'launch_note' => 'Company Profile menyatakan operasi program bermula sejak 21 Jun 2015.',
        'legal_establishment_date' => 'Ogos 2020',
        'legal_note' => 'Laporan Tahunan 2022 menyatakan penubuhan Yayasan diluluskan oleh Bahagian Hal Ehwal Undang-Undang, Jabatan Perdana Menteri pada Ogos 2020.',
        'description' => [
            'Yayasan ZuriatCARE menjalankan program perlindungan sosial dan kesedaran kesihatan mental untuk komuniti, di bawah Kumpulan AWQAF.',
        ],
        'focus_areas' => [
            ['name' => 'Program Peluang Kedua', 'desc' => 'Perlindungan golongan remaja yang hamil tidak dirancang serta bayi mereka, termasuk pembangunan modal insan dan remaja keciciran pembelajaran.'],
            ['name' => 'CAMELLIA', 'desc' => 'Campaign for Mental Illness Inclusivity and Mental Health Awareness — program kesedaran isu kesihatan dan penyakit mental.'],
            ['name' => 'AWAS Malaysia', 'desc' => 'AWareness Against Suicide — sokongan pencegahan bunuh diri menerusi AWAS Buddy dan talian Text-a-Buddy.'],
        ],
        'facts' => [
            ['year' => 2022, 'metric' => 'Dana diterima', 'value' => 'RM118,150', 'report' => 'Laporan Tahunan 2022', 'page' => 40],
            ['year' => 2022, 'metric' => 'Agihan dilaksanakan', 'value' => 'RM97,098', 'report' => 'Laporan Tahunan 2022', 'page' => 40],
        ],
        'note' => null,
        'external' => ['label' => 'Laman rasmi Yayasan ZuriatCARE', 'url' => 'https://www.yayasanzuriatcare.org/'],
        'reports' => [2022, 2023],
        'display_order' => 1,
    ],
    [
        'slug' => 'eduwaqf',
        'name' => 'EduWAQF',
        'organisation' => 'Tabung EduWAQF, AWQAF Holdings Berhad',
        'status' => 'Aktif',
        'beneficiaries' => 'Pelajar dan institusi pendidikan yang memerlukan, termasuk penerima biasiswa dan persatuan pendidikan.',
        'funding' => 'Dibiayai menerusi tabung wakaf pendidikan EduWAQF di bawah AWQAF Holdings Berhad.',
        'accountability' => 'Agihan direkodkan mengikut tahun dan penerima, serta dilaporkan dalam Laporan Tahunan.',
        'waqf_link' => 'Komponen agihan kebajikan (30%) yang disalurkan kepada pendidikan di bawah model Waqaf Korporat.',
        'summary' => 'Tabung wakaf pendidikan yang menyediakan bantuan pendidikan dan biasiswa.',
        'launch_date' => '26 Jun 2018',
        'launch_note' => 'Dilancarkan pada 26 Jun 2018 oleh YAB Dato\' Seri Dr. Wan Azizah Dr. Wan Ismail, sempena Mesyuarat Agung Tahunan Ke-5 AWQAF.',
        'legal_establishment_date' => null,
        'legal_note' => null,
        'description' => [
            'EduWAQF ialah tabung wakaf pendidikan yang menyediakan bantuan pendidikan dan biasiswa, serta menjalinkan kerjasama dengan universiti dan sekolah.',
        ],
        'focus_areas' => [
            ['name' => 'Bantuan pendidikan', 'desc' => 'Sokongan kewangan kepada pelajar yang memerlukan.'],
            ['name' => 'Biasiswa', 'desc' => 'Biasiswa kepada pelajar institusi pengajian tinggi.'],
            ['name' => 'Kerjasama institusi', 'desc' => 'Kerjasama dengan universiti dan sekolah.'],
        ],
        'facts' => [
            ['year' => 2022, 'metric' => 'Agihan keseluruhan (terkumpul)', 'value' => 'RM241,307', 'report' => 'Laporan Tahunan 2022', 'page' => 41],
            ['year' => 2022, 'metric' => 'Agihan bagi tahun 2022', 'value' => 'RM8,000', 'report' => 'Laporan Tahunan 2022', 'page' => 41],
        ],
        'note' => 'Agihan tahun 2022 sebanyak RM8,000 disalurkan kepada empat persatuan/NGO. Angka terkumpul RM241,307 ialah jumlah kumulatif tabung, bukan agihan satu tahun, dan bukan angka gabungan dengan AWQAF4Health. (Laporan Tahunan 2022, ms 41)',
        'external' => null,
        'reports' => [2022],
        'display_order' => 2,
    ],
    [
        'slug' => 'awqaf4health',
        'name' => 'AWQAF4Health',
        'organisation' => 'Tabung AWQAF4Health, AWQAF Holdings Berhad',
        'status' => 'Aktif',
        'beneficiaries' => 'Golongan berpendapatan rendah dan komuniti B40, dengan bantuan seperti kerusi roda, bantuan perubatan dan sokongan kesejahteraan.',
        'funding' => 'Dibiayai menerusi tabung wakaf kesihatan AWQAF4Health di bawah AWQAF Holdings Berhad.',
        'accountability' => 'Agihan direkodkan mengikut tahun dan program, serta dilaporkan dalam Laporan Tahunan.',
        'waqf_link' => 'Komponen agihan kebajikan (30%) yang disalurkan kepada kesihatan di bawah model Waqaf Korporat.',
        'summary' => 'Tabung wakaf kesihatan yang menyalurkan bantuan kepada golongan berpendapatan rendah dan komuniti B40.',
        'launch_date' => 'Awal 2019',
        'launch_note' => 'Agihan bermula pada awal 2019.',
        'legal_establishment_date' => null,
        'legal_note' => null,
        'description' => [
            'AWQAF4Health ialah tabung wakaf kesihatan yang menyalurkan bantuan kepada golongan berpendapatan rendah dan komuniti B40.',
            'Antara contoh bantuan termasuk kerusi roda, bantuan perubatan dan sokongan kesejahteraan.',
        ],
        'focus_areas' => [
            ['name' => 'Sasaran', 'desc' => 'Golongan berpendapatan rendah dan komuniti B40.'],
            ['name' => 'Contoh bantuan', 'desc' => 'Kerusi roda, bantuan perubatan dan sokongan kesejahteraan.'],
        ],
        'facts' => [
            ['year' => 2022, 'metric' => 'Agihan keseluruhan (terkumpul)', 'value' => 'RM219,423', 'report' => 'Laporan Tahunan 2022', 'page' => 41],
            ['year' => 2022, 'metric' => 'Agihan bagi tahun 2022', 'value' => 'RM56,964', 'report' => 'Laporan Tahunan 2022', 'page' => 41],
        ],
        'note' => 'Agihan tahun 2022 disalurkan bagi Tabung Bersatu Hati DPIM, Sumbangan Test-Kit COVID-19 dan Program Bakti Insan. Angka terkumpul RM219,423 ialah jumlah kumulatif tabung. (Laporan Tahunan 2022, ms 41)',
        'external' => null,
        'reports' => [2022],
        'display_order' => 3,
    ],
];
