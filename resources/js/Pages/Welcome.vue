<script setup>
import CollectionChart from '@/Components/CollectionChart.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import WaqafModel from '@/Components/WaqafModel.vue';
import {
    AcademicCapIcon,
    ArrowRightIcon,
    BanknotesIcon,
    BuildingLibraryIcon,
    BuildingOffice2Icon,
    CpuChipIcon,
    DocumentCheckIcon,
    HeartIcon,
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
    { icon: AcademicCapIcon, h: 'Pendidikan', b: 'AWQAF Education Sdn. Bhd. — pendidikan Islam bersepadu.', slug: 'pendidikan' },
    { icon: HeartIcon, h: 'Kesihatan & Kesejahteraan', b: 'CURVES di bawah AHB Wellness Sdn. Bhd.', slug: 'kesihatan-kesejahteraan' },
    { icon: BuildingOffice2Icon, h: 'Hartanah', b: 'Pembangunan tanah wakaf dan institusi.', slug: 'hartanah' },
    { icon: CpuChipIcon, h: 'Fintech', b: 'Platform Infaq di bawah AHB Fintech Sdn. Bhd.', slug: 'fintech' },
];

const programs = [
    { name: 'Yayasan ZuriatCARE', category: 'Kebajikan & Kesihatan Mental', icon: HeartIcon, slug: 'yayasan-zuriatcare' },
    { name: 'EduWAQF', category: 'Pendidikan', icon: AcademicCapIcon, slug: 'eduwaqf' },
    { name: 'AWQAF4Health', category: 'Kesihatan', icon: BuildingLibraryIcon, slug: 'awqaf4health' },
];
</script>

