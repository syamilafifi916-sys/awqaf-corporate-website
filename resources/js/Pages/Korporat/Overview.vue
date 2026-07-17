<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import WaqafModel from '@/Components/WaqafModel.vue';
import { Head, Link } from '@inertiajs/vue3';
import {
    BuildingLibraryIcon,
    ChartBarIcon,
    DocumentCheckIcon,
    ScaleIcon,
    ShieldCheckIcon,
    UsersIcon,
} from '@heroicons/vue/24/outline';

const facts = [
    { icon: BuildingLibraryIcon, k: 'Diperbadankan', v: 'Akta Syarikat 2016' },
    { icon: ScaleIcon, k: 'Model', v: 'Waqaf Korporat® berdaftar' },
    { icon: UsersIcon, k: 'Pengawasan', v: 'Lembaga 9 ahli · 2 jawatankuasa' },
    { icon: DocumentCheckIcon, k: 'Kewangan', v: 'Diaudit setiap tahun' },
];

const structure = [
    { k: 'i', h: 'Wakaf membina aset produktif', b: 'Sumbangan wakaf disalurkan untuk membangunkan perniagaan dan aset yang produktif — bukan dibelanjakan sekali habis.' },
    { k: 'ii', h: 'Modal kekal sebagai wakaf', b: 'Aset asal dikekalkan sebagai wakaf yang tidak dijual atau dihabiskan; hanya hasilnya diagihkan.' },
    { k: 'iii', h: 'Manfaat perpetual kepada ummah', b: 'Hasil disalurkan berterusan kepada pendidikan, kesihatan dan kebajikan, merentas generasi.' },
];

const committees = [
    { name: 'Jawatankuasa Pelaburan', chair: 'Datuk Wira Dr. Ramli bin Tahir', body: 'Menyelia keputusan pelaburan dan pertumbuhan portfolio aset wakaf, memastikan setiap pelaburan selari dengan matlamat kelestarian jangka panjang.' },
    { name: 'Jawatankuasa Audit', chair: "Dato' (Dr.) Haji Salihin bin Abang", body: 'Mengawasi ketepatan pelaporan kewangan, pematuhan perundangan dan keberkesanan kawalan dalaman AWQAF.' },
];

const board = [
    { name: "Dato' Haji Mohammad Sahar bin Mat Din", title: 'Pengerusi' },
    { name: 'Datuk Wira Dr. Ramli bin Tahir', title: 'Pengerusi Jawatankuasa Pelaburan' },
    { name: "Dato' (Dr.) Haji Salihin bin Abang", title: 'Pengerusi Jawatankuasa Audit' },
    { name: 'Puan Azizah binti Abdul Rahman', title: 'Ahli Lembaga Bebas' },
    { name: 'Puan Rafeah binti Ariffin', title: 'Ahli Lembaga Bebas' },
    { name: "Dato' ChM. Haji Khairul Shahril bin Hamzah", title: 'Ahli Lembaga Bebas' },
    { name: 'Dr. Hj. Abdul Hakim bin Jaafar', title: 'Ahli Lembaga Bebas' },
    { name: "Dato' Shamsuddin bin Hayroni", title: 'Ahli Lembaga Bebas' },
    { name: 'Sr. Haji Ishak bin Ismail', title: 'Ahli Lembaga Bebas' },
];

const sectionNav = [
    { href: '#tentang', label: 'Mengenai AWQAF' },
    { href: '#informasi', label: 'Informasi Korporat' },
    { href: '#visi', label: 'Visi & Misi' },
    { href: '#model', label: 'Model Waqaf Korporat' },
    { href: '#struktur', label: 'Struktur' },
    { href: '#tadbir', label: 'Tadbir Urus' },
    { href: '#lembaga', label: 'Lembaga Pengarah' },
];
</script>

