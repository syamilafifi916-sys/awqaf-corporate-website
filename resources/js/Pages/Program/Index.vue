<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ArrowRightIcon, PhotoIcon } from '@heroicons/vue/24/outline';

defineProps({
    programs: Array,
});
</script>

<template>
    <Head title="Program & Inisiatif" />

    <PublicLayout>
        <section class="bg-slate-950">
            <div class="mx-auto max-w-5xl px-6 py-20 lg:px-8 lg:py-24">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-400">Program &amp; Inisiatif</p>
                <h1 class="mt-4 max-w-3xl text-4xl font-bold leading-tight text-white sm:text-5xl">
                    Program dan inisiatif AWQAF Holdings Berhad
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-relaxed text-slate-300">
                    Program kebajikan, pendidikan, kesihatan dan perniagaan di bawah Kumpulan AWQAF.
                    Setiap fakta dan angka di sini diambil daripada Laporan Tahunan rasmi, dengan tahun dan
                    sumber dinyatakan.
                </p>
            </div>
        </section>

        <section class="bg-white py-20">
            <div class="mx-auto max-w-6xl space-y-10 px-6 lg:px-8">
                <article
                    v-for="p in programs"
                    :key="p.slug"
                    class="grid grid-cols-1 gap-8 rounded-2xl border border-slate-100 p-6 sm:p-8 lg:grid-cols-3 lg:gap-10"
                >
                    <!-- Media (photo-ready, clearly marked) -->
                    <div class="lg:col-span-1">
                        <div class="flex aspect-[4/3] items-center justify-center rounded-xl border-2 border-dashed border-slate-200 bg-slate-50">
                            <div class="text-center">
                                <PhotoIcon class="mx-auto h-8 w-8 text-slate-300" />
                                <p class="mt-2 text-[11px] font-semibold uppercase tracking-wider text-slate-400">Imej Program</p>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="lg:col-span-2">
                        <div class="flex flex-wrap items-center gap-3">
                            <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">{{ p.category }}</span>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-600">{{ p.status }}</span>
                        </div>
                        <h2 class="mt-4 text-2xl font-bold text-slate-900">{{ p.name }}</h2>
                        <p class="mt-1 text-sm text-slate-500">{{ p.entity }}</p>
                        <p class="mt-4 text-slate-600">{{ p.overview }}</p>

                        <div v-if="p.headline" class="mt-6 flex flex-wrap items-baseline gap-x-4 gap-y-1 border-t border-slate-100 pt-5">
                            <span class="text-2xl font-bold text-emerald-700">{{ p.headline.value }}</span>
                            <span class="text-sm text-slate-600">{{ p.headline.label }} ({{ p.headline.type }}, {{ p.headline.year }})</span>
                            <span class="w-full text-xs text-slate-400">Sumber: {{ p.headline.source }}</span>
                        </div>

                        <Link :href="route('program.show', p.slug)" class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-700 hover:underline">
                            Butiran program <ArrowRightIcon class="h-4 w-4" />
                        </Link>
                    </div>
                </article>
            </div>
        </section>
    </PublicLayout>
</template>
