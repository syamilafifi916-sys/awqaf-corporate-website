<script setup>
import CollectionChart from '@/Components/CollectionChart.vue';
import WaqafSeal from '@awqaf-design-system/components/WaqafSeal.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import {
    AcademicCapIcon,
    ArrowRightIcon,
    BanknotesIcon,
    BuildingLibraryIcon,
    ChartBarIcon,
    CpuChipIcon,
    DocumentCheckIcon,
    DocumentTextIcon,
    HeartIcon,
    ReceiptPercentIcon,
    ScaleIcon,
    ShieldCheckIcon,
    Square3Stack3DIcon,
    UserGroupIcon,
    UsersIcon,
} from '@heroicons/vue/24/outline';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const page = usePage();

const journey = [
    { icon: BanknotesIcon, title: 'Wakaf Pertama', body: 'Anda membuat sumbangan wakaf pertama — atas talian, manual, atau bulanan.' },
    { icon: UserGroupIcon, title: 'Profil Ahli', body: 'Satu profil Portal Pewakaf dicipta untuk anda, merekod setiap sumbangan sejak hari pertama.' },
    { icon: ArrowRightIcon, title: 'Wakaf Bulanan', body: 'Sumbangan konsisten setiap bulan menambah wakaf terkumpul anda tanpa perlu tindakan berulang.' },
    { icon: Square3Stack3DIcon, title: 'Tahap Keahlian', body: 'Tahap keahlian anda naik secara automatik — dari Asas hingga Balatin — mengikut jumlah terkumpul.' },
    { icon: ReceiptPercentIcon, title: 'Resit & Rekod', body: 'Setiap sumbangan direkod dengan resit rasmi yang boleh disemak bila-bila masa.' },
    { icon: ChartBarIcon, title: 'Impak', body: 'Wakaf anda menyumbang kepada portfolio pelaburan dan program kebajikan yang telus dan diaudit.' },
    { icon: ShieldCheckIcon, title: 'Legasi', body: 'Aset wakaf kekal terus memberi manfaat merentas generasi — bukan sekadar sumbangan sekali sahaja.' },
];
const activeJourneyStep = ref(0);

const impactCategories = [
    { icon: AcademicCapIcon, title: 'Pendidikan' },
    { icon: HeartIcon, title: 'Kesihatan' },
    { icon: UserGroupIcon, title: 'Komuniti' },
    { icon: BuildingLibraryIcon, title: 'Projek Strategik' },
];

const momentum2024 = [
    'Kunjungan hormat ke Jabatan Perdana Menteri membentangkan model Wakaf Korporat®',
    'MoU bersama Wakaf Pulau Pinang & MAINPP/YIPP untuk inisiatif pendidikan',
    'Dialog dengan delegasi antarabangsa (Awqaf New Zealand, LPIP Indonesia)',
];

const futureThemes = [
    { icon: AcademicCapIcon, title: 'Pendidikan', body: 'Meluaskan akses pendidikan Islam berkualiti menerusi platform digital dan institusi strategik.' },
    { icon: HeartIcon, title: 'Kesihatan', body: 'Mengembangkan inisiatif kesihatan dan kesejahteraan komuniti yang mampan.' },
    { icon: CpuChipIcon, title: 'Teknologi', body: 'Memperkasa wakaf menerusi platform digital untuk ketelusan dan capaian yang lebih luas.' },
    { icon: UserGroupIcon, title: 'Komuniti', body: 'Memperkukuh penyertaan awam dalam ekonomi wakaf korporat merentas lapisan masyarakat.' },
    { icon: ScaleIcon, title: 'Wakaf Korporat Mampan', body: 'Mengekalkan disiplin tadbir urus dan pertumbuhan aset jangka panjang.' },
    { icon: BuildingLibraryIcon, title: 'Pembangunan Ummah', body: 'Menjadi sebahagian instrumen pembangunan sosioekonomi ummah yang berterusan.' },
];

