<?php

/**
 * AWQAF Holdings Berhad — Portfolio Pelaburan.
 *
 * Empat portfolio pelaburan utama. Sumber: Company Profile AWQAF (fakta yang
 * diluluskan) dan Laporan Tahunan yang telah disahkan. Setiap angka disahkan
 * secara visual terhadap halaman PDF sumber dan dilabelkan dengan tahun, jenis
 * metrik, tajuk laporan dan nombor muka surat.
 *
 * PENTING: portfolio pelaburan (perniagaan) diasingkan daripada Program &
 * Inisiatif (kebajikan). CURVES dan Infaq ialah portfolio pelaburan, BUKAN
 * program kebajikan.
 */

return [
    [
        'slug' => 'pendidikan',
        'name' => 'Pendidikan',
        'entity' => 'AWQAF Education Sdn. Bhd.',
        'status' => 'Aktif',
        'summary' => 'Portfolio pendidikan Kumpulan AWQAF, diuruskan menerusi AWQAF Education Sdn. Bhd.',
        'role' => 'Portfolio pendidikan bertanggungjawab membangun dan menyelia inisiatif pendidikan Islam bersepadu Kumpulan AWQAF, sebagai sebahagian daripada pelaburan berasaskan wakaf yang menyalurkan manfaat berterusan kepada masyarakat.',
        'contribution' => 'Portfolio pendidikan menyumbang kepada objektif AWQAF menerusi akses pendidikan berstruktur, pembangunan pelajar, pembinaan keupayaan pendidikan yang mampan, serta kepakaran pengurusan pendidikan.',
        'description' => [
            'Portfolio pendidikan Kumpulan AWQAF diuruskan menerusi AWQAF Education Sdn. Bhd., entiti yang menyelia pembangunan dan operasi inisiatif pendidikan Kumpulan.',
            'Al-Hamra Integrated School ialah sebuah sekolah antarabangsa Islam bersepadu yang menawarkan model pendidikan holistik menerusi Cambridge Assessment International Education, sukatan pelajaran Kementerian Pendidikan Malaysia, serta prinsip pendidikan berteraskan al-Quran dan Sunnah.',
        ],
        'units' => [
            ['name' => 'AWQAF Education Sdn. Bhd.', 'note' => 'Entiti pengurusan portfolio pendidikan.'],
            ['name' => 'Al-Hamra Integrated School', 'note' => 'Sekolah antarabangsa Islam bersepadu (Cambridge · KPM · al-Quran & Sunnah).'],
        ],
        'curriculum' => [
            'Cambridge Assessment International Education',
            'Sukatan pelajaran Kementerian Pendidikan Malaysia',
            'Prinsip pendidikan berteraskan al-Quran dan Sunnah',
        ],
        'activities' => [
            ['name' => 'Pendidikan bersepadu', 'desc' => 'Menggabungkan kurikulum antarabangsa Cambridge dan sukatan Kementerian Pendidikan Malaysia dengan asas pendidikan al-Quran dan Sunnah.'],
            ['name' => 'Pembangunan institusi pendidikan', 'desc' => 'Membangun dan menyelia institusi pendidikan di bawah portfolio pendidikan Kumpulan AWQAF.'],
            ['name' => 'Perundingan pendidikan', 'desc' => 'Menyediakan kepakaran perundingan dan pengurusan pendidikan.'],
        ],
        'branches' => [],
        'facts' => [],
        'history' => [],
        'status_note' => 'Nota status: Menurut Laporan Tahunan 2024 (Nota Portfolio), unit Al-Hamra Integrated School telah ditamatkan pada tahun 2024. Inisiatif pendidikan semasa yang dinyatakan dalam Laporan Tahunan 2024 ialah Al-Mashoor International Islamic School (AMIIS). Status semasa portfolio ini perlu disahkan oleh pihak pengurusan AWQAF.',
        'related_links' => [],
        'reports' => [2022, 2024],
        'display_order' => 1,
    ],
    [
        'slug' => 'kesihatan-kesejahteraan',
        'name' => 'Kesihatan & Kesejahteraan',
        'entity' => 'AHB Wellness Sdn. Bhd.',
        'status' => 'Aktif',
        'summary' => 'Portfolio kesihatan dan kesejahteraan, termasuk rangkaian pusat kecergasan wanita CURVES di bawah AHB Wellness Sdn. Bhd.',
        'role' => 'Portfolio kesihatan dan kesejahteraan menyelia perniagaan kecergasan dan kesejahteraan Kumpulan AWQAF, dengan tumpuan kepada kesihatan dan kecergasan wanita menerusi rangkaian francais CURVES.',
        'contribution' => 'Portfolio ini menyumbang kepada objektif AWQAF dengan menjana pendapatan mampan daripada perniagaan kesihatan dan kesejahteraan, sekali gus menyokong kelestarian dana wakaf.',
        'description' => [
            'Portfolio kesihatan dan kesejahteraan Kumpulan AWQAF diuruskan menerusi AHB Wellness Sdn. Bhd.',
            'CURVES ialah rangkaian francais pusat kecergasan dan kesejahteraan khusus wanita, yang menyediakan kemudahan senaman dalam persekitaran mesra dan tertutup untuk wanita.',
        ],
        'units' => [
            ['name' => 'AHB Wellness Sdn. Bhd.', 'note' => 'Entiti pengurusan portfolio kesihatan & kesejahteraan.'],
            ['name' => 'CURVES', 'note' => 'Rangkaian pusat kecergasan & kesejahteraan khusus wanita.'],
        ],
        'activities' => [
            ['name' => 'Kecergasan wanita', 'desc' => 'Menyediakan kemudahan dan program kecergasan khusus untuk wanita menerusi rangkaian CURVES.'],
            ['name' => 'Kesejahteraan komuniti', 'desc' => 'Menggalakkan gaya hidup sihat dalam kalangan komuniti setempat di sekitar setiap cawangan.'],
        ],
        // Tiga cawangan CURVES. Pautan rasmi disertakan hanya di mana disahkan.
        'branches' => [
            [
                'name' => 'CURVES Bukit Jelutong',
                'location' => 'Bukit Jelutong, Shah Alam, Selangor',
                'description' => 'Cawangan CURVES di Bukit Jelutong, Shah Alam.',
                'url' => 'https://www.facebook.com/curvesbukitjelutong',
                'url_label' => 'Facebook rasmi',
                'opened' => null,
            ],
            [
                'name' => 'CURVES Setia Alam',
                'location' => 'Setia Alam, Shah Alam, Selangor',
                'description' => 'Cawangan CURVES di Setia Alam.',
                'url' => 'https://www.facebook.com/profile.php?id=100067166107050',
                'url_label' => 'Facebook rasmi',
                'opened' => 'Dibuka awal 2022 (Laporan Tahunan 2022, ms 32)',
            ],
            [
                'name' => 'CURVES Bangi Sentral',
                'location' => 'Bangi Sentral, Selangor',
                'description' => 'Cawangan CURVES di Bangi Sentral.',
                'url' => null,
                'url_label' => null,
                'opened' => 'Dibuka pertengahan 2023 (Laporan Tahunan 2022, ms 32)',
            ],
        ],
        'facts' => [
            ['year' => 2022, 'metric' => 'Pendapatan keseluruhan (CURVES)', 'value' => 'RM520,754', 'report' => 'Laporan Tahunan 2022', 'page' => 32],
            ['year' => 2022, 'metric' => 'Ahli aktif (CURVES, akhir Dis 2022)', 'value' => '413 ahli', 'report' => 'Laporan Tahunan 2022', 'page' => 32],
        ],
        'history' => [
            'Damai Senior Care Centre (Damai Senior Care Centre Sdn. Bhd.) — pusat jagaan warga emas yang pernah dikendalikan Kumpulan AWQAF. Menurut Laporan Tahunan 2024 (Nota Portfolio), unit ini telah ditamatkan pada tahun 2024 dan tidak lagi beroperasi.',
        ],
        'status_note' => 'Nota: Angka pendapatan dan keahlian di atas ialah rekod tahun 2022 (Laporan Tahunan 2022), bukan angka semasa. Status operasi terkini setiap cawangan perlu disahkan oleh pihak pengurusan AWQAF.',
        'related_links' => [],
        'reports' => [2022, 2023, 2024],
        'display_order' => 2,
    ],
    [
        'slug' => 'hartanah',
        'name' => 'Hartanah',
        'entity' => 'Kumpulan AWQAF Holdings Berhad',
        'status' => 'Mandat pelaburan',
        'summary' => 'Portfolio hartanah yang memberi tumpuan kepada pembangunan tanah wakaf dan institusi berskala kecil-sederhana.',
        'role' => 'Portfolio hartanah bertujuan membangunkan tanah wakaf dan tanah institusi secara produktif, menjana pulangan mampan untuk wakaf sambil memberi manfaat kepada komuniti dan usahawan setempat.',
        'contribution' => 'Portfolio hartanah menyumbang kepada objektif AWQAF dengan membangunkan tanah wakaf dan institusi secara produktif, menjana pulangan jangka panjang serta manfaat kepada komuniti dan usahawan.',
        'status_legend' => ['Selesai', 'Aktif', 'Sejarah', 'Cadangan / tertakluk pengesahan'],
        'projects' => [
            ['name' => 'Kerjasama pembangunan tanah wakaf bersama MAINS', 'status' => 'Cadangan / tertakluk pengesahan', 'note' => 'Kerjasama dengan Majlis Agama Islam Negeri Sembilan dinyatakan dalam Company Profile. Butiran dan status semasa projek perlu disahkan oleh pihak pengurusan AWQAF.'],
        ],
        'description' => [
            'Portfolio hartanah Kumpulan AWQAF memberi tumpuan kepada pembangunan tanah wakaf dan tanah institusi, termasuk kerjasama dengan Majlis Agama Islam Negeri Sembilan (MAINS) sebagaimana dinyatakan dalam Company Profile.',
            'Tumpuan pembangunan adalah berskala kecil dan sederhana, dengan hasrat memberi manfaat kepada usahawan dan komuniti setempat, selaras dengan model wakaf korporat yang mengekalkan modal asal sebagai amanah kekal.',
        ],
        'units' => [],
        'activities' => [
            ['name' => 'Kerjasama tanah wakaf', 'desc' => 'Kerjasama dengan Majlis Agama Islam Negeri Sembilan (MAINS) bagi pembangunan tanah wakaf.'],
            ['name' => 'Pembangunan berskala kecil-sederhana', 'desc' => 'Tumpuan kepada projek pembangunan berskala kecil dan sederhana yang mampan.'],
            ['name' => 'Manfaat komuniti & usahawan', 'desc' => 'Mewujudkan peluang untuk usahawan dan komuniti setempat menerusi pembangunan hartanah.'],
        ],
        'branches' => [],
        'facts' => [],
        'history' => [],
        'status_note' => 'Nota status: Butiran projek hartanah — sama ada telah siap, sedang aktif, atau masih dalam cadangan — perlu disahkan oleh pihak pengurusan AWQAF sebelum diterbitkan sebagai pencapaian. Pelan strategik 2023–2027 tidak dipaparkan sebagai pencapaian yang telah selesai.',
        'related_links' => [],
        'reports' => [],
        'display_order' => 3,
    ],
    [
        'slug' => 'fintech',
        'name' => 'Fintech',
        'entity' => 'AHB Fintech Sdn. Bhd.',
        'status' => 'Aktif',
        'summary' => 'Portfolio teknologi kewangan yang menyediakan penyelesaian kewangan digital, diuruskan menerusi AHB Fintech Sdn. Bhd.',
        'role' => 'Portfolio teknologi kewangan menyelia penyelesaian kewangan digital dan pembiayaan Islam Kumpulan AWQAF, dengan tumpuan menyokong perusahaan kecil dan sederhana (PKS) serta usahawan tempatan.',
        'contribution' => 'Portfolio Fintech menyumbang kepada objektif AWQAF dengan menyediakan penyelesaian kewangan digital dan pembiayaan Islam yang menyokong PKS dan usahawan tempatan.',
        'description' => [
            'Portfolio teknologi kewangan Kumpulan AWQAF diuruskan menerusi AHB Fintech Sdn. Bhd., yang memberi tumpuan kepada penyelesaian kewangan digital dan pembiayaan Islam bagi menyokong perusahaan kecil dan sederhana (PKS) serta usahawan tempatan.',
            'Infaq ialah sebuah platform digital di bawah portfolio Fintech yang memudahkan penajaan — seperti iftar Ramadan — dengan jejak niat yang jelas, resit segera dan pelaporan telus.',
        ],
        'units' => [
            ['name' => 'AHB Fintech Sdn. Bhd.', 'note' => 'Entiti pengurusan portfolio teknologi kewangan.'],
            ['name' => 'Infaq', 'note' => 'Platform digital penajaan (produk di bawah portfolio Fintech).'],
        ],
        'activities' => [
            ['name' => 'Pembiayaan Islam & kewangan digital', 'desc' => 'Menyediakan penyelesaian kewangan digital dan pembiayaan Islam.'],
            ['name' => 'Sokongan PKS & usahawan', 'desc' => 'Menyokong perusahaan kecil dan sederhana serta usahawan tempatan.'],
            ['name' => 'Platform Infaq', 'desc' => 'Memudahkan penajaan digital dengan jejak niat, resit segera dan pelaporan telus.'],
        ],
        'branches' => [],
        'facts' => [],
        'history' => [],
        'status_note' => 'Nota status: Keupayaan dan produk teknologi kewangan yang belum disahkan tidak dipaparkan. Butiran lanjut akan dikemas kini apabila disahkan oleh pihak pengurusan AWQAF.',
        'related_links' => [],
        'reports' => [2024],
        'display_order' => 4,
    ],
];
