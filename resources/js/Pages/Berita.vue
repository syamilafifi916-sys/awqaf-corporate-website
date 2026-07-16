<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({ items: Array });
</script>

<template>
    <Head title="Berita & Acara" />

    <PublicLayout>
        <section class="bg-slate-950">
            <div class="mx-auto max-w-5xl px-6 py-16 lg:px-8 lg:py-20">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-400">Berita</p>
                <h1 class="mt-4 text-4xl font-bold text-white sm:text-5xl">Berita &amp; Acara</h1>
                <p class="mt-4 max-w-2xl text-slate-300">Aktiviti dan acara korporat AWQAF Holdings Berhad.</p>
            </div>
        </section>

        <section class="bg-white py-16 lg:py-20">
            <div class="mx-auto max-w-4xl px-6 lg:px-8">
                <div class="divide-y divide-slate-100 border-t border-slate-100">
                    <article v-for="item in items" :key="item.title" class="grid gap-2 py-8 sm:grid-cols-4 sm:gap-8">
                        <div class="text-sm font-medium text-slate-400">{{ item.date }}</div>
                        <div class="sm:col-span-3">
                            <h2 class="text-lg font-semibold text-slate-900">{{ item.title }}</h2>
                            <p class="mt-2 text-slate-600">{{ item.body }}</p>
                        </div>
                    </article>
                </div>
                <p class="mt-10 text-sm text-slate-500">
                    Rekod aktiviti korporat lanjut boleh disemak dalam Laporan Tahunan.
                </p>
            </div>
        </section>
    </PublicLayout>
</template>