<template>
    <Head title="Maklumat Korporat" />

    <PublicLayout>
        <!-- Intro -->
        <section id="tentang" class="bg-slate-950">
            <div class="mx-auto max-w-5xl px-6 py-20 lg:px-8 lg:py-28">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-400">Korporat</p>
                <h1 class="mt-3 max-w-3xl text-4xl font-bold leading-tight text-white sm:text-5xl">
                    AWQAF Holdings Berhad
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-relaxed text-slate-300">
                    Institusi waqaf korporat berasaskan komuniti yang memegang wakaf sebagai amanah kekal —
                    diuruskan di bawah tadbir urus korporat yang telus untuk memberi manfaat berterusan kepada ummah.
                </p>

                <div class="mt-12 grid grid-cols-2 gap-px overflow-hidden rounded-2xl border border-white/10 bg-white/10 lg:grid-cols-4">
                    <div v-for="f in facts" :key="f.k" class="bg-slate-950 p-6">
                        <component :is="f.icon" class="h-5 w-5 text-emerald-400" />
                        <div class="mt-4 text-xs uppercase tracking-wide text-slate-400">{{ f.k }}</div>
                        <div class="mt-1 text-sm font-semibold text-white">{{ f.v }}</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sticky section nav -->
        <nav class="sticky top-[4.5rem] z-20 border-y border-slate-100 bg-white/90 backdrop-blur">
            <div class="mx-auto flex max-w-5xl gap-1 overflow-x-auto px-6 lg:px-8">
                <a
                    v-for="s in sectionNav"
                    :key="s.href"
                    :href="s.href"
                    class="whitespace-nowrap px-4 py-4 text-sm font-medium text-slate-500 transition hover:text-emerald-700"
                >{{ s.label }}</a>
            </div>
        </nav>

        <!-- Informasi Korporat -->
        <section id="informasi" class="bg-white py-20">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Informasi Korporat</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Maklumat syarikat</h2>
                <dl class="mt-10 grid grid-cols-1 gap-x-10 gap-y-6 sm:grid-cols-2">
                    <div class="border-t border-slate-100 pt-4"><dt class="text-xs uppercase tracking-wide text-slate-400">Tarikh penubuhan</dt><dd class="mt-1 font-medium text-slate-900">3 September 2012</dd></div>
                    <div class="border-t border-slate-100 pt-4"><dt class="text-xs uppercase tracking-wide text-slate-400">Nombor pendaftaran</dt><dd class="mt-1 font-medium text-slate-900">1015578-X</dd></div>
                    <div class="border-t border-slate-100 pt-4"><dt class="text-xs uppercase tracking-wide text-slate-400">Jenis syarikat</dt><dd class="mt-1 font-medium text-slate-900">Syarikat Berhad Menurut Jaminan</dd></div>
                    <div class="border-t border-slate-100 pt-4"><dt class="text-xs uppercase tracking-wide text-slate-400">Aktiviti</dt><dd class="mt-1 font-medium text-slate-900">Mengurus harta wakaf dan aktiviti kebajikan lain</dd></div>
                    <div class="border-t border-slate-100 pt-4 sm:col-span-2"><dt class="text-xs uppercase tracking-wide text-slate-400">Alamat</dt><dd class="mt-1 font-medium text-slate-900">No. 18, Tingkat 1, D'Bayu Bukit Jelutong, Jalan Serambi U8/24, Bukit Jelutong, 40150 Shah Alam, Selangor</dd></div>
                    <div class="border-t border-slate-100 pt-4"><dt class="text-xs uppercase tracking-wide text-slate-400">E-mel</dt><dd class="mt-1 font-medium text-slate-900">admin@awqaf.my</dd></div>
                    <div class="border-t border-slate-100 pt-4"><dt class="text-xs uppercase tracking-wide text-slate-400">Telefon</dt><dd class="mt-1 font-medium text-slate-900">03-7832 6644</dd></div>
                </dl>
            </div>
        </section>

        <!-- Vision & Mission -->
        <section id="visi" class="bg-white py-20">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Hala Tuju</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Visi &amp; Misi</h2>
                <div class="mt-10 grid grid-cols-1 gap-8 sm:grid-cols-2">
                    <div class="rounded-2xl border border-slate-100 p-8">
                        <h3 class="font-semibold text-emerald-700">Visi</h3>
                        <p class="mt-3 text-slate-600">
                            Menjadi peneraju waqaf korporat yang memanfaatkan aset dan perniagaan berasaskan wakaf
                            untuk memacu transformasi ekonomi ke arah masyarakat yang adil dan sejahtera.
                        </p>
                    </div>
                    <div class="rounded-2xl border border-slate-100 p-8">
                        <h3 class="font-semibold text-emerald-700">Misi</h3>
                        <ul class="mt-3 space-y-2 text-slate-600">
                            <li>• Membina perniagaan dan aset berasaskan dana wakaf bagi mewujudkan peluang ekonomi baharu untuk masyarakat.</li>
                            <li>• Menjadi institusi waqaf korporat pimpinan komuniti yang memperkasakan ekonomi umat menerusi pendekatan perniagaan.</li>
                            <li>• Membangunkan usaha keusahawanan yang memberi manfaat meluas menerusi model kewangan wakaf yang lestari.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Model Waqaf Korporat (30% / 70%) -->
        <section id="model" class="bg-white py-20">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Model</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Model Waqaf Korporat</h2>
                <p class="mt-3 max-w-2xl text-slate-500">
                    Model pelaksanaan AWQAF bagi menyalurkan hasil aktiviti pelaburan dan perniagaan.
                </p>
                <div class="mt-12">
                    <WaqafModel />
                </div>
            </div>
        </section>

        <!-- Corporate Structure / Model -->
        <section id="struktur" class="bg-slate-50 py-20">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Struktur Korporat</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Model Waqaf Korporat®</h2>
                <p class="mt-4 max-w-2xl text-slate-500">
                    Wakaf ditukar menjadi perniagaan mapan milik ummah — supaya keuntungannya mengalir berterusan
                    tanpa menghabiskan modal asal. Satu pendekatan yang turut dikaji Universiti Oxford (2010).
                </p>
                <div class="mt-10 grid grid-cols-1 gap-8 lg:grid-cols-3">
                    <div v-for="s in structure" :key="s.k" class="rounded-2xl border border-slate-100 bg-white p-8">
                        <span class="font-semibold text-emerald-700">{{ s.k }}</span>
                        <h3 class="mt-3 text-lg font-semibold text-slate-900">{{ s.h }}</h3>
                        <p class="mt-3 text-sm leading-relaxed text-slate-600">{{ s.b }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Governance -->
        <section id="tadbir" class="bg-white py-20">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Tadbir Urus</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Struktur tadbir urus korporat</h2>
                <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div class="flex gap-4 rounded-2xl border border-slate-100 p-6">
                        <BuildingLibraryIcon class="h-6 w-6 flex-none text-emerald-700" />
                        <div>
                            <h3 class="font-semibold text-slate-900">Berdaftar di bawah Akta Syarikat 2016</h3>
                            <p class="mt-2 text-sm text-slate-600">Tertakluk kepada keperluan pelaporan dan tadbir urus korporat yang sama seperti mana-mana entiti korporat lain di Malaysia.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 rounded-2xl border border-slate-100 p-6">
                        <ShieldCheckIcon class="h-6 w-6 flex-none text-emerald-700" />
                        <div>
                            <h3 class="font-semibold text-slate-900">Diselia Lembaga &amp; Jawatankuasa</h3>
                            <p class="mt-2 text-sm text-slate-600">Lembaga Pengarah 9 ahli, disokong Jawatankuasa Pelaburan dan Jawatankuasa Audit yang berasingan.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 rounded-2xl border border-slate-100 p-6">
                        <DocumentCheckIcon class="h-6 w-6 flex-none text-emerald-700" />
                        <div>
                            <h3 class="font-semibold text-slate-900">Juruaudit Luar</h3>
                            <p class="mt-2 text-sm text-slate-600">Wan Nadzir &amp; Co. (2021 hingga kini); sebelumnya Afrizan Tarmili Khairul Azhar PLT (AFTAAS), 2015–2020. Penyata kewangan diaudit dan didedahkan setiap tahun.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 rounded-2xl border border-slate-100 p-6">
                        <ScaleIcon class="h-6 w-6 flex-none text-slate-400" />
                        <div>
                            <h3 class="font-semibold text-slate-900">Penasihat Syariah</h3>
                            <p class="mt-2 text-sm text-slate-500">Menunggu pengesahan pihak pengurusan AWQAF.</p>
                        </div>
                    </div>
                </div>

                <!-- Committees -->
                <h3 id="jawatankuasa" class="mt-14 text-xl font-semibold text-slate-900">Jawatankuasa Lembaga Pengarah</h3>
                <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div v-for="c in committees" :key="c.name" class="rounded-2xl border border-slate-100 p-8">
                        <ChartBarIcon class="h-6 w-6 text-emerald-700" />
                        <h4 class="mt-4 font-semibold text-slate-900">{{ c.name }}</h4>
                        <p class="mt-1 text-sm font-medium text-emerald-700">Pengerusi: {{ c.chair }}</p>
                        <p class="mt-3 text-sm leading-relaxed text-slate-600">{{ c.body }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Board of Directors -->
        <section id="lembaga" class="bg-slate-50 py-20">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Kepimpinan</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Ahli Lembaga Pengarah</h2>
                <div class="mt-10 grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div v-for="m in board" :key="m.name" class="rounded-xl border border-slate-100 bg-white p-5">
                        <div class="font-semibold text-slate-900">{{ m.name }}</div>
                        <div class="mt-0.5 text-sm text-slate-500">{{ m.title }}</div>
                    </div>
                </div>
                <div class="mt-8">
                    <Link :href="route('korporat.leadership.index')" class="inline-flex items-center gap-2 rounded-lg bg-slate-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">
                        Lihat profil penuh Lembaga Pengarah →
                    </Link>
                </div>
            </div>
        </section>

        <!-- Rujukan lanjut (contextual links — reports & founder live on dedicated pages) -->
        <section id="rujukan" class="bg-white py-20">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Rujukan Lanjut</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Maklumat berkaitan</h2>
                <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <Link :href="route('korporat.reports')" class="flex items-center justify-between gap-4 rounded-2xl border border-slate-100 p-6 transition hover:border-emerald-200 hover:bg-emerald-50/40 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">
                        <span class="text-sm font-semibold text-slate-900">Lihat Laporan Tahunan dan Penyata Kewangan</span>
                        <span class="text-emerald-700">→</span>
                    </Link>
                    <Link :href="route('korporat.founder')" class="flex items-center justify-between gap-4 rounded-2xl border border-slate-100 p-6 transition hover:border-emerald-200 hover:bg-emerald-50/40 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">
                        <span class="text-sm font-semibold text-slate-900">Ketahui sejarah pengasas AWQAF</span>
                        <span class="text-emerald-700">→</span>
                    </Link>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
