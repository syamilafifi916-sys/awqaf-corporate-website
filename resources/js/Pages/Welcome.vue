<script setup>
import CollectionChart from '@/Components/CollectionChart.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { ArrowRightIcon, ChevronDownIcon } from '@heroicons/vue/24/outline';
import { Head, Link, usePage } from '@inertiajs/vue3';

const page = usePage();

// Editorial reveal-on-scroll. Calm: one element rises and fades in once.
// Fully disabled for prefers-reduced-motion.
const vReveal = {
    mounted(el, binding) {
        if (typeof window === 'undefined') return;
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            el.classList.add('reveal-in');
            return;
        }
        if (binding.value) el.style.transitionDelay = binding.value;
        el.classList.add('reveal');
        const io = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('reveal-in');
                        io.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.12, rootMargin: '0px 0px -8% 0px' },
        );
        io.observe(el);
    },
};

// M5 — assets built (portfolios) and benefits shared (programmes).
const portfolios = [
    { name: 'Pendidikan', line: 'Pendidikan Islam bersepadu menerusi AWQAF Education Sdn. Bhd.', slug: 'pendidikan' },
    { name: 'Kesihatan & Kesejahteraan', line: 'Kesihatan dan kecergasan wanita menerusi AHB Wellness Sdn. Bhd.', slug: 'kesihatan-kesejahteraan' },
    { name: 'Hartanah', line: 'Pembangunan tanah wakaf dan institusi secara produktif.', slug: 'hartanah' },
    { name: 'Fintech', line: 'Penyelesaian kewangan digital dan pembiayaan Islam.', slug: 'fintech' },
];

const programmes = [
    { name: 'Yayasan ZuriatCARE', line: 'Perlindungan sosial dan kesedaran kesihatan mental.', slug: 'yayasan-zuriatcare' },
    { name: 'EduWAQF', line: 'Bantuan pendidikan dan biasiswa.', slug: 'eduwaqf' },
    { name: 'AWQAF4Health', line: 'Bantuan kesihatan untuk golongan berpendapatan rendah.', slug: 'awqaf4health' },
];

