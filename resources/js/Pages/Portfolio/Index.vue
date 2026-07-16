<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ArrowRightIcon, PhotoIcon } from '@heroicons/vue/24/outline';

defineProps({
    portfolios: Array,
});
</script>

<template>
    <Head title="Portfolio Pelaburan" />

    <PublicLayout>
        <section class="bg-slate-950">
            <div class="mx-auto max-w-5xl px-6 py-20 lg:px-8 lg:py-24">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-400">Portfolio Pelaburan</p>
                <h1 class="mt-4 max-w-3xl text-4xl font-bold leading-tight text-white sm:text-5xl">
                    Portfolio pelaburan AWQAF Holdings Berhad
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-relaxed text-slate-300">
                    Empat portfolio pelaburan Kumpulan AWQAF — Pendidikan, Kesihatan &amp; Kesejahteraan,
                    Hartanah dan Fintech — yang menjana pulangan mampan bagi menyokong mandat waqaf korporat.
                    Setiap fakta dan angka diambil daripada Laporan Tahunan rasmi, lengkap dengan tahun dan sumber.
                </p>
                <p class="mt-4 max-w-2xl text-sm text-slate-400">
                    Program kebajikan Kumpulan AWQAF — Yayasan ZuriatCARE, EduWAQF dan AWQAF4Health —
                    dipaparkan secara berasingan di bawah
                    <Link :href="route('program.index')" class="font-medium text-emerald-400 hover:underline">Program &amp; Inisiatif</Link>.
                </p>
            </div>
        </section>

        <section class="bg-white py-20">
            <div class="mx-auto max-w-6xl space-y-10 px-6 lg:px-8">
                <article
                    v-for="p in portfolios"
                    :key="p.slug"
                    class="grid grid-cols-1 gap-8 rounded-2xl border border-slate-100 p-6 sm:p-8 lg:grid-cols-3 lg:gap-10"
                >
                    <!-- Media (photo-ready, clearly marked) -->
                    <div class="lg:col-span-1">
                        <div class="flex aspect-[4/3] items-center justify-center rounded-xl border-2 border-dashed border-slate-200 bg-slate-50">
                            <div class="text-center">
                                <PhotoIcon class="mx-auto h-8 w-8 text-slate-300" />
                                <p class="mt-2 text-[11px] font-semibold uppercase tracking-wider text-slate-400">Imej Portfolio</p>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="lg:col-span-2">
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-600">{{ p.status }}</span>
                        <h2 class="mt-4 text-2xl font-bold text-slate-900">{{ p.name }}</h2>
                        <p class="mt-1 text-sm text-slate-500">{{ p.entity }}</p>
                        <p class="mt-4 text-slate-600">{{ p.summary }}</p>

                        <div v-if="p.headline" class="mt-6 flex flex-wrap items-baseline gap-x-4 gap-y-1 border-t border-slate-100 pt-5">
                            <span class="text-2xl font-bold text-emerald-700">{{ p.headline.value }}</span>
                            <span class="text-sm text-slate-600">{{ p.headline.metric }} ({{ p.headline.year }})</span>
                            <span class="w-full text-xs text-slate-400">Sumber: {{ p.headline.report }}, ms {{ p.headline.page }}</span>
                        </div>

                        <Link :href="route('portfolio.show', p.slug)" class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-700 hover:underline">
                            Butiran portfolio <ArrowRightIcon class="h-4 w-4" />
                        </Link>
                    </div>
                </article>
            </div>
        </section>
    </PublicLayout>
</template>
