<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { CheckCircleIcon } from '@heroicons/vue/24/outline';

const props = defineProps({
    submitted: {
        type: Boolean,
        default: false,
    },
    submittedDetails: {
        type: Object,
        default: null,
    },
});

const form = useForm({
    name: '',
    ic_number: '',
    attendance: 'hadir',
});

const submit = () => {
    form.post('/agm/pengesahan-kehadiran', {
        preserveScroll: true,
    });
};
</script>

<template>
    <Head title="Pengesahan Kehadiran AGM Ke-13" />

    <PublicLayout>
        <section class="min-h-[70vh] bg-[#f7f6f1]">
            <div class="mx-auto max-w-3xl px-4 py-7 sm:px-6 sm:py-10 lg:px-8">
                <div class="mb-6">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#8b7134]">Mesyuarat Agung Tahunan Ke-13</p>
                    <h1 class="mt-2 text-2xl font-bold tracking-tight text-[#123d32] sm:text-3xl">Pengesahan Kehadiran</h1>
                    <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600">
                        Sila lengkapkan maklumat di bawah untuk mengesahkan kehadiran ke Mesyuarat Agung Tahunan Ke-13 AWQAF Holdings Berhad.
                    </p>
                </div>

                <div class="grid overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm sm:grid-cols-[0.72fr_1.28fr]">
                    <aside class="border-b border-slate-100 bg-[#123d32] p-5 text-white sm:border-b-0 sm:border-r sm:border-white/10">
                        <p class="text-xs font-semibold uppercase tracking-wider text-[#e4cf94]">Maklumat AGM</p>
                        <dl class="mt-6 space-y-5 text-sm">
                            <div><dt class="text-slate-400">Tarikh</dt><dd class="mt-1 font-semibold">Rabu, 21 Oktober 2026</dd></div>
                            <div><dt class="text-slate-400">Masa</dt><dd class="mt-1 font-semibold">10.30 pagi</dd></div>
                            <div><dt class="text-slate-400">Lokasi</dt><dd class="mt-1 font-semibold leading-6">Ibu Pejabat DPIM — M-02-05, Second Floor, Conezion Comercial, Persiaran IRC 3, Ioi Resort, 62502 Putrajaya</dd></div>
                        </dl>
                    </aside>

                    <div class="p-5 sm:p-7">
                        <div v-if="props.submitted" class="rounded-xl border border-emerald-200 bg-emerald-50 p-5">
                            <CheckCircleIcon class="h-8 w-8 text-emerald-700" />
                            <h2 class="mt-3 text-lg font-bold text-slate-950">Pengesahan Kehadiran Berjaya Dihantar</h2>
                            <p class="mt-1 text-sm leading-6 text-slate-600">Terima kasih. Maklumat pengesahan kehadiran anda telah berjaya diterima dan direkodkan.</p>
                            <div v-if="props.submittedDetails" class="mt-4 rounded-lg border border-emerald-200 bg-white p-4 text-sm">
                                <dl class="grid gap-3 sm:grid-cols-2">
                                    <div class="sm:col-span-2">
                                        <dt class="text-xs font-semibold uppercase tracking-wide text-slate-400">Nama</dt>
                                        <dd class="mt-1 font-semibold text-slate-900">{{ props.submittedDetails.name }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-xs font-semibold uppercase tracking-wide text-slate-400">No. Kad Pengenalan</dt>
                                        <dd class="mt-1 font-medium text-slate-800">{{ props.submittedDetails.ic_number_masked }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-xs font-semibold uppercase tracking-wide text-slate-400">Kehadiran</dt>
                                        <dd class="mt-1 font-bold" :class="props.submittedDetails.attendance === 'Hadir' ? 'text-emerald-700' : 'text-red-600'">{{ props.submittedDetails.attendance }}</dd>
                                    </div>
                                </dl>
                            </div>
                        <div class="mt-4 grid gap-2 sm:grid-cols-2">
                                <Link href="/agm" class="inline-flex min-h-10 items-center justify-center rounded-lg border border-[#bca15d] bg-white px-4 py-2 text-sm font-semibold text-[#173c33] transition hover:bg-[#faf7ee]">Kembali ke Halaman AGM</Link>
                                <a href="/dokumen/agm/notis-2026" target="_blank" rel="noopener" class="inline-flex min-h-10 items-center justify-center rounded-lg bg-[#123d32] px-4 py-2 text-sm font-semibold text-white transition hover:bg-[#1b4b3f]">Baca Notis AGM</a>
                            </div>
                            <div class="mt-4 rounded-lg border border-emerald-100 bg-white/70 p-3 text-xs leading-5 text-slate-600">
                                <strong class="text-slate-800">21 Oktober 2026 · 10.30 pagi</strong><br>
                                Ibu Pejabat DPIM, M-02-05, Second Floor, Conezion Comercial, Persiaran IRC 3, Ioi Resort, 62502 Putrajaya.
                            </div>
                        </div>

                        <form v-else class="space-y-5" @submit.prevent="submit">
                            <div>
                                <label for="name" class="text-sm font-semibold text-slate-800">Nama Penuh</label>
                                <input id="name" v-model="form.name" type="text" autocomplete="name" required maxlength="150" class="mt-2 block w-full rounded-lg border-slate-300 text-sm shadow-sm focus:border-emerald-500 focus:ring-emerald-500" />
                                <p v-if="form.errors.name" class="mt-1.5 text-xs font-medium text-red-600">{{ form.errors.name }}</p>
                            </div>

                            <div>
                                <label for="ic_number" class="text-sm font-semibold text-slate-800">No. Kad Pengenalan</label>
                                <input id="ic_number" v-model="form.ic_number" type="text" inputmode="numeric" autocomplete="off" required minlength="12" maxlength="12" pattern="[0-9]{12}" placeholder="Contoh: 900101101234" class="mt-2 block w-full rounded-lg border-slate-300 text-sm shadow-sm focus:border-emerald-500 focus:ring-emerald-500" />
                                <p class="mt-1.5 text-xs leading-5 text-slate-400">Digunakan untuk tujuan pengesahan kehadiran AGM sahaja.</p>
                                <p v-if="form.errors.ic_number" class="mt-1.5 text-xs font-medium text-red-600">{{ form.errors.ic_number }}</p>
                            </div>

                            <fieldset>
                                <legend class="text-sm font-semibold text-slate-800">Kehadiran</legend>
                                <div class="mt-2 grid grid-cols-2 gap-3">
                                    <label class="cursor-pointer rounded-lg border p-3 text-sm transition" :class="form.attendance === 'hadir' ? 'border-emerald-500 bg-emerald-50 text-emerald-900' : 'border-slate-200 text-slate-700'">
                                        <input v-model="form.attendance" type="radio" value="hadir" class="mr-2 text-emerald-600 focus:ring-emerald-500" /> Hadir
                                    </label>
                                    <label class="cursor-pointer rounded-lg border p-3 text-sm transition" :class="form.attendance === 'tidak_hadir' ? 'border-emerald-500 bg-emerald-50 text-emerald-900' : 'border-slate-200 text-slate-700'">
                                        <input v-model="form.attendance" type="radio" value="tidak_hadir" class="mr-2 text-emerald-600 focus:ring-emerald-500" /> Tidak Hadir
                                    </label>
                                </div>
                                <p v-if="form.errors.attendance" class="mt-1.5 text-xs font-medium text-red-600">{{ form.errors.attendance }}</p>
                            </fieldset>

                            <button type="submit" :disabled="form.processing" class="inline-flex min-h-11 w-full items-center justify-center rounded-lg bg-[#123d32] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#1b4b3f] disabled:cursor-not-allowed disabled:opacity-60">
                                {{ form.processing ? 'Menghantar…' : 'Hantar Pengesahan' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
