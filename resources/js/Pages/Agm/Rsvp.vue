<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { CheckCircleIcon } from '@heroicons/vue/24/outline';

const props = defineProps({
    submitted: {
        type: Boolean,
        default: false,
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
        <section class="min-h-[70vh] bg-slate-50">
            <div class="mx-auto max-w-3xl px-5 py-12 sm:px-6 sm:py-16 lg:px-8">
                <div class="mb-6">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-emerald-700">Mesyuarat Agung Tahunan Ke-13</p>
                    <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">Pengesahan Kehadiran</h1>
                    <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600">
                        Sila lengkapkan maklumat di bawah untuk mengesahkan kehadiran ke Mesyuarat Agung Tahunan Ke-13 AWQAF Holdings Berhad.
                    </p>
                </div>

                <div class="grid overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm sm:grid-cols-[0.72fr_1.28fr]">
                    <aside class="border-b border-slate-100 bg-slate-950 p-6 text-white sm:border-b-0 sm:border-r sm:border-white/10">
                        <p class="text-xs font-semibold uppercase tracking-wider text-emerald-400">Maklumat AGM</p>
                        <dl class="mt-6 space-y-5 text-sm">
                            <div><dt class="text-slate-400">Tarikh</dt><dd class="mt-1 font-semibold">Rabu, 21 Oktober 2026</dd></div>
                            <div><dt class="text-slate-400">Masa</dt><dd class="mt-1 font-semibold">10.30 pagi</dd></div>
                            <div><dt class="text-slate-400">Lokasi</dt><dd class="mt-1 font-semibold leading-6">Ibu Pejabat DPIM — M-02-05, Second Floor, Conezion Comercial, Persiaran IRC 3, Ioi Resort, 62502 Putrajaya</dd></div>
                        </dl>
                    </aside>

                    <div class="p-6 sm:p-8">
                        <div v-if="props.submitted" class="rounded-xl border border-emerald-200 bg-emerald-50 p-5">
                            <CheckCircleIcon class="h-8 w-8 text-emerald-700" />
                            <h2 class="mt-3 text-lg font-bold text-slate-950">Pengesahan Kehadiran Berjaya Dihantar</h2>
                            <p class="mt-1 text-sm leading-6 text-slate-600">Terima kasih. Maklumat pengesahan kehadiran anda telah berjaya diterima dan direkodkan.</p>
                        </div>

                        <form v-else class="space-y-5" @submit.prevent="submit">
                            <div>
                                <label for="name" class="text-sm font-semibold text-slate-800">Nama Penuh</label>
                                <input id="name" v-model="form.name" type="text" autocomplete="name" required maxlength="150" class="mt-2 block w-full rounded-lg border-slate-300 text-sm shadow-sm focus:border-emerald-500 focus:ring-emerald-500" />
                                <p v-if="form.errors.name" class="mt-1.5 text-xs font-medium text-red-600">{{ form.errors.name }}</p>
                            </div>

                            <div>
                                <label for="ic_number" class="text-sm font-semibold text-slate-800">No. Kad Pengenalan</label>
                                <input id="ic_number" v-model="form.ic_number" type="text" inputmode="numeric" autocomplete="off" required maxlength="14" placeholder="Contoh: 900101101234" class="mt-2 block w-full rounded-lg border-slate-300 text-sm shadow-sm focus:border-emerald-500 focus:ring-emerald-500" />
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

                            <button type="submit" :disabled="form.processing" class="inline-flex min-h-11 w-full items-center justify-center rounded-lg bg-slate-950 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-800 disabled:cursor-not-allowed disabled:opacity-60">
                                {{ form.processing ? 'Menghantar…' : 'Hantar Pengesahan' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
