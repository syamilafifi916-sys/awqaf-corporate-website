<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({ directors: Array });

const altFor = (d) => `Foto rasmi ${d.full_name}, ${d.designation} AWQAF Holdings Berhad`;
</script>

<template>
    <Head title="Lembaga Pengarah" />

    <PublicLayout>
        <section class="bg-slate-950">
            <div class="mx-auto max-w-5xl px-6 py-16 lg:px-8 lg:py-20">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-400">Kepimpinan</p>
                <h1 class="mt-4 text-4xl font-bold text-white sm:text-5xl">Lembaga Pengarah</h1>
                <p class="mt-4 max-w-2xl text-slate-300">
                    Ahli Lembaga Pengarah AWQAF Holdings Berhad yang menyelia hala tuju strategik dan tadbir urus institusi.
                </p>
            </div>
        </section>

        <section class="bg-white py-16 lg:py-24">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <ul class="grid grid-cols-1 gap-x-10 gap-y-14 sm:grid-cols-2 lg:grid-cols-3">
                    <li v-for="d in directors" :key="d.slug">
                        <Link :href="route('korporat.leadership.show', d.slug)" class="group block focus-visible:outline-none">
                            <div class="overflow-hidden rounded-xl bg-slate-100">
                                <img
                                    :src="`/images/leadership/${d.photo}.jpg`"
                                    :alt="altFor(d)"
                                    class="aspect-[4/5] w-full object-cover object-top transition duration-300 group-hover:opacity-95 group-focus-visible:ring-2 group-focus-visible:ring-emerald-500"
                                    loading="lazy"
                                />
                            </div>
                            <div class="mt-5">
                                <h2 class="text-lg font-semibold leading-snug text-slate-900 group-hover:text-emerald-700">{{ d.full_name }}</h2>
                                <p class="mt-1 text-sm font-medium text-emerald-700">{{ d.designation }}</p>
                                <p v-if="d.committee_roles.length" class="text-sm text-slate-500">{{ d.committee_roles.join(' · ') }}</p>
                                <p class="mt-3 text-sm leading-relaxed text-slate-500">{{ d.summary }}</p>
                                <span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-emerald-700 group-hover:underline">Lihat Profil →</span>
                            </div>
                        </Link>
                    </li>
                </ul>
            </div>
        </section>
    </PublicLayout>
</template>