const statIcons = [BanknotesIcon, UsersIcon, ChartBarIcon, CpuChipIcon];
const portfolioIcons = [AcademicCapIcon, HeartIcon, CpuChipIcon];
const programIcons = { ZuriatCARE: HeartIcon, EduWAQF: AcademicCapIcon, AWQAF4Health: UserGroupIcon };

const trustLayer = [
    { icon: DocumentCheckIcon, title: 'Laporan Diaudit', body: 'Penyata kewangan disahkan juruaudit setiap tahun.', href: () => route('korporat.reports') },
    { icon: ScaleIcon, title: 'Tadbir Urus Korporat', body: 'Beroperasi di bawah Akta Syarikat 2016.', href: () => route('ketelusan') },
    { icon: UserGroupIcon, title: 'Penyeliaan Lembaga Pengarah', body: '9 ahli Lembaga, diselia jawatankuasa khusus.', href: () => route('ketelusan') },
    { icon: ShieldCheckIcon, title: 'Pusat Ketelusan', body: 'Semua laporan & tadbir urus di satu tempat.', href: () => route('ketelusan') },
    { icon: Square3Stack3DIcon, title: 'Akses Portal Ahli', body: 'Jejak wakaf & tahap keahlian anda sendiri.', href: () => page.props.portalUrl, external: true },
    { icon: ReceiptPercentIcon, title: 'Pendedahan Kewangan', body: '11 tahun data kutipan didedahkan penuh.', href: () => route('korporat.reports') },
];

const tiers = [
    { name: 'Ahli Asas', range: 'RM1 – RM999', gradient: 'from-stone-400 to-stone-600', text: 'text-white' },
    { name: 'Ahli Hadid', range: 'RM1,000 – RM9,999', gradient: 'from-zinc-500 to-zinc-700', text: 'text-white' },
    { name: 'Ahli Fiddhah', range: 'RM10,000 – RM99,999', gradient: 'from-slate-300 to-slate-500', text: 'text-white' },
    { name: 'Ahli Zahab', range: 'RM100,000 – RM499,999', gradient: 'from-amber-400 to-yellow-600', text: 'text-white' },
    { name: 'Ahli Zamrud', range: 'RM500,000 – RM999,999', gradient: 'from-emerald-500 to-emerald-800', text: 'text-white' },
    { name: 'Ahli Balatin', range: 'RM1,000,000 ke atas', gradient: 'from-slate-800 via-indigo-950 to-slate-950', text: 'text-amber-300' },
];

const programs = [
    {
        name: 'ZuriatCARE',
        stat: 'RM75,770',
        statLabel: 'disalurkan tahun 2023',
        description: 'Sokongan sebaya, rujukan kesihatan mental dan bantuan kepada komuniti terjejas — dijalankan bersama Kementerian Kesihatan Malaysia.',
    },
    {
        name: 'EduWAQF',
        stat: 'RM20,000',
        statLabel: 'biasiswa disalurkan',
        description: 'Bantuan kewangan kepada pelajar IPT yang kesukaran, tanpa mengira latar belakang, serta program kepimpinan pelajar.',
    },
    {
        name: 'AWQAF4Health',
        stat: 'Akan datang',
        statLabel: 'butiran dikemas kini',
        description: 'Program yang disasarkan untuk menyalurkan dana wakaf kepada inisiatif kesihatan komuniti.',
    },
];

const stats = [
    { value: 'RM13.27 juta', label: 'Jumlah dana Kumpulan & ahli (Ogos 2024)' },
    { value: '3,431', label: 'Jumlah Ahli & Pewakaf (2024)' },
    { value: 'RM206,356', label: 'Kutipan wakaf tahun 2024' },
    { value: '4', label: 'Sektor pelaburan strategik' },
];

