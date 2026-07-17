<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({ directors: Array });

const chairman = computed(() => props.directors[0]);
const members = computed(() => props.directors.slice(1));

const altFor = (d) => `Foto rasmi ${d.full_name}, ${d.designation} AWQAF Holdings Berhad`;
</script>

<template>
    <Head title="Lembaga Pengarah" />

    <PublicLayout>
        <!-- One calm white canvas — annual-report composition -->
        <div class="bg-white">
            <!-- A. Introduction -->
            <section class="mx-auto max-w-6xl px-6 pt-20 lg:px-8 lg:pt-28">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-emerald-700">Tadbir Urus</p>
                <h1 class="mt-5 text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">Lembaga Pengarah</h1>
                <p class="mt-6 max-w-2xl text-lg leading-relaxed text-slate-600">
                    Menyelia hala tuju strategik dan tadbir urus AWQAF Holdings Berhad, disokong oleh
                    Jawatankuasa Pelaburan dan Jawatankuasa Audit.
                </p>
            </section>

            <!-- B. Chairman feature — the visual anchor -->
            <section class="mx-auto max-w-6xl px-6 pt-16 lg:px-8 lg:pt-24">
                <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2 lg:gap-20">
                    <div>
                        <img
                            :src="`/images/leadership/${chairman.photo}.jpg`"
                            :alt="altFor(chairman)"
                            class="aspect-[4/5] w-full rounded-3xl object-cover object-top"
                        />
                    </div>
                    <div>
                        <div class="flex items-center gap-4">
                            <span class="text-sm font-semibold tabular-nums text-slate-300">01</span>
                            <span class="h-px w-10 bg-slate-200"></span>
                            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-emerald-700">Pengerusi</span>
                        </div>
                        <h2 class="mt-6 text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">{{ chairman.full_name }}</h2>
                        <p class="mt-3 text-lg text-slate-500">{{ chairman.designation }}</p>
                        <p class="mt-8 max-w-xl text-lg leading-relaxed text-slate-600">{{ chairman.summary }}</p>
                        <Link
                            :href="route('korporat.leadership.show', chairman.slug)"
                            class="mt-10 inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-700 transition hover:gap-2.5 hover:text-emerald-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 focus-visible:ring-offset-2"
                        >
                            Lihat Profil →
                        </Link>
                    </div>
                </div>
            </section>

            <!-- C. Other directors — secondary, portrait-led -->
            <section class="mx-auto max-w-6xl px-6 pb-24 pt-20 lg:px-8 lg:pb-32 lg:pt-28">
                <div class="border-t border-slate-100 pt-14">
                    <h2 class="text-sm font-semibold uppercase tracking-[0.18em] text-slate-400">Ahli Lembaga Pengarah</h2>
                    <ul class="mt-12 grid grid-cols-1 gap-x-10 gap-y-16 sm:grid-cols-2 lg:grid-cols-3">
                        <li v-for="d in members" :key="d.slug">
                            <Link :href="route('korporat.leadership.show', d.slug)" class="group block focus-visible:outline-none">
                                <img
                                    :src="`/images/leadership/${d.photo}.jpg`"
                                    :alt="altFor(d)"
                                    class="aspect-[4/5] w-full rounded-2xl object-cover object-top transition duration-500 group-hover:opacity-90 group-focus-visible:ring-2 group-focus-visible:ring-emerald-500 group-focus-visible:ring-offset-2"
                                    loading="lazy"
                                />
                                <p v-if="d.committee_roles.length" class="mt-6 text-xs font-semibold uppercase tracking-wider text-emerald-700">
                                    {{ d.committee_roles.join(' · ') }}
                                </p>
                                <h3 :class="['text-lg font-semibold leading-snug text-slate-900 transition group-hover:text-emerald-700', d.committee_roles.length ? 'mt-1' : 'mt-6']">{{ d.full_name }}</h3>
                                <p class="mt-0.5 text-sm text-slate-500">{{ d.designation }}</p>
                            </Link>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </PublicLayout>
</template>
