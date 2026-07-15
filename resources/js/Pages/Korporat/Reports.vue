<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    reportsByYear: Object,
});

const typeLabel = (type) => (type === 'annual_report' ? 'Laporan Tahunan' : 'Penyata Kewangan Diaudit');

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

const maxAmount = Math.max(...collections.map((c) => c.amount));
const barHeight = (amount) => Math.max(4, Math.round((amount / maxAmount) * 100));
const formatRm = (value) => 'RM ' + Number(value).toLocaleString('en-MY');
</script>

<template>
    <Head title="Laporan Tahunan &amp; Penyata Kewangan" />

    <PublicLayout>
        <section class="mx-auto max-w-4xl px-6 py-20 lg:px-8">
            <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Korporat</p>
            <h1 class="mt-3 text-4xl font-bold text-slate-900">Laporan Tahunan &amp; Penyata Kewangan</h1>
            <p class="mt-4 max-w-2xl text-slate-600">
                Sebagai sebahagian daripada komitmen tadbir urus dan ketelusan, AWQAF Holdings Berhad menerbitkan
                Laporan Tahunan dan Penyata Kewangan Diaudit setiap tahun untuk semakan pewakaf dan orang awam.
            </p>

            <div class="mt-14 rounded-2xl border border-slate-100 p-8">
                <h2 class="font-semibold text-slate-900">Jumlah Kutipan Tahunan (2014–2024)</h2>
                <p class="mt-1 text-sm text-slate-500">Kutipan wakaf baharu setiap tahun, berdasarkan Laporan Tahunan 2024.</p>

                <div class="mt-8 flex items-end gap-3 overflow-x-auto pb-2">
                    <div v-for="c in collections" :key="c.year" class="flex flex-1 flex-col items-center gap-2">
                        <span class="text-[10px] text-slate-500">{{ formatRm(c.amount) }}</span>
                        <div
                            class="w-full min-w-[28px] rounded-t-md bg-emerald-600"
                            :style="{ height: barHeight(c.amount) + 'px' }"
                        ></div>
                        <span class="text-xs font-medium text-slate-600">{{ c.year }}</span>
                    </div>
                </div>
            </div>

            <div class="mt-8 space-y-8">
                <div v-for="(reports, year) in reportsByYear" :key="year">
                    <h2 class="text-lg font-semibold text-slate-900">{{ year }}</h2>
                    <div class="mt-3 grid grid-cols-1 gap-3 sm:grid-cols-2">
                        <a
                            v-for="report in reports"
                            :key="report.type"
                            :href="report.url"
                            target="_blank"
                            rel="noopener"
                            class="flex items-center justify-between rounded-xl border border-slate-100 p-4 transition hover:border-emerald-200 hover:bg-emerald-50"
                        >
                            <span class="text-sm font-medium text-slate-700">{{ typeLabel(report.type) }}</span>
                            <span class="text-xs font-semibold text-emerald-700">Muat Turun ↓</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
