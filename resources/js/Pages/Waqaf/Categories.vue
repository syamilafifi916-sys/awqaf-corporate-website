<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head } from '@inertiajs/vue3';

const tiers = [
    {
        name: 'Ahli Asas',
        meaning: 'Asas · Batu Bata',
        range: 'RM1 – RM999',
        count: 2698,
        gradient: 'from-stone-400 to-stone-600',
        text: 'text-white',
    },
    {
        name: 'Ahli Hadid',
        meaning: 'Hadid · Besi',
        range: 'RM1,000 – RM9,999',
        count: 601,
        gradient: 'from-zinc-500 to-zinc-700',
        text: 'text-white',
    },
    {
        name: 'Ahli Fiddhah',
        meaning: 'Fiddhah · Perak',
        range: 'RM10,000 – RM99,999',
        count: 113,
        gradient: 'from-slate-300 to-slate-500',
        text: 'text-white',
    },
    {
        name: 'Ahli Zahab',
        meaning: 'Zahab · Emas',
        range: 'RM100,000 – RM499,999',
        count: 13,
        gradient: 'from-amber-400 to-yellow-600',
        text: 'text-white',
    },
    {
        name: 'Ahli Zamrud',
        meaning: 'Zamrud · Batu Zamrud',
        range: 'RM500,000 – RM999,999',
        count: 3,
        gradient: 'from-emerald-500 to-emerald-800',
        text: 'text-white',
    },
    {
        name: 'Ahli Balatin',
        meaning: 'Balatin · Platinum',
        range: 'RM1,000,000 ke atas',
        count: 3,
        gradient: 'from-slate-800 via-indigo-950 to-slate-950',
        text: 'text-amber-300',
    },
];
</script>

<template>
    <Head title="Kategori Pewakaf" />

    <PublicLayout>
        <section class="mx-auto max-w-6xl px-6 py-20 lg:px-8">
            <div class="text-center">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Portal Pewakaf</p>
                <h1 class="mt-3 text-4xl font-bold text-slate-900">Kategori Pewakaf</h1>
                <p class="mx-auto mt-4 max-w-2xl text-slate-500">
                    Tahap keahlian pewakaf ditentukan secara automatik berdasarkan jumlah wakaf terkumpul —
                    dinamakan sempena bahan bernilai, dari Asas hingga Balatin.
                </p>
            </div>

            <div class="mt-14 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div
                    v-for="tier in tiers"
                    :key="tier.name"
                    class="group overflow-hidden rounded-2xl bg-gradient-to-br shadow-lg transition hover:-translate-y-1 hover:shadow-xl"
                    :class="tier.gradient"
                >
                    <div class="flex h-40 flex-col justify-between p-6" :class="tier.text">
                        <span class="text-xs font-medium uppercase tracking-wider opacity-70">{{ tier.meaning }}</span>
                        <div>
                            <div class="text-2xl font-bold">{{ tier.name }}</div>
                            <div class="mt-1 text-sm opacity-80">{{ tier.range }}</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between bg-black/10 px-6 py-3 text-xs" :class="tier.text">
                        <span class="opacity-70">Ahli semasa</span>
                        <span class="font-semibold">{{ tier.count.toLocaleString() }}</span>
                    </div>
                </div>
            </div>

            <p class="mt-10 text-center text-sm text-slate-400">
                Taburan ahli mengikut Laporan Tahunan 2024. Jumlah wakaf terkumpul dan tahap keahlian anda
                boleh disemak bila-bila masa menerusi Portal Pewakaf.
            </p>
        </section>
    </PublicLayout>
</template>