// M6 — proof. Verified figures only.
const facts = [
    { value: '3,431', label: 'Ahli & Pewakaf (2024)' },
    { value: 'RM13.27 juta', label: 'Dana Wakaf Kumpulan & Ahli (Ogos 2024)' },
    { value: '2015–2024', label: 'Penyata Kewangan Diaudit' },
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

// M3 — policy-neutral stewardship model (no allocation ratio on the homepage).
const modelFlow = [
    { n: '01', t: 'Pengurusan aset amanah', d: 'Aset wakaf dikekalkan sebagai amanah kekal dan diuruskan secara profesional.' },
    { n: '02', t: 'Penciptaan nilai mampan', d: 'Aset dibangunkan menjadi perniagaan dan pelaburan yang menjana nilai secara mampan.' },
    { n: '03', t: 'Manfaat sosial berkekalan', d: 'Hasil yang dijana membina pendidikan, kesihatan dan kesejahteraan masyarakat merentas generasi.' },
];

const pillars = [
    { t: 'Tadbir urus', d: 'Diperbadankan di bawah Akta Syarikat 2016; diselia Lembaga Pengarah dan jawatankuasa.' },
    { t: 'Pembangunan aset', d: 'Aset wakaf dibangunkan menjadi perniagaan dan aset produktif milik ummah.' },
    { t: 'Pelaburan mampan', d: 'Modal asal dikekalkan; hasilnya dilaburkan semula untuk kelestarian jangka panjang.' },
    { t: 'Pengurusan profesional', d: 'Diurus mengikut amalan korporat dan keusahawanan terbaik.' },
    { t: 'Impak komuniti', d: 'Nilai yang dijana disalurkan kepada pendidikan, kesihatan dan kebajikan.' },
];
</script>

<template>
    <Head title="Membina Ekonomi. Memakmurkan Ummah. Mewariskan Masa Depan.">
        <link rel="preload" as="image" type="image/webp" imagesrcset="/images/hero/awqaf-hero-768.webp 768w, /images/hero/awqaf-hero-1152.webp 1152w, /images/hero/awqaf-hero-1536.webp 1536w" imagesizes="100vw" />
    </Head>

    <PublicLayout>
        <!-- ═══ M0 · THE IDEA ═══ Curiosity -->
        <section class="relative isolate flex min-h-[92vh] flex-col overflow-hidden bg-slate-950 lg:min-h-screen">
            <picture class="pointer-events-none absolute inset-0 -z-10 block">
                <source
                    type="image/webp"
                    srcset="/images/hero/awqaf-hero-768.webp 768w, /images/hero/awqaf-hero-1152.webp 1152w, /images/hero/awqaf-hero-1536.webp 1536w"
                    sizes="100vw"
                />
                <img
                    src="/images/hero/awqaf-hero-1536.webp"
                    alt=""
                    aria-hidden="true"
                    width="1536"
                    height="1024"
                    decoding="async"
                    fetchpriority="high"
                    class="hero-img h-full w-full object-cover object-[72%_center] lg:object-[right_center]"
                />
            </picture>
            <div
                class="pointer-events-none absolute inset-0 -z-10 hidden md:block"
                style="background: linear-gradient(90deg, rgba(6,9,20,.94) 0%, rgba(6,9,20,.88) 38%, rgba(6,9,20,.5) 68%, rgba(6,9,20,.22) 100%);"
            ></div>
            <div
                class="pointer-events-none absolute inset-0 -z-10 md:hidden"
                style="background: linear-gradient(180deg, rgba(6,9,20,.92) 0%, rgba(6,9,20,.74) 52%, rgba(6,9,20,.9) 100%);"
            ></div>

            <div class="relative mx-auto flex w-full max-w-7xl flex-1 items-center px-6 py-28 lg:px-8">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.22em] text-emerald-400">AWQAF Holdings Berhad</p>
                    <h1 class="mt-8 text-4xl font-bold leading-[1.08] tracking-tight text-white sm:text-6xl lg:text-7xl">
                        <span class="block">Membina Ekonomi.</span>
                        <span class="block">Memakmurkan Ummah.</span>
                        <span class="block text-emerald-400">Mewariskan Masa Depan.</span>
                    </h1>
                    <p class="mt-8 max-w-xl text-lg leading-relaxed text-slate-300">
                        Sebuah tamadun yang makmur tidak dibina oleh kekayaan semata-mata, tetapi oleh bagaimana
                        kekayaan diurus dengan amanah demi manfaat generasi yang akan datang.
                    </p>
                </div>
            </div>

            <div class="relative mx-auto w-full max-w-7xl px-6 pb-10 lg:px-8">
                <a href="#refleksi" class="group inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.18em] text-slate-400 transition hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">
                    Terokai idea ini
                    <ChevronDownIcon class="h-4 w-4 animate-bounce" aria-hidden="true" />
                </a>
            </div>
        </section>

        <!-- ═══ M1 · THE REFLECTION ═══ Reflection -->
        <section id="refleksi" class="bg-slate-950">
            <div class="mx-auto max-w-4xl px-6 py-28 lg:px-8 lg:py-40">
                <p v-reveal class="text-2xl font-medium leading-relaxed text-slate-400 sm:text-3xl sm:leading-[1.5]">
                    Ekonomi yang berkembang dengan adil membuka peluang untuk masyarakat belajar, bekerja
                    dan membina kehidupan yang lebih sejahtera.
                </p>
                <p v-reveal="'150ms'" class="mt-10 text-2xl font-semibold leading-relaxed text-white sm:text-3xl sm:leading-[1.5]">
                    Namun apabila kekayaan hanya tertumpu kepada segelintir, jurang semakin melebar — dan
                    manfaat pembangunan tidak lagi dinikmati secara menyeluruh.
                </p>
            </div>
        </section>

        <!-- ═══ M2 · NORTH STAR + CONVICTION ═══ Understanding -->
        <section class="bg-white">
            <div class="mx-auto max-w-5xl px-6 py-28 lg:px-8 lg:py-40">
                <p v-reveal class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700">Waqaf Korporat</p>
                <h2 v-reveal="'80ms'" class="mt-8 text-3xl font-bold leading-[1.18] tracking-tight text-slate-900 sm:text-5xl">
                    Waqaf bukan sekadar warisan harta. Ia warisan peluang — sebuah ekonomi yang membolehkan
                    setiap generasi membina masa depannya sendiri.
                </h2>

                <p v-reveal class="mt-16 max-w-3xl text-2xl font-semibold leading-snug tracking-tight text-slate-900 sm:text-3xl">
                    Pertumbuhan ekonomi dan amanah kepada masyarakat tidak seharusnya dipisahkan.
                </p>
                <p v-reveal class="mt-8 max-w-2xl text-lg leading-relaxed text-slate-600">
                    Apabila keduanya berjalan seiring, setiap kemajuan ekonomi turut mengangkat kehidupan
                    masyarakat — dan kemakmuran menjadi warisan yang dikongsi, bukan sekadar keuntungan yang berlalu.
                </p>
                <p v-reveal="'80ms'" class="mt-6 max-w-2xl text-lg leading-relaxed text-slate-600">
                    Daripada keyakinan inilah Waqaf Korporat lahir — sebuah amanah untuk memastikan wakaf terus
                    hidup dan berkembang, supaya kebaikannya tidak terhenti pada satu generasi, tetapi terus memberi
                    manfaat kepada masyarakat dan generasi akan datang.
                </p>

                <div class="mt-12 space-y-5 border-t border-slate-100 pt-12">
                    <p v-reveal class="text-2xl leading-snug text-slate-400 sm:text-3xl">
                        Waqaf bukan sekadar memberi — <span class="font-semibold text-slate-900">ia membina.</span>
                    </p>
                    <p v-reveal="'100ms'" class="text-2xl leading-snug text-slate-400 sm:text-3xl">
                        Bukan sekadar membantu — <span class="font-semibold text-slate-900">ia memperkasa.</span>
                    </p>
                    <p v-reveal="'200ms'" class="max-w-3xl text-2xl leading-snug text-slate-400 sm:text-3xl">
                        Bukan sekadar mengurus aset — <span class="font-semibold text-slate-900">ia membina ekonomi yang memberi manfaat kepada semua.</span>
                    </p>
                </div>
            </div>
        </section>

        <!-- ═══ M3 · THE MODEL ═══ Hope -->
        <section class="bg-slate-50">
            <div class="mx-auto max-w-4xl px-6 py-24 lg:px-8 lg:py-32">
                <div class="max-w-2xl">
                    <p v-reveal class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700">Model</p>
                    <h2 v-reveal="'80ms'" class="mt-4 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                        Bagaimana kemakmuran menjadi milik bersama
                    </h2>
                    <p v-reveal="'140ms'" class="mt-5 text-lg leading-relaxed text-slate-600">
                        Nilai yang dijana tidak dibelanjakan sekali habis. Hasilnya membina pendidikan,
                        kesihatan dan masa depan komuniti.
                    </p>
                </div>
                <div v-reveal class="mt-16 grid grid-cols-1 gap-px overflow-hidden rounded-2xl border border-slate-200 bg-slate-200 sm:grid-cols-3">
                    <div v-for="step in modelFlow" :key="step.n" class="bg-white p-8">
                        <span class="text-sm font-semibold tabular-nums text-emerald-700">{{ step.n }}</span>
                        <h3 class="mt-4 text-lg font-semibold text-slate-900">{{ step.t }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ step.d }}</p>
                    </div>
                </div>
                <div class="mt-10">
                    <Link :href="route('waqaf.corporate')" class="inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-700 hover:underline">
                        Fahami Waqaf Korporat <ArrowRightIcon class="h-4 w-4" />
                    </Link>
                </div>
            </div>
        </section>

        <!-- ═══ M4 · THE INSTITUTION ═══ Trust building -->
        <section class="bg-slate-950">
            <div class="mx-auto max-w-5xl px-6 py-28 lg:px-8 lg:py-36">
                <p v-reveal class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-400">Institusi</p>
                <h2 v-reveal="'80ms'" class="mt-6 max-w-3xl text-3xl font-bold leading-tight tracking-tight text-white sm:text-4xl">
                    Institusi yang menterjemahkan falsafah ini menjadi tindakan.
                </h2>
                <p v-reveal="'140ms'" class="mt-6 max-w-2xl text-lg leading-relaxed text-slate-300">
                    AWQAF Holdings Berhad ialah sebuah institusi Waqaf Korporat. Ia membina dan menguruskan
                    aset wakaf secara profesional supaya nilai yang dijana kekal, berkembang dan terus memberi
                    manfaat kepada masyarakat.
                </p>

                <dl class="mt-16 grid grid-cols-1 gap-x-12 gap-y-10 border-t border-white/10 pt-14 sm:grid-cols-2 lg:grid-cols-3">
                    <div v-for="(p, i) in pillars" :key="p.t" v-reveal="`${i * 60}ms`">
                        <dt class="text-sm font-semibold text-white">{{ p.t }}</dt>
                        <dd class="mt-2 text-sm leading-relaxed text-slate-400">{{ p.d }}</dd>
                    </div>
                    <div v-reveal="'300ms'" class="flex items-end">
                        <Link :href="route('korporat.overview')" class="inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-400 hover:underline">
                            Mengenai AWQAF <ArrowRightIcon class="h-4 w-4" />
                        </Link>
                    </div>
                </dl>
            </div>
        </section>

        <!-- ═══ M5 · WHAT IT BUILDS ═══ Hope → Trust -->
        <section class="bg-white">
            <div class="mx-auto max-w-5xl px-6 py-28 lg:px-8 lg:py-36">
                <div class="max-w-2xl">
                    <p v-reveal class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700">Di sebalik model</p>
                    <h2 v-reveal="'80ms'" class="mt-4 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                        Nilai yang dibina. Manfaat yang dikongsi.
                    </h2>
                </div>

                <div class="mt-16 grid grid-cols-1 gap-x-16 gap-y-14 lg:grid-cols-2">
                    <!-- Assets built — Portfolio Pelaburan -->
                    <div v-reveal>
                        <p class="text-sm font-semibold text-slate-900">Aset yang dibina <span class="text-slate-400">— Portfolio Pelaburan</span></p>
                        <ul class="mt-6 divide-y divide-slate-100 border-t border-slate-100">
                            <li v-for="p in portfolios" :key="p.slug">
                                <Link :href="route('portfolio.show', p.slug)" class="group flex items-start justify-between gap-4 py-4">
                                    <span>
                                        <span class="font-semibold text-slate-900 transition group-hover:text-emerald-700">{{ p.name }}</span>
                                        <span class="mt-0.5 block text-sm text-slate-500">{{ p.line }}</span>
                                    </span>
                                    <ArrowRightIcon class="mt-1 h-4 w-4 flex-none text-slate-300 transition group-hover:text-emerald-700" />
                                </Link>
                            </li>
                        </ul>
                    </div>

                    <!-- Benefits shared — Program & Inisiatif -->
                    <div v-reveal="'100ms'">
                        <p class="text-sm font-semibold text-slate-900">Manfaat yang dikongsi <span class="text-slate-400">— Program &amp; Inisiatif</span></p>
                        <ul class="mt-6 divide-y divide-slate-100 border-t border-slate-100">
                            <li v-for="p in programmes" :key="p.slug">
                                <Link :href="route('program.show', p.slug)" class="group flex items-start justify-between gap-4 py-4">
                                    <span>
                                        <span class="font-semibold text-slate-900 transition group-hover:text-emerald-700">{{ p.name }}</span>
                                        <span class="mt-0.5 block text-sm text-slate-500">{{ p.line }}</span>
                                    </span>
                                    <ArrowRightIcon class="mt-1 h-4 w-4 flex-none text-slate-300 transition group-hover:text-emerald-700" />
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- ═══ M6 · WHY TO TRUST IT ═══ Trust -->
        <section class="bg-slate-950">
            <div class="mx-auto max-w-6xl px-6 py-28 lg:px-8 lg:py-36">
                <div class="max-w-2xl">
                    <p v-reveal class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-400">Amanah</p>
                    <h2 v-reveal="'80ms'" class="mt-4 text-3xl font-bold tracking-tight text-white sm:text-4xl">
                        Amanah yang dibuktikan, bukan dilaung.
                    </h2>
                    <p v-reveal="'140ms'" class="mt-5 text-lg leading-relaxed text-slate-300">
                        Diperbadankan di bawah Akta Syarikat 2016, diselia Lembaga Pengarah sembilan ahli, dan
                        diaudit setiap tahun. Sebelas tahun rekod kutipan wakaf didedahkan sepenuhnya.
                    </p>
                </div>

                <dl v-reveal class="mt-14 grid grid-cols-1 gap-x-10 gap-y-8 border-y border-white/10 py-10 sm:grid-cols-3">
                    <div v-for="f in facts" :key="f.label">
                        <dt class="text-3xl font-bold text-white sm:text-4xl">{{ f.value }}</dt>
                        <dd class="mt-2 text-sm text-slate-400">{{ f.label }}</dd>
                    </div>
                </dl>

                <div v-reveal class="mt-14">
                    <p class="text-sm font-semibold text-slate-300">Kutipan wakaf tahunan, 2014–2024</p>
                    <p class="mt-1 text-xs text-slate-500">Seperti dilaporkan dalam Penyata Kewangan Diaudit AWQAF Holdings Berhad.</p>
                    <div class="mt-8"><CollectionChart :data="collections" dark /></div>
                </div>

                <div class="mt-12 flex flex-wrap gap-x-8 gap-y-3 text-sm font-semibold">
                    <Link :href="route('korporat.reports')" class="text-emerald-400 hover:underline">Laporan Tahunan &amp; Penyata Kewangan →</Link>
                    <Link :href="route('korporat.leadership.index')" class="text-emerald-400 hover:underline">Lembaga Pengarah →</Link>
                    <Link :href="route('ketelusan')" class="text-emerald-400 hover:underline">Laporan &amp; Tadbir Urus →</Link>
                </div>
            </div>
        </section>

        <!-- ═══ M7 · THE INVITATION + CLOSING ═══ Participation -->
        <section class="bg-white">
            <div class="mx-auto max-w-5xl px-6 py-28 lg:px-8 lg:py-36">
                <div class="max-w-2xl">
                    <p v-reveal class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700">Sertai pembinaan</p>
                    <h2 v-reveal="'80ms'" class="mt-4 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Bina bersama kami.</h2>
                    <p v-reveal="'140ms'" class="mt-5 text-lg leading-relaxed text-slate-600">
                        Setiap wakaf menyertai usaha membina ekonomi yang memberi manfaat berterusan kepada ummah —
                        sebuah amanah yang mewarisi kebaikan merentas generasi.
                    </p>
                </div>

                <div v-reveal class="mt-14 grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div class="rounded-3xl bg-emerald-700 p-8 sm:p-10">
                        <h3 class="text-2xl font-bold text-white">Bina bersama AWQAF</h3>
                        <p class="mt-3 text-sm leading-relaxed text-emerald-50">
                            Sertai sebagai pewakaf dan pilih kaedah berwakaf kepada AWQAF Holdings Berhad.
                        </p>
                        <Link :href="route('waqaf.howto')" class="mt-6 inline-flex items-center gap-2 rounded-lg bg-white px-6 py-3 text-sm font-semibold text-emerald-800 transition hover:bg-emerald-50">
                            Lihat Kaedah Berwakaf <ArrowRightIcon class="h-4 w-4" />
                        </Link>
                    </div>
                    <div class="rounded-3xl border border-slate-200 p-8 sm:p-10">
                        <h3 class="text-2xl font-bold text-slate-900">Portal Pewakaf</h3>
                        <p class="mt-3 text-sm leading-relaxed text-slate-500">
                            Untuk pewakaf sedia ada mengakses akaun, rekod wakaf, resit dan dokumen keahlian.
                        </p>
                        <a :href="page.props.portalUrl" class="mt-6 inline-flex items-center gap-2 rounded-lg border border-emerald-600 px-6 py-3 text-sm font-semibold text-emerald-700 transition hover:bg-emerald-50">
                            Masuk ke Portal <ArrowRightIcon class="h-4 w-4" />
                        </a>
                    </div>
                </div>

                <p v-reveal class="mt-24 border-t border-slate-100 pt-16 text-center text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">
                    Waqaf membina hari ini. Amanahnya mewarisi selamanya.
                </p>
            </div>
        </section>
    </PublicLayout>
</template>

<style scoped>
.reveal {
    opacity: 0;
    transform: translateY(14px);
    transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    will-change: opacity, transform;
}
.reveal-in {
    opacity: 1;
    transform: none;
}
.hero-img {
    animation: heroDrift 24s ease-out both;
}
@keyframes heroDrift {
    from {
        transform: scale(1.06);
    }
    to {
        transform: scale(1);
    }
}
@media (prefers-reduced-motion: reduce) {
    .hero-img {
        animation: none;
    }
}
</style>
