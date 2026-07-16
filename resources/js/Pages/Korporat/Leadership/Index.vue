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
        <!-- A. Page introduction -->
        <section class="border-b border-slate-100 bg-white">
            <div class="mx-auto max-w-5xl px-6 py-16 lg:px-8 lg:py-20">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Tadbir Urus</p>
                <h1 class="mt-4 text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">Lembaga Pengarah</h1>
                <p class="mt-5 max-w-2xl text-lg leading-relaxed text-slate-600">
                    Lembaga Pengarah AWQAF Holdings Berhad menyelia hala tuju strategik dan tadbir urus institusi,
                    disokong oleh Jawatankuasa Pelaburan dan Jawatankuasa Audit.
                </p>
            </div>
        </section>

        <!-- B. Chairman feature -->
        <section class="bg-white">
            <div class="mx-auto max-w-6xl px-6 py-16 lg:px-8 lg:py-20">
                <div class="grid grid-cols-1 items-center gap-10 lg:grid-cols-12 lg:gap-16">
                    <div class="lg:col-span-5">
                        <div class="overflow-hidden rounded-3xl bg-slate-100">
                            <img
                                :src="`/images/leadership/${chairman.photo}.jpg`"
                                :alt="altFor(chairman)"
                                class="aspect-[4/5] w-full object-cover object-top"
                            />
                        </div>
                    </div>
                    <div class="lg:col-span-7">
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-emerald-700">Pengerusi</p>
                        <h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">{{ chairman.full_name }}</h2>
                        <p class="mt-2 text-lg text-slate-500">{{ chairman.designation }}</p>
                        <p class="mt-6 max-w-xl text-lg leading-relaxed text-slate-600">{{ chairman.summary }}</p>
                        <Link
                            :href="route('korporat.leadership.show', chairman.slug)"
                            class="mt-8 inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-700 transition hover:gap-2.5 hover:text-emerald-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 focus-visible:ring-offset-2"
                        >
                            Lihat Profil →
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- C. Remaining board members -->
        <section class="bg-slate-50 py-16 lg:py-24">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <h2 class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Ahli Lembaga</h2>
                <ul class="mt-10 grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
                    <li v-for="d in members" :key="d.slug">
                        <Link :href="route('korporat.leadership.show', d.slug)" class="group block focus-visible:outline-none">
                            <div class="overflow-hidden rounded-2xl bg-white">
                                <img
                                    :src="`/images/leadership/${d.photo}.jpg`"
                                    :alt="altFor(d)"
                                    class="aspect-[4/5] w-full object-cover object-top transition duration-500 group-hover:scale-[1.03] group-focus-visible:ring-2 group-focus-visible:ring-emerald-500"
                                    loading="lazy"
                                />
                            </div>
                            <div class="mt-5">
                                <p v-if="d.committee_roles.length" class="text-xs font-semibold uppercase tracking-wider text-emerald-700">
                                    {{ d.committee_roles.join(' · ') }}
                                </p>
                                <h3 class="mt-1 text-lg font-semibold leading-snug text-slate-900 transition group-hover:text-emerald-700">{{ d.full_name }}</h3>
                                <p class="mt-0.5 text-sm text-slate-500">{{ d.designation }}</p>
                            </div>
                        </Link>
                    </li>
                </ul>
            </div>
        </section>
    </PublicLayout>
</template>
