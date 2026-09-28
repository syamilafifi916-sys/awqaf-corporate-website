<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const documents = [
    { title: 'Notis Mesyuarat Agung Tahunan 2026', description: 'Notis rasmi kepada Ahli AWQAF.', status: 'Akan dimuat naik', href: null },
    { title: 'Agenda Mesyuarat', description: 'Susunan agenda Mesyuarat Agung Tahunan.', status: 'Akan dimuat naik', href: null },
    { title: 'Laporan Tahunan', description: 'Laporan tahunan AWQAF untuk rujukan ahli.', status: 'Akan dimuat naik', href: null },
    { title: 'Laporan Kewangan / Akaun Beraudit', description: 'Dokumen kewangan berkaitan AGM.', status: 'Akan dimuat naik', href: null },
    { title: 'Minit Mesyuarat Agung Tahunan Terdahulu', description: 'Minit AGM terdahulu, tertakluk kepada edaran rasmi.', status: 'Akan dimuat naik', href: null },
    { title: 'Borang Proksi', description: 'Borang proksi sekiranya berkenaan.', status: 'Akan dimuat naik', href: null },
];
</script>

<template>
<Head title="Mesyuarat Agung Tahunan 2026" />
<PublicLayout>
    <main class="bg-slate-50">
        <section class="relative overflow-hidden bg-slate-950 text-white">
            <div class="absolute inset-0 opacity-20" style="background:radial-gradient(circle at 80% 20%,#10b981 0,transparent 35%)"></div>
            <div class="relative mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
                <p class="text-sm font-semibold uppercase tracking-[.22em] text-emerald-400">Pemakluman Rasmi Ahli</p>
                <h1 class="mt-5 max-w-4xl text-4xl font-bold tracking-tight sm:text-5xl lg:text-6xl">Mesyuarat Agung Tahunan AWQAF 2026</h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-300">Pusat maklumat rasmi untuk notis, butiran mesyuarat dan dokumen berkaitan Mesyuarat Agung Tahunan AWQAF Holdings Berhad.</p>
                <div class="mt-10 inline-flex rounded-full border border-amber-300/25 bg-amber-300/10 px-4 py-2 text-sm font-medium text-amber-100">Butiran tarikh, masa dan tempat akan dikemas kini selepas pengesahan rasmi.</div>
            </div>
        </section>
        <section class="mx-auto max-w-7xl px-6 py-16 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-semibold uppercase tracking-[.18em] text-emerald-700">Dokumen AGM 2026</p>
                <h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-950">Semua dokumen rasmi di satu tempat.</h2>
                <p class="mt-4 leading-7 text-slate-600">Dokumen akan diterbitkan di halaman ini apabila diluluskan untuk edaran. Ahli boleh menggunakan pautan yang sama untuk mendapatkan versi terkini.</p>
            </div>
            <div class="mt-10 grid gap-4 md:grid-cols-2">
                <article v-for="doc in documents" :key="doc.title" class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-start justify-between gap-5">
                        <div><h3 class="font-semibold text-slate-950">{{ doc.title }}</h3><p class="mt-2 text-sm leading-6 text-slate-600">{{ doc.description }}</p></div>
                        <span class="shrink-0 rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-500">{{ doc.status }}</span>
                    </div>
                    <a v-if="doc.href" :href="doc.href" target="_blank" rel="noopener" class="mt-5 inline-flex text-sm font-semibold text-emerald-700 hover:text-emerald-600">Lihat dokumen →</a>
                </article>
            </div>
            <div class="mt-12 rounded-2xl border border-emerald-100 bg-emerald-50 p-6 text-sm leading-6 text-emerald-950">
                <strong>Sumber rasmi.</strong> Sila rujuk halaman ini untuk maklumat dan dokumen AGM yang diterbitkan oleh AWQAF Holdings Berhad.
            </div>
        </section>
    </main>
</PublicLayout>
</template>
