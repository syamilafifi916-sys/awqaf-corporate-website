<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { ArrowPathIcon, ChartBarIcon, SparklesIcon } from '@heroicons/vue/24/outline';
import { Head } from '@inertiajs/vue3';

const benefits = [
    {
        icon: ArrowPathIcon,
        title: 'Konsisten, Tanpa Beban',
        body: 'Sumbangan kecil setiap bulan lebih mudah dikekalkan berbanding sumbangan besar sekali gus — mengikut kemampuan kewangan anda.',
    },
    {
        icon: ChartBarIcon,
        title: 'Terkumpul Automatik',
        body: 'Setiap caruman bulanan menambah terus kepada jumlah wakaf terkumpul anda, membawa anda lebih hampir ke tahap keahlian seterusnya.',
    },
    {
        icon: SparklesIcon,
        title: 'Impak Berterusan',
        body: 'Dana yang konsisten membolehkan AWQAF merancang penyaluran manfaat jangka panjang dengan lebih yakin kepada program kebajikan.',
    },
];
</script>

<template>
    <Head title="Wakaf Bulanan" />

    <PublicLayout>
        <section class="relative overflow-hidden bg-slate-950 py-24">
            <div class="absolute -left-24 top-0 h-72 w-72 rounded-full bg-emerald-600/20 blur-3xl"></div>
            <div class="relative mx-auto max-w-3xl px-6 text-center lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-400">Wakaf Bulanan</p>
                <h1 class="mt-3 text-4xl font-bold text-white">Sedikit setiap bulan, kekal selamanya.</h1>
                <p class="mt-4 text-slate-300">
                    Wakaf bulanan membolehkan anda menyumbang secara konsisten tanpa perlu ingat untuk berwakaf
                    berulang kali — setiap ringgit tetap menjadi aset wakaf yang kekal.
                </p>
            </div>
        </section>

        <section class="mx-auto max-w-6xl px-6 py-20 lg:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
                <div v-for="benefit in benefits" :key="benefit.title" class="rounded-2xl border border-slate-100 p-8">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                        <component :is="benefit.icon" class="h-6 w-6" />
                    </div>
                    <h3 class="mt-4 font-semibold text-slate-900">{{ benefit.title }}</h3>
                    <p class="mt-2 text-sm text-slate-500">{{ benefit.body }}</p>
                </div>
            </div>

            <div class="mt-14 rounded-2xl bg-slate-50 p-8 text-center">
                <h2 class="text-xl font-semibold text-slate-900">Caruman bulanan akan datang</h2>
                <p class="mx-auto mt-2 max-w-xl text-sm text-slate-500">
                    Ciri caruman automatik bulanan sedang dibangunkan bersama sistem pembayaran rasmi kami.
                    Daftar Portal Pewakaf sekarang supaya anda antara yang pertama menerima notifikasi bila ia dilancarkan.
                </p>
                <a
                    :href="$page.props.portalUrl"
                    class="mt-6 inline-block rounded-lg bg-emerald-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-emerald-800"
                >
                    Log Masuk Portal Pewakaf
                </a>
            </div>
        </section>
    </PublicLayout>
</template>
