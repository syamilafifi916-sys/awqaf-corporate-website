<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ArrowLeftIcon, ArrowTopRightOnSquareIcon, DocumentTextIcon, PhotoIcon } from '@heroicons/vue/24/outline';

defineProps({
    portfolio: Object,
    others: Array,
});
</script>

<template>
    <Head :title="`${portfolio.name} — Portfolio Pelaburan`" />

    <PublicLayout>
        <!-- Header -->
        <section class="bg-slate-950">
            <div class="mx-auto max-w-5xl px-6 py-16 lg:px-8 lg:py-20">
                <Link :href="route('portfolio.index')" class="inline-flex items-center gap-1.5 text-sm font-medium text-slate-400 hover:text-white">
                    <ArrowLeftIcon class="h-4 w-4" /> Portfolio Pelaburan
                </Link>
                <div class="mt-6">
                    <span class="rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-slate-300">{{ portfolio.status }}</span>
                </div>
                <h1 class="mt-5 text-4xl font-bold text-white sm:text-5xl">{{ portfolio.name }}</h1>
                <p class="mt-3 text-slate-400">{{ portfolio.entity }}</p>
                <p v-if="portfolio.role" class="mt-5 max-w-2xl leading-relaxed text-slate-300">{{ portfolio.role }}</p>
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
                            <p class="mt-3 text-xs font-semibold uppercase tracking-wider text-slate-400">Imej Portfolio</p>
                            <p class="mt-1 text-sm text-slate-400">Foto rasmi portfolio — untuk disediakan oleh pihak AWQAF.</p>
                        </div>
                    </div>

                    <h2 class="mt-10 text-xl font-bold text-slate-900">Pengenalan</h2>
                    <div class="mt-4 space-y-4">
                        <p v-for="(para, i) in portfolio.description" :key="i" class="leading-relaxed text-slate-700">{{ para }}</p>
                    </div>

                    <!-- Status note / integrity flag -->
                    <p v-if="portfolio.status_note" class="mt-6 rounded-xl border border-amber-100 bg-amber-50 p-4 text-sm text-amber-800">
                        {{ portfolio.status_note }}
                    </p>

                    <!-- Units / entities -->
                    <div v-if="portfolio.units && portfolio.units.length" class="mt-12">
                        <h2 class="text-xl font-bold text-slate-900">Entiti berkaitan</h2>
                        <div class="mt-6 space-y-5">
                            <div v-for="u in portfolio.units" :key="u.name" class="border-l-2 border-emerald-200 pl-5">
                                <h3 class="font-semibold text-slate-900">{{ u.name }}</h3>
                                <p class="mt-1 text-sm text-slate-600">{{ u.note }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Key activities -->
                    <div v-if="portfolio.activities && portfolio.activities.length" class="mt-12">
                        <h2 class="text-xl font-bold text-slate-900">Aktiviti utama</h2>
                        <div class="mt-6 grid gap-4 sm:grid-cols-2">
                            <div v-for="a in portfolio.activities" :key="a.name" class="rounded-xl border border-slate-100 p-5">
                                <h3 class="font-semibold text-slate-900">{{ a.name }}</h3>
                                <p class="mt-1.5 text-sm leading-relaxed text-slate-600">{{ a.desc }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Branches (CURVES) -->
                    <div v-if="portfolio.branches && portfolio.branches.length" class="mt-12">
                        <h2 class="text-xl font-bold text-slate-900">Cawangan</h2>
                        <div class="mt-6 space-y-4">
                            <div v-for="b in portfolio.branches" :key="b.name" class="rounded-xl border border-slate-100 p-5 sm:flex sm:items-start sm:gap-5">
                                <!-- Image/logo slot (clearly marked) -->
                                <div class="flex aspect-video w-full flex-none items-center justify-center rounded-lg border-2 border-dashed border-slate-200 bg-slate-50 sm:w-40">
                                    <PhotoIcon class="h-7 w-7 text-slate-300" />
                                </div>
                                <div class="mt-4 sm:mt-0">
                                    <h3 class="font-semibold text-slate-900">{{ b.name }}</h3>
                                    <p class="mt-0.5 text-sm text-slate-500">{{ b.location }}</p>
                                    <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ b.description }}</p>
                                    <p v-if="b.opened" class="mt-2 text-xs text-slate-400">{{ b.opened }}</p>
                                    <a
                                        v-if="b.url"
                                        :href="b.url"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="mt-3 inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-700 hover:underline"
                                    >
                                        {{ b.url_label || 'Pautan rasmi' }}
                                        <ArrowTopRightOnSquareIcon class="h-4 w-4" />
                                    </a>
                                    <p v-else class="mt-3 text-xs italic text-slate-400">Tiada pautan rasmi disahkan.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Curriculum (education portfolio) -->
                    <div v-if="portfolio.curriculum && portfolio.curriculum.length" class="mt-12">
                        <h2 class="text-xl font-bold text-slate-900">Kurikulum</h2>
                        <ul class="mt-4 space-y-2">
                            <li v-for="c in portfolio.curriculum" :key="c" class="flex items-start gap-2 text-slate-600">
                                <span class="mt-2 h-1.5 w-1.5 flex-none rounded-full bg-emerald-500"></span>
                                <span>{{ c }}</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Verified figures -->
                    <div class="mt-12">
                        <h2 class="text-xl font-bold text-slate-900">Fakta &amp; Angka</h2>
                        <p class="mt-1 text-sm text-slate-500">Setiap angka disahkan terhadap halaman Laporan Tahunan sumber.</p>

                        <div v-if="portfolio.facts && portfolio.facts.length" class="mt-6 overflow-x-auto rounded-2xl border border-slate-100">
                            <table class="min-w-full divide-y divide-slate-100 text-sm">
                                <thead>
                                    <tr class="bg-slate-50 text-left text-xs uppercase tracking-wide text-slate-500">
                                        <th class="px-5 py-3">Tahun</th>
                                        <th class="px-5 py-3">Butiran</th>
                                        <th class="px-5 py-3 text-right">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    <tr v-for="(f, i) in portfolio.facts" :key="i">
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
                            Belum ada angka kewangan yang disahkan untuk dipaparkan bagi portfolio ini.
                        </p>
                    </div>

                    <!-- History / past operations -->
                    <div v-if="portfolio.history && portfolio.history.length" class="mt-12">
                        <h2 class="text-xl font-bold text-slate-900">Latar belakang &amp; operasi lampau</h2>
                        <div class="mt-4 space-y-3">
                            <p v-for="(h, i) in portfolio.history" :key="i" class="rounded-xl border border-slate-100 bg-slate-50 p-4 text-sm text-slate-600">{{ h }}</p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <aside class="space-y-8 lg:col-span-1">
                    <!-- Logo (logo-ready, clearly marked) -->
                    <div>
                        <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-400">Logo Portfolio</h3>
                        <div class="mt-3 flex aspect-video items-center justify-center rounded-xl border-2 border-dashed border-slate-200 bg-slate-50">
                            <span class="text-[11px] font-medium uppercase tracking-wider text-slate-400">Logo rasmi</span>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-slate-100 p-6">
                        <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-400">Maklumat</h3>
                        <dl class="mt-4 space-y-3 text-sm">
                            <div><dt class="text-slate-400">Entiti</dt><dd class="text-slate-900">{{ portfolio.entity }}</dd></div>
                            <div><dt class="text-slate-400">Status</dt><dd class="text-slate-900">{{ portfolio.status }}</dd></div>
                        </dl>
                    </div>

                    <!-- Related reports -->
                    <div v-if="portfolio.reports && portfolio.reports.length" class="rounded-2xl border border-slate-100 p-6">
                        <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-400">Laporan Berkaitan</h3>
                        <ul class="mt-4 space-y-2">
                            <li v-for="y in portfolio.reports" :key="y">
                                <Link :href="route('korporat.reports')" class="inline-flex items-center gap-2 text-sm font-medium text-emerald-700 hover:underline">
                                    <DocumentTextIcon class="h-4 w-4" /> Laporan Tahunan {{ y }}
                                </Link>
                            </li>
                        </ul>
                    </div>

                    <!-- External official links -->
                    <div v-if="portfolio.related_links && portfolio.related_links.length" class="rounded-2xl border border-slate-100 p-6">
                        <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-400">Pautan Berkaitan</h3>
                        <ul class="mt-4 space-y-2">
                            <li v-for="l in portfolio.related_links" :key="l.url">
                                <a :href="l.url" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-sm font-medium text-emerald-700 hover:underline">
                                    {{ l.label }} <ArrowTopRightOnSquareIcon class="h-4 w-4" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
        </section>

        <!-- Other portfolios -->
        <section class="border-t border-slate-100 bg-slate-50 py-16">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <h2 class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Portfolio lain</h2>
                <div class="mt-6 flex flex-wrap gap-3">
                    <Link v-for="o in others" :key="o.slug" :href="route('portfolio.show', o.slug)"
                        class="rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:border-emerald-200 hover:text-emerald-700">
                        {{ o.name }}
                    </Link>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
