<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head } from '@inertiajs/vue3';

const programs = [
    {
        name: 'ZuriatCARE',
        tagline: 'Sokongan kesihatan mental & kesejahteraan komuniti',
        description:
            'Menyediakan khidmat sokongan sebaya dan rujukan kepada profesional kesihatan mental bagi individu yang berdepan tekanan, kemurungan, atau krisis emosi — termasuk sokongan susulan untuk keluarga yang terkesan. Turut menjalankan kempen kesedaran awam serta bantuan kepada golongan memerlukan seperti ibu tunggal remaja.',
    },
    {
        name: 'EduWAQF',
        tagline: 'Membiayai pendidikan menerusi dana wakaf',
        description:
            'Menyalurkan bantuan kewangan kepada pelajar institusi pengajian tinggi yang berdepan kesukaran kewangan, tanpa mengira latar belakang, serta menyokong program kecemerlangan dan kepimpinan pelajar di universiti dan institusi pendidikan Islam menerusi kerjasama strategik.',
    },
    {
        name: 'AWQAF4Health',
        tagline: 'Menyokong kesihatan dan kesejahteraan komuniti',
        description:
            'Program yang disasarkan untuk menyalurkan dana wakaf kepada inisiatif kesihatan komuniti — butiran penuh akan dikemas kini tidak lama lagi.',
    },
];
</script>

<template>
    <Head title="Program Kebajikan" />

    <PublicLayout>
        <section class="mx-auto max-w-5xl px-6 py-20 lg:px-8">
            <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Kebajikan</p>
            <h1 class="mt-3 text-4xl font-bold text-slate-900">Program Kebajikan</h1>
            <p class="mt-4 max-w-2xl text-slate-600">
                Dana wakaf disalurkan menerusi program kebajikan yang memberi manfaat langsung kepada komuniti —
                daripada sokongan kesihatan mental, pembiayaan pendidikan, hingga kesejahteraan kesihatan awam.
            </p>

            <div class="mt-14 space-y-6">
                <div
                    v-for="program in programs"
                    :key="program.name"
                    class="rounded-2xl border border-slate-100 p-8"
                >
                    <h2 class="text-xl font-semibold text-emerald-700">{{ program.name }}</h2>
                    <p class="mt-1 text-sm font-medium text-slate-500">{{ program.tagline }}</p>
                    <p class="mt-4 text-slate-600">{{ program.description }}</p>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
