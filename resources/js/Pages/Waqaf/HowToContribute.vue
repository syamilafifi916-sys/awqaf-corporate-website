<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { CalendarDaysIcon, CreditCardIcon, EnvelopeIcon } from '@heroicons/vue/24/outline';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Kaedah Berwakaf" />

    <PublicLayout>
        <section class="mx-auto max-w-5xl px-6 py-20 lg:px-8">
            <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Wakaf</p>
            <h1 class="mt-3 text-4xl font-bold text-slate-900">Kaedah Berwakaf</h1>
            <p class="mt-4 max-w-2xl text-slate-500">
                Pilih kaedah yang paling sesuai dengan kemampuan anda — setiap sumbangan direkod dan ditadbir
                secara telus menerusi Portal Pewakaf.
            </p>

            <div class="mt-14 grid grid-cols-1 gap-6 sm:grid-cols-3">
                <div class="rounded-2xl border border-slate-100 p-8">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                        <CreditCardIcon class="h-6 w-6" />
                    </div>
                    <h3 class="mt-4 font-semibold text-slate-900">Secara Atas Talian</h3>
                    <p class="mt-2 text-sm text-slate-500">
                        Wakaf sekali sumbangan menerusi FPX, kad kredit/debit atau perbankan dalam talian.
                        Setiap sumbangan direkod terus ke akaun Portal Pewakaf anda.
                    </p>
                    <span class="mt-4 inline-block rounded-full bg-amber-50 px-3 py-1 text-xs font-medium text-amber-700">
                        Akan dilancarkan tidak lama lagi
                    </span>
                </div>

                <div class="rounded-2xl border border-slate-100 p-8">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                        <CalendarDaysIcon class="h-6 w-6" />
                    </div>
                    <h3 class="mt-4 font-semibold text-slate-900">Wakaf Bulanan</h3>
                    <p class="mt-2 text-sm text-slate-500">
                        Sumbangan tetap setiap bulan, tanpa perlu ingat untuk berwakaf berulang kali — jumlah kecil
                        yang konsisten membawa impak besar dalam jangka panjang.
                    </p>
                    <Link :href="route('waqaf.monthly')" class="mt-4 inline-block text-sm font-semibold text-emerald-700 hover:underline">
                        Ketahui lebih lanjut →
                    </Link>
                </div>

                <div class="rounded-2xl border border-slate-100 p-8">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                        <EnvelopeIcon class="h-6 w-6" />
                    </div>
                    <h3 class="mt-4 font-semibold text-slate-900">Secara Manual</h3>
                    <p class="mt-2 text-sm text-slate-500">
                        Pindahan bank terus atau serahan fizikal. Hubungi pejabat kami untuk butiran akaun rasmi
                        dan pengesahan resit.
                    </p>
                    <a href="mailto:info@awqaf.com.my" class="mt-4 inline-block text-sm font-semibold text-emerald-700 hover:underline">
                        Hubungi kami →
                    </a>
                </div>
            </div>

            <div class="mt-14 rounded-2xl bg-slate-50 p-8 text-center">
                <h2 class="text-xl font-semibold text-slate-900">Sudah menjadi pewakaf?</h2>
                <p class="mt-2 text-sm text-slate-500">
                    Log masuk Portal Pewakaf untuk menjejaki jumlah wakaf terkumpul dan tahap keahlian anda.
                </p>
                <a
                    :href="$page.props.portalUrl"
                    class="mt-6 inline-block rounded-lg bg-emerald-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-emerald-800"
                >
                    Log Masuk Portal Pewakaf
                </a>
            </div>
        </section>
    </PublicLayout>
</template>