const collections = [
    { year: 2014, amount: 303500 },
    { year: 2015, amount: 737100 },
    { year: 2016, amount: 797181 },
    { year: 2017, amount: 2696466 },
    { year: 2018, amount: 8030924 },
    { year: 2019, amount: 104968 },
    { year: 2020, amount: 141377 },
    { year: 2021, amount: 172172 },
    { year: 2022, amount: 36972 },
    { year: 2023, amount: 47073 },
    { year: 2024, amount: 206356 },
];
const timeline = [
    { date: '17 Julai 2024', title: 'Meja Bulat bersama Menteri Ekonomi', body: 'DPIM mengusulkan Formula Waqaf Korporat® sebagai instrumen baharu memperkukuh daya saing ekonomi ummah.' },
    { date: '22 Feb 2024', title: 'MoU dengan Wakaf Pulau Pinang', body: 'Membangunkan inisiatif teknologi pendidikan di bawah platform EduWAQF.' },
    { date: '6 Nov 2024', title: 'Kunjungan ke Jabatan Perdana Menteri', body: 'Membentangkan model Waqaf Korporat® kepada YAB Perdana Menteri, menekankan tadbir urus telus dan kelestarian aset wakaf.' },
    { date: '13 Dis 2024', title: 'Dialog Hal Ehwal Agama JPM', body: 'Bersama delegasi Awqaf New Zealand, membincangkan waqaf korporat sebagai instrumen ekonomi Islam alternatif.' },
    { date: '2024–2025', title: 'MoU Al-Mashoor International Islamic School', body: 'Kerjasama bersama MAINPP & YIPP menubuhkan sekolah Islam antarabangsa pertama di Pulau Pinang.' },
];
</script>

