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
        'launch_note' => 'Operasi program bermula sejak 21 Jun 2015.',
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
        'future' => 'EduWAQF akan terus memperluas akses pendidikan menerusi wakaf — memperkukuh sokongan kepada pelajar dan institusi pada setiap peringkat, demi membina modal insan dan mewariskan peluang kepada generasi akan datang.',
        'summary' => 'Tabung wakaf pendidikan yang menyediakan bantuan pendidikan dan biasiswa.',
        'launch_date' => '26 Jun 2018',
        'launch_note' => 'Dilancarkan pada 26 Jun 2018 oleh YAB Dato\' Seri Dr. Wan Azizah Dr. Wan Ismail, sempena Mesyuarat Agung Tahunan Ke-5 AWQAF.',
        'legal_establishment_date' => null,
        'legal_note' => null,
        'description' => [
            'Melabur dalam Pendidikan, Memperkasa Generasi Akan Datang. EduWAQF ialah inisiatif sosial berteraskan pendidikan AWQAF Holdings Berhad yang komited memperluas akses kepada pendidikan berkualiti menerusi prinsip wakaf.',
            'Menerusi sokongan kepada pelajar, sekolah, institusi pengajian tinggi dan program pendidikan komuniti, EduWAQF berusaha mengurangkan halangan pendidikan sambil membina generasi akan datang dengan ilmu, nilai dan peluang. Ia berpaksikan keyakinan AWQAF bahawa pendidikan ialah antara pelaburan paling mampan dalam membina masyarakat berdaya tahan dan memperkukuh masa depan negara.',
            'Sebagai salah satu inisiatif sosial utama Kumpulan, EduWAQF menyalurkan bantuan menerusi tajaan pendidikan, sokongan pelajar dan kerjasama dengan institusi pendidikan. Menjelang 2022, tabung ini telah mengagihkan sejumlah RM241,307 secara terkumpul, termasuk agihan tahun 2022 kepada empat persatuan dan pertubuhan pendidikan (Laporan Tahunan 2022).',
        ],
        'focus_areas' => [
            ['name' => 'Bantuan pelajar sekolah', 'desc' => 'Sokongan kepada pelajar sekolah yang memerlukan.'],
            ['name' => 'Sokongan pelajar pengajian tinggi', 'desc' => 'Bantuan kepada pelajar institusi pengajian tinggi.'],
            ['name' => 'Tajaan & biasiswa pendidikan', 'desc' => 'Tajaan dan biasiswa pendidikan kepada penerima yang layak.'],
            ['name' => 'Sumber & kelengkapan pembelajaran', 'desc' => 'Sokongan kelengkapan dan sumber pembelajaran.'],
            ['name' => 'Kerjasama institusi pendidikan', 'desc' => 'Kerjasama dengan sekolah, universiti dan persatuan pendidikan.'],
            ['name' => 'Pendidikan komuniti', 'desc' => 'Inisiatif pendidikan di peringkat komuniti.'],
            ['name' => 'Perluasan peluang menerusi wakaf', 'desc' => 'Memperluas peluang pendidikan secara mampan menerusi model wakaf.'],
        ],
        'facts' => [
            ['year' => 2022, 'metric' => 'Agihan keseluruhan (terkumpul)', 'value' => 'RM241,307', 'report' => 'Laporan Tahunan 2022', 'page' => 41],
            ['year' => 2022, 'metric' => 'Agihan bagi tahun 2022', 'value' => 'RM8,000', 'report' => 'Laporan Tahunan 2022', 'page' => 41],
        ],
        'note' => null,
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
        'future' => 'AWQAF4Health komited memperluas jangkauan kesihatan komuniti menerusi wakaf yang mampan — memperkukuh kerjasama dengan institusi kesihatan dan meningkatkan akses kepada penjagaan demi masyarakat yang lebih sihat dan berdaya tahan.',
        'summary' => 'Tabung wakaf kesihatan yang menyalurkan bantuan kepada golongan berpendapatan rendah dan komuniti B40.',
        'launch_date' => 'Awal 2019',
        'launch_note' => 'Agihan bermula pada awal 2019.',
        'legal_establishment_date' => null,
        'legal_note' => null,
        'description' => [
            'Memperkasa Kesihatan Komuniti Menerusi Wakaf Mampan. AWQAF4Health mencerminkan komitmen AWQAF Holdings Berhad untuk meningkatkan kesihatan awam dan kesejahteraan komuniti menerusi inisiatif wakaf yang mampan.',
            'Program ini menyokong aktiviti berkaitan kesihatan yang meningkatkan akses kepada perkhidmatan penting, menggalakkan gaya hidup lebih sihat, dan memperkukuh kerjasama dengan institusi kesihatan demi manfaat masyarakat — terutama golongan berpendapatan rendah dan komuniti B40. Menerusi kerjasama strategik dan program berfokuskan komuniti, AWQAF4Health menunjukkan bagaimana wakaf boleh menyumbang secara bermakna kepada pembinaan komuniti yang lebih sihat dan berdaya tahan sambil mewujudkan nilai sosial jangka panjang.',
            'Sejak agihan bermula pada awal 2019, AWQAF4Health telah menyalurkan bantuan seperti kerusi roda, bantuan perubatan dan sokongan kesejahteraan. Menjelang 2022, tabung ini telah mengagihkan sejumlah RM219,423 secara terkumpul, termasuk sumbangan tahun 2022 bagi Tabung Bersatu Hati DPIM, sumbangan kit ujian COVID-19 dan Program Bakti Insan (Laporan Tahunan 2022).',
        ],
        'focus_areas' => [
            ['name' => 'Inisiatif kesihatan komuniti', 'desc' => 'Program kesihatan di peringkat komuniti bagi meningkatkan akses kepada perkhidmatan penting.'],
            ['name' => 'Bantuan perubatan', 'desc' => 'Bantuan perubatan dan peralatan seperti kerusi roda kepada yang memerlukan.'],
            ['name' => 'Sokongan komuniti terdedah', 'desc' => 'Sokongan kepada golongan berpendapatan rendah dan komuniti B40.'],
            ['name' => 'Kesihatan pencegahan', 'desc' => 'Sumbangan ke arah langkah pencegahan dan kesihatan awam, termasuk sokongan semasa pandemik COVID-19.'],
            ['name' => 'Kerjasama institusi kesihatan', 'desc' => 'Kerjasama strategik dengan institusi dan pertubuhan kesihatan.'],
            ['name' => 'Kesejahteraan masyarakat', 'desc' => 'Inisiatif kesejahteraan komuniti yang menyeluruh dan mampan.'],
        ],
        'facts' => [
            ['year' => 2022, 'metric' => 'Agihan keseluruhan (terkumpul)', 'value' => 'RM219,423', 'report' => 'Laporan Tahunan 2022', 'page' => 41],
            ['year' => 2022, 'metric' => 'Agihan bagi tahun 2022', 'value' => 'RM56,964', 'report' => 'Laporan Tahunan 2022', 'page' => 41],
        ],
        'note' => null,
        'external' => null,
        'reports' => [2022],
        'display_order' => 3,
    ],
];
