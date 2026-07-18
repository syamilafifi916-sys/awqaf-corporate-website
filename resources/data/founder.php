<?php

/**
 * AWQAF Holdings Berhad — Pengasas (halaman sejarah korporat terkawal).
 *
 * Satu sumber kebenaran untuk halaman /korporat/pengasas. Kandungan ialah
 * RINGKASAN TERHAD yang ditulis semula secara faktual — bukan salinan teks
 * daripada buku biografi. Buku "Muhammad Ali Hashim: Champion of Business
 * Jihad and Corporate Waqaf" (Rokiah Talib, 2022) digunakan sebagai rujukan
 * sokongan sahaja. Tiada bab, petikan panjang, atau anekdot peribadi disalin.
 *
 * Halaman ini bersifat institution-first: konteks sejarah JCorp/WANCorp
 * dipaparkan di sini sahaja, bukan di halaman utama.
 */

return [
    'full_name' => 'Allahyarham Tan Sri Muhammad Ali Hashim',
    'honorific' => 'Tan Sri',
    'designation' => 'Pengasas Bersama AWQAF Holdings Berhad',
    // Tahun kelahiran belum disahkan dalam sumber projek; hanya tarikh
    // kembali ke Rahmatullah yang disahkan daripada profil korporat.
    'lifespan' => null,
    'passed_away' => '31 Oktober 2017',
    'portrait' => 'pengasas-tan-sri-muhammad-ali-hashim.png',

    'summary' => 'Allahyarham Tan Sri Muhammad Ali Hashim merupakan tokoh korporat yang memainkan peranan penting dalam pembangunan konsep Waqaf Korporat di Malaysia. Pengalaman beliau menerajui Johor Corporation, membangunkan Waqaf An-Nur Corporation dan mengangkat gagasan Jihad Bisnes menjadi sebahagian penting daripada asas pemikiran yang menyumbang kepada penubuhan AWQAF Holdings Berhad.',

    'jcorp_experience' => [
        'period' => '1982–2010',
        'description' => [
            'Tan Sri Muhammad Ali Hashim berkhidmat sebagai Ketua Pegawai Eksekutif dan peneraju kanan Johor Corporation (JCorp) dari tahun 1982 hingga 2010 — lebih kurang 28 tahun.',
            'Di bawah kepimpinan beliau, JCorp berkembang menjadi salah sebuah kumpulan korporat utama di Malaysia. Menjelang akhir tempoh perkhidmatan beliau, kumpulan ini merangkumi lebih 280 buah syarikat dengan kira-kira 65,000 pekerja. Beberapa syarikat kumpulan disenaraikan di Bursa Malaysia, dengan satu disenaraikan di London.',
        ],
        'stats' => [
            ['value' => '28 tahun', 'label' => 'Menerajui Johor Corporation'],
            ['value' => '280+', 'label' => 'Syarikat dalam kumpulan'],
            ['value' => '65,000', 'label' => 'Pekerja di seluruh kumpulan'],
            ['value' => 'RM18.1 bilion', 'label' => 'Permodalan pasaran syarikat tersenarai di bawah kawalan JCorp menjelang akhir tempoh perkhidmatan beliau'],
        ],
        'source' => 'Biografi Muhammad Ali Hashim, 2022.',
    ],

    'leadership_principles' => [
        'Integriti dan kebertanggungjawaban',
        'Pengurusan yang berdisiplin',
        'Pembangunan keusahawanan',
        'Intrapreneurship — Keusahawanan Amanah',
        'Membina usahawan Melayu dan Muslim yang berkeupayaan',
        'Menerapkan nilai Islam dalam pengurusan korporat',
        'Keyakinan bahawa perniagaan perlu menjana keuntungan sambil menyumbang kepada masyarakat',
    ],

    'business_jihad_summary' => [
        'Gagasan Jihad Bisnes dibangunkan sebagai satu rangka kerja korporat dan ekonomi. Ia menekankan disiplin, usaha strategik, daya saing, integriti dan pemerkasaan ekonomi.',
        'Gagasan ini bukan konsep politik atau militan; sebaliknya ia menghubungkan pencapaian perniagaan dengan tanggungjawab terhadap masyarakat dan ummah.',
    ],

    'waqaf_an_nur_summary' => [
        'Waqaf An-Nur bermula daripada inisiatif penjagaan kesihatan berasaskan wakaf.',
        'Klinik yang menyediakan perkhidmatan perubatan diperkenalkan sejak tahun 2000.',
        'Waqaf An-Nur Corporation (WANCorp) ditubuhkan pada tahun 2006 sebagai entiti Waqaf Korporat dalam ekosistem JCorp.',
        'WANCorp menjadi contoh utama pengintegrasian wakaf ke dalam struktur korporat, dan menunjukkan bagaimana aset serta aktiviti perniagaan korporat boleh menyokong manfaat komuniti jangka panjang.',
    ],

    'awqaf_contribution' => [
        'Tan Sri Muhammad Ali Hashim dan Dato\' Haji Mohammad Sahar bin Mat Din memainkan peranan penting dalam penubuhan AWQAF Holdings Berhad.',
        'AWQAF Holdings Berhad diperbadankan pada tahun 2012, dengan hasrat meneruskan dan meluaskan pendekatan Waqaf Korporat menerusi penyertaan komuniti dan tadbir urus institusi.',
    ],

    'selected_achievements' => [
        '28 tahun kerjaya kepimpinan di Johor Corporation',
        'Pembangunan JCorp menjadi kumpulan korporat utama',
        'Pengenalan dan pengangkatan gagasan Jihad Bisnes',
        'Pembangunan konsep Waqaf Korporat dan Waqaf An-Nur',
        'Diiktiraf dalam senarai "The 500 Most Influential Muslims" bagi tahun 2017 dan 2018',
        'Penerima sembilan ijazah kehormat daripada institusi di Malaysia',
    ],

    'legacy' => [
        'Konsep Waqaf Korporat',
        'Tadbir urus institusi',
        'Pembangunan keusahawanan',
        'Pemerkasaan ekonomi',
        'AWQAF Holdings Berhad',
        'Perbincangan dan penyelidikan berterusan mengenai pengurusan korporat Islam',
    ],

    // Kesinambungan Amanah — hanya maklumat disahkan (jawatan, nama penuh,
    // tempoh perkhidmatan). Jangan tokok tambah pencapaian atau label editorial.
    // Potret rasmi berwarna (rangka & saiz seragam); jika 'portrait' null, UI
    // berpatah semula kepada monogram.
    'leadership_legacy' => [
        'intro' => 'Amanah yang diasaskan oleh Allahyarham Tan Sri Muhammad Ali Hashim terus dipelihara melalui kesinambungan kepimpinan AWQAF. Peralihan kepimpinan mencerminkan kematangan sebuah institusi yang dibina untuk terus berkhidmat kepada ummah merentas generasi.',
        'closing' => 'Legasi sebenar bukan sekadar institusi yang ditinggalkan, tetapi nilai, amanah dan pemikiran yang terus dipelihara serta diteruskan oleh generasi kepimpinan seterusnya.',
        'chairmen' => [
            [
                'role' => 'Pengerusi Pengasas',
                'name' => 'Allahyarham Tan Sri Muhammad Ali Hashim',
                'term' => 'September 2012 – Julai 2017',
                'monogram' => 'MAH',
                'portrait' => 'chairman-muhammad-ali-hashim.webp',
                'current' => false,
                'description' => 'Pengasas AWQAF Holdings Berhad. Memperkenalkan dan memperjuangkan falsafah Waqaf Korporat dan Jihad Bisnes sebagai pembangunan ekonomi mampan untuk ummah.',
            ],
            [
                'role' => 'Pengerusi Kedua',
                'name' => 'Tan Sri Siti Sa\'diah binti Sheikh Bakir',
                'term' => 'Ogos 2017 – Disember 2024',
                'monogram' => 'SSB',
                'portrait' => 'chairman-siti-sadiah.webp',
                'current' => false,
                'description' => 'Meneruskan pengukuhan institusi dan tadbir urus AWQAF.',
            ],
            [
                'role' => 'Pengerusi Semasa',
                'name' => 'Dato\' Mohammad Sahar bin Mat Din',
                'term' => 'Januari 2025 – Kini',
                'monogram' => 'MSD',
                'portrait' => 'chairman-mohammad-sahar.webp',
                'current' => true,
                'description' => 'Pengerusi semasa AWQAF Holdings Berhad.',
            ],
        ],
    ],

    'book' => [
        'title' => 'Muhammad Ali Hashim: Champion of Business Jihad and Corporate Waqaf',
        'author' => 'Rokiah Talib',
        'year' => 2022,
        'publishers' => ['AWQAF Holdings Berhad', 'Penerbit Universiti Kebangsaan Malaysia'],
        'isbn' => '978-967-251-667-5',
        // Tiada URL pembelian disahkan lagi — butang menuju halaman Hubungi
        // Kami dengan label pertanyaan. Tukar apabila URL rasmi disediakan.
        'cta_label' => 'Pertanyaan Pembelian Buku',
        'cta_verified_url' => null,
        // Tiada imej muka depan buku dibekalkan — slot ditanda dengan jelas.
        'cover' => null,
        'copyright' => 'Hak cipta buku ini dimiliki bersama oleh AWQAF Holdings Berhad dan Penerbit UKM. Kandungan di halaman ini merupakan ringkasan terhad untuk tujuan maklumat korporat.',
    ],

    'sources' => 'Maklumat diringkaskan daripada profil korporat AWQAF, sumber korporat berkaitan, dan buku Muhammad Ali Hashim: Champion of Business Jihad and Corporate Waqaf, terbitan AWQAF Holdings Berhad dan Penerbit UKM, 2022.',
];