<template>
    <Head title="Waqaf Korporat untuk Kelestarian Ummah" />

    <PublicLayout>
        <section class="relative overflow-hidden bg-slate-950">
            <svg class="absolute inset-0 h-full w-full opacity-[0.07]" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="hero-grid" width="56" height="56" patternUnits="userSpaceOnUse">
                        <path d="M 56 0 L 0 0 0 56" fill="none" stroke="white" stroke-width="1" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#hero-grid)" />
            </svg>
            <div class="absolute -left-32 -top-32 h-96 w-96 rounded-full bg-emerald-600/30 blur-3xl"></div>
            <div class="absolute -bottom-40 right-0 h-96 w-96 rounded-full bg-amber-500/10 blur-3xl"></div>

            <div class="relative mx-auto max-w-7xl px-6 py-28 lg:px-8 lg:py-36">
                <div class="max-w-2xl">
                    <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-xs font-medium text-emerald-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                        Waqaf Korporat® · Sejak 1998
                    </div>
                    <h1 class="mt-6 text-5xl font-bold leading-[1.1] tracking-tight text-white sm:text-6xl">
                        Membina kelestarian ummah menerusi waqaf korporat.
                    </h1>
                    <p class="mt-6 max-w-xl text-lg leading-relaxed text-slate-300">
                        Setiap sumbangan wakaf disalurkan secara bertadbir urus baik, memberi manfaat berterusan
                        kepada pendidikan, kesihatan dan kebajikan komuniti.
                    </p>
                    <div class="mt-10 flex flex-wrap gap-4">
                        <Link
                            :href="route('waqaf.howto')"
                            class="rounded-lg bg-emerald-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-950/50 transition hover:bg-emerald-500"
                        >
                            Mulakan Wakaf Anda
                        </Link>
                        <a
                            :href="$page.props.portalUrl"
                            class="rounded-lg border border-white/15 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10"
                        >
                            Masuk ke Portal Pewakaf
                        </a>
                    </div>

                    <div class="mt-14 flex flex-wrap gap-x-8 gap-y-3 border-t border-white/10 pt-8 text-xs text-slate-400">
                        <span class="flex items-center gap-2">
                            <span class="h-1 w-1 rounded-full bg-emerald-400"></span>
                            Patuh Syariah
                        </span>
                        <span class="flex items-center gap-2">
                            <span class="h-1 w-1 rounded-full bg-emerald-400"></span>
                            Tadbir Urus Telus
                        </span>
                        <span class="flex items-center gap-2">
                            <span class="h-1 w-1 rounded-full bg-emerald-400"></span>
                            Laporan Kewangan Diaudit
                        </span>
                        <span class="flex items-center gap-2">
                            <span class="h-1 w-1 rounded-full bg-emerald-400"></span>
                            Institusi Waqaf Korporat Pertama Malaysia
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <section class="border-b border-slate-100 bg-white py-16">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid grid-cols-2 gap-8 sm:grid-cols-4">
                    <div v-for="(stat, i) in stats" :key="stat.label" class="text-center">
                        <component :is="statIcons[i]" class="mx-auto h-6 w-6 text-emerald-600" />
                        <div class="mt-3 text-3xl font-bold text-emerald-700">{{ stat.value }}</div>
                        <div class="mt-2 text-xs text-slate-500">{{ stat.label }}</div>
                    </div>
                </div>
                <p class="mt-8 text-center text-xs text-slate-500">
                    Berdasarkan Laporan Tahunan 2024 yang diaudit — lihat
                    <Link :href="route('korporat.reports')" class="text-emerald-700 underline decoration-emerald-700/40 underline-offset-2 hover:decoration-emerald-700">Laporan Tahunan &amp; Penyata Kewangan</Link>
                    penuh.
                </p>
            </div>
        </section>

        <section class="relative overflow-hidden bg-white py-24">
            <div class="mx-auto max-w-4xl px-6 text-center lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Visi Pengasas</p>
                <h2 class="mt-3 text-4xl font-bold leading-tight text-slate-900">
                    Satu idea. Satu institusi. Satu gerakan yang berterusan.
                </h2>
            </div>

            <div class="mx-auto mt-16 grid max-w-6xl grid-cols-1 gap-8 px-6 lg:grid-cols-3 lg:px-8">
                <div class="rounded-2xl border border-slate-100 p-8">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Idea</span>
                    <h3 class="mt-3 text-lg font-semibold text-slate-900">Wakaf sebagai instrumen ekonomi</h3>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">
                        Allahyarham Tan Sri Muhammad Ali Hashim percaya wakaf bukan sekadar amal — ia boleh menjadi
                        enjin ekonomi. Falsafah "Jihad Bisnes" baginda menyatukan semangat keusahawanan dengan
                        tanggungjawab wakaf, mencabar andaian bahawa institusi Islam mesti bergantung sepenuhnya
                        kepada derma.
                    </p>
                </div>

                <div class="rounded-2xl border border-emerald-100 bg-emerald-50/50 p-8">
                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Institusi</span>
                    <h3 class="mt-3 text-lg font-semibold text-slate-900">WANCorp, 1998 → hampir RM800 juta</h3>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">
                        Idea itu dibuktikan menerusi Waqaf An-Nur Corporation Berhad — institusi wakaf korporat
                        pertama di Malaysia. Aset wakaf berkembang daripada RM250 juta kepada hampir RM800 juta
                        dalam tempoh tiga tahun, membuktikan model ini bukan teori.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-100 p-8">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Gerakan</span>
                    <h3 class="mt-3 text-lg font-semibold text-slate-900">AWQAF meneruskan warisan</h3>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">
                        Wakaf Korporat® kini konsep berdaftar yang dilesenkan kepada AWQAF Holdings Berhad —
                        bukan lagi satu syarikat sahaja, tetapi asas kepada gerakan wakaf korporat yang lebih luas
                        di Malaysia.
                    </p>
                </div>
            </div>

            <div class="mx-auto mt-10 max-w-4xl px-6 text-center lg:px-8">
                <Link :href="route('korporat.overview')" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-700 hover:underline">
                    <img
                        src="/images/pengasas-tan-sri-muhammad-ali-hashim.png"
                        alt="Allahyarham Tan Sri Muhammad Ali Hashim"
                        class="h-8 w-8 rounded-full bg-slate-100 object-cover object-top ring-2 ring-emerald-100"
                    />
                    Kenali Allahyarham Tan Sri Muhammad Ali Hashim →
                </Link>
            </div>
        </section>

        <section class="bg-slate-50 py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="text-center">
                    <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Pengalaman Unik AWQAF</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900">Perjalanan Wakaf Anda</h2>
                    <p class="mx-auto mt-3 max-w-2xl text-slate-500">
                        Wakaf bersama AWQAF bukan satu transaksi — ia satu perjalanan yang direkod dari hari pertama.
                    </p>
                </div>

                <div class="mt-14 flex snap-x gap-3 overflow-x-auto pb-4">
                    <button
                        v-for="(step, i) in journey"
                        :key="step.title"
                        type="button"
                        class="flex w-32 flex-shrink-0 snap-start flex-col items-center gap-3 rounded-2xl border p-4 text-center transition sm:w-auto sm:flex-1"
                        :class="activeJourneyStep === i
                            ? 'border-emerald-300 bg-emerald-50 shadow-md'
                            : 'border-slate-200 bg-white hover:border-emerald-200'"
                        @mouseenter="activeJourneyStep = i"
                        @click="activeJourneyStep = i"
                    >
                        <div
                            class="flex h-11 w-11 items-center justify-center rounded-xl"
                            :class="activeJourneyStep === i ? 'bg-emerald-700 text-white' : 'bg-slate-100 text-slate-500'"
                        >
                            <component :is="step.icon" class="h-5 w-5" />
                        </div>
                        <span class="text-xs font-semibold" :class="activeJourneyStep === i ? 'text-emerald-700' : 'text-slate-700'">
                            {{ i + 1 }}. {{ step.title }}
                        </span>
                    </button>
                </div>

                <div class="mt-8 rounded-2xl border border-emerald-100 bg-white p-6 text-center shadow-sm sm:p-8">
                    <p class="text-sm font-semibold text-emerald-700">{{ journey[activeJourneyStep].title }}</p>
                    <p class="mx-auto mt-2 max-w-xl text-slate-600">{{ journey[activeJourneyStep].body }}</p>
                </div>
            </div>
        </section>

        <section class="relative overflow-hidden bg-slate-950 py-24">
            <div class="absolute -right-24 top-1/2 h-80 w-80 -translate-y-1/2 rounded-full bg-emerald-600/10 blur-3xl"></div>
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-12 lg:grid-cols-3">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wider text-emerald-400">Ketelusan Kewangan</p>
                        <h2 class="mt-3 text-3xl font-bold text-white">11 tahun kutipan wakaf, direkod dan didedahkan.</h2>
                        <p class="mt-4 text-sm text-slate-300">
                            Kami paparkan data sebenar — termasuk tahun mencabar — kerana ketelusan adalah asas
                            kepercayaan pewakaf. Setiap angka disahkan menerusi Penyata Kewangan Diaudit tahunan.
                        </p>
                        <Link :href="route('korporat.reports')" class="mt-6 inline-block text-sm font-semibold text-emerald-400 hover:underline">
                            Lihat Laporan Tahunan penuh →
                        </Link>
                    </div>

                    <div class="lg:col-span-2">
                        <CollectionChart :data="collections" dark />
                    </div>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div class="text-center">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Portfolio Pelaburan</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Aset wakaf yang bekerja untuk Ummah</h2>
                <p class="mx-auto mt-3 max-w-2xl text-slate-500">
                    Dana wakaf disalurkan ke dalam perniagaan strategik yang menjana pendapatan lestari,
                    yang kemudiannya disalurkan semula untuk manfaat komuniti.
                </p>
            </div>

            <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-3">
                <div class="rounded-2xl border border-slate-100 p-8 transition hover:border-emerald-200 hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                        <component :is="portfolioIcons[0]" class="h-6 w-6" />
                    </div>
                    <h3 class="mt-4 font-semibold text-slate-900">Pendidikan</h3>
                    <p class="mt-2 text-sm text-slate-500">
                        Al-Mashoor International Islamic School (AMIIS) di Pulau Pinang — kerjasama strategik
                        bersama MAINPP &amp; YIPP — serta platform digital EDEX/EDEXplore yang menghubungkan
                        pelajar dengan peluang biasiswa dan institusi pendidikan Islam.
                    </p>
                </div>
                <div class="rounded-2xl border border-slate-100 p-8 transition hover:border-emerald-200 hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                        <component :is="portfolioIcons[1]" class="h-6 w-6" />
                    </div>
                    <h3 class="mt-4 font-semibold text-slate-900">Kesihatan &amp; Kesejahteraan</h3>
                    <p class="mt-2 text-sm text-slate-500">
                        CURVES, rangkaian pusat kecergasan khusus wanita di bawah AHB Wellness Sdn Bhd — kini
                        beroperasi di 3 cawangan dengan sasaran berkembang ke 10 cawangan dalam tempoh 3 tahun.
                    </p>
                </div>
                <div class="rounded-2xl border border-slate-100 p-8 transition hover:border-emerald-200 hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                        <component :is="portfolioIcons[2]" class="h-6 w-6" />
                    </div>
                    <h3 class="mt-4 font-semibold text-slate-900">Teknologi Kewangan Wakaf</h3>
                    <p class="mt-2 text-sm text-slate-500">
                        Platform "Infaq" oleh AHB Fintech Sdn Bhd memudahkan penajaan iftar Ramadan di
                        masjid/surau dengan jejak niat yang jelas, resit segera dan pelaporan telus.
                    </p>
                </div>
            </div>

            <div class="mt-8 rounded-2xl bg-slate-50 p-6 text-sm text-slate-500">
                <strong class="text-slate-700">Ketelusan portfolio:</strong> Sepanjang 2024, Lembaga Pengarah
                membuat keputusan menamatkan dua unit yang tidak lagi mampan dari segi kos (Al-Hamra Integrated
                School dan Damai Senior Care Centre), sambil menumpukan sumber kepada sektor yang menunjukkan
                daya tahan dan potensi pertumbuhan jangka sederhana-panjang — selaras dengan tema Laporan
                Tahunan 2024, "Memacu Pertumbuhan, Kelestarian Wakaf".
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-slate-900">Kategori Pewakaf</h2>
                <p class="mx-auto mt-3 max-w-xl text-slate-500">
                    Tahap keahlian ditentukan secara automatik mengikut jumlah wakaf terkumpul — gelang Tera Wakaf
                    anda terisi ketika anda mendekati tahap seterusnya.
                </p>
                <div class="mt-6 flex justify-center">
                    <WaqafSeal size="sm" />
                </div>
            </div>

            <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div
                    v-for="tier in tiers"
                    :key="tier.name"
                    class="overflow-hidden rounded-2xl bg-gradient-to-br p-6 shadow-md transition hover:-translate-y-1 hover:shadow-lg"
                    :class="[tier.gradient, tier.text]"
                >
                    <div class="text-lg font-semibold">{{ tier.name }}</div>
                    <div class="mt-2 text-sm opacity-80">{{ tier.range }}</div>
                </div>
            </div>

            <div class="mt-10 text-center">
                <Link :href="route('waqaf.categories')" class="text-sm font-semibold text-emerald-700 hover:underline">
                    Lihat butiran penuh kategori pewakaf →
                </Link>
            </div>
        </section>

        <section class="bg-slate-50 py-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-slate-900">Program Kebajikan</h2>
                    <p class="mt-3 text-slate-500">
                        Dana wakaf disalurkan menerusi program kebajikan yang berterusan.
                    </p>
                </div>

                <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-3">
                    <div
                        v-for="program in programs"
                        :key="program.name"
                        class="flex flex-col rounded-2xl bg-white p-8 shadow-sm transition hover:shadow-md"
                    >
                        <div class="flex items-center justify-between">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                                <component :is="programIcons[program.name]" class="h-6 w-6" />
                            </div>
                            <div class="text-right">
                                <div class="text-lg font-bold text-slate-900">{{ program.stat }}</div>
                                <div class="text-[10px] uppercase tracking-wide text-slate-500">{{ program.statLabel }}</div>
                            </div>
                        </div>
                        <div class="mt-4 text-xl font-semibold text-emerald-700">{{ program.name }}</div>
                        <p class="mt-3 text-sm text-slate-500">{{ program.description }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div class="text-center">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Kisah Impak</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Di sebalik setiap angka, ada kehidupan</h2>
                <p class="mx-auto mt-3 max-w-2xl text-slate-500">
                    Ruang ini dikhaskan untuk kisah sebenar penerima manfaat wakaf — dikemas kini secara berkala
                    oleh pihak pengurusan AWQAF.
                </p>
            </div>

            <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div
                    v-for="category in impactCategories"
                    :key="category.title"
                    class="rounded-2xl border border-dashed border-slate-200 bg-slate-50/50 p-6"
                >
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white text-slate-500 shadow-sm">
                        <component :is="category.icon" class="h-6 w-6" />
                    </div>
                    <h3 class="mt-4 font-semibold text-slate-700">{{ category.title }}</h3>
                    <p class="mt-2 text-xs text-slate-500">Akan dikemaskini oleh pihak AWQAF.</p>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-6xl px-6 py-20 lg:px-8">
            <div class="text-center">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Pengalaman Digital</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Lebih daripada akaun ahli</h2>
                <p class="mx-auto mt-3 max-w-2xl text-slate-500">
                    Portal Pewakaf ialah rekod sepanjang hayat perjalanan wakaf anda — bukan sekadar log masuk
                    dan resit, tetapi satu naratif berterusan yang membesar bersama sumbangan anda.
                </p>
            </div>

            <div class="mx-auto mt-12 max-w-4xl overflow-hidden rounded-2xl border border-slate-200 shadow-xl">
                <div class="flex items-center gap-2 border-b border-slate-100 bg-slate-50 px-4 py-3">
                    <span class="h-2.5 w-2.5 rounded-full bg-slate-300"></span>
                    <span class="h-2.5 w-2.5 rounded-full bg-slate-300"></span>
                    <span class="h-2.5 w-2.5 rounded-full bg-slate-300"></span>
                    <span class="ml-3 text-xs text-slate-500">member.awqaf.my</span>
                    <span class="ml-auto rounded-full bg-slate-200 px-2 py-0.5 text-[10px] font-medium text-slate-600">Paparan Contoh</span>
                </div>
                <div class="bg-slate-900 p-6 sm:p-8">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-5 sm:items-center">
                        <div class="flex justify-center sm:col-span-2">
                            <div class="rounded-2xl bg-white/5 p-4">
                                <WaqafSeal size="md" />
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 sm:col-span-3">
                            <div class="rounded-xl bg-white/5 p-4">
                                <div class="text-[10px] uppercase tracking-wide text-slate-300">Resit</div>
                                <div class="mt-2 text-sm font-semibold text-white">Muat Turun Segera</div>
                            </div>
                            <div class="rounded-xl bg-white/5 p-4">
                                <div class="text-[10px] uppercase tracking-wide text-slate-300">Penyata Tahunan</div>
                                <div class="mt-2 text-sm font-semibold text-white">Ringkasan Peribadi</div>
                            </div>
                            <div class="rounded-xl bg-white/5 p-4">
                                <div class="text-[10px] uppercase tracking-wide text-slate-300">Sijil Keahlian</div>
                                <div class="mt-2 text-sm font-semibold text-white">Digital &amp; Rasmi</div>
                            </div>
                            <div class="rounded-xl bg-white/5 p-4">
                                <div class="text-[10px] uppercase tracking-wide text-slate-300">Ringkasan Impak</div>
                                <div class="mt-2 text-sm font-semibold text-white">Peribadi &amp; Telus</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between bg-white px-6 py-4">
                    <p class="text-xs text-slate-500">Satu rekod yang membesar bersama setiap sumbangan anda.</p>
                    <a
                        :href="$page.props.portalUrl"
                        class="inline-flex items-center gap-1 rounded-lg bg-emerald-700 px-4 py-2 text-xs font-semibold text-white transition hover:bg-emerald-800"
                    >
                        Masuk ke Portal Pewakaf
                        <ArrowRightIcon class="h-3.5 w-3.5" />
                    </a>
                </div>
            </div>
        </section>

        <section class="relative overflow-hidden bg-slate-950 py-24">
            <div class="absolute -left-24 top-0 h-72 w-72 rounded-full bg-emerald-600/15 blur-3xl"></div>
            <div class="relative mx-auto max-w-6xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <p class="text-sm font-semibold uppercase tracking-wider text-emerald-400">Hala Tuju Strategik</p>
                    <h2 class="mt-3 text-3xl font-bold text-white">AWQAF 2035</h2>
                    <p class="mt-4 text-slate-500">
                        Membina di atas momentum sedia ada — bergerak ke arah wakaf korporat yang lebih inklusif,
                        digital dan mampan untuk generasi akan datang.
                    </p>
                </div>

                <div class="mx-auto mt-10 flex max-w-3xl flex-wrap justify-center gap-3">
                    <span
                        v-for="fact in momentum2024"
                        :key="fact"
                        class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-xs text-slate-300"
                    >
                        {{ fact }}
                    </span>
                </div>

                <div class="mt-14 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <div v-for="theme in futureThemes" :key="theme.title" class="rounded-2xl border border-white/10 bg-white/5 p-6">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-600/20 text-emerald-400">
                            <component :is="theme.icon" class="h-6 w-6" />
                        </div>
                        <h3 class="mt-4 font-semibold text-white">{{ theme.title }}</h3>
                        <p class="mt-2 text-sm text-slate-300">{{ theme.body }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-6xl px-6 py-20 lg:px-8">
            <div class="text-center">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Kepercayaan</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Dibina di atas ketelusan, bukan janji</h2>
            </div>

            <div class="mt-12 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <component
                    :is="item.external ? 'a' : Link"
                    v-for="item in trustLayer"
                    :key="item.title"
                    :href="item.href()"
                    class="flex items-start gap-4 rounded-2xl border border-slate-100 p-6 transition hover:border-emerald-200 hover:bg-emerald-50/50 hover:shadow-md"
                >
                    <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                        <component :is="item.icon" class="h-6 w-6" />
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-900">{{ item.title }}</h3>
                        <p class="mt-1 text-sm text-slate-500">{{ item.body }}</p>
                    </div>
                </component>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div class="rounded-3xl bg-emerald-700 px-10 py-16 text-center">
                <h2 class="text-3xl font-bold text-white">Sertai Gerakan Wakaf Korporat AWQAF</h2>
                <p class="mx-auto mt-4 max-w-xl text-emerald-50">
                    Mulakan rekod wakaf anda, jejak sumbangan anda, dan menjadi sebahagian daripada komuniti
                    pewakaf jangka panjang.
                </p>
                <div class="mt-8 flex justify-center gap-4">
                    <Link
                        :href="route('waqaf.howto')"
                        class="rounded-lg bg-white px-6 py-3 text-sm font-semibold text-emerald-700 transition hover:bg-emerald-50"
                    >
                        Mulakan Wakaf Anda
                    </Link>
                    <a
                        :href="$page.props.portalUrl"
                        class="rounded-lg border border-white/30 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10"
                    >
                        Masuk ke Portal Pewakaf
                    </a>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
