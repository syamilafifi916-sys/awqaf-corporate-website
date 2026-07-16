<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ArrowLeftIcon, ArrowTopRightOnSquareIcon, DocumentTextIcon, PhotoIcon } from '@heroicons/vue/24/outline';

defineProps({
    programme: Object,
    others: Array,
});
</script>

<template>
    <Head :title="`${programme.name} — Program & Inisiatif`" />

    <PublicLayout>
        <!-- Header -->
        <section class="bg-slate-950">
            <div class="mx-auto max-w-5xl px-6 py-16 lg:px-8 lg:py-20">
                <Link :href="route('program.index')" class="inline-flex items-center gap-1.5 text-sm font-medium text-slate-400 hover:text-white">
                    <ArrowLeftIcon class="h-4 w-4" /> Program &amp; Inisiatif
                </Link>
                <div class="mt-6">
                    <span class="rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-slate-300">{{ programme.status }}</span>
                </div>
                <h1 class="mt-5 text-4xl font-bold text-white sm:text-5xl">{{ programme.name }}</h1>
                <p class="mt-3 text-slate-400">{{ programme.organisation }}</p>
            </div>
        </section>

        <section class="bg-white py-16 lg:py-20">
            <div class="mx-auto grid max-w-6xl grid-cols-1 gap-12 px-6 lg:grid-cols-3 lg:px-8">
                <!-- Main -->
                <div class="lg:col-span-2">
                    <!-- Large image (photo-ready, clearly marked) -->
                    <div class="flex aspect-[16/9] items-center justify-center rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50">
                        <div class="text-center">
                            <PhotoIcon class="mx-auto h-10 w-10 text-slate-300" />
                            <p class="mt-3 text-xs font-semibold uppercase tracking-wider text-slate-400">Imej Program</p>
                            <p class="mt-1 text-sm text-slate-400">Foto rasmi program — untuk disediakan oleh pihak AWQAF.</p>
                        </div>
                    </div>

                    <div class="mt-10 space-y-4">
                        <p v-for="(para, i) in programme.description" :key="i" class="text-lg leading-relaxed text-slate-700">{{ para }}</p>
                    </div>

                    <!-- Distinct dates (launch vs legal establishment — presented separately) -->
                    <div class="mt-8 grid gap-4 sm:grid-cols-2">
                        <div v-if="programme.launch_date" class="rounded-xl border border-slate-100 bg-slate-50 p-5">
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Pelancaran / Permulaan operasi</p>
                            <p class="mt-1 text-lg font-bold text-slate-900">{{ programme.launch_date }}</p>
                            <p v-if="programme.launch_note" class="mt-1 text-sm text-slate-600">{{ programme.launch_note }}</p>
                        </div>
                        <div v-if="programme.legal_establishment_date" class="rounded-xl border border-slate-100 bg-slate-50 p-5">
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Penubuhan rasmi</p>
                            <p class="mt-1 text-lg font-bold text-slate-900">{{ programme.legal_establishment_date }}</p>
                            <p v-if="programme.legal_note" class="mt-1 text-sm text-slate-600">{{ programme.legal_note }}</p>
                        </div>
                    </div>

                    <!-- Focus areas / sub-programmes -->
                    <div v-if="programme.focus_areas && programme.focus_areas.length" class="mt-10">
                        <h2 class="text-xl font-bold text-slate-900">Fokus program</h2>
                        <div class="mt-6 space-y-5">
                            <div v-for="s in programme.focus_areas" :key="s.name" class="border-l-2 border-emerald-200 pl-5">
                                <h3 class="font-semibold text-slate-900">{{ s.name }}</h3>
                                <p class="mt-1 text-sm text-slate-600">{{ s.desc }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Verified figures -->
                    <div class="mt-12">
                        <h2 class="text-xl font-bold text-slate-900">Fakta &amp; Angka</h2>
                        <p class="mt-1 text-sm text-slate-500">Setiap angka disahkan terhadap halaman Laporan Tahunan sumber.</p>

                        <div v-if="programme.facts && programme.facts.length" class="mt-6 overflow-x-auto rounded-2xl border border-slate-100">
                            <table class="min-w-full divide-y divide-slate-100 text-sm">
                                <thead>
                                    <tr class="bg-slate-50 text-left text-xs uppercase tracking-wide text-slate-500">
                                        <th class="px-5 py-3">Tahun</th>
                                        <th class="px-5 py-3">Butiran</th>
                                        <th class="px-5 py-3 text-right">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    <tr v-for="(f, i) in programme.facts" :key="i">
                                        <td class="px-5 py-4 font-medium text-slate-900">{{ f.year }}</td>
                                        <td class="px-5 py-4 text-slate-600">
                                            {{ f.metric }}
                                            <span class="mt-0.5 block text-xs text-slate-400">Sumber: {{ f.report }}, ms {{ f.page }}</span>
                                        </td>
                                        <td class="px-5 py-4 text-right text-lg font-bold text-emerald-700">{{ f.value }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p v-else class="mt-6 rounded-2xl border border-dashed border-slate-200 bg-slate-50 p-6 text-sm text-slate-500">
                            Belum ada angka kewangan yang disahkan untuk dipaparkan.
                        </p>

                        <p v-if="programme.note" class="mt-4 rounded-xl border border-amber-100 bg-amber-50 p-4 text-sm text-amber-800">
                            {{ programme.note }}
                        </p>
                    </div>
                </div>

                <!-- Sidebar -->
                <aside class="space-y-8 lg:col-span-1">
                    <!-- Logo (logo-ready, clearly marked) -->
                    <div>
                        <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-400">Logo Program</h3>
                        <div class="mt-3 flex aspect-video items-center justify-center rounded-xl border-2 border-dashed border-slate-200 bg-slate-50">
                            <span class="text-[11px] font-medium uppercase tracking-wider text-slate-400">Logo rasmi</span>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-slate-100 p-6">
                        <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-400">Maklumat</h3>
                        <dl class="mt-4 space-y-3 text-sm">
                            <div><dt class="text-slate-400">Organisasi</dt><dd class="text-slate-900">{{ programme.organisation }}</dd></div>
                            <div><dt class="text-slate-400">Status</dt><dd class="text-slate-900">{{ programme.status }}</dd></div>
                        </dl>
                    </div>

                    <!-- Related reports -->
                    <div v-if="programme.reports && programme.reports.length" class="rounded-2xl border border-slate-100 p-6">
                        <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-400">Laporan Berkaitan</h3>
                        <ul class="mt-4 space-y-2">
                            <li v-for="y in programme.reports" :key="y">
                                <Link :href="route('korporat.reports')" class="inline-flex items-center gap-2 text-sm font-medium text-emerald-700 hover:underline">
                                    <DocumentTextIcon class="h-4 w-4" /> Laporan Tahunan {{ y }}
                                </Link>
                            </li>
                        </ul>
                    </div>

                    <!-- External official link -->
                    <a v-if="programme.external" :href="programme.external.url" target="_blank" rel="noopener noreferrer"
                        class="flex items-center justify-between gap-3 rounded-2xl border border-slate-200 p-5 transition hover:border-emerald-200 hover:bg-emerald-50/40">
                        <span class="text-sm font-semibold text-slate-900">{{ programme.external.label }}</span>
                        <ArrowTopRightOnSquareIcon class="h-5 w-5 flex-none text-emerald-700" />
                    </a>
                </aside>
            </div>
        </section>

        <!-- Other programmes -->
        <section class="border-t border-slate-100 bg-slate-50 py-16">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <h2 class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Program lain</h2>
                <div class="mt-6 flex flex-wrap gap-3">
                    <Link v-for="o in others" :key="o.slug" :href="route('program.show', o.slug)"
                        class="rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:border-emerald-200 hover:text-emerald-700">
                        {{ o.name }}
                    </Link>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
