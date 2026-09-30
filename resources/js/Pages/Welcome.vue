<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { ArrowRightIcon, ChevronDownIcon, AcademicCapIcon, HeartIcon, BuildingOffice2Icon, DevicePhoneMobileIcon, ShieldCheckIcon, BookOpenIcon, XMarkIcon, DocumentTextIcon, ArrowDownTrayIcon, EyeIcon } from '@heroicons/vue/24/outline';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';

const page = usePage();

const showAgmAnnouncement = ref(false);
const showAgmReader = ref(false);
const showFinancialReader = ref(false);

onMounted(() => {
    if (!sessionStorage.getItem('awqaf-agm-2026-dismissed')) {
        window.setTimeout(() => {
            showAgmAnnouncement.value = true;
        }, 550);
    }
});

const closeAgmAnnouncement = () => {
    showAgmAnnouncement.value = false;
    sessionStorage.setItem('awqaf-agm-2026-dismissed', '1');
};

const openReader = (type) => {
    showAgmAnnouncement.value = false;
    showAgmReader.value = type === 'notice';
    showFinancialReader.value = type === 'financial';
};

const props = defineProps({
    homepage: {
        type: Object,
        default: null,
    },
});

const resolveMediaUrl = (path, fallback) => {
    if (!path) return fallback;
    if (/^https?:\/\//i.test(path)) return path;
    if (path.startsWith('/')) return path;
    if (path.startsWith('images/') || path.startsWith('video/')) return `/${path}`;
    return `/storage/${path}`;
};

const defaultHeroImage = '/images/hero/awqaf-hero-1536.webp';
const hasCustomHeroImage = Boolean(props.homepage?.hero_image);

const homepage = {
    eyebrow: props.homepage?.eyebrow || 'AWQAF Holdings Berhad',
    headline_line_1: props.homepage?.headline_line_1 || 'Membina Ekonomi.',
    headline_line_2: props.homepage?.headline_line_2 || 'Memakmurkan Ummah.',
    headline_line_3: props.homepage?.headline_line_3 || 'Mewariskan Masa Depan.',
    hero_description:
        props.homepage?.hero_description ||
        'Institusi Waqaf Korporat yang membangun dan mengurus aset wakaf secara profesional untuk manfaat ummah yang berkekalan.',
    hero_video: resolveMediaUrl(props.homepage?.hero_video, '/video/awqaf-hero.mp4'),
    hero_image: resolveMediaUrl(props.homepage?.hero_image, defaultHeroImage),
    cta_label: props.homepage?.cta_label || 'TEROKAI IDEA INI',
    cta_url: props.homepage?.cta_url || '#refleksi',
};

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
    { name: 'Pendidikan', line: 'Pendidikan Islam bersepadu menerusi AWQAF Education Sdn. Bhd.', slug: 'pendidikan', icon: AcademicCapIcon },
    { name: 'Kesihatan & Kesejahteraan', line: 'Kesihatan dan kecergasan wanita menerusi AHB Wellness Sdn. Bhd.', slug: 'kesihatan-kesejahteraan', icon: HeartIcon },
    { name: 'Hartanah', line: 'Pembangunan tanah wakaf dan institusi secara produktif.', slug: 'hartanah', icon: BuildingOffice2Icon },
    { name: 'Fintech', line: 'Penyelesaian kewangan digital dan pembiayaan Islam.', slug: 'fintech', icon: DevicePhoneMobileIcon },
];

const programmes = [
    { name: 'Yayasan ZuriatCARE', line: 'Perlindungan sosial dan kesedaran kesihatan mental.', slug: 'yayasan-zuriatcare', icon: ShieldCheckIcon },
    { name: 'EduWAQF', line: 'Bantuan pendidikan dan biasiswa.', slug: 'eduwaqf', icon: BookOpenIcon },
    { name: 'AWQAF4Health', line: 'Bantuan kesihatan untuk golongan berpendapatan rendah.', slug: 'awqaf4health', icon: HeartIcon },
];

