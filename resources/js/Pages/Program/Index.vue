<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ArrowRightIcon } from '@heroicons/vue/24/outline';

defineProps({
    programmes: Array,
});
</script>

<template>
    <Head title="Program & Inisiatif" />

    <PublicLayout>
        <section class="bg-slate-950">
            <div class="mx-auto max-w-5xl px-6 py-20 lg:px-8 lg:py-24">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-400">Program &amp; Inisiatif</p>
                <h1 class="mt-4 max-w-3xl text-4xl font-bold leading-tight text-white sm:text-5xl">
                    Program kebajikan AWQAF Holdings Berhad
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-relaxed text-slate-300">
                    Tiga program manfaat sosial yang dibiayai daripada hasil aktiviti pelaburan Kumpulan AWQAF.
                </p>
                <p class="mt-4 max-w-2xl text-sm text-slate-400">
                    Portfolio pelaburan Kumpulan AWQAF — termasuk CURVES dan Infaq — dipaparkan secara berasingan di bawah
                    <Link :href="route('portfolio.index')" class="font-medium text-emerald-400 hover:underline">Portfolio Pelaburan</Link>.
                </p>
            </div>
        </section>

        <section class="bg-white py-16 lg:py-20">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">Tiga program</p>
                <ol class="mt-8 border-t border-slate-100">
                    <li v-for="(p, i) in programmes" :key="p.slug" class="border-b border-slate-100">
                        <Link :href="route('program.show', p.slug)" class="group grid grid-cols-1 gap-6 py-10 transition lg:grid-cols-12 lg:gap-10">
                            <div class="flex items-start gap-4 lg:col-span-7">
                                <span class="mt-1 text-lg font-semibold tabular-nums text-slate-300">{{ String(i + 1).padStart(2, '0') }}</span>
                                <div>
                                    <h2 class="text-2xl font-bold text-slate-900 transition group-hover:text-emerald-700">{{ p.name }}</h2>
                                    <p class="mt-1 text-sm text-slate-500">{{ p.organisation }}</p>
                                    <p class="mt-4 max-w-lg leading-relaxed text-slate-600">{{ p.summary }}</p>
                                    <span class="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-700 group-hover:gap-2.5">
                                        Butiran program <ArrowRightIcon class="h-4 w-4" />
                                    </span>
                                </div>
                            </div>

                            <!-- Highlight panel replaces the old image placeholder -->
                            <div class="lg:col-span-5">
                                <div class="rounded-2xl bg-slate-50 p-6">
                                    <template v-if="p.headline">
                                        <div class="text-3xl font-bold text-emerald-700">{{ p.headline.value }}</div>
                                        <p class="mt-2 text-sm text-slate-600">{{ p.headline.metric }} · {{ p.headline.year }}</p>
                                        <p class="mt-3 text-xs text-slate-400">Sumber: {{ p.headline.report }}, ms {{ p.headline.page }}</p>
                                    </template>
                                    <template v-else>
                                        <dl class="space-y-3 text-sm">
                                            <div><dt class="text-xs uppercase tracking-wide text-slate-400">Status</dt><dd class="mt-0.5 font-semibold text-slate-900">{{ p.status }}</dd></div>
                                            <div><dt class="text-xs uppercase tracking-wide text-slate-400">Organisasi</dt><dd class="mt-0.5 font-medium text-slate-700">{{ p.organisation }}</dd></div>
                                        </dl>
                                    </template>
                                </div>
                            </div>
                        </Link>
                    </li>
                </ol>
            </div>
        </section>
    </PublicLayout>
</template>
