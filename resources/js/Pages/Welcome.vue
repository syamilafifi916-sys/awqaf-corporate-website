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

const stats = [
    { value: 'RM13.27 juta', label: 'Jumlah dana Kumpulan & ahli (Ogos 2024)' },
    { value: '3,431', label: 'Jumlah Ahli & Pewakaf (2024)' },
    { value: 'RM206,356', label: 'Kutipan wakaf tahun 2024' },
    { value: '4', label: 'Sektor pelaburan strategik' },
];
const statIcons = [BanknotesIcon, UsersIcon, ChartBarIcon, CpuChipIcon];

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
    { name: 'ZuriatCARE', stat: 'RM75,770', statLabel: 'disalurkan tahun 2023', description: 'Sokongan kesihatan mental, rujukan dan bantuan komuniti — dijalankan bersama Kementerian Kesihatan Malaysia.' },
    { name: 'EduWAQF', stat: 'RM20,000', statLabel: 'biasiswa disalurkan', description: 'Bantuan kewangan kepada pelajar IPT yang memerlukan, tanpa mengira latar belakang.' },
    { name: 'AWQAF4Health', stat: 'Akan datang', statLabel: 'butiran dikemas kini', description: 'Program disasarkan untuk menyalurkan dana wakaf kepada inisiatif kesihatan komuniti.' },
];
const programIcons = { ZuriatCARE: HeartIcon, EduWAQF: AcademicCapIcon, AWQAF4Health: UserGroupIcon };

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

const trustLayer = [
    { icon: DocumentCheckIcon, title: 'Laporan Diaudit', body: 'Penyata kewangan disahkan juruaudit setiap tahun.', href: () => route('korporat.reports') },
    { icon: ScaleIcon, title: 'Tadbir Urus Korporat', body: 'Beroperasi di bawah Akta Syarikat 2016.', href: () => route('ketelusan') },
    { icon: UserGroupIcon, title: 'Penyeliaan Lembaga Pengarah', body: '9 ahli Lembaga, diselia jawatankuasa khusus.', href: () => route('korporat.overview') },
    { icon: ShieldCheckIcon, title: 'Pusat Ketelusan', body: 'Semua laporan & tadbir urus di satu tempat.', href: () => route('ketelusan') },
    { icon: Square3Stack3DIcon, title: 'Akses Portal Ahli', body: 'Jejak wakaf & tahap keahlian anda sendiri.', href: () => page.props.portalUrl, external: true },
    { icon: ReceiptPercentIcon, title: 'Pendedahan Kewangan', body: '11 tahun data kutipan didedahkan penuh.', href: () => route('korporat.reports') },
];
</script>

