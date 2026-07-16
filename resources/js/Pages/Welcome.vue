<script setup>
import CollectionChart from '@/Components/CollectionChart.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import {
    AcademicCapIcon,
    ArrowRightIcon,
    BanknotesIcon,
    BuildingLibraryIcon,
    CameraIcon,
    CpuChipIcon,
    DocumentCheckIcon,
    HeartIcon,
    ScaleIcon,
    Square3Stack3DIcon,
    UsersIcon,
} from '@heroicons/vue/24/outline';
import { Head, Link, usePage } from '@inertiajs/vue3';

const page = usePage();

// Verified facts only (Laporan Tahunan 2024 diaudit).
const facts = [
    { icon: UsersIcon, value: '3,431', label: 'Ahli & Pewakaf (2024)' },
    { icon: BanknotesIcon, value: 'RM13.27 juta', label: 'Dana Wakaf Kumpulan & Ahli (Ogos 2024)' },
    { icon: DocumentCheckIcon, value: 'Tersedia', label: 'Laporan Tahunan & Penyata Kewangan' },
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

const about = [
    { k: 'Pengurusan Wakaf', h: 'Pengurusan aset wakaf', b: 'Modal asal dikekalkan; hasilnya disalurkan untuk manfaat masyarakat.' },
    { k: 'Wakaf Korporat', h: 'Waqaf Korporat®', b: 'Konsep berdaftar yang dilesenkan kepada AWQAF Holdings Berhad.' },
    { k: 'Tadbir Urus', h: 'Struktur korporat', b: 'Diperbadankan di bawah Akta Syarikat 2016 dan diaudit setiap tahun.' },
];

const areas = [
    { icon: AcademicCapIcon, h: 'Pendidikan', b: 'Al-Mashoor International Islamic School dan platform EDEX.' },
    { icon: HeartIcon, h: 'Kesihatan & Kesejahteraan', b: 'CURVES di bawah AHB Wellness Sdn Bhd.' },
    { icon: CpuChipIcon, h: 'Teknologi Kewangan Wakaf', b: 'Platform "Infaq" oleh AHB Fintech Sdn Bhd.' },
];

const governance = [
    { icon: BuildingLibraryIcon, t: 'Akta Syarikat 2016', d: 'Diperbadankan di bawah keperluan pelaporan korporat.' },
    { icon: UsersIcon, t: 'Lembaga Pengarah', d: 'Sembilan ahli dengan pengawasan strategik.' },
    { icon: DocumentCheckIcon, t: 'Penyata Diaudit', d: 'Diaudit juruaudit luar setiap tahun.' },
];

const programs = [
    { name: 'Yayasan ZuriatCARE', category: 'Kebajikan & Kesihatan Mental', icon: HeartIcon },
    { name: 'EduWAQF', category: 'Pendidikan', icon: AcademicCapIcon },
    { name: 'AWQAF4Health', category: 'Kesihatan', icon: BuildingLibraryIcon },
];

const news = [
    { date: '6 November 2024', title: 'Kunjungan ke Jabatan Perdana Menteri' },
    { date: '17 Julai 2024', title: 'Meja Bulat bersama Menteri Ekonomi' },
    { date: '22 Februari 2024', title: 'MoU dengan Wakaf Pulau Pinang' },
];
</script>

<template>
    <Head title="Membangunkan Wakaf Korporat untuk Manfaat Ummah" />

    <PublicLayout>
        <!-- Hero -->
        <section class="relative overflow-hidden bg-slate-950">
            <svg class="absolute inset-0 h-full w-full opacity-[0.05]" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="hero-grid" width="64" height="64" patternUnits="userSpaceOnUse">
                        <path d="M 64 0 L 0 0 0 64" fill="none" stroke="white" stroke-width="1" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#hero-grid)" />
            </svg>
            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/30 to-transparent"></div>

            <div class="relative mx-auto flex min-h-[86vh] max-w-7xl items-center px-6 py-32 lg:px-8">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-emerald-400">AWQAF Holdings Berhad</p>
                    <h1 class="mt-6 text-4xl font-bold leading-[1.1] tracking-tight text-white sm:text-6xl">
                        Membangunkan Wakaf Korporat untuk Manfaat Ummah
                    </h1>
                    <p class="mt-8 max-w-xl text-lg leading-relaxed text-slate-300">
                        Sebuah institusi Wakaf Korporat yang mengurus dan membangunkan aset serta inisiatif wakaf
                        melalui pendekatan korporat dan tadbir urus yang teratur.
                    </p>
                    <div class="mt-12 flex flex-wrap gap-4">
                        <Link :href="route('korporat.overview')" class="rounded-lg bg-emerald-600 px-7 py-3.5 text-sm font-semibold text-white shadow-lg shadow-emerald-950/50 transition hover:bg-emerald-500">
                            Kenali AWQAF
                        </Link>
                        <Link :href="route('korporat.reports')" class="rounded-lg border border-white/15 px-7 py-3.5 text-sm font-semibold text-white transition hover:bg-white/10">
                            Laporan Korporat
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- Verified facts strip -->
        <section class="border-b border-slate-100 bg-white py-20">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-y-12 gap-x-8 sm:grid-cols-3">
                    <div v-for="fact in facts" :key="fact.label" class="text-center">
                        <component :is="fact.icon" class="mx-auto h-6 w-6 text-emerald-600" />
                        <div class="mt-4 text-2xl font-bold text-emerald-700 sm:text-3xl">{{ fact.value }}</div>
                        <div class="mx-auto mt-2 max-w-[16ch] text-xs text-slate-500">{{ fact.label }}</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About AWQAF (summary) -->
        <section class="bg-white py-28">
            <div class="mx-auto max-w-3xl px-6 text-center lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Tentang AWQAF</p>
                <h2 class="mt-4 text-3xl font-bold leading-tight text-slate-900 sm:text-4xl">
                    Institusi Wakaf Korporat berpangkalan komuniti
                </h2>
            </div>
            <div class="mx-auto mt-16 grid max-w-5xl grid-cols-1 gap-x-10 gap-y-12 px-6 sm:grid-cols-3 lg:px-8">
                <div v-for="a in about" :key="a.h">
                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">{{ a.k }}</span>
                    <h3 class="mt-3 text-lg font-semibold text-slate-900">{{ a.h }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-slate-500">{{ a.b }}</p>
                </div>
            </div>
            <div class="mx-auto mt-16 max-w-3xl px-6 text-center lg:px-8">
                <p class="text-sm leading-relaxed text-slate-500">
                    Model wakaf korporat ini berasal daripada Waqaf An-Nur Corporation (1998).
                    <Link :href="route('korporat.overview')" class="font-semibold text-emerald-700 underline decoration-emerald-700/40 underline-offset-2 hover:decoration-emerald-700">Maklumat korporat lanjut →</Link>
                </p>
            </div>
        </section>

        <!-- Institutional imagery (clearly marked photo-ready feature) -->
        <section class="bg-slate-50 py-10">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <div class="flex aspect-[2/1] items-center justify-center overflow-hidden rounded-3xl border-2 border-dashed border-slate-300 bg-white sm:aspect-[21/9]">
                    <div class="px-6 text-center">
                        <CameraIcon class="mx-auto h-10 w-10 text-slate-300" />
                        <p class="mt-4 text-xs font-semibold uppercase tracking-[0.16em] text-slate-400">Imej Institusi</p>
                        <p class="mx-auto mt-2 max-w-md text-sm text-slate-400">Foto rasmi AWQAF Holdings Berhad — untuk disediakan oleh pihak AWQAF.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Business & investment areas (summary) -->
        <section class="bg-slate-50 py-28">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Bidang Perniagaan &amp; Pelaburan</p>
                    <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Bidang perniagaan dan pelaburan wakaf</h2>
                </div>
                <div class="mt-14 grid grid-cols-1 gap-x-10 gap-y-12 sm:grid-cols-3">
                    <div v-for="area in areas" :key="area.h">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white text-emerald-700 shadow-sm"><component :is="area.icon" class="h-6 w-6" /></div>
                        <h3 class="mt-5 font-semibold text-slate-900">{{ area.h }}</h3>
                        <p class="mt-2 text-sm text-slate-500">{{ area.b }}</p>
                    </div>
                </div>
                <div class="mt-12">
                    <Link :href="route('korporat.overview')" class="text-sm font-semibold text-emerald-700 hover:underline">Lihat struktur korporat penuh →</Link>
                </div>
            </div>
        </section>

        <!-- Reports & disclosure (summary evidence) -->
        <section class="bg-slate-950 py-28">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-14 lg:grid-cols-3">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-400">Laporan Kewangan</p>
                        <h2 class="mt-4 text-3xl font-bold text-white sm:text-4xl">Kutipan wakaf tahunan, 2014–2024</h2>
                        <p class="mt-6 text-sm text-slate-400">Seperti dilaporkan dalam Penyata Kewangan Diaudit AWQAF Holdings Berhad.</p>
                        <Link :href="route('korporat.reports')" class="mt-8 inline-block text-sm font-semibold text-emerald-400 hover:underline">Muat turun Laporan Tahunan →</Link>
                    </div>
                    <div class="lg:col-span-2"><CollectionChart :data="collections" dark /></div>
                </div>
            </div>
        </section>

        <!-- Governance (summary → detail on dedicated pages) -->
        <section class="bg-white py-28">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Tadbir Urus</p>
                    <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Struktur tadbir urus korporat</h2>
                </div>
                <div class="mt-14 grid grid-cols-1 gap-x-10 gap-y-12 sm:grid-cols-3">
                    <div v-for="g in governance" :key="g.t">
                        <component :is="g.icon" class="h-6 w-6 text-emerald-700" />
                        <h3 class="mt-4 font-semibold text-slate-900">{{ g.t }}</h3>
                        <p class="mt-2 text-sm text-slate-500">{{ g.d }}</p>
                    </div>
                </div>
                <div class="mt-12 flex flex-wrap gap-4">
                    <Link :href="route('korporat.leadership.index')" class="rounded-lg bg-slate-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">Lembaga Pengarah</Link>
                    <Link :href="route('korporat.overview')" class="rounded-lg border border-slate-300 px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Struktur Korporat</Link>
                </div>
            </div>
        </section>

        <!-- Programmes (summary) -->
        <section class="bg-slate-50 py-28">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Program &amp; Manfaat</p>
                    <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Program kebajikan komuniti</h2>
                </div>
                <div class="mt-14 grid grid-cols-1 gap-x-10 gap-y-12 sm:grid-cols-3">
                    <div v-for="program in programs" :key="program.name">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white text-amber-600 shadow-sm"><component :is="program.icon" class="h-6 w-6" /></div>
                        <div class="mt-5 text-lg font-semibold text-emerald-700">{{ program.name }}</div>
                        <p class="mt-1 text-sm text-slate-500">{{ program.category }}</p>
                    </div>
                </div>
                <div class="mt-12">
                    <Link :href="route('program.index')" class="text-sm font-semibold text-emerald-700 hover:underline">Lihat semua program &amp; inisiatif →</Link>
                </div>
            </div>
        </section>

        <!-- News (summary) -->
        <section class="bg-white py-24">
            <div class="mx-auto max-w-4xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Berita &amp; Acara</p>
                <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Aktiviti korporat 2024</h2>
                <div class="mt-12 divide-y divide-slate-100 border-t border-slate-100">
                    <article v-for="item in news" :key="item.title" class="flex flex-col gap-1 py-6 sm:flex-row sm:items-center sm:gap-8">
                        <div class="w-40 flex-none text-sm font-medium text-slate-400">{{ item.date }}</div>
                        <h3 class="font-semibold text-slate-900">{{ item.title }}</h3>
                    </article>
                </div>
            </div>
        </section>

        <!-- Strategic direction (summary) -->
        <section class="bg-slate-950 py-28">
            <div class="mx-auto max-w-3xl px-6 text-center lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-400">Hala Tuju Strategik</p>
                <h2 class="mt-4 text-3xl font-bold text-white sm:text-4xl">AWQAF 2035</h2>
                <p class="mt-6 text-lg leading-relaxed text-slate-300">
                    Hala tuju strategik ke arah wakaf korporat yang lebih inklusif, digital dan mampan
                    untuk generasi akan datang.
                </p>
            </div>
        </section>

        <!-- Member Portal & contact (summary) -->
        <section class="bg-white py-28">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Maklumat &amp; Hubungan</p>
                <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Penyertaan dan perhubungan</h2>
                <div class="mt-14 grid grid-cols-1 gap-x-10 gap-y-12 sm:grid-cols-3">
                    <div>
                        <Square3Stack3DIcon class="h-6 w-6 text-emerald-700" />
                        <h3 class="mt-4 font-semibold text-slate-900">Portal Pewakaf</h3>
                        <p class="mt-2 text-sm text-slate-500">Akses rekod wakaf, resit dan keahlian.</p>
                        <a :href="page.props.portalUrl" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-emerald-700 hover:underline">Masuk ke Portal <ArrowRightIcon class="h-4 w-4" /></a>
                    </div>
                    <div>
                        <BanknotesIcon class="h-6 w-6 text-emerald-700" />
                        <h3 class="mt-4 font-semibold text-slate-900">Cara Berwakaf</h3>
                        <p class="mt-2 text-sm text-slate-500">Kaedah menyalurkan wakaf kepada AWQAF.</p>
                        <Link :href="route('waqaf.howto')" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-emerald-700 hover:underline">Kaedah Berwakaf <ArrowRightIcon class="h-4 w-4" /></Link>
                    </div>
                    <div>
                        <BuildingLibraryIcon class="h-6 w-6 text-emerald-700" />
                        <h3 class="mt-4 font-semibold text-slate-900">Hubungi AWQAF</h3>
                        <p class="mt-2 text-sm text-slate-500">Pertanyaan korporat dan media.</p>
                        <Link :href="route('korporat.overview')" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-emerald-700 hover:underline">Maklumat Korporat <ArrowRightIcon class="h-4 w-4" /></Link>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
