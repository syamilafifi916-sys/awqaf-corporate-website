<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ArrowLeftIcon } from '@heroicons/vue/24/outline';

const props = defineProps({ director: Object, others: Array });

const alt = `Foto rasmi ${props.director.full_name}, ${props.director.designation} AWQAF Holdings Berhad`;

const sections = [
    { title: 'Kelayakan', items: props.director.qualifications },
    { title: 'Pelantikan & Jawatan', items: props.director.appointments },
    { title: 'Bidang Kepakaran', items: props.director.expertise },
    { title: 'Anugerah & Pengiktirafan', items: props.director.awards },
].filter((s) => s.items && s.items.length);
</script>

<template>
    <Head :title="`${director.full_name} — Lembaga Pengarah`" />

    <PublicLayout>
        <section class="bg-slate-950">
            <div class="mx-auto max-w-5xl px-6 py-14 lg:px-8 lg:py-16">
                <Link :href="route('korporat.leadership.index')" class="inline-flex items-center gap-1.5 text-sm font-medium text-slate-400 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">
                    <ArrowLeftIcon class="h-4 w-4" /> Lembaga Pengarah
                </Link>
            </div>
        </section>

        <section class="bg-white pb-16 lg:pb-24">
            <div class="mx-auto grid max-w-6xl grid-cols-1 gap-12 px-6 lg:grid-cols-3 lg:px-8">
                <!-- Portrait -->
                <div class="lg:col-span-1">
                    <div class="-mt-14 overflow-hidden rounded-2xl bg-slate-100 shadow-xl lg:-mt-20">
                        <img :src="`/images/leadership/${director.photo}.jpg`" :alt="alt" class="aspect-[4/5] w-full object-cover object-top" />
                    </div>
                </div>

                <!-- Content -->
                <div class="lg:col-span-2 lg:pt-6">
                    <h1 class="text-3xl font-bold text-slate-900 sm:text-4xl">{{ director.full_name }}</h1>
                    <p class="mt-2 text-lg font-medium text-emerald-700">{{ director.designation }}</p>
                    <p v-if="director.committee_roles.length" class="text-slate-500">{{ director.committee_roles.join(' · ') }}</p>

                    <div class="mt-8 space-y-4 text-lg leading-relaxed text-slate-700">
                        <p v-for="(para, i) in director.biography" :key="i">{{ para }}</p>
                    </div>

                    <div v-for="s in sections" :key="s.title" class="mt-10">
                        <h2 class="text-sm font-semibold uppercase tracking-wider text-emerald-700">{{ s.title }}</h2>
                        <ul class="mt-4 space-y-2">
                            <li v-for="(item, i) in s.items" :key="i" class="flex gap-3 text-slate-600">
                                <span class="mt-2 h-1.5 w-1.5 flex-none rounded-full bg-emerald-500"></span>
                                <span>{{ item }}</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Related governance -->
                    <div class="mt-12 flex flex-wrap gap-4 border-t border-slate-100 pt-8">
                        <Link :href="route('korporat.overview')" class="text-sm font-semibold text-emerald-700 hover:underline">Struktur Korporat</Link>
                        <Link :href="route('ketelusan')" class="text-sm font-semibold text-emerald-700 hover:underline">Laporan &amp; Tadbir Urus</Link>
                        <Link :href="route('korporat.leadership.index')" class="text-sm font-semibold text-emerald-700 hover:underline">Semua Ahli Lembaga</Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- Other directors -->
        <section class="border-t border-slate-100 bg-slate-50 py-14">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <h2 class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Ahli Lembaga Lain</h2>
                <div class="mt-6 flex flex-wrap gap-3">
                    <Link v-for="o in others" :key="o.slug" :href="route('korporat.leadership.show', o.slug)"
                        class="rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:border-emerald-200 hover:text-emerald-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">
                        {{ o.full_name }}
                    </Link>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