<template>
    <Head title="Waqaf Korporat untuk Kelestarian Ummah" />

    <PublicLayout>
        <!-- ═══ IDENTITY ═══ -->
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

            <div class="relative mx-auto flex min-h-[80vh] max-w-7xl items-center px-6 py-28 lg:px-8 lg:py-40">
                <div class="max-w-2xl">
                    <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-xs font-medium text-emerald-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                        Institusi Waqaf Korporat Pertama di Malaysia
                    </div>
                    <h1 class="mt-6 text-5xl font-bold leading-[1.08] tracking-tight text-white sm:text-6xl">
                        AWQAF Holdings Berhad menjaga wakaf anda — untuk kekal memberi manfaat.
                    </h1>
                    <p class="mt-6 max-w-xl text-lg leading-relaxed text-slate-300">
                        Institusi waqaf korporat yang diperbadankan di bawah Akta Syarikat 2016 dan diaudit setiap
                        tahun — menyalurkan manfaat berterusan kepada pendidikan, kesihatan dan kebajikan komuniti.
                    </p>
                    <div class="mt-10 flex flex-wrap gap-4">
                        <Link :href="route('waqaf.howto')" class="rounded-lg bg-emerald-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-950/50 transition hover:bg-emerald-500">
                            Mulakan Wakaf Anda
                        </Link>
                        <Link :href="route('korporat.reports')" class="rounded-lg border border-white/15 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                            Lihat Laporan Diaudit →
                        </Link>
                    </div>
                    <div class="mt-14 flex flex-wrap gap-x-8 gap-y-3 border-t border-white/10 pt-8 text-xs text-slate-400">
                        <span class="flex items-center gap-2"><span class="h-1 w-1 rounded-full bg-emerald-400"></span>Akta Syarikat 2016</span>
                        <span class="flex items-center gap-2"><span class="h-1 w-1 rounded-full bg-emerald-400"></span>Diaudit setiap tahun</span>
                        <span class="flex items-center gap-2"><span class="h-1 w-1 rounded-full bg-emerald-400"></span>Waqaf Korporat® berdaftar</span>
                        <span class="flex items-center gap-2"><span class="h-1 w-1 rounded-full bg-emerald-400"></span>11 tahun rekod didedahkan</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sourced evidence strip -->
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

        <!-- ═══ PURPOSE ═══ -->
        <section class="bg-white py-24">
            <div class="mx-auto max-w-4xl px-6 text-center lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Tujuan</p>
                <h2 class="mt-3 text-4xl font-bold leading-tight text-slate-900">
                    Institusi wakaf korporat yang berdiri atas tadbir urus, bukan janji.
                </h2>
                <p class="mx-auto mt-4 max-w-2xl text-slate-500">
                    AWQAF Holdings Berhad memegang wakaf sebagai amanah kekal — direkod, dilindungi dan
                    diperkembang di bawah pengawasan lembaga dan jawatankuasa yang berstruktur.
                </p>
            </div>

            <div class="mx-auto mt-16 grid max-w-6xl grid-cols-1 gap-8 px-6 lg:grid-cols-3 lg:px-8">
                <div class="rounded-2xl border border-slate-100 p-8">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Mandat</span>
                    <h3 class="mt-3 text-lg font-semibold text-slate-900">Amanah wakaf yang kekal</h3>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">Setiap sumbangan diuruskan sebagai aset wakaf kekal — bukan derma sekali lewat. Modal asal dikekalkan; hanya hasilnya disalurkan kepada manfaat masyarakat.</p>
                </div>
                <div class="rounded-2xl border border-emerald-100 bg-emerald-50/50 p-8">
                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Model</span>
                    <h3 class="mt-3 text-lg font-semibold text-slate-900">Waqaf Korporat®</h3>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">Konsep berdaftar yang dilesenkan kepada AWQAF Holdings Berhad — menukar wakaf menjadi perniagaan mapan milik ummah, turut dikaji Universiti Oxford (2010).</p>
                </div>
                <div class="rounded-2xl border border-slate-100 p-8">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Tadbir Urus</span>
                    <h3 class="mt-3 text-lg font-semibold text-slate-900">Berstruktur &amp; diaudit</h3>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">Diperbadankan di bawah Akta Syarikat 2016, diselia Lembaga Pengarah serta Jawatankuasa Pelaburan dan Audit, dengan penyata kewangan diaudit setiap tahun.</p>
                </div>
            </div>

            <div class="mx-auto mt-12 max-w-4xl px-6 text-center lg:px-8">
                <p class="text-sm leading-relaxed text-slate-500">
                    Model wakaf korporat ini berakar daripada Waqaf An-Nur Corporation (1998) — institusi wakaf
                    korporat pertama di Malaysia — dan kini diperkembang oleh AWQAF Holdings Berhad.
                    <Link :href="route('korporat.overview')" class="font-semibold text-emerald-700 underline decoration-emerald-700/40 underline-offset-2 hover:decoration-emerald-700">Ketahui lebih lanjut tentang AWQAF →</Link>
                </p>
            </div>
        </section>

        <!-- Portfolio — purpose enacted -->
        <section class="bg-slate-50 py-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="text-center">
                    <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Portfolio Pelaburan</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900">Aset wakaf yang bekerja untuk Ummah</h2>
                    <p class="mx-auto mt-3 max-w-2xl text-slate-500">Dana wakaf disalurkan ke dalam perniagaan strategik yang menjana pendapatan lestari, yang kemudiannya disalurkan semula untuk manfaat komuniti.</p>
                </div>
                <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-3">
                    <div class="rounded-2xl border border-slate-100 bg-white p-8">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700"><component :is="portfolioIcons[0]" class="h-6 w-6" /></div>
                        <h3 class="mt-4 font-semibold text-slate-900">Pendidikan</h3>
                        <p class="mt-2 text-sm text-slate-500">Al-Mashoor International Islamic School (AMIIS) di Pulau Pinang — kerjasama strategik bersama MAINPP &amp; YIPP — serta platform digital EDEX/EDEXplore.</p>
                    </div>
                    <div class="rounded-2xl border border-slate-100 bg-white p-8">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700"><component :is="portfolioIcons[1]" class="h-6 w-6" /></div>
                        <h3 class="mt-4 font-semibold text-slate-900">Kesihatan &amp; Kesejahteraan</h3>
                        <p class="mt-2 text-sm text-slate-500">CURVES, rangkaian pusat kecergasan khusus wanita di bawah AHB Wellness Sdn Bhd — kini di 3 cawangan, disasar berkembang ke 10 dalam tempoh 3 tahun.</p>
                    </div>
                    <div class="rounded-2xl border border-slate-100 bg-white p-8">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700"><component :is="portfolioIcons[2]" class="h-6 w-6" /></div>
                        <h3 class="mt-4 font-semibold text-slate-900">Teknologi Kewangan Wakaf</h3>
                        <p class="mt-2 text-sm text-slate-500">Platform "Infaq" oleh AHB Fintech Sdn Bhd memudahkan penajaan iftar Ramadan dengan jejak niat yang jelas, resit segera dan pelaporan telus.</p>
                    </div>
                </div>
                <div class="mt-8 rounded-2xl border border-slate-100 bg-white p-6 text-sm text-slate-500">
                    <strong class="text-slate-700">Ketelusan portfolio:</strong> Sepanjang 2024, Lembaga Pengarah menamatkan dua unit yang tidak lagi mampan (Al-Hamra Integrated School dan Damai Senior Care Centre), menumpukan sumber kepada sektor berdaya tahan — selaras tema Laporan Tahunan 2024, "Memacu Pertumbuhan, Kelestarian Wakaf".
                </div>
            </div>
        </section>

        <!-- ═══ EVIDENCE ═══ -->
        <section class="relative overflow-hidden bg-slate-950 py-24">
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-12 lg:grid-cols-3">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wider text-emerald-400">Ketelusan Kewangan</p>
                        <h2 class="mt-3 text-3xl font-bold text-white">11 tahun kutipan wakaf, direkod dan didedahkan.</h2>
                        <p class="mt-4 text-sm text-slate-300">Kami paparkan data sebenar — termasuk tahun mencabar — kerana ketelusan adalah asas kepercayaan. Setiap angka disahkan menerusi Penyata Kewangan Diaudit tahunan.</p>
                        <Link :href="route('korporat.reports')" class="mt-6 inline-block text-sm font-semibold text-emerald-400 hover:underline">Lihat Laporan Tahunan penuh →</Link>
                    </div>
                    <div class="lg:col-span-2"><CollectionChart :data="collections" dark /></div>
                </div>
            </div>
        </section>

        <!-- ═══ GOVERNANCE ═══ -->
        <section class="bg-white py-24">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Tadbir Urus</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900">Diurus dengan pengawasan, bukan kepercayaan semata-mata.</h2>
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

        <!-- ═══ IMPACT ═══ -->
        <section class="bg-slate-50 py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="text-center">
                    <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Impak</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900">Ke mana wakaf anda pergi</h2>
                    <p class="mx-auto mt-3 max-w-2xl text-slate-500">Manfaat yang boleh dikira, disalurkan kepada masyarakat menerusi program kebajikan yang berterusan.</p>
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

                <!-- Photo-ready documentary placeholder (clearly marked; awaiting real AWQAF photography) -->
                <div class="mt-8 flex aspect-[21/9] items-center justify-center overflow-hidden rounded-2xl border-2 border-dashed border-slate-300 bg-white">
                    <div class="px-6 text-center">
                        <CameraIcon class="mx-auto h-8 w-8 text-slate-400" />
                        <p class="mt-3 text-xs font-semibold uppercase tracking-wider text-slate-500">Ruang Foto Dokumentari</p>
                        <p class="mx-auto mt-1 max-w-md text-sm text-slate-500">Foto sebenar penerima manfaat &amp; program AWQAF (dengan kebenaran) — untuk disediakan oleh pihak AWQAF.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ═══ VISION ═══ -->
        <section class="relative overflow-hidden bg-slate-950 py-24">
            <div class="relative mx-auto max-w-6xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <p class="text-sm font-semibold uppercase tracking-wider text-emerald-400">Hala Tuju Strategik</p>
                    <h2 class="mt-3 text-3xl font-bold text-white">AWQAF 2035</h2>
                    <p class="mt-4 text-slate-300">Membina di atas momentum sedia ada — bergerak ke arah wakaf korporat yang lebih inklusif, digital dan mampan untuk generasi akan datang.</p>
                </div>
                <div class="mx-auto mt-10 flex max-w-3xl flex-wrap justify-center gap-3">
                    <span v-for="fact in momentum2024" :key="fact" class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-xs text-slate-300">{{ fact }}</span>
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

        <!-- ═══ JOIN ═══ -->
        <section class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div class="rounded-3xl bg-emerald-700 px-10 py-16 text-center">
                <h2 class="text-3xl font-bold text-white">Mulakan wakaf anda bersama AWQAF</h2>
                <p class="mx-auto mt-4 max-w-xl text-emerald-50">Setiap sumbangan direkod, bers-resit rasmi dan diaudit — satu amanah yang dijaga untuk kekal memberi manfaat.</p>
                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <Link :href="route('waqaf.howto')" class="rounded-lg bg-white px-6 py-3 text-sm font-semibold text-emerald-700 transition hover:bg-emerald-50">Mulakan Wakaf Anda</Link>
                    <a :href="page.props.portalUrl" class="inline-flex items-center gap-2 rounded-lg border border-white/30 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                        Masuk ke Portal Pewakaf
                        <ArrowRightIcon class="h-4 w-4" />
                    </a>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
