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
        'rationale' => 'Portfolio ini diwujudkan untuk menterjemahkan hasil wakaf kepada akses pendidikan Islam bersepadu — menjadikan pendidikan sebagai aset produktif yang berkekalan, selaras dengan prinsip Waqaf Korporat.',
        'outlook' => 'Impak jangka panjang yang disasarkan ialah keupayaan pendidikan yang mampan dan pembangunan pelajar berterusan. Prestasi dinilai menerusi perkembangan institusi pendidikan yang dilaporkan dalam Laporan Tahunan.',
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
                'caption' => 'Sekolah Al-Hamra — projek pendidikan perintis di bawah AWQAF Holdings Berhad (mulai 2021).',
                'credit' => null,
            ],
            [
                'key' => 'amiis',
                'label' => 'Inisiatif strategik seterusnya',
                'title' => 'Al-Mashoor International Islamic School (AMIIS)',
                // Sengaja kekal blok teks sahaja (tiada imej) sehingga aset rasmi AMIIS
                // dibekalkan; tiada placeholder ditunjukkan.
                'image' => null, // 'portfolio/education/amiis.jpg' apabila tersedia
                'alt' => 'Al-Mashoor International Islamic School (AMIIS).',
                'caption' => 'AMIIS — inisiatif pendidikan strategik seterusnya; Sekolah Al-Hamra sebagai rakan strategik penubuhannya.',
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
            'Pendidikan ialah antara aset wakaf yang paling berkekalan. Menerusi model Waqaf Korporat, hasil yang dijana disalurkan untuk membina keupayaan pendidikan yang mampan — supaya manfaatnya diwarisi oleh pelajar merentas generasi, bukan sekadar bantuan sekali sahaja.',
            'Portfolio pendidikan Kumpulan AWQAF diuruskan menerusi AWQAF Education Sdn. Bhd., entiti yang membangun dan menyelia institusi pendidikan Islam bersepadu Kumpulan.',
            'Sekolah Al-Hamra (Al-Hamra Integrated School) merupakan projek pendidikan perintis di bawah AWQAF Holdings Berhad, diuruskan menerusi AWQAF Education Sdn. Bhd. mulai 2021. Ia menawarkan model pendidikan holistik yang menggabungkan Cambridge Assessment International Education, sukatan Kementerian Pendidikan Malaysia, serta prinsip pendidikan berteraskan al-Quran dan Sunnah.',
            'Sekolah Al-Hamra kemudiannya turut serta sebagai rakan strategik bersama Majlis Agama Islam Negeri Pulau Pinang (MAINPP) dan Yayasan Islam Pulau Pinang dalam penubuhan Al-Mashoor International Islamic School (AMIIS).',
            'AMIIS dirancang untuk menjadi sebuah sekolah antarabangsa Islam yang memberi manfaat kepada Pulau Pinang dan wilayah utara — menggabungkan nilai-nilai Islam, pembangunan holistik dan kurikulum antarabangsa.',
        ],
        'units' => [
            ['name' => 'AWQAF Education Sdn. Bhd.', 'note' => 'Entiti pengurusan portfolio pendidikan.'],
            ['name' => 'Sekolah Al-Hamra (Al-Hamra Integrated School)', 'note' => 'Projek pendidikan perintis AWQAF Holdings (mulai 2021); kemudiannya rakan strategik dalam penubuhan AMIIS.'],
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
        'rationale' => 'Portfolio hartanah diwujudkan untuk membangunkan tanah wakaf dan institusi secara produktif — menukar aset tak alih kepada sumber pendapatan berkekalan tanpa menghabiskan modal asal.',
        'outlook' => 'Impak jangka panjang yang disasarkan ialah pulangan mampan dan peluang ekonomi kepada komuniti serta usahawan. Status setiap projek dinyatakan secara jelas dan tertakluk pengesahan pengurusan.',
        'status_legend' => ['Selesai', 'Aktif', 'Sejarah', 'Cadangan / tertakluk pengesahan'],
        'projects' => [
            ['name' => 'Kerjasama pembangunan tanah wakaf bersama MAINS', 'status' => 'Cadangan / tertakluk pengesahan', 'note' => 'Kerjasama dengan Majlis Agama Islam Negeri Sembilan dinyatakan dalam Company Profile. Butiran dan status semasa projek perlu disahkan oleh pihak pengurusan AWQAF.'],
        ],
        'description' => [
            'Portfolio hartanah Kumpulan AWQAF memberi tumpuan kepada pembangunan tanah wakaf dan tanah institusi, termasuk kerjasama dengan Majlis Agama Islam Negeri Sembilan (MAINS) sebagaimana dinyatakan dalam Company Profile.',
            'Tumpuan pembangunan adalah berskala kecil dan sederhana, dengan hasrat memberi manfaat kepada usahawan dan komuniti setempat, selaras dengan model Waqaf Korporat yang mengekalkan modal asal sebagai amanah kekal.',
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
        'rationale' => 'Portfolio Fintech diwujudkan untuk memperluas akses kewangan digital dan pembiayaan Islam kepada PKS dan usahawan — memanfaatkan teknologi bagi menyokong pemerkasaan ekonomi ummah.',
        'outlook' => 'Impak jangka panjang ialah sokongan berterusan kepada usahawan tempatan. Keupayaan dan produk teknologi dinyatakan hanya apabila disahkan oleh pihak pengurusan AWQAF.',
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