<template>
    <Head title="Membangunkan Wakaf Korporat untuk Manfaat Ummah">
        <link rel="preload" as="image" href="/images/hero/awqaf-hero.webp.png" />
    </Head>

    <PublicLayout>
        <!-- 1. Hero -->
        <!-- bg-slate-950 is the fallback so text stays readable if the image fails to load. -->
        <section class="relative isolate overflow-hidden bg-slate-950">
            <!-- Background artwork: cover, focal point centre-right. Decorative (text is live HTML). -->
            <img
                src="/images/hero/awqaf-hero.webp.png"
                alt=""
                aria-hidden="true"
                decoding="async"
                fetchpriority="high"
                class="pointer-events-none absolute inset-0 -z-10 h-full w-full object-cover object-[72%_center] lg:object-[right_center]"
            />

            <!-- Desktop/tablet overlay: dark on the left for text, artwork visible on the right. -->
            <div
                class="pointer-events-none absolute inset-0 -z-10 hidden md:block"
                style="background: linear-gradient(90deg, rgba(6,9,20,.92) 0%, rgba(6,9,20,.84) 35%, rgba(6,9,20,.45) 65%, rgba(6,9,20,.18) 100%);"
            ></div>
            <!-- Mobile overlay: stronger, full-width darkening so text stays AA-readable on a narrow screen. -->
            <div
                class="pointer-events-none absolute inset-0 -z-10 md:hidden"
                style="background: linear-gradient(180deg, rgba(6,9,20,.92) 0%, rgba(6,9,20,.72) 55%, rgba(6,9,20,.88) 100%);"
            ></div>

            <div class="relative mx-auto flex min-h-[92vh] max-w-7xl items-center px-6 py-32 lg:min-h-screen lg:px-8">
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
                        <Link :href="route('waqaf.howto')" class="rounded-lg bg-emerald-600 px-7 py-3.5 text-sm font-semibold text-white shadow-lg shadow-emerald-950/50 transition hover:bg-emerald-500">
                            Wakaf Sekarang
                        </Link>
                        <Link :href="route('korporat.overview')" class="rounded-lg border border-white/15 px-7 py-3.5 text-sm font-semibold text-white transition hover:bg-white/10">
                            Kenali AWQAF
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. Verified facts strip -->
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

        <!-- 3. Tentang AWQAF -->
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
                <Link :href="route('korporat.overview')" class="text-sm font-semibold text-emerald-700 hover:underline">Maklumat korporat lanjut →</Link>
            </div>
        </section>

        <!-- 4. Waqaf Korporat -->
        <section class="bg-slate-50 py-24">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-10 lg:grid-cols-5 lg:gap-16">
                    <div class="lg:col-span-2">
                        <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Waqaf Korporat®</p>
                        <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Apa itu Waqaf Korporat?</h2>
                    </div>
                    <div class="lg:col-span-3">
                        <p class="text-lg leading-relaxed text-slate-600">
                            Waqaf Korporat® ialah konsep berdaftar yang dilesenkan kepada AWQAF Holdings Berhad. Wakaf
                            ditukar menjadi perniagaan dan aset produktif milik ummah — modal asal dikekalkan sebagai
                            amanah kekal, dan hanya hasilnya disalurkan untuk manfaat masyarakat.
                        </p>
                        <Link :href="route('waqaf.corporate')" class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-700 hover:underline">
                            Fahami Waqaf Korporat <ArrowRightIcon class="h-4 w-4" />
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. Model Waqaf Korporat (30% / 70%) preview -->
        <section class="bg-white py-24">
            <div class="mx-auto max-w-4xl px-6 lg:px-8">
                <div class="text-center">
                    <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Model Waqaf Korporat</p>
                    <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Bagaimana hasil disalurkan</h2>
                    <p class="mx-auto mt-4 max-w-2xl text-slate-500">
                        Sebahagian daripada hasil aktiviti pelaburan dan perniagaan AWQAF disalurkan kepada program
                        kebajikan, manakala sebahagian besar dilaburkan semula bagi mengembangkan aset dan sumber
                        pendapatan jangka panjang.
                    </p>
                </div>
                <div class="mt-12">
                    <WaqafModel preview />
                </div>
                <div class="mt-8 text-center">
                    <Link :href="route('waqaf.corporate')" class="text-sm font-semibold text-emerald-700 hover:underline">Fahami model Waqaf Korporat →</Link>
                </div>
            </div>
        </section>

        <!-- 6. Portfolio Pelaburan preview -->
        <section class="bg-slate-50 py-28">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Portfolio Pelaburan</p>
                    <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Empat portfolio pelaburan wakaf</h2>
                </div>
                <div class="mt-14 grid grid-cols-1 gap-x-10 gap-y-12 sm:grid-cols-2 lg:grid-cols-4">
                    <Link v-for="area in areas" :key="area.h" :href="route('portfolio.show', area.slug)" class="group block">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-50 text-emerald-700 shadow-sm transition group-hover:bg-emerald-50"><component :is="area.icon" class="h-6 w-6" /></div>
                        <h3 class="mt-5 font-semibold text-slate-900 transition group-hover:text-emerald-700">{{ area.h }}</h3>
                        <p class="mt-2 text-sm text-slate-500">{{ area.b }}</p>
                    </Link>
                </div>
                <div class="mt-12">
                    <Link :href="route('portfolio.index')" class="text-sm font-semibold text-emerald-700 hover:underline">Lihat semua portfolio pelaburan →</Link>
                </div>
            </div>
        </section>

        <!-- 7. Program & Inisiatif preview -->
        <section class="bg-white py-28">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Program &amp; Inisiatif</p>
                    <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Tiga program kebajikan komuniti</h2>
                </div>
                <div class="mt-14 grid grid-cols-1 gap-x-10 gap-y-12 sm:grid-cols-3">
                    <Link v-for="program in programs" :key="program.name" :href="route('program.show', program.slug)" class="group block">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white text-amber-600 shadow-sm"><component :is="program.icon" class="h-6 w-6" /></div>
                        <div class="mt-5 text-lg font-semibold text-emerald-700 group-hover:underline">{{ program.name }}</div>
                        <p class="mt-1 text-sm text-slate-500">{{ program.category }}</p>
                    </Link>
                </div>
                <div class="mt-12">
                    <Link :href="route('program.index')" class="text-sm font-semibold text-emerald-700 hover:underline">Lihat semua program &amp; inisiatif →</Link>
                </div>
            </div>
        </section>

        <!-- 8. Laporan Tahunan & Penyata Kewangan preview -->
        <section class="bg-slate-950 py-28">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-14 lg:grid-cols-3">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-400">Laporan Tahunan &amp; Penyata Kewangan</p>
                        <h2 class="mt-4 text-3xl font-bold text-white sm:text-4xl">Kutipan wakaf tahunan, 2014–2024</h2>
                        <p class="mt-6 text-sm text-slate-400">Seperti dilaporkan dalam Penyata Kewangan Diaudit AWQAF Holdings Berhad.</p>
                        <Link :href="route('korporat.reports')" class="mt-8 inline-block text-sm font-semibold text-emerald-400 hover:underline">Muat turun Laporan Tahunan →</Link>
                    </div>
                    <div class="lg:col-span-2"><CollectionChart :data="collections" dark /></div>
                </div>
            </div>
        </section>

        <!-- 9. Contribution CTA + Portal Pewakaf -->
        <section class="bg-white py-28">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div class="rounded-3xl bg-emerald-700 p-8 sm:p-10">
                        <h2 class="text-2xl font-bold text-white">Wakaf Sekarang</h2>
                        <p class="mt-3 text-sm leading-relaxed text-emerald-50">
                            Untuk pewakaf baharu atau sedia ada yang ingin memilih kaedah berwakaf kepada AWQAF Holdings Berhad.
                        </p>
                        <Link :href="route('waqaf.howto')" class="mt-6 inline-flex items-center gap-2 rounded-lg bg-white px-6 py-3 text-sm font-semibold text-emerald-800 transition hover:bg-emerald-50">
                            Lihat Kaedah Berwakaf <ArrowRightIcon class="h-4 w-4" />
                        </Link>
                    </div>
                    <div class="rounded-3xl border border-slate-200 p-8 sm:p-10">
                        <h2 class="text-2xl font-bold text-slate-900">Portal Pewakaf</h2>
                        <p class="mt-3 text-sm leading-relaxed text-slate-500">
                            Untuk ahli sedia ada mengakses akaun, rekod wakaf, resit dan dokumen keahlian.
                        </p>
                        <a :href="page.props.portalUrl" class="mt-6 inline-flex items-center gap-2 rounded-lg border border-emerald-600 px-6 py-3 text-sm font-semibold text-emerald-700 transition hover:bg-emerald-50">
                            Masuk ke Portal <ArrowRightIcon class="h-4 w-4" />
                        </a>
                    </div>
                </div>
                <div class="mt-8 text-center">
                    <Link :href="route('hubungi')" class="text-sm font-semibold text-emerald-700 hover:underline">Hubungi AWQAF untuk pertanyaan korporat →</Link>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
