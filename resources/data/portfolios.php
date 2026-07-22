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
        'status' => 'Selesai',
        'summary' => 'Perjalanan pendidikan AWQAF — projek perintisnya, Sekolah Al-Hamra, kini merupakan inisiatif strategik yang telah selesai (2021–Oktober 2025).',
        'role' => 'Portfolio pendidikan bertanggungjawab membangun dan menyelia inisiatif pendidikan Islam bersepadu Kumpulan AWQAF, sebagai sebahagian daripada pelaburan berasaskan wakaf yang menyalurkan manfaat berterusan kepada masyarakat.',
        'contribution' => 'Portfolio pendidikan menyumbang kepada objektif AWQAF menerusi akses pendidikan berstruktur, pembangunan pelajar, pembinaan keupayaan pendidikan yang mampan, serta kepakaran pengurusan pendidikan.',
        'rationale' => 'Portfolio ini diwujudkan untuk menterjemahkan hasil wakaf kepada akses pendidikan Islam bersepadu — menjadikan pendidikan sebagai aset produktif yang berkekalan, selaras dengan prinsip Waqaf Korporat.',
        'outlook' => 'Projek Al-Hamra telah selesai pada Oktober 2025. Pengalaman operasi, kualiti akademik dan pengajaran yang diperoleh terus membentuk perspektif jangka panjang AWQAF terhadap inisiatif berkaitan pendidikan pada masa hadapan.',
        // Galeri projek pendidikan — dipaparkan HANYA apabila 'image' sebenar wujud
        // (tiada kotak placeholder kosong). Tetapkan 'image' kepada laluan relatif di
        // bawah /public/images apabila fail rasmi dibekalkan. JANGAN guna imej AI/stok.
        //   Al-Hamra → public/images/portfolio/education/al-hamra.jpg
        //   AMIIS    → public/images/portfolio/education/amiis.jpg
        'media' => [
            [
                'key' => 'al-hamra',
                'label' => 'Projek perintis',
                'title' => 'Sekolah Al-Hamra',
                'image' => 'portfolio/education/al-hamra.jpg', // imej rasmi tersedia
                'alt' => 'Sekolah Al-Hamra (Al-Hamra Integrated School), projek pendidikan perintis AWQAF Holdings Berhad.',
                'caption' => 'Sekolah Al-Hamra — projek pendidikan perintis AWQAF Holdings Berhad, diuruskan 2021–Oktober 2025.',
                'credit' => null,
            ],
        ],
        //
        // NOTA DALAMAN (tidak dipaparkan kepada umum) — TERTAKLUK PENGESAHAN PENGURUSAN:
        // Hubungan komersial dan tadbir urus sebenar antara AWQAF / Al-Hamra dengan
        // AMIIS, serta status operasi semasa Al-Hamra, perlu disahkan oleh pengurusan
        // AWQAF sebelum sebarang dakwaan pemilikan/kawalan dibuat. Kedudukan awam di
        // bawah hanya menyatakan penyertaan Al-Hamra sebagai RAKAN STRATEGIK (sumber
        // awam 2025) dan TIDAK mendakwa AWQAF memiliki atau mengendalikan AMIIS.
        'description' => [
            'Membina Modal Insan Menerusi Pendidikan. Pendidikan sentiasa diiktiraf oleh AWQAF Holdings Berhad sebagai bidang impak sosial yang penting dan pemangkin pembangunan masyarakat jangka panjang.',
            'Sekolah Al-Hamra (Al-Hamra Integrated School) merupakan inisiatif pendidikan utama AWQAF Holdings Berhad, diuruskan menerusi AWQAF Education Sdn. Bhd. bermula 2021. Sekolah ini diambil alih ketika pandemik COVID-19 sebagai sebahagian daripada usaha AWQAF memastikan institusi tersebut dapat terus beroperasi sambil memelihara kesinambungan pendidikan bagi para pelajar dan pendidiknya.',
            'Sepanjang tempoh pengurusannya, AWQAF menumpukan usaha memperkukuh operasi sekolah, kualiti akademik dan pendidikan berteraskan nilai. Projek ini memberikan pengalaman berharga dalam mengurus institusi pendidikan swasta, sekali gus memperkukuh kefahaman AWQAF terhadap peluang dan cabaran dalam sektor pendidikan.',
            'Operasi ditamatkan pada Oktober 2025 sebagai sebahagian daripada penstrukturan semula strategik portfolio pelaburan AWQAF. Walaupun projek ini telah selesai, pengetahuan, pengalaman operasi dan pengajaran yang diperoleh terus membentuk perspektif jangka panjang AWQAF terhadap inisiatif berkaitan pendidikan pada masa hadapan.',
        ],
        'units' => [
            ['name' => 'AWQAF Education Sdn. Bhd.', 'note' => 'Entiti pengurusan portfolio pendidikan.'],
            ['name' => 'Sekolah Al-Hamra (Al-Hamra Integrated School)', 'note' => 'Projek pendidikan perintis AWQAF Holdings, diuruskan 2021–Oktober 2025; kini inisiatif strategik yang telah selesai.'],
        ],
        'curriculum' => [
            'Cambridge Assessment International Education',
            'Sukatan pelajaran Kementerian Pendidikan Malaysia',
            'Prinsip pendidikan berteraskan al-Quran dan Sunnah',
        ],
        'activities' => [
            ['name' => 'Pembangunan modal insan', 'desc' => 'Membina keupayaan insan menerusi pendidikan sebagai pelaburan sosial jangka panjang.'],
            ['name' => 'Pendidikan berteraskan nilai', 'desc' => 'Menerapkan pendidikan holistik yang berpaksikan nilai murni dan prinsip Islam.'],
            ['name' => 'Pembangunan ekosistem pendidikan', 'desc' => 'Membangun dan memperkukuh ekosistem institusi pendidikan yang mampan.'],
            ['name' => 'Pembangunan belia & komuniti', 'desc' => 'Menyokong pembangunan belia dan komuniti menerusi akses pendidikan berstruktur.'],
            ['name' => 'Perkongsian strategik dalam pendidikan', 'desc' => 'Menjalin kerjasama strategik bagi memperluas impak pendidikan.'],
        ],
        'branches' => [],
        'facts' => [],
        'history' => [],
        'implementation' => [
            'AWQAF Education Sdn. Bhd. mengambil alih Al-Hamra Integrated School pada 2021 ketika pandemik COVID-19.',
            'Pengambilalihan ini membantu memelihara kesinambungan operasi dan pendidikan bagi para pelajar serta pendidik.',
            'Operasi ditamatkan pada Oktober 2025 berikutan penstrukturan semula portfolio pelaburan AWQAF.',
        ],
        // Caveat pengesahan pengurusan disimpan sebagai nota dalaman (lihat di atas),
        // bukan sebagai nota status awam. Tiada dakwaan pemilikan AMIIS dibuat.
        'status_note' => null,
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
        'role' => 'Portfolio kesihatan dan kesejahteraan menyelia perniagaan kecergasan wanita Kumpulan AWQAF menerusi rangkaian CURVES — menyediakan wanita ruang senaman yang selamat dan bermaruah, sambil menjana pendapatan mampan untuk wakaf.',
        'contribution' => 'Portfolio ini menyumbang kepada objektif AWQAF dengan menjana pendapatan mampan daripada perniagaan kesihatan dan kesejahteraan, sekali gus menyokong kelestarian dana wakaf.',
        'rationale' => 'Portfolio ini menggabungkan tujuan sosial dan daya maju ekonomi: menyediakan akses kesejahteraan khusus wanita dalam persekitaran yang selamat dan tertutup, sekali gus menjana pendapatan berterusan yang menyokong kelestarian dana wakaf mengikut model Waqaf Korporat.',
        'outlook' => 'Impak jangka panjang ialah aliran pendapatan yang mampan dan akses kesejahteraan komuniti. Prestasi diukur menerusi pendapatan dan keahlian yang dilaporkan dalam Laporan Tahunan.',
        'description' => [
            'Kesihatan dan kecergasan wanita sering kurang mendapat ruang yang sesuai dalam kemudahan senaman umum. Menerusi rangkaian CURVES, portfolio ini menyediakan persekitaran senaman khusus wanita yang selamat, tertutup dan menghormati maruah — menjadikan kesejahteraan sesuatu yang lebih mudah diakses oleh wanita dalam komuniti setempat.',
            'Sebagai portfolio pelaburan di bawah AHB Wellness Sdn. Bhd., CURVES turut menjana pendapatan yang mampan bagi menyokong kelestarian dana wakaf — sejajar dengan model Waqaf Korporat yang mengaitkan manfaat sosial dengan daya maju ekonomi.',
        ],
        'units' => [
            ['name' => 'AHB Wellness Sdn. Bhd.', 'note' => 'Entiti pengurusan portfolio kesihatan & kesejahteraan.'],
            ['name' => 'CURVES', 'note' => 'Rangkaian pusat kecergasan & kesejahteraan khusus wanita.'],
        ],
        'activities' => [
            ['name' => 'Kecergasan wanita', 'desc' => 'Menyediakan kemudahan dan program kecergasan khusus untuk wanita menerusi rangkaian CURVES.'],
            ['name' => 'Kesejahteraan komuniti', 'desc' => 'Menggalakkan gaya hidup sihat dalam kalangan komuniti setempat di sekitar setiap cawangan.'],
        ],
        // Tiga cawangan CURVES — setiap satu dipaparkan secara individu dengan imejnya
        // sendiri (bukan satu imej generik). Imej dipaparkan HANYA apabila 'image' sebenar
        // wujud (tiada placeholder kosong). Tetapkan 'image' apabila fail rasmi dibekalkan.
        // JANGAN guna imej AI/stok. Sumber rujukan rasmi: pautan Facebook setiap cawangan.
        //   public/images/portfolio/wellness/curves-bukit-jelutong.jpg
        //   public/images/portfolio/wellness/curves-setia-alam.jpg
        //   public/images/portfolio/wellness/curves-bangi-sentral.jpg
        'branches' => [
            [
                'name' => 'CURVES Bukit Jelutong',
                'location' => 'Bukit Jelutong, Shah Alam, Selangor',
                'image' => 'portfolio/wellness/curves-bukit-jelutong.jpg', // imej rasmi tersedia
                'alt' => 'Pusat kecergasan wanita CURVES di Bukit Jelutong, Shah Alam.',
                'caption' => 'CURVES Bukit Jelutong, Shah Alam.',
                'credit' => null,
                'description' => 'Cawangan CURVES di Bukit Jelutong, Shah Alam.',
                'url' => 'https://www.facebook.com/curvesbukitjelutong',
                'url_label' => 'Facebook rasmi',
                'opened' => null,
            ],
            [
                'name' => 'CURVES Setia Alam',
                'location' => 'Setia Alam, Shah Alam, Selangor',
                'image' => 'portfolio/wellness/curves-setia-alam.jpg', // imej rasmi tersedia
                'alt' => 'Pusat kecergasan wanita CURVES di Setia Alam, Shah Alam.',
                'caption' => 'CURVES Setia Alam, Shah Alam.',
                'credit' => null,
                'description' => 'Cawangan CURVES di Setia Alam.',
                'url' => 'https://www.facebook.com/profile.php?id=100067166107050',
                'url_label' => 'Facebook rasmi',
                'opened' => 'Dibuka awal 2022 (Laporan Tahunan 2022, ms 32)',
            ],
            [
                'name' => 'CURVES Bangi Sentral',
                'location' => 'Bangi Sentral, Selangor',
                // DITAHAN: fail curves-bangi-sentral.jpg yang dibekalkan ialah tangkapan
                // skrin Google Street View (tera air "© Google" / "mudah.my" + kawalan UI)
                // — isu hak cipta/lesen, tidak boleh diterbitkan. Kekal blok teks sahaja
                // sehingga foto rasmi yang bersih dibekalkan. Tetapkan laluan apabila sedia.
                'image' => null, // 'portfolio/wellness/curves-bangi-sentral.jpg' (ganti dgn foto rasmi bersih)
                'alt' => 'Pusat kecergasan wanita CURVES di Bangi Sentral, Selangor.',
                'caption' => 'CURVES Bangi Sentral, Selangor.',
                'credit' => null,
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
        'status_note' => null,
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
        'rationale' => 'Portfolio hartanah diwujudkan untuk membangunkan tanah wakaf dan institusi secara produktif — menukar aset tak alih kepada sumber pendapatan berkekalan tanpa menghabiskan modal asal.',
        'outlook' => 'Hartanah memainkan peranan strategik dalam menjana pendapatan mampan bagi wakaf — menukar aset tak alih kepada sumber nilai jangka panjang yang terus memberi manfaat kepada komuniti dan usahawan setempat.',
        'status_legend' => null,
        'projects' => [],
        'description' => [
            'Portfolio hartanah Kumpulan AWQAF berpaksikan falsafah pelaburan berasaskan wakaf: membangunkan tanah wakaf dan tanah institusi secara produktif bagi menjana nilai jangka panjang, sambil mengekalkan modal asal sebagai amanah kekal.',
            'Peranan strategik hartanah adalah menukar aset tak alih kepada sumber pendapatan mampan — menyokong kelestarian kewangan wakaf dan mewujudkan peluang ekonomi kepada komuniti serta usahawan setempat.',
            'Tumpuan pembangunan adalah berskala kecil dan sederhana serta menjalinkan kerjasama strategik, termasuk bersama Majlis Agama Islam Negeri Sembilan (MAINS), bagi memakmurkan tanah wakaf demi manfaat berterusan masyarakat.',
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
        'status_note' => null,
        'related_links' => [],
        'reports' => [],
        'display_order' => 3,
    ],
    [
        'slug' => 'fintech',
        'name' => 'Fintech',
        'entity' => 'AHB Fintech Sdn. Bhd.',
        'status' => 'Aktif',
        'summary' => 'Teras teknologi strategik AWQAF Holdings — membangunkan infrastruktur digital untuk kewangan sosial Islam, diuruskan menerusi AHB Fintech Sdn. Bhd.',
        'role' => 'AHB Fintech ialah teras teknologi strategik AWQAF Holdings, memberi tumpuan kepada pembangunan infrastruktur digital untuk kewangan sosial Islam — daripada infaq digital, ke arah wakaf digital, penyepaduan pembayaran dan ekosistem kewangan digital Islam yang lebih menyeluruh.',
        'contribution' => 'AHB Fintech menyumbang kepada objektif AWQAF dengan membina infrastruktur digital yang menjadikan kewangan sosial Islam lebih telus, dipercayai dan boleh diskalakan.',
        'rationale' => 'AHB Fintech diwujudkan untuk membina asas teknologi jangka panjang bagi kewangan sosial Islam — menjadikan teknologi digital sebagai pemangkin ketelusan dan kepercayaan dalam pengurusan dana sosial ummah.',
        'outlook' => 'Visi AHB Fintech ialah menjadi platform jangka panjang yang membolehkan kewangan sosial Islam menerusi teknologi digital yang dipercayai, telus dan boleh diskalakan.',
        'description' => [
            'AHB Fintech ialah teras teknologi strategik AWQAF Holdings Berhad. Fokusnya adalah membangunkan infrastruktur digital untuk kewangan sosial Islam — menjadikan teknologi sebagai pemangkin ketelusan, kepercayaan dan skalabiliti dalam pengurusan dana sosial ummah.',
            'Pelaksanaan semasa merangkumi Platform Infaq Digital, yang memudahkan penajaan — seperti iftar Ramadan — dengan jejak niat yang jelas, resit segera dan pelaporan yang telus.',
            'Visi jangka panjang AHB Fintech merangkumi wakaf digital, kewangan sosial, infrastruktur derma digital, penyepaduan pembayaran, serta pembinaan ekosistem kewangan digital Islam yang lebih menyeluruh.',
            'AWQAF sebelum ini turut serta dalam sebuah konsortium yang memohon lesen Bank Digital Malaysia. Walaupun konsortium tersebut tidak terpilih, penyertaan itu mengukuhkan komitmen jangka panjang AWQAF terhadap inovasi kewangan digital. AHB Fintech tidak beroperasi sebagai bank digital — sebaliknya ia membina infrastruktur digital yang menyokong kewangan sosial Islam.',
        ],
        'units' => [
            ['name' => 'AHB Fintech Sdn. Bhd.', 'note' => 'Teras teknologi strategik AWQAF Holdings bagi kewangan sosial Islam digital.'],
            ['name' => 'Platform Infaq Digital', 'note' => 'Pelaksanaan semasa — platform penajaan digital dengan jejak niat, resit segera dan pelaporan telus.'],
        ],
        'activities' => [
            ['name' => 'Platform Infaq Digital', 'desc' => 'Memudahkan penajaan digital dengan jejak niat, resit segera dan pelaporan telus.'],
            ['name' => 'Platform Wakaf Digital', 'desc' => 'Membangunkan keupayaan wakaf digital sebagai hala tuju jangka panjang.'],
            ['name' => 'Penyepaduan pembayaran', 'desc' => 'Menyepadukan saluran pembayaran digital bagi menyokong kewangan sosial Islam.'],
            ['name' => 'Teknologi kewangan sosial Islam', 'desc' => 'Membina teknologi yang menyokong instrumen kewangan sosial Islam secara telus dan boleh dipercayai.'],
            ['name' => 'Pendigitalan pengurusan wakaf', 'desc' => 'Mendigitalkan proses pengurusan wakaf untuk kecekapan dan ketelusan.'],
            ['name' => 'Penyelesaian teknologi untuk institusi Islam', 'desc' => 'Menyediakan penyelesaian teknologi bagi institusi Islam.'],
        ],
        'branches' => [],
        'facts' => [],
        'history' => [],
        'status_note' => null,
        'related_links' => [],
        'reports' => [2024],
        'display_order' => 4,
    ],
];
