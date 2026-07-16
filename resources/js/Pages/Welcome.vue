<script setup>
import CollectionChart from '@/Components/CollectionChart.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import {
    AcademicCapIcon,
    ArrowRightIcon,
    BanknotesIcon,
    BuildingLibraryIcon,
    CameraIcon,
    ChartBarIcon,
    CpuChipIcon,
    DocumentCheckIcon,
    HeartIcon,
    ReceiptPercentIcon,
    ScaleIcon,
    ShieldCheckIcon,
    Square3Stack3DIcon,
    UserGroupIcon,
    UsersIcon,
} from '@heroicons/vue/24/outline';
import { Head, Link, usePage } from '@inertiajs/vue3';

const page = usePage();

// Verified facts only (Laporan Tahunan 2024 diaudit; laporan tersedia 2015–2024).
const facts = [
    { icon: BuildingLibraryIcon, value: 'Sejak 1998', label: 'Perintis model wakaf korporat di Malaysia' },
    { icon: UsersIcon, value: '3,431', label: 'Ahli & pewakaf (2024)' },
    { icon: BanknotesIcon, value: 'RM13.27 juta', label: 'Dana wakaf Kumpulan & ahli (Ogos 2024)' },
    { icon: DocumentCheckIcon, value: '2015–2024', label: 'Laporan Tahunan diaudit tersedia' },
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

const portfolioIcons = [AcademicCapIcon, HeartIcon, CpuChipIcon];

const governance = [
    { icon: BuildingLibraryIcon, t: 'Akta Syarikat 2016', d: 'Diperbadankan dan tertakluk kepada keperluan pelaporan korporat.' },
    { icon: UsersIcon, t: 'Lembaga Pengarah', d: 'Sembilan ahli — pengawasan strategik institusi.' },
    { icon: ChartBarIcon, t: 'Jawatankuasa Pelaburan & Audit', d: 'Dua jawatankuasa lembaga yang berasingan.' },
    { icon: DocumentCheckIcon, t: 'Penyata Kewangan Diaudit', d: 'Diaudit juruaudit luar dan didedahkan setiap tahun.' },
];

const programs = [
    { name: 'ZuriatCARE', stat: 'RM75,770', statLabel: 'disalurkan tahun 2023', description: 'Sokongan kesihatan mental, rujukan dan bantuan komuniti, dijalankan bersama Kementerian Kesihatan Malaysia.' },
    { name: 'EduWAQF', stat: 'RM20,000', statLabel: 'biasiswa disalurkan', description: 'Bantuan kewangan kepada pelajar institusi pengajian tinggi yang memerlukan.' },
    { name: 'AWQAF4Health', stat: 'Akan datang', statLabel: 'butiran dikemas kini', description: 'Program kesihatan komuniti yang sedang dibangunkan.' },
];
const programIcons = { ZuriatCARE: HeartIcon, EduWAQF: AcademicCapIcon, AWQAF4Health: UserGroupIcon };

// Aktiviti korporat 2024 (acara sebenar).
const news = [
    { date: '6 November 2024', title: 'Kunjungan ke Jabatan Perdana Menteri', body: 'Membentangkan model Waqaf Korporat® kepada YAB Perdana Menteri.' },
    { date: '17 Julai 2024', title: 'Meja Bulat bersama Menteri Ekonomi', body: 'Membentangkan Formula Waqaf Korporat® sebagai instrumen pembangunan ekonomi ummah.' },
    { date: '22 Februari 2024', title: 'MoU dengan Wakaf Pulau Pinang', body: 'Kerjasama inisiatif teknologi pendidikan bersama MAINPP dan YIPP.' },
];

const futureThemes = [
    { icon: AcademicCapIcon, title: 'Pendidikan', body: 'Meluaskan akses pendidikan Islam menerusi platform digital dan institusi strategik.' },
    { icon: HeartIcon, title: 'Kesihatan', body: 'Mengembangkan inisiatif kesihatan dan kesejahteraan komuniti.' },
    { icon: CpuChipIcon, title: 'Teknologi', body: 'Memperkukuh sistem digital wakaf untuk ketelusan dan capaian yang lebih luas.' },
    { icon: UserGroupIcon, title: 'Komuniti', body: 'Memperluas penyertaan awam dalam ekonomi wakaf korporat.' },
    { icon: ScaleIcon, title: 'Kelestarian Aset', body: 'Mengekalkan disiplin tadbir urus dan pertumbuhan aset jangka panjang.' },
    { icon: BuildingLibraryIcon, title: 'Pembangunan Ummah', body: 'Menyumbang kepada pembangunan sosioekonomi ummah secara berterusan.' },
];

const trustLayer = [
    { icon: DocumentCheckIcon, title: 'Laporan Diaudit', body: 'Penyata kewangan disahkan juruaudit setiap tahun.', href: () => route('korporat.reports') },
    { icon: ScaleIcon, title: 'Tadbir Urus Korporat', body: 'Beroperasi di bawah Akta Syarikat 2016.', href: () => route('ketelusan') },
    { icon: UserGroupIcon, title: 'Lembaga Pengarah', body: 'Sembilan ahli, diselia jawatankuasa khusus.', href: () => route('korporat.overview') },
    { icon: ShieldCheckIcon, title: 'Pusat Ketelusan', body: 'Laporan dan maklumat tadbir urus di satu tempat.', href: () => route('ketelusan') },
    { icon: Square3Stack3DIcon, title: 'Portal Pewakaf', body: 'Akses rekod wakaf dan resit ahli.', href: () => page.props.portalUrl, external: true },
    { icon: ReceiptPercentIcon, title: 'Pendedahan Kewangan', body: 'Sebelas tahun data kutipan didedahkan.', href: () => route('korporat.reports') },
];
</script>

<template>
    <Head title="Membangunkan Wakaf Korporat untuk Manfaat Ummah" />

    <PublicLayout>
        <!-- Hero -->
        <section class="relative overflow-hidden bg-slate-950">
            <svg class="absolute inset-0 h-full w-full opacity-[0.06]" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="hero-grid" width="56" height="56" patternUnits="userSpaceOnUse">
                        <path d="M 56 0 L 0 0 0 56" fill="none" stroke="white" stroke-width="1" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#hero-grid)" />
            </svg>
            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>

            <div class="relative mx-auto flex min-h-[74vh] max-w-7xl items-center px-6 py-28 lg:px-8 lg:py-36">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold uppercase tracking-wider text-emerald-400">AWQAF Holdings Berhad</p>
                    <h1 class="mt-4 text-4xl font-bold leading-[1.12] tracking-tight text-white sm:text-5xl">
                        Membangunkan Wakaf Korporat untuk Manfaat Ummah
                    </h1>
                    <p class="mt-6 max-w-2xl text-lg leading-relaxed text-slate-300">
                        AWQAF Holdings Berhad ialah sebuah institusi Wakaf Korporat yang mengurus dan membangunkan
                        aset serta inisiatif wakaf melalui pendekatan korporat, tadbir urus yang teratur dan
                        pelaksanaan yang berfokus kepada manfaat jangka panjang.
                    </p>
                    <div class="mt-10 flex flex-wrap gap-4">
                        <Link :href="route('korporat.overview')" class="rounded-lg bg-emerald-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-950/50 transition hover:bg-emerald-500">
                            Kenali AWQAF
                        </Link>
                        <Link :href="route('korporat.reports')" class="rounded-lg border border-white/15 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                            Laporan Korporat
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- Verified facts strip -->
        <section class="border-b border-slate-100 bg-white py-16">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid grid-cols-2 gap-8 sm:grid-cols-4">
                    <div v-for="fact in facts" :key="fact.label" class="text-center">
                        <component :is="fact.icon" class="mx-auto h-6 w-6 text-emerald-600" />
                        <div class="mt-3 text-2xl font-bold text-emerald-700 sm:text-3xl">{{ fact.value }}</div>
                        <div class="mt-2 text-xs text-slate-500">{{ fact.label }}</div>
                    </div>
                </div>
                <p class="mt-8 text-center text-xs text-slate-500">
                    Angka berdasarkan Laporan Tahunan 2024 yang diaudit — lihat
                    <Link :href="route('korporat.reports')" class="text-emerald-700 underline decoration-emerald-700/40 underline-offset-2 hover:decoration-emerald-700">Laporan Tahunan &amp; Penyata Kewangan</Link>.
                </p>
            </div>
        </section>

        <!-- About AWQAF -->
        <section class="bg-white py-24">
            <div class="mx-auto max-w-4xl px-6 text-center lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Tentang AWQAF</p>
                <h2 class="mt-3 text-3xl font-bold leading-tight text-slate-900">
                    Institusi Wakaf Korporat berpangkalan komuniti
                </h2>
                <p class="mx-auto mt-4 max-w-2xl text-slate-500">
                    AWQAF Holdings Berhad mengurus dan membangunkan aset serta inisiatif wakaf melalui pendekatan
                    korporat dan tadbir urus yang teratur, dengan fokus kepada manfaat jangka panjang kepada masyarakat.
                </p>
            </div>

            <div class="mx-auto mt-16 grid max-w-6xl grid-cols-1 gap-8 px-6 lg:grid-cols-3 lg:px-8">
                <div class="rounded-2xl border border-slate-100 p-8">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Pengurusan Wakaf</span>
                    <h3 class="mt-3 text-lg font-semibold text-slate-900">Pengurusan aset wakaf</h3>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">Aset wakaf diuruskan secara berterusan. Modal asal dikekalkan sebagai wakaf, manakala hasilnya disalurkan untuk manfaat masyarakat.</p>
                </div>
                <div class="rounded-2xl border border-emerald-100 bg-emerald-50/50 p-8">
                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Wakaf Korporat</span>
                    <h3 class="mt-3 text-lg font-semibold text-slate-900">Waqaf Korporat®</h3>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">Konsep berdaftar yang dilesenkan kepada AWQAF Holdings Berhad — pendekatan membangunkan aset dan perniagaan berasaskan wakaf. Turut dikaji Universiti Oxford (2010).</p>
                </div>
                <div class="rounded-2xl border border-slate-100 p-8">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Tadbir Urus</span>
                    <h3 class="mt-3 text-lg font-semibold text-slate-900">Struktur korporat</h3>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">Diperbadankan di bawah Akta Syarikat 2016, diselia Lembaga Pengarah serta Jawatankuasa Pelaburan dan Audit, dengan penyata kewangan diaudit setiap tahun.</p>
                </div>
            </div>

            <div class="mx-auto mt-12 max-w-4xl px-6 text-center lg:px-8">
                <p class="text-sm leading-relaxed text-slate-500">
                    Model wakaf korporat ini berasal daripada Waqaf An-Nur Corporation (1998), institusi wakaf
                    korporat pertama di Malaysia, dan kini diteruskan oleh AWQAF Holdings Berhad.
                    <Link :href="route('korporat.overview')" class="font-semibold text-emerald-700 underline decoration-emerald-700/40 underline-offset-2 hover:decoration-emerald-700">Maklumat korporat lanjut →</Link>
                </p>
            </div>
        </section>

        <!-- Business & programme areas -->
        <section class="bg-slate-50 py-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="text-center">
                    <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Bidang Perniagaan &amp; Pelaburan</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900">Bidang perniagaan dan pelaburan wakaf</h2>
                    <p class="mx-auto mt-3 max-w-2xl text-slate-500">Dana wakaf disalurkan ke dalam bidang perniagaan dan pelaburan strategik yang menjana pendapatan lestari untuk manfaat komuniti.</p>
                </div>
                <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-3">
                    <div class="rounded-2xl border border-slate-100 bg-white p-8">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700"><component :is="portfolioIcons[0]" class="h-6 w-6" /></div>
                        <h3 class="mt-4 font-semibold text-slate-900">Pendidikan</h3>
                        <p class="mt-2 text-sm text-slate-500">Al-Mashoor International Islamic School (AMIIS) di Pulau Pinang, kerjasama bersama MAINPP dan YIPP, serta platform digital EDEX/EDEXplore.</p>
                    </div>
                    <div class="rounded-2xl border border-slate-100 bg-white p-8">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700"><component :is="portfolioIcons[1]" class="h-6 w-6" /></div>
                        <h3 class="mt-4 font-semibold text-slate-900">Kesihatan &amp; Kesejahteraan</h3>
                        <p class="mt-2 text-sm text-slate-500">CURVES, rangkaian pusat kecergasan khusus wanita di bawah AHB Wellness Sdn Bhd, kini di tiga cawangan.</p>
                    </div>
                    <div class="rounded-2xl border border-slate-100 bg-white p-8">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700"><component :is="portfolioIcons[2]" class="h-6 w-6" /></div>
                        <h3 class="mt-4 font-semibold text-slate-900">Teknologi Kewangan Wakaf</h3>
                        <p class="mt-2 text-sm text-slate-500">Platform "Infaq" oleh AHB Fintech Sdn Bhd memudahkan penajaan iftar Ramadan dengan resit segera dan pelaporan.</p>
                    </div>
                </div>
                <div class="mt-8 rounded-2xl border border-slate-100 bg-white p-6 text-sm text-slate-500">
                    <strong class="text-slate-700">Nota portfolio:</strong> Pada tahun 2024, Lembaga Pengarah menamatkan dua unit yang tidak lagi mampan (Al-Hamra Integrated School dan Damai Senior Care Centre) dan menumpukan sumber kepada sektor yang berdaya tahan, selaras dengan tema Laporan Tahunan 2024.
                </div>
            </div>
        </section>

        <!-- Reports & disclosure -->
        <section class="relative overflow-hidden bg-slate-950 py-24">
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-12 lg:grid-cols-3">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wider text-emerald-400">Laporan &amp; Pendedahan Kewangan</p>
                        <h2 class="mt-3 text-3xl font-bold text-white">Kutipan wakaf tahunan, 2014–2024</h2>
                        <p class="mt-4 text-sm text-slate-300">Data kutipan wakaf tahunan seperti yang dilaporkan dalam Penyata Kewangan Diaudit AWQAF Holdings Berhad.</p>
                        <Link :href="route('korporat.reports')" class="mt-6 inline-block text-sm font-semibold text-emerald-400 hover:underline">Muat turun Laporan Tahunan →</Link>
                    </div>
                    <div class="lg:col-span-2"><CollectionChart :data="collections" dark /></div>
                </div>
            </div>
        </section>

        <!-- Governance -->
        <section class="bg-white py-24">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Tadbir Urus</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900">Struktur tadbir urus korporat</h2>
                </div>
                <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div v-for="g in governance" :key="g.t" class="flex gap-4 rounded-2xl border border-slate-100 p-6">
                        <component :is="g.icon" class="h-6 w-6 flex-none text-emerald-700" />
                        <div>
                            <h3 class="font-semibold text-slate-900">{{ g.t }}</h3>
                            <p class="mt-1 text-sm text-slate-500">{{ g.d }}</p>
                        </div>
                    </div>
                    <div class="flex gap-4 rounded-2xl border border-dashed border-slate-200 p-6 sm:col-span-2">
                        <ScaleIcon class="h-6 w-6 flex-none text-slate-400" />
                        <div>
                            <h3 class="font-semibold text-slate-900">Penasihat Syariah</h3>
                            <p class="mt-1 text-sm text-slate-400">Akan disahkan oleh pihak pengurusan AWQAF.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex flex-wrap gap-4">
                    <Link :href="route('korporat.overview')" class="rounded-lg bg-slate-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">Lembaga &amp; Struktur Korporat</Link>
                    <Link :href="route('ketelusan')" class="rounded-lg border border-slate-300 px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Pusat Ketelusan</Link>
                </div>

                <div class="mt-16 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <component
                        :is="item.external ? 'a' : Link"
                        v-for="item in trustLayer"
                        :key="item.title"
                        :href="item.href()"
                        class="flex items-start gap-4 rounded-2xl border border-slate-100 p-6 transition hover:border-emerald-200 hover:bg-emerald-50/50 hover:shadow-md"
                    >
                        <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700"><component :is="item.icon" class="h-6 w-6" /></div>
                        <div>
                            <h3 class="font-semibold text-slate-900">{{ item.title }}</h3>
                            <p class="mt-1 text-sm text-slate-500">{{ item.body }}</p>
                        </div>
                    </component>
                </div>
            </div>
        </section>

        <!-- Programmes & impact -->
        <section class="bg-slate-50 py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="text-center">
                    <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Program &amp; Manfaat</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900">Program kebajikan dan manfaat komuniti</h2>
                    <p class="mx-auto mt-3 max-w-2xl text-slate-500">Dana wakaf disalurkan menerusi program kebajikan yang berterusan.</p>
                </div>
                <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-3">
                    <div v-for="program in programs" :key="program.name" class="flex flex-col rounded-2xl bg-white p-8 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-amber-600"><component :is="programIcons[program.name]" class="h-6 w-6" /></div>
                            <div class="text-right">
                                <div class="text-lg font-bold text-slate-900">{{ program.stat }}</div>
                                <div class="text-[10px] uppercase tracking-wide text-slate-500">{{ program.statLabel }}</div>
                            </div>
                        </div>
                        <div class="mt-4 text-xl font-semibold text-emerald-700">{{ program.name }}</div>
                        <p class="mt-3 text-sm text-slate-500">{{ program.description }}</p>
                    </div>
                </div>

                <!-- Photo-ready placeholder (clearly marked; awaiting official AWQAF photography) -->
                <div class="mt-8 flex aspect-[21/9] items-center justify-center overflow-hidden rounded-2xl border-2 border-dashed border-slate-300 bg-white">
                    <div class="px-6 text-center">
                        <CameraIcon class="mx-auto h-8 w-8 text-slate-400" />
                        <p class="mt-3 text-xs font-semibold uppercase tracking-wider text-slate-500">Ruang Foto Program</p>
                        <p class="mx-auto mt-1 max-w-md text-sm text-slate-500">Foto rasmi program dan aktiviti AWQAF — untuk disediakan oleh pihak AWQAF.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- News -->
        <section class="bg-white py-20">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Berita &amp; Acara</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Aktiviti korporat 2024</h2>
                <div class="mt-10 divide-y divide-slate-100 border-t border-slate-100">
                    <article v-for="item in news" :key="item.title" class="grid gap-2 py-6 sm:grid-cols-4 sm:gap-6">
                        <div class="text-sm font-medium text-slate-400">{{ item.date }}</div>
                        <div class="sm:col-span-3">
                            <h3 class="font-semibold text-slate-900">{{ item.title }}</h3>
                            <p class="mt-1 text-sm text-slate-500">{{ item.body }}</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Strategic direction -->
        <section class="relative overflow-hidden bg-slate-950 py-24">
            <div class="relative mx-auto max-w-6xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <p class="text-sm font-semibold uppercase tracking-wider text-emerald-400">Hala Tuju Strategik</p>
                    <h2 class="mt-3 text-3xl font-bold text-white">AWQAF 2035</h2>
                    <p class="mt-4 text-slate-300">Hala tuju strategik AWQAF ke arah wakaf korporat yang lebih inklusif, digital dan mampan untuk generasi akan datang.</p>
                </div>
                <div class="mt-14 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <div v-for="theme in futureThemes" :key="theme.title" class="rounded-2xl border border-white/10 bg-white/5 p-6">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-600/20 text-emerald-400"><component :is="theme.icon" class="h-6 w-6" /></div>
                        <h3 class="mt-4 font-semibold text-white">{{ theme.title }}</h3>
                        <p class="mt-2 text-sm text-slate-300">{{ theme.body }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Member Portal & contact -->
        <section class="bg-white py-20">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Maklumat &amp; Hubungan</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Penyertaan pewakaf dan perhubungan</h2>
                <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-3">
                    <div class="rounded-2xl border border-slate-100 p-8">
                        <Square3Stack3DIcon class="h-6 w-6 text-emerald-700" />
                        <h3 class="mt-4 font-semibold text-slate-900">Portal Pewakaf</h3>
                        <p class="mt-2 text-sm text-slate-500">Akses rekod wakaf, resit dan tahap keahlian anda.</p>
                        <a :href="page.props.portalUrl" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-emerald-700 hover:underline">Masuk ke Portal <ArrowRightIcon class="h-4 w-4" /></a>
                    </div>
                    <div class="rounded-2xl border border-slate-100 p-8">
                        <BanknotesIcon class="h-6 w-6 text-emerald-700" />
                        <h3 class="mt-4 font-semibold text-slate-900">Cara Berwakaf</h3>
                        <p class="mt-2 text-sm text-slate-500">Maklumat kaedah menyalurkan wakaf kepada AWQAF Holdings Berhad.</p>
                        <Link :href="route('waqaf.howto')" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-emerald-700 hover:underline">Kaedah Berwakaf <ArrowRightIcon class="h-4 w-4" /></Link>
                    </div>
                    <div class="rounded-2xl border border-slate-100 p-8">
                        <BuildingLibraryIcon class="h-6 w-6 text-emerald-700" />
                        <h3 class="mt-4 font-semibold text-slate-900">Hubungi AWQAF</h3>
                        <p class="mt-2 text-sm text-slate-500">Pertanyaan korporat dan media melalui pejabat AWQAF Holdings Berhad.</p>
                        <Link :href="route('korporat.overview')" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-emerald-700 hover:underline">Maklumat Korporat <ArrowRightIcon class="h-4 w-4" /></Link>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
