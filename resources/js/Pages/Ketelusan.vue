<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import {
    BuildingLibraryIcon,
    ChartPieIcon,
    DocumentCheckIcon,
    DocumentTextIcon,
    ScaleIcon,
    ShieldCheckIcon,
} from '@heroicons/vue/24/outline';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    latestAnnualReport: Object,
    latestFinancialStatement: Object,
});

const principles = [
    {
        icon: BuildingLibraryIcon,
        title: 'Berdaftar di Bawah Akta Syarikat 2016',
        body: 'AWQAF Holdings Berhad didaftarkan secara rasmi sebagai sebuah syarikat, tertakluk kepada keperluan pelaporan dan tadbir urus korporat yang sama seperti mana-mana entiti korporat lain di Malaysia.',
    },
    {
        icon: ScaleIcon,
        title: 'Ketelusan & Kebertanggungjawaban',
        body: 'Menerima pakai kaedah standard pengurusan amalan korporat terbaik, dengan penekanan khusus kepada ketelusan pelaporan dan kebertanggungjawaban kepada pewakaf serta orang awam.',
    },
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

const committees = [
    {
        icon: ChartPieIcon,
        name: 'Jawatankuasa Pelaburan',
        chair: 'Pengerusi: Datuk Wira Dr. Ramli bin Tahir',
        body: 'Menyelia keputusan pelaburan dan pertumbuhan portfolio aset wakaf, memastikan setiap pelaburan selari dengan matlamat kelestarian jangka panjang.',
    },
    {
        icon: DocumentCheckIcon,
        name: 'Jawatankuasa Audit',
        chair: "Pengerusi: Dato' (Dr.) Haji Salihin bin Abang",
        body: 'Mengawasi ketepatan pelaporan kewangan, pematuhan perundangan dan keberkesanan kawalan dalaman AWQAF.',
    },
];
</script>

<template>
    <Head title="Laporan & Tadbir Urus" />

    <PublicLayout>
        <section class="relative overflow-hidden bg-slate-950 py-24">
            <div class="absolute -left-24 top-0 h-72 w-72 rounded-full bg-emerald-600/20 blur-3xl"></div>
            <div class="relative mx-auto max-w-3xl px-6 text-center lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-400">Ketelusan</p>
                <h1 class="mt-3 text-4xl font-bold text-white">Laporan &amp; Tadbir Urus</h1>
                <p class="mt-4 text-slate-300">
                    Satu ruang untuk menyemak semua maklumat tadbir urus, kewangan dan pematuhan AWQAF Holdings
                    Berhad — laporan diaudit, struktur Lembaga Pengarah, jawatankuasa, dan status pematuhan.
                </p>
            </div>
        </section>

        <section class="mx-auto max-w-5xl px-6 py-20 lg:px-8">
            <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Laporan Kewangan</p>
            <h2 class="mt-3 text-3xl font-bold text-slate-900">Laporan Tahunan &amp; Penyata Kewangan</h2>

            <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2">
                <a
                    v-if="latestAnnualReport"
                    :href="latestAnnualReport.url"
                    target="_blank"
                    rel="noopener"
                    class="flex items-center justify-between rounded-2xl border border-slate-100 p-6 transition hover:border-emerald-200 hover:bg-emerald-50"
                >
                    <div class="flex items-center gap-3">
                        <DocumentTextIcon class="h-6 w-6 text-emerald-700" />
                        <span class="text-sm font-medium text-slate-700">{{ latestAnnualReport.title }} Terkini</span>
                    </div>
                    <span class="text-xs font-semibold text-emerald-700">Muat Turun ↓</span>
                </a>
                <a
                    v-if="latestFinancialStatement"
                    :href="latestFinancialStatement.url"
                    target="_blank"
                    rel="noopener"
                    class="flex items-center justify-between rounded-2xl border border-slate-100 p-6 transition hover:border-emerald-200 hover:bg-emerald-50"
                >
                    <div class="flex items-center gap-3">
                        <DocumentCheckIcon class="h-6 w-6 text-emerald-700" />
                        <span class="text-sm font-medium text-slate-700">{{ latestFinancialStatement.title }} Terkini</span>
                    </div>
                    <span class="text-xs font-semibold text-emerald-700">Muat Turun ↓</span>
                </a>
            </div>

            <div class="mt-6 text-center">
                <Link :href="route('korporat.reports')" class="text-sm font-semibold text-emerald-700 hover:underline">
                    Muat Turun Laporan Tahunan Penuh (2015–2024) →
                </Link>
            </div>
        </section>

        <section class="bg-slate-50 py-20">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Tadbir Urus</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Prinsip Tadbir Urus Korporat</h2>

                <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div v-for="item in principles" :key="item.title" class="rounded-2xl bg-white p-8 shadow-sm">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                            <component :is="item.icon" class="h-6 w-6" />
                        </div>
                        <h3 class="mt-4 font-semibold text-slate-900">{{ item.title }}</h3>
                        <p class="mt-2 text-sm text-slate-500">{{ item.body }}</p>
                    </div>
                </div>

                <h3 class="mt-14 text-xl font-semibold text-slate-900">Jawatankuasa Lembaga Pengarah</h3>
                <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div v-for="committee in committees" :key="committee.name" class="rounded-2xl bg-white p-8 shadow-sm">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                            <component :is="committee.icon" class="h-6 w-6" />
                        </div>
                        <h4 class="mt-4 font-semibold text-slate-900">{{ committee.name }}</h4>
                        <p class="mt-1 text-xs font-medium text-emerald-700">{{ committee.chair }}</p>
                        <p class="mt-3 text-sm text-slate-500">{{ committee.body }}</p>
                    </div>
                </div>

                <h3 class="mt-14 text-xl font-semibold text-slate-900">Ahli Lembaga Pengarah</h3>
                <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div v-for="member in board" :key="member.name" class="rounded-xl bg-white p-6 shadow-sm">
                        <div class="font-semibold text-slate-900">{{ member.name }}</div>
                        <div class="mt-1 text-sm text-slate-500">{{ member.title }}</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-5xl px-6 py-20 lg:px-8">
            <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Pematuhan</p>
            <h2 class="mt-3 text-3xl font-bold text-slate-900">Penasihat Syariah &amp; Juruaudit</h2>

            <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="rounded-2xl border border-slate-100 p-8">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                        <DocumentCheckIcon class="h-6 w-6" />
                    </div>
                    <h3 class="mt-4 font-semibold text-slate-900">Juruaudit Luar</h3>
                    <p class="mt-2 text-sm text-slate-600">Wan Nadzir &amp; Co. (2021 hingga kini); sebelumnya Afrizan Tarmili Khairul Azhar PLT (AFTAAS), 2015–2020. Penyata kewangan diaudit dan didedahkan setiap tahun.</p>
                </div>
                <div class="rounded-2xl border border-slate-100 p-8">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-50 text-slate-500">
                        <ShieldCheckIcon class="h-6 w-6" />
                    </div>
                    <h3 class="mt-4 font-semibold text-slate-900">Penasihat Syariah</h3>
                    <p class="mt-2 text-sm text-slate-500">Menunggu pengesahan pihak pengurusan AWQAF.</p>
                </div>
            </div>

            <div class="mt-10 rounded-2xl bg-emerald-700 p-8 text-center">
                <h3 class="text-xl font-semibold text-white">Ada soalan tentang tadbir urus atau laporan kami?</h3>
                <Link
                    :href="route('korporat.reports')"
                    class="mt-6 inline-block rounded-lg bg-white px-6 py-3 text-sm font-semibold text-emerald-700 transition hover:bg-emerald-50"
                >
                    Muat Turun Laporan Tahunan
                </Link>
            </div>
        </section>
    </PublicLayout>
</template>