// M6 — proof. Verified figures only.
const facts = [
    { value: '3,431', label: 'Ahli & Pewakaf (2024)' },
    { value: 'RM13.27 juta', label: 'Dana Wakaf Kumpulan & Ahli (Ogos 2024)' },
    { value: '2015–2024', label: 'Penyata Kewangan Diaudit' },
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
        <link v-if="hasCustomHeroImage" rel="preload" as="image" :href="homepage.hero_image" />
        <link v-else rel="preload" as="image" type="image/webp" imagesrcset="/images/hero/awqaf-hero-768.webp 768w, /images/hero/awqaf-hero-1152.webp 1152w, /images/hero/awqaf-hero-1536.webp 1536w" imagesizes="100vw" />
    </Head>

    <PublicLayout>
        <!-- AGM 2026 · corporate disclosure -->
        <Teleport to="body">
            <Transition enter-active-class="transition duration-300 ease-out" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition duration-200 ease-in" leave-from-class="opacity-100" leave-to-class="opacity-0">
                <div v-if="showAgmAnnouncement" class="fixed inset-0 z-[100] flex items-end justify-center overflow-y-auto bg-slate-950/65 px-0 pt-14 backdrop-blur-sm sm:items-center sm:px-4 sm:py-6" @click.self="closeAgmAnnouncement">
                    <div class="relative max-h-[calc(100dvh-3.5rem)] w-full max-w-[43rem] overflow-y-auto overscroll-contain rounded-t-2xl border border-white/10 bg-white shadow-2xl shadow-slate-950/30 sm:max-h-[90dvh] sm:rounded-2xl">
                        <div class="relative px-5 pb-3 pt-4 sm:px-8 sm:pb-6 sm:pt-7">
                            <button type="button" class="sticky top-2 z-20 ml-auto -mb-9 mr-1 flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-600 shadow-md transition hover:bg-slate-100 hover:text-slate-900 sm:absolute sm:right-6 sm:top-6 sm:m-0" aria-label="Tutup pengumuman" @click="closeAgmAnnouncement">
                                <XMarkIcon class="h-5 w-5" />
                            </button>
                            <div class="pr-10">
                                <div class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-700">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                    Pengumuman Korporat
                                </div>
                                <h2 class="mt-2 text-[1.15rem] font-bold leading-tight tracking-[-0.025em] text-slate-950 sm:mt-2.5 sm:text-[1.8rem]">Mesyuarat Agung Tahunan Ke-13</h2>
                                <p class="mt-1 text-sm font-medium text-slate-500">AWQAF Holdings Berhad</p>
                            </div>
                        </div>

                        <div class="mx-4 grid grid-cols-2 rounded-xl border border-slate-200 bg-slate-50/70 sm:mx-8 sm:grid-cols-[1.1fr_.7fr_1.45fr]">
                            <div class="border-b border-r border-slate-200 px-3 py-2.5 sm:border-b-0 sm:px-4 sm:py-3.5">
                                <p class="text-[10px] font-bold uppercase tracking-[0.12em] text-slate-400">Tarikh</p>
                                <p class="mt-1 text-[13px] font-semibold text-slate-900">Rabu, 21 Oktober 2026</p>
                            </div>
                            <div class="border-b border-slate-200 px-3 py-2.5 sm:border-b-0 sm:border-r sm:px-4 sm:py-3.5">
                                <p class="text-[10px] font-bold uppercase tracking-[0.12em] text-slate-400">Masa</p>
                                <p class="mt-1 text-[13px] font-semibold text-slate-900">10.30 pagi</p>
                            </div>
                            <div class="col-span-2 px-3 py-2.5 sm:col-span-1 sm:px-4 sm:py-3.5">
                                <p class="text-[10px] font-bold uppercase tracking-[0.12em] text-slate-400">Lokasi</p>
                                <p class="mt-1 text-[13px] font-semibold leading-5 text-slate-900">Ibu Pejabat DPIM — M-02-05, Second Floor, Conezion Comercial, Persiaran IRC 3, Ioi Resort, 62502 Putrajaya</p>
                            </div>
                        </div>

                        <div class="px-4 pb-4 pt-3 sm:px-8 sm:pb-7 sm:pt-5">
                            <p class="text-[13px] leading-5 text-slate-500">
                                Dokumen AGM Ke-13 dan Penyata Kewangan Diaudit 2025 tersedia untuk semakan.
                            </p>

                            <a href="/agm/pengesahan-kehadiran" class="mt-3 flex min-h-11 w-full items-center justify-between rounded-xl bg-emerald-600 px-4 text-[13px] font-semibold text-white shadow-sm transition hover:bg-emerald-500 sm:mt-4 sm:min-h-12 sm:px-5 sm:text-sm">
                                <span>
                                    <span class="block">Pengesahan Kehadiran</span>
                                    <span class="mt-0.5 block text-[11px] font-medium text-emerald-50/80">Sahkan kehadiran AGM secara dalam talian</span>
                                </span>
                                <ArrowRightIcon class="h-4 w-4 shrink-0" />
                            </a>

                            <div class="mt-3 grid gap-2.5 sm:grid-cols-2">
                                <button type="button" class="inline-flex min-h-11 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 text-[13px] font-semibold text-slate-800 transition hover:bg-slate-50" @click="openReader('notice')">
                                    <EyeIcon class="h-4 w-4 text-slate-500" /> Baca Notis AGM
                                </button>
                                <a href="/documents/agm/2026/Notis-AGM-Ke-13-dan-Borang-Proksi.pdf" download class="inline-flex min-h-11 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 text-[13px] font-semibold text-slate-800 transition hover:bg-slate-50">
                                    <ArrowDownTrayIcon class="h-4 w-4 text-slate-500" /> Muat Turun Notis &amp; Proksi
                                </a>
                            </div>

                            <button type="button" class="mt-3 flex w-full items-center justify-between rounded-xl border border-slate-200 bg-slate-50/70 px-4 py-3 text-left transition hover:border-emerald-200 hover:bg-emerald-50/50" @click="openReader('financial')">
                                <span class="flex min-w-0 items-center gap-3">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-white text-emerald-700 ring-1 ring-slate-200"><DocumentTextIcon class="h-4 w-4" /></span>
                                    <span class="min-w-0">
                                        <span class="block truncate text-[13px] font-semibold text-slate-900">Penyata Kewangan Diaudit 2025</span>
                                        <span class="mt-0.5 block text-[11px] text-slate-500">Baca dalam paparan laman</span>
                                    </span>
                                </span>
                                <ArrowRightIcon class="h-4 w-4 shrink-0 text-emerald-700" />
                            </button>

                            <div class="mt-4 flex items-start gap-2 border-t border-slate-100 pt-4">
                                <span class="mt-1 h-1.5 w-1.5 shrink-0 rounded-full bg-amber-400"></span>
                                <p class="text-[11px] leading-4 text-slate-400">Tarikh akhir penghantaran Borang Proksi: <span class="font-semibold text-slate-600">19 Oktober 2026</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </Transition>

            <div v-if="showAgmReader || showFinancialReader" class="fixed inset-0 z-[110] flex flex-col bg-slate-950">
                <div class="flex min-h-16 items-center justify-between gap-4 border-b border-white/10 bg-slate-950 px-4 sm:px-6">
                    <div class="min-w-0">
                        <p class="truncate text-sm font-semibold text-white">{{ showAgmReader ? 'Notis AGM Ke-13 & Borang Proksi' : 'Penyata Kewangan Diaudit 2025' }}</p>
                        <p class="text-xs text-slate-400">AWQAF Holdings Berhad</p>
                    </div>
                    <button type="button" class="inline-flex items-center gap-2 rounded-lg border border-white/15 px-3 py-2 text-sm font-semibold text-white transition hover:bg-white/10" @click="showAgmReader = false; showFinancialReader = false">
                        <XMarkIcon class="h-4 w-4" /> Tutup
                    </button>
                </div>
                <iframe
                    :src="showAgmReader ? '/documents/agm/2026/Notis-AGM-Ke-13-dan-Borang-Proksi.pdf#view=FitH' : '/documents/reports/Penyata-Kewangan-Diaudit-2025.pdf#toolbar=0&navpanes=0&scrollbar=1&view=FitH'"
                    class="h-full w-full flex-1 bg-slate-100"
                    :title="showAgmReader ? 'Notis AGM Ke-13 dan Borang Proksi' : 'Penyata Kewangan Diaudit 2025'"
                ></iframe>
            </div>
        </Teleport>
        <!-- ═══ M0 · IDEA ═══ -->
        <section class="relative isolate flex min-h-[62vh] flex-col overflow-hidden bg-slate-950 lg:min-h-[82vh]">
            <!-- Cinematic hero: poster remains the resilient fallback while the muted
                 video loads. Reduced-motion users keep the static poster. -->
            <picture class="pointer-events-none absolute inset-0 -z-10 block">
                <source
                    v-if="!hasCustomHeroImage"
                    type="image/webp"
                    srcset="/images/hero/awqaf-hero-768.webp 768w, /images/hero/awqaf-hero-1152.webp 1152w, /images/hero/awqaf-hero-1536.webp 1536w"
                    sizes="100vw"
                />
                <img
                    :src="homepage.hero_image"
                    alt=""
                    aria-hidden="true"
                    width="1536"
                    height="1024"
                    decoding="async"
                    fetchpriority="high"
                    class="hero-img h-full w-full object-cover object-[72%_center] lg:object-[right_center]"
                />
            </picture>
            <video
                class="hero-video pointer-events-none absolute inset-0 -z-[9] h-full w-full object-cover object-[62%_center] motion-reduce:hidden md:object-center"
                autoplay
                muted
                loop
                playsinline
                preload="metadata"
                :poster="homepage.hero_image"
                aria-hidden="true"
            >
                <source :src="homepage.hero_video" type="video/mp4" />
            </video>
            <div
                class="pointer-events-none absolute inset-0 -z-10 hidden md:block"
                style="background: linear-gradient(90deg, rgba(4,10,18,.97) 0%, rgba(4,10,18,.92) 32%, rgba(4,10,18,.72) 55%, rgba(4,10,18,.30) 78%, rgba(4,10,18,.08) 100%);"
            ></div>
            <div
                class="pointer-events-none absolute inset-0 -z-10 md:hidden"
                style="background: linear-gradient(180deg, rgba(6,9,20,.92) 0%, rgba(6,9,20,.74) 52%, rgba(6,9,20,.9) 100%);"
            ></div>

            <div class="relative mx-auto flex w-full max-w-7xl flex-1 items-center px-5 py-8 sm:px-6 sm:py-14 lg:px-8 lg:py-16">
                <div class="max-w-[56rem]">
                    <p class="flex items-center gap-4 text-xs font-semibold uppercase tracking-[0.28em] text-emerald-400 sm:text-sm"><span>{{ homepage.eyebrow }}</span><span class="hidden h-px w-12 bg-white/50 sm:block" aria-hidden="true"></span></p>
                    <h1 class="mt-5 text-[1.85rem] font-extrabold leading-[1.04] tracking-[-0.04em] text-white min-[390px]:text-[2rem] sm:text-[2.9rem] lg:text-[3.25rem] xl:text-[3.5rem]">
                        <span class="block">{{ homepage.headline_line_1 }}</span>
                        <span class="block">{{ homepage.headline_line_2 }}</span>
                        <span class="block text-emerald-400 sm:whitespace-nowrap">{{ homepage.headline_line_3 }}</span>
                    </h1>
                    <p class="mt-4 max-w-[39rem] text-[14px] font-medium leading-6 text-white/90 min-[390px]:text-[15px] sm:text-base sm:leading-7">
                        {{ homepage.hero_description }}
                    </p>
                    <div class="mt-6 flex flex-col gap-2.5 sm:flex-row sm:items-center">
                        <a :href="route('waqaf.howto')" class="inline-flex min-h-12 items-center justify-center gap-2.5 rounded-lg bg-emerald-500 px-6 py-3 text-sm font-semibold text-slate-950 shadow-xl shadow-slate-950/20 transition hover:-translate-y-0.5 hover:bg-emerald-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-300 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                            Berwakaf Sekarang <ArrowRightIcon class="h-4 w-4" />
                        </a>
                        <a :href="route('korporat.overview')" class="inline-flex min-h-12 items-center justify-center gap-2.5 rounded-lg border border-white/40 bg-slate-950/20 px-6 py-3 text-sm font-semibold text-white backdrop-blur-md transition hover:-translate-y-0.5 hover:border-white/80 hover:bg-white/10 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white/70 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                            Kenali AWQAF <ArrowRightIcon class="h-4 w-4" />
                        </a>
                    </div>
                </div>
            </div>

            <div class="relative mx-auto w-full max-w-7xl px-6 pb-8 lg:px-8">
                <a :href="homepage.cta_url" class="group inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.18em] text-slate-400 transition hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">
                    Terokai bagaimana ia berfungsi
                    <ChevronDownIcon class="h-4 w-4 motion-safe:animate-bounce" aria-hidden="true" />
                </a>
            </div>
        </section>

        <!-- Quick institutional proof: gives first-time visitors immediate confidence
             before the longer editorial narrative begins. -->
        <section class="border-b border-slate-200 bg-white" aria-label="Ringkasan ketelusan AWQAF">
            <div class="mx-auto grid max-w-7xl grid-cols-1 divide-y divide-slate-100 px-6 sm:grid-cols-3 sm:divide-x sm:divide-y-0 lg:px-8">
                <div v-for="fact in facts" :key="`hero-${fact.label}`" class="py-7 sm:px-8 sm:first:pl-0 sm:last:pr-0 lg:py-8">
                    <p class="text-lg font-bold sm:text-xl tracking-[-0.03em] text-slate-950 lg:text-2xl">{{ fact.value }}</p>
                    <p class="mt-1.5 text-xs font-medium leading-5 text-slate-500 sm:text-sm">{{ fact.label }}</p>
                </div>
            </div>
        </section>

        <!-- ═══ M1 · PROBLEM ═══ -->
        <section id="refleksi" class="border-b border-white/5 bg-slate-950">
            <div class="mx-auto max-w-4xl px-5 py-8 sm:px-6 sm:py-14 lg:px-8 lg:py-16">
                <p v-reveal class="max-w-3xl text-base font-medium leading-7 text-slate-300 sm:text-xl">
                    Ekonomi yang berkembang dengan adil membuka peluang untuk masyarakat belajar, bekerja
                    dan membina kehidupan yang lebih sejahtera.
                </p>
                <p v-reveal="'150ms'" class="mt-5 max-w-3xl border-l-2 border-emerald-400 pl-4 text-base font-semibold leading-7 text-white sm:text-xl">
                    Namun apabila kekayaan hanya tertumpu kepada segelintir, jurang semakin melebar — dan
                    manfaat pembangunan tidak lagi dinikmati secara menyeluruh.
                </p>
            </div>
        </section>

        <!-- ═══ M2 · PHILOSOPHY ═══ -->
        <section class="bg-white">
            <div class="mx-auto max-w-5xl px-5 py-8 sm:px-6 sm:py-14 lg:px-8 lg:py-16">
                <p v-reveal class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700">Waqaf Korporat</p>
                <h2 v-reveal="'80ms'" class="mt-3 max-w-3xl text-[1.45rem] font-bold leading-[1.18] tracking-[-0.03em] text-slate-900 sm:text-[2rem]">
                    Waqaf bukan sekadar warisan harta. Ia warisan peluang — sebuah ekonomi yang membolehkan
                    setiap generasi membina masa depannya sendiri.
                </h2>

                <p v-reveal class="mt-6 max-w-3xl text-base font-semibold leading-7 tracking-tight text-slate-900 sm:text-lg">
                    Pertumbuhan ekonomi dan amanah kepada masyarakat tidak seharusnya dipisahkan.
                </p>
                <p v-reveal class="mt-6 max-w-2xl text-base leading-7 text-slate-600 sm:text-lg">
                    Apabila keduanya berjalan seiring, setiap kemajuan ekonomi turut mengangkat kehidupan
                    masyarakat — dan kemakmuran menjadi warisan yang dikongsi, bukan sekadar keuntungan yang berlalu.
                </p>
                <p v-reveal="'80ms'" class="mt-5 max-w-2xl text-base leading-7 text-slate-600 sm:text-lg">
                    Daripada keyakinan inilah Waqaf Korporat lahir — sebuah pendekatan pembangunan yang memajukan
                    dan mengurus aset wakaf secara profesional sebagai amanah, menjadikannya pemangkin pembangunan
                    ekonomi yang mampan, supaya kemakmuran yang dijana terus memberi manfaat kepada masyarakat dan
                    generasi akan datang.
                </p>

                <div class="mt-6 grid gap-2 border-t border-slate-100 pt-5 sm:grid-cols-3">
                    <p v-reveal class="text-base font-medium leading-7 text-slate-500 sm:text-lg">
                        Waqaf bukan sekadar memberi — <span class="font-semibold text-slate-900">ia membina.</span>
                    </p>
                    <p v-reveal="'100ms'" class="text-base font-medium leading-7 text-slate-500 sm:text-lg">
                        Bukan sekadar membantu — <span class="font-semibold text-slate-900">ia memperkasa.</span>
                    </p>
                    <p v-reveal="'200ms'" class="text-base font-medium leading-7 text-slate-500 sm:text-lg">
                        Bukan sekadar mengurus aset — <span class="font-semibold text-slate-900">ia membina ekonomi yang memberi manfaat kepada semua.</span>
                    </p>
                </div>
            </div>
        </section>

        <!-- ═══ M3 · MODEL ═══ -->
        <section class="border-y border-slate-100 bg-slate-50">
            <div class="mx-auto max-w-5xl px-5 py-8 sm:px-6 sm:py-14 lg:px-8 lg:py-16">
                <div class="max-w-2xl">
                    <p v-reveal class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700">Model</p>
                    <h2 v-reveal="'80ms'" class="mt-3 text-[1.45rem] font-bold tracking-tight text-slate-900 sm:text-3xl">
                        Bagaimana kemakmuran menjadi milik bersama
                    </h2>
                    <p v-reveal="'140ms'" class="mt-4 text-base leading-7 text-slate-600 sm:text-lg">
                        Nilai yang dijana tidak dibelanjakan sekali habis. Hasilnya membina pendidikan,
                        kesihatan dan masa depan komuniti.
                    </p>
                </div>
                <div v-reveal class="mt-6 grid grid-cols-1 gap-px overflow-hidden rounded-lg border border-slate-200 bg-slate-200 sm:grid-cols-3">
                    <div v-for="step in modelFlow" :key="step.n" class="bg-white p-5 transition hover:bg-slate-50 lg:p-5">
                        <span class="text-sm font-semibold tabular-nums text-emerald-700">{{ step.n }}</span>
                        <h3 class="mt-3 text-base font-semibold text-slate-900 lg:text-lg">{{ step.t }}</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">{{ step.d }}</p>
                    </div>
                </div>
                <div class="mt-7">
                    <a :href="route('waqaf.corporate')" class="inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-700 hover:underline">
                        Fahami Waqaf Korporat <ArrowRightIcon class="h-4 w-4" />
                    </a>
                </div>
            </div>
        </section>

        <!-- ═══ M4 · INSTITUTION ═══ -->
        <section class="bg-slate-950">
            <div class="mx-auto max-w-5xl px-5 py-8 sm:px-6 sm:py-12 lg:px-8 lg:py-14">
                <p v-reveal class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-400">Institusi</p>
                <h2 v-reveal="'80ms'" class="mt-3 max-w-3xl text-[1.45rem] font-bold leading-tight tracking-tight text-white sm:text-3xl">
                    Institusi yang menterjemahkan falsafah ini menjadi tindakan.
                </h2>
                <p v-reveal="'140ms'" class="mt-4 max-w-2xl text-base leading-7 text-slate-300">
                    AWQAF Holdings Berhad ialah sebuah institusi Waqaf Korporat. Ia membina dan menguruskan
                    aset wakaf secara profesional supaya nilai yang dijana kekal, berkembang dan terus memberi
                    manfaat kepada masyarakat.
                </p>

                <!-- Semantic grid (not a <dl>): the last cell is a CTA, not a
                     term/definition, so a definition list would be invalid (a11y). -->
                <div class="mt-7 grid grid-cols-1 gap-x-8 gap-y-5 border-t border-white/10 pt-6 sm:grid-cols-2 lg:grid-cols-3">
                    <div v-for="(p, i) in pillars" :key="p.t" v-reveal="`${i * 60}ms`">
                        <p class="text-sm font-semibold text-white">{{ p.t }}</p>
                        <p class="mt-1.5 text-sm leading-6 text-slate-400">{{ p.d }}</p>
                    </div>
                    <div v-reveal="'300ms'" class="flex items-end">
                        <a :href="route('korporat.overview')" class="inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-400 hover:underline">
                            Mengenai AWQAF <ArrowRightIcon class="h-4 w-4" />
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ═══ M5 · WHAT IT BUILDS ═══ -->
        <section class="bg-white">
            <div class="mx-auto max-w-5xl px-5 py-8 sm:px-6 sm:py-12 lg:px-8 lg:py-14">
                <div class="max-w-2xl">
                    <p v-reveal class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700">Di sebalik model</p>
                    <h2 v-reveal="'80ms'" class="mt-3 text-[1.45rem] font-bold tracking-tight text-slate-900 sm:text-3xl">
                        Nilai yang dibina. Manfaat yang dikongsi.
                    </h2>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-x-8 gap-y-6 lg:grid-cols-2">
                    <!-- Assets built — Portfolio Pelaburan -->
                    <div v-reveal>
                        <p class="text-sm font-semibold text-slate-900">Aset yang dibina <span class="text-slate-400">— Portfolio Pelaburan</span></p>
                        <ul class="mt-4 grid gap-2">
                            <li v-for="p in portfolios" :key="p.slug">
                                <a :href="route('portfolio.show', p.slug)" class="group flex items-center justify-between gap-3 border-b border-slate-200 bg-white px-1 py-3 transition hover:border-emerald-300 hover:bg-slate-50/70">
                                    <span class="flex min-w-0 items-center gap-3">
                                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-md bg-slate-50 text-emerald-700 ring-1 ring-slate-200 transition group-hover:bg-white group-hover:ring-emerald-200">
                                            <component :is="p.icon" class="h-4 w-4" aria-hidden="true" />
                                        </span>
                                        <span class="min-w-0">
                                            <span class="font-semibold text-slate-900 transition group-hover:text-emerald-700">{{ p.name }}</span>
                                            <span class="mt-0.5 block text-sm leading-5 text-slate-500">{{ p.line }}</span>
                                        </span>
                                    </span>
                                    <ArrowRightIcon class="h-4 w-4 flex-none text-slate-300 transition group-hover:translate-x-0.5 group-hover:text-emerald-700" />
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Benefits shared — Program & Inisiatif -->
                    <div v-reveal="'100ms'">
                        <p class="text-sm font-semibold text-slate-900">Manfaat yang dikongsi <span class="text-slate-400">— Program &amp; Inisiatif</span></p>
                        <ul class="mt-4 grid gap-2">
                            <li v-for="p in programmes" :key="p.slug">
                                <a :href="route('program.show', p.slug)" class="group flex items-center justify-between gap-3 border-b border-slate-200 bg-white px-1 py-3 transition hover:border-emerald-300 hover:bg-slate-50/70">
                                    <span class="flex min-w-0 items-center gap-3">
                                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-md bg-slate-50 text-emerald-700 ring-1 ring-slate-200 transition group-hover:bg-white group-hover:ring-emerald-200">
                                            <component :is="p.icon" class="h-4 w-4" aria-hidden="true" />
                                        </span>
                                        <span class="min-w-0">
                                            <span class="font-semibold text-slate-900 transition group-hover:text-emerald-700">{{ p.name }}</span>
                                            <span class="mt-0.5 block text-sm leading-5 text-slate-500">{{ p.line }}</span>
                                        </span>
                                    </span>
                                    <ArrowRightIcon class="h-4 w-4 flex-none text-slate-300 transition group-hover:translate-x-0.5 group-hover:text-emerald-700" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- ═══ M6 · AMANAH & EVIDENCE ═══ -->
        <section class="bg-slate-950">
            <div class="mx-auto max-w-6xl px-5 py-8 sm:px-6 sm:py-12 lg:px-8 lg:py-14">
                <div class="max-w-2xl">
                    <p v-reveal class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-400">Amanah</p>
                    <h2 v-reveal="'80ms'" class="mt-3 text-[1.45rem] font-bold tracking-tight text-white sm:text-3xl">
                        Amanah yang dibuktikan, bukan dilaung.
                    </h2>
                    <p v-reveal="'140ms'" class="mt-4 text-base leading-7 text-slate-300 sm:text-lg">
                        Diperbadankan di bawah Akta Syarikat 2016, diselia Lembaga Pengarah sembilan ahli, dan
                        diaudit setiap tahun. Rekod kewangan didedahkan sepenuhnya menerusi Pusat Ketelusan
                        dan laporan tahunan yang diterbitkan.
                    </p>
                </div>

                <dl v-reveal class="mt-7 grid grid-cols-1 gap-x-7 gap-y-5 border-y border-white/10 py-5 sm:grid-cols-3">
                    <div v-for="f in facts" :key="f.label">
                        <dt class="text-2xl font-bold tracking-tight text-emerald-400 sm:text-3xl">{{ f.value }}</dt>
                        <dd class="mt-1.5 text-sm text-slate-400">{{ f.label }}</dd>
                    </div>
                </dl>

                <div v-reveal class="mt-5 flex flex-wrap gap-x-6 gap-y-2 text-sm font-semibold">
                    <a :href="route('korporat.reports')" class="text-emerald-400 hover:underline">Laporan Tahunan &amp; Penyata Kewangan →</a>
                    <a :href="route('korporat.leadership.index')" class="text-emerald-400 hover:underline">Lembaga Pengarah →</a>
                    <a :href="route('ketelusan')" class="text-emerald-400 hover:underline">Laporan &amp; Tadbir Urus →</a>
                </div>
            </div>
        </section>

        <!-- ═══ M7 · WARISAN PEMIKIRAN ═══ -->
        <!-- Warm near-black bg (#100c08) matches the book render's dark bokeh edges so the
             cover floats with no hard rectangular boundary; also distinguishes this movement
             from M6's cool slate-950. Editorial feature (spotlight + vignette + gentle float
             + grounded reflection) — tightened spacing balances the copy against the cover.
             Reading order text → book: heading/body/actions lead, cover is the focal point.
             Two book actions: "Maklumat Buku" (founder page) and "Dapatkan Buku" (a specific
             book-purchase enquiry mailto until a verified purchase URL / WhatsApp exists). -->
        <section class="relative isolate overflow-hidden bg-[#100c08]">
            <div class="section-vignette" aria-hidden="true"></div>
            <div class="relative mx-auto max-w-6xl px-5 py-8 sm:px-6 sm:py-12 lg:px-8 lg:py-14">
                <div class="grid grid-cols-1 items-center gap-6 lg:grid-cols-12 lg:gap-9">
                    <!-- Editorial copy — leads the eye -->
                    <div class="lg:col-span-7">
                        <p v-reveal class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-400">Warisan Pemikiran</p>
                        <h2 v-reveal="'80ms'" class="mt-3 text-[1.45rem] font-bold leading-tight tracking-tight text-white sm:text-3xl">
                            Warisan sebenar bukan sekadar institusi yang dibina,<br class="hidden sm:block" />
                            tetapi pemikiran yang ditinggalkan.
                        </h2>
                        <p v-reveal="'140ms'" class="mt-4 max-w-xl text-base leading-7 text-slate-300 sm:text-lg">
                            Biografi Allahyarham Tan Sri Muhammad Ali Hashim merakamkan pemikiran yang mendasari
                            gagasan Waqaf Korporat — sebuah rujukan institusi yang meletakkan falsafah AWQAF dalam
                            konteks sejarah dan idea yang lebih luas.
                        </p>
                        <div v-reveal="'200ms'" class="mt-6 flex flex-wrap items-center gap-4">
                            <!-- Aliran pertanyaan pembelian khusus (bukan halaman hubungi umum).
                                 Tukar kepada pautan WhatsApp rasmi (wa.me/<no>) apabila nombor
                                 rasmi disahkan, atau URL pembelian sebenar apabila tersedia. -->
                            <a href="mailto:admin@awqaf.my?subject=Pertanyaan%20Pembelian%20Buku%20Biografi%20Tan%20Sri%20Muhammad%20Ali%20Hashim&body=Assalamualaikum%2C%20saya%20berminat%20untuk%20mendapatkan%20naskhah%20buku%20biografi%20Tan%20Sri%20Muhammad%20Ali%20Hashim.%20Mohon%20maklumat%20lanjut%20mengenai%20cara%20pembelian." class="inline-flex items-center gap-2 rounded-lg bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-500 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400 focus-visible:ring-offset-2 focus-visible:ring-offset-[#100c08]">
                                Dapatkan Buku <ArrowRightIcon class="h-4 w-4" />
                            </a>
                            <a :href="route('korporat.founder')" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-400 transition hover:gap-3 hover:text-emerald-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 focus-visible:ring-offset-2 focus-visible:ring-offset-[#100c08]">
                                Maklumat Buku <ArrowRightIcon class="h-4 w-4" />
                            </a>
                        </div>
                    </div>

                    <!-- The biography cover — compact editorial focal point (no reflection/spotlight
                         stack; those inflated the section to hero height). -->
                    <figure v-reveal="'200ms'" class="lg:col-span-5">
                        <img
                            src="/images/buku-biografi.webp"
                            alt="Muka depan buku 'Muhammad Ali Hashim: Champion of Business Jihad and Corporate Waqaf' oleh Rokiah Talib"
                            width="1122"
                            height="1402"
                            loading="lazy"
                            decoding="async"
                            class="book-cover mx-auto block w-full max-w-[320px] rounded-lg shadow-2xl shadow-black/30"
                        />
                    </figure>
                </div>
            </div>
        </section>

        <!-- ═══ M8 · INVITATION ═══ -->
        <section class="bg-white">
            <div class="mx-auto max-w-5xl px-5 py-8 sm:px-6 sm:py-12 lg:px-8 lg:py-14">
                <div class="max-w-2xl">
                    <p v-reveal class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700">Sertai pembinaan</p>
                    <h2 v-reveal="'80ms'" class="mt-3 text-[1.45rem] font-bold tracking-tight text-slate-900 sm:text-3xl">Bina bersama kami.</h2>
                    <p v-reveal="'140ms'" class="mt-4 text-base leading-7 text-slate-600 sm:text-lg">
                        Setiap wakaf menyertai usaha membina ekonomi yang memberi manfaat berterusan kepada ummah —
                        sebuah amanah yang mewarisi kebaikan merentas generasi.
                    </p>
                </div>

                <div v-reveal class="mt-7 grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="rounded-xl bg-gradient-to-br from-emerald-700 to-emerald-800 p-5 shadow-[0_12px_30px_rgba(6,78,59,0.12)]">
                        <h3 class="text-lg font-bold sm:text-xl text-white">Bina bersama AWQAF</h3>
                        <p class="mt-3 text-sm leading-relaxed text-emerald-50">
                            Sertai sebagai pewakaf dan pilih kaedah berwakaf kepada AWQAF Holdings Berhad.
                        </p>
                        <a :href="route('waqaf.howto')" class="mt-5 inline-flex items-center gap-2 rounded-lg bg-white px-5 py-2.5 text-sm font-semibold text-emerald-800 transition hover:bg-emerald-50">
                            Lihat Kaedah Berwakaf <ArrowRightIcon class="h-4 w-4" />
                        </a>
                    </div>
                    <div class="rounded-xl border border-slate-200 bg-slate-50/60 p-5">
                        <h3 class="text-lg font-bold sm:text-xl text-slate-900">Portal Pewakaf</h3>
                        <p class="mt-3 text-sm leading-relaxed text-slate-500">
                            Untuk pewakaf sedia ada mengakses akaun, rekod wakaf, resit dan dokumen keahlian.
                        </p>
                        <a v-if="page.props.portalReady" :href="page.props.portalUrl" class="mt-5 inline-flex items-center gap-2 rounded-lg border border-emerald-600 px-5 py-2.5 text-sm font-semibold text-emerald-700 transition hover:bg-emerald-50">
                            Masuk ke Portal <ArrowRightIcon class="h-4 w-4" />
                        </a>
                        <span v-else class="mt-5 inline-flex items-center gap-2 rounded-lg border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-400">
                            Akan Dibuka
                        </span>
                    </div>
                </div>

                <p v-reveal class="mt-8 border-t border-slate-100 pt-6 text-center text-base font-semibold tracking-tight text-slate-900 sm:text-lg">
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
.hero-video {
    background: #060914;
}
@keyframes heroDrift {
    from {
        transform: scale(1.06);
    }
    to {
        transform: scale(1);
    }
}

/* ── M7 · Warisan Pemikiran — biography as a museum object ── */

/* Soft vignette: darkens the section corners so the eye settles centrally. */
.section-vignette {
    position: absolute;
    inset: 0;
    z-index: 0;
    pointer-events: none;
    background: radial-gradient(120% 115% at 50% 40%, transparent 52%, rgba(0, 0, 0, 0.55) 100%);
}

.book-stage {
    padding-top: 1.5rem;
}

/* Radial spotlight glowing warmly behind the cover, as if lit in a gallery. */
.book-spot {
    position: absolute;
    left: 50%;
    top: 40%;
    width: 122%;
    aspect-ratio: 1 / 1;
    transform: translate(-50%, -50%);
    background: radial-gradient(
        closest-side,
        rgba(255, 241, 214, 0.16),
        rgba(255, 241, 214, 0.05) 46%,
        transparent 72%
    );
    filter: blur(8px);
    z-index: 0;
    pointer-events: none;
}

/* Realistic light-from-above shadow + a gentle, slow float for depth. */
.book-cover {
    position: relative;
    z-index: 1;
    filter: drop-shadow(0 26px 44px rgba(0, 0, 0, 0.62))
        drop-shadow(0 8px 16px rgba(0, 0, 0, 0.45));
    animation: bookFloat 7s ease-in-out infinite alternate;
    will-change: transform;
}

/* Very subtle grounded reflection; stays on the "floor" while the cover floats. */
.book-reflection {
    position: relative;
    z-index: 0;
    margin-top: 2px;
    transform: scaleY(-1);
    opacity: 0.16;
    filter: blur(1px);
    -webkit-mask-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.55), transparent 42%);
    mask-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.55), transparent 42%);
    pointer-events: none;
}

@keyframes bookFloat {
    from {
        transform: translateY(0);
    }
    to {
        transform: translateY(-10px);
    }
}

@media (prefers-reduced-motion: reduce) {
    .hero-img,
    .book-cover {
        animation: none;
    }
}
</style>
