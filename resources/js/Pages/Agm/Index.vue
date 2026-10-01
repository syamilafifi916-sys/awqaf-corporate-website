<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { CalendarDaysIcon, ClockIcon, MapPinIcon, CheckCircleIcon, DocumentTextIcon, ArrowDownTrayIcon, ArrowRightIcon } from '@heroicons/vue/24/outline';
</script>

<template>
  <Head title="AGM Ke-13 — AWQAF Holdings Berhad" />
  <PublicLayout>
    <main class="min-h-screen bg-[#f7f8f6]">
      <section class="border-b border-slate-200/80 bg-white">
        <div class="mx-auto max-w-6xl px-4 py-7 sm:px-6 sm:py-9">
          <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
            <div class="max-w-2xl">
              <div class="mb-3 flex items-center gap-2">
                <span class="h-px w-7 bg-amber-600"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-amber-700">Mesyuarat Agung Tahunan Ke-13</p>
              </div>
              <h1 class="text-2xl font-bold tracking-tight text-slate-950 sm:text-3xl">Pusat Maklumat AGM 2026</h1>
              <p class="mt-2 text-sm leading-6 text-slate-600 sm:text-[15px]">Pengesahan kehadiran dan dokumen rasmi AGM AWQAF Holdings Berhad.</p>
            </div>
            <Link href="/agm/pengesahan-kehadiran" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-amber-600 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-amber-700 sm:w-auto">
              Sahkan Kehadiran <ArrowRightIcon class="h-4 w-4"/>
            </Link>
          </div>

          <div class="mt-6 grid overflow-hidden rounded-xl border border-slate-200 bg-slate-50 sm:grid-cols-3">
            <div class="flex items-center gap-3 border-b border-slate-200 px-4 py-3 sm:border-b-0 sm:border-r">
              <CalendarDaysIcon class="h-5 w-5 shrink-0 text-amber-700"/>
              <div><p class="text-[11px] font-semibold uppercase tracking-wide text-slate-500">Tarikh</p><p class="text-sm font-semibold text-slate-900">Rabu, 21 Oktober 2026</p></div>
            </div>
            <div class="flex items-center gap-3 border-b border-slate-200 px-4 py-3 sm:border-b-0 sm:border-r">
              <ClockIcon class="h-5 w-5 shrink-0 text-amber-700"/>
              <div><p class="text-[11px] font-semibold uppercase tracking-wide text-slate-500">Masa</p><p class="text-sm font-semibold text-slate-900">10.30 pagi</p></div>
            </div>
            <div class="flex items-center gap-3 px-4 py-3">
              <MapPinIcon class="h-5 w-5 shrink-0 text-amber-700"/>
              <div><p class="text-[11px] font-semibold uppercase tracking-wide text-slate-500">Lokasi</p><p class="text-sm font-semibold text-slate-900">Ibu Pejabat DPIM, Putrajaya</p></div>
            </div>
          </div>
        </div>
      </section>

      <section class="mx-auto max-w-6xl px-4 py-6 sm:px-6 sm:py-8">
        <div class="mb-3 flex items-end justify-between">
          <div>
            <p class="text-[11px] font-bold uppercase tracking-[0.16em] text-slate-500">Dokumen & tindakan</p>
            <h2 class="mt-1 text-lg font-bold text-slate-950">Urusan AGM</h2>
          </div>
          <p class="hidden text-xs text-slate-500 sm:block">Dokumen rasmi AWQAF Holdings Berhad</p>
        </div>

        <div class="grid gap-3 md:grid-cols-2 lg:grid-cols-4">
          <Link href="/agm/pengesahan-kehadiran" class="group flex min-h-[178px] flex-col rounded-xl border border-amber-300 bg-amber-50/70 p-4 transition hover:border-amber-500 hover:bg-amber-50">
            <div class="flex items-center justify-between"><span class="grid h-9 w-9 place-items-center rounded-lg bg-amber-600 text-white"><CheckCircleIcon class="h-5 w-5"/></span><span class="rounded-full bg-white px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide text-amber-800 ring-1 ring-amber-200">Utama</span></div>
            <h3 class="mt-4 text-base font-bold text-slate-950">Pengesahan Kehadiran</h3>
            <p class="mt-1 text-xs leading-5 text-slate-600">Sahkan kehadiran anda untuk AGM Ke-13.</p>
            <span class="mt-auto pt-3 text-xs font-bold text-amber-800">RSVP sekarang →</span>
          </Link>

          <a href="/dokumen/agm/notis-2026" target="_blank" rel="noopener" class="group flex min-h-[178px] flex-col rounded-xl border border-slate-200 bg-white p-4 transition hover:border-slate-300 hover:shadow-sm">
            <span class="grid h-9 w-9 place-items-center rounded-lg bg-slate-100 text-slate-700"><DocumentTextIcon class="h-5 w-5"/></span>
            <h3 class="mt-4 text-base font-bold text-slate-950">Notis AGM Ke-13</h3>
            <p class="mt-1 text-xs leading-5 text-slate-600">Baca dokumen rasmi mesyuarat.</p>
            <span class="mt-auto pt-3 text-xs font-bold text-slate-700">Buka notis ↗</span>
          </a>

          <a href="/documents/agm/2026/Borang-Proksi-AGM-Ke-13.pdf" target="_blank" rel="noopener" class="group flex min-h-[178px] flex-col rounded-xl border border-slate-200 bg-white p-4 transition hover:border-slate-300 hover:shadow-sm">
            <div class="flex items-center justify-between"><span class="grid h-9 w-9 place-items-center rounded-lg bg-slate-100 text-slate-700"><ArrowDownTrayIcon class="h-5 w-5"/></span><span class="rounded-md bg-red-50 px-2 py-1 text-[10px] font-bold text-red-700">19 OKT</span></div>
            <h3 class="mt-4 text-base font-bold text-slate-950">Borang Proksi</h3>
            <p class="mt-1 text-xs leading-5 text-slate-600">Untuk ahli yang melantik wakil.</p>
            <span class="mt-auto pt-3 text-xs font-bold text-slate-700">Buka borang ↗</span>
          </a>

          <Link href="/korporat/laporan-tahunan" class="group flex min-h-[178px] flex-col rounded-xl border border-slate-200 bg-white p-4 transition hover:border-slate-300 hover:shadow-sm">
            <span class="grid h-9 w-9 place-items-center rounded-lg bg-slate-100 text-slate-700"><DocumentTextIcon class="h-5 w-5"/></span>
            <h3 class="mt-4 text-base font-bold text-slate-950">Penyata Kewangan 2025</h3>
            <p class="mt-1 text-xs leading-5 text-slate-600">Penyata Kewangan Diaudit tahun 2025.</p>
            <span class="mt-auto pt-3 text-xs font-bold text-slate-700">Lihat laporan →</span>
          </Link>
        </div>

        <div class="mt-4 flex items-start gap-3 rounded-xl border border-slate-200 bg-white px-4 py-3">
          <MapPinIcon class="mt-0.5 h-4 w-4 shrink-0 text-slate-500"/>
          <p class="text-xs leading-5 text-slate-600"><strong class="text-slate-800">Lokasi penuh:</strong> Ibu Pejabat DPIM, M-02-05, Second Floor, Conezion Comercial, Persiaran IRC 3, Ioi Resort, 62502 Putrajaya.</p>
        </div>
      </section>
    </main>
  </PublicLayout>
</template>
