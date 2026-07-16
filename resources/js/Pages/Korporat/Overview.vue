<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
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
    { href: '#tentang', label: 'Tentang' },
    { href: '#visi', label: 'Visi & Misi' },
    { href: '#struktur', label: 'Struktur' },
    { href: '#tadbir', label: 'Tadbir Urus' },
    { href: '#lembaga', label: 'Lembaga' },
    { href: '#laporan', label: 'Laporan' },
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
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Pengawasan berstruktur, bukan kepercayaan semata-mata.</h2>
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
                            <h3 class="font-semibold text-slate-900">Penyata kewangan diaudit</h3>
                            <p class="mt-2 text-sm text-slate-600">Diaudit oleh juruaudit luar dan didedahkan setiap tahun di Pusat Ketelusan.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 rounded-2xl border border-dashed border-slate-200 p-6">
                        <ScaleIcon class="h-6 w-6 flex-none text-slate-400" />
                        <div>
                            <h3 class="font-semibold text-slate-900">Penasihat Syariah</h3>
                            <p class="mt-2 text-sm text-slate-400">Akan disahkan oleh pihak pengurusan AWQAF.</p>
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
            </div>
        </section>

        <!-- Reports -->
        <section id="laporan" class="bg-white py-20">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <div class="rounded-2xl border border-slate-100 bg-slate-50 p-8 sm:p-12">
                    <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Pendedahan</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900">Laporan Tahunan &amp; Penyata Kewangan</h2>
                    <p class="mt-4 max-w-2xl text-slate-600">
                        Laporan Tahunan dan Penyata Kewangan Diaudit AWQAF Holdings Berhad — didedahkan sepenuhnya,
                        termasuk sebelas tahun rekod kutipan wakaf.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <Link :href="route('korporat.reports')" class="rounded-lg bg-emerald-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-emerald-800">
                            Muat Turun Laporan Tahunan
                        </Link>
                        <Link :href="route('ketelusan')" class="rounded-lg border border-slate-300 px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-white">
                            Pusat Ketelusan
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- Founder — supporting historical context -->
        <section id="warisan" class="overflow-hidden bg-slate-950 py-20">
            <div class="mx-auto grid max-w-6xl grid-cols-1 items-start gap-12 px-6 lg:grid-cols-5 lg:px-8">
                <div class="lg:sticky lg:top-28 lg:col-span-2">
                    <div class="overflow-hidden rounded-2xl bg-gradient-to-b from-slate-100 to-white shadow-2xl">
                        <img
                            src="/images/pengasas-tan-sri-muhammad-ali-hashim.png"
                            alt="Allahyarham Tan Sri Muhammad Ali Hashim, Pengasas AWQAF Holdings Berhad"
                            class="h-auto w-full object-contain p-6"
                        />
                    </div>
                </div>
                <div class="lg:col-span-3">
                    <p class="text-sm font-semibold uppercase tracking-wider text-emerald-400">Warisan · Pengasas</p>
                    <h2 class="mt-3 text-3xl font-bold text-white">Allahyarham Tan Sri Muhammad Ali Hashim</h2>
                    <p class="mt-4 text-sm text-slate-400">Konteks sejarah — asal usul model wakaf korporat yang diteruskan oleh AWQAF hari ini.</p>

                    <div class="mt-6 space-y-4 text-sm leading-relaxed text-slate-300">
                        <p>
                            Beliau merupakan Presiden Dewan Perdagangan Islam Malaysia (DPIM) (2012–2017) dan
                            Pengerusi AWQAF Holdings Berhad (2012–2017).
                        </p>
                        <p>
                            Tan Sri Muhammad Ali diiktiraf sebagai usahawan korporat yang cemerlang selepas
                            kerjayanya selama 28 tahun sebagai Ketua Pegawai Eksekutif Johor Corporation (JCorp,
                            1982–2010) — pada akhir 2010 dengan lebih 280 syarikat, 65,000 pekerja dan permodalan
                            pasaran PLC berjumlah RM18.1 bilion.
                        </p>
                        <p>
                            Kajian Oxford University (2010) menyatakan bahawa "Jihad Bisnes, Waqaf Korporat dan
                            Intrapreneurship adalah sangat berkesan dan jauh terkehadapan daripada apa yang mungkin
                            dicapai oleh kaedah pembangunan ekonomi konvensional".
                        </p>
                        <p>
                            Beliau juga Pengasas Waqaf An-Nur Corporation (WANCorp, 1998) — institusi wakaf korporat
                            pertama di Malaysia — dan disenaraikan antara "500 Muslim Paling Berpengaruh di Dunia"
                            pada 2016 dan 2017.
                        </p>
                        <p class="text-slate-400">Beliau kembali ke Rahmatullah pada 31 Oktober 2017. Al-Fatihah.</p>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
