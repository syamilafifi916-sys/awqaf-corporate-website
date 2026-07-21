<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { ArrowRightIcon, BuildingLibraryIcon, DocumentTextIcon, Square3Stack3DIcon } from '@heroicons/vue/24/outline';

const page = usePage();
</script>

<template>
    <Head title="Hubungi Kami" />

    <PublicLayout>
        <section class="bg-slate-950">
            <div class="mx-auto max-w-5xl px-6 py-16 lg:px-8 lg:py-20">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-400">Hubungi Kami</p>
                <h1 class="mt-4 text-4xl font-bold text-white sm:text-5xl">Perhubungan</h1>
                <p class="mt-4 max-w-2xl text-slate-300">Maklumat perhubungan dan saluran rasmi AWQAF Holdings Berhad.</p>
            </div>
        </section>

        <section class="bg-white py-16 lg:py-20">
            <div class="mx-auto grid max-w-5xl grid-cols-1 gap-10 px-6 lg:grid-cols-3 lg:px-8">
                <div class="lg:col-span-1">
                    <div class="rounded-2xl border border-slate-100 p-6">
                        <BuildingLibraryIcon class="h-6 w-6 text-emerald-700" />
                        <h2 class="mt-4 font-semibold text-slate-900">Pejabat AWQAF Holdings Berhad</h2>
                        <dl class="mt-4 space-y-3 text-sm text-slate-600">
                            <div><dt class="text-slate-400">Alamat</dt><dd>No. 18, Tingkat 1, D'Bayu Bukit Jelutong, Jalan Serambi U8/24, Bukit Jelutong, 40150 Shah Alam, Selangor</dd></div>
                            <div><dt class="text-slate-400">E-mel</dt><dd><a href="mailto:admin@awqaf.my" class="text-emerald-700 hover:underline">admin@awqaf.my</a></dd></div>
                            <div><dt class="text-slate-400">Telefon</dt><dd><a href="tel:+60378326644" class="text-emerald-700 hover:underline">03-7832 6644</a></dd></div>
                        </dl>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <h2 class="text-xl font-bold text-slate-900">Saluran rasmi</h2>
                    <div class="mt-6 space-y-4">
                        <a v-if="page.props.portalReady" :href="page.props.portalUrl" class="flex items-center justify-between gap-4 rounded-2xl border border-slate-100 p-6 transition hover:border-emerald-200 hover:bg-emerald-50/40">
                            <div class="flex items-start gap-4">
                                <Square3Stack3DIcon class="h-6 w-6 flex-none text-emerald-700" />
                                <div><h3 class="font-semibold text-slate-900">Portal Pewakaf</h3><p class="mt-1 text-sm text-slate-500">Akses rekod wakaf, resit dan keahlian anda.</p></div>
                            </div>
                            <ArrowRightIcon class="h-5 w-5 flex-none text-emerald-700" />
                        </a>
                        <div v-else class="flex items-center justify-between gap-4 rounded-2xl border border-slate-100 bg-slate-50/60 p-6">
                            <div class="flex items-start gap-4">
                                <Square3Stack3DIcon class="h-6 w-6 flex-none text-slate-400" />
                                <div><h3 class="font-semibold text-slate-900">Portal Pewakaf</h3><p class="mt-1 text-sm text-slate-500">Akses rekod wakaf, resit dan keahlian anda.</p></div>
                            </div>
                            <span class="flex-none rounded-full bg-slate-200 px-2.5 py-0.5 text-xs font-semibold text-slate-600">Akan Dibuka</span>
                        </div>
                        <Link :href="route('korporat.reports')" class="flex items-center justify-between gap-4 rounded-2xl border border-slate-100 p-6 transition hover:border-emerald-200 hover:bg-emerald-50/40">
                            <div class="flex items-start gap-4">
                                <DocumentTextIcon class="h-6 w-6 flex-none text-emerald-700" />
                                <div><h3 class="font-semibold text-slate-900">Laporan Korporat</h3><p class="mt-1 text-sm text-slate-500">Laporan Tahunan dan Penyata Kewangan Diaudit.</p></div>
                            </div>
                            <ArrowRightIcon class="h-5 w-5 flex-none text-emerald-700" />
                        </Link>
                        <Link :href="route('korporat.overview')" class="flex items-center justify-between gap-4 rounded-2xl border border-slate-100 p-6 transition hover:border-emerald-200 hover:bg-emerald-50/40">
                            <div class="flex items-start gap-4">
                                <BuildingLibraryIcon class="h-6 w-6 flex-none text-emerald-700" />
                                <div><h3 class="font-semibold text-slate-900">Mengenai AWQAF</h3><p class="mt-1 text-sm text-slate-500">Maklumat korporat, tadbir urus dan lembaga pengarah.</p></div>
                            </div>
                            <ArrowRightIcon class="h-5 w-5 flex-none text-emerald-700" />
                        </Link>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
