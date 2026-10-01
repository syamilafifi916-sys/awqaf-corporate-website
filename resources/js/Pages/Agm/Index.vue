<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { CalendarDaysIcon, ClockIcon, MapPinIcon, CheckCircleIcon, DocumentTextIcon, ArrowDownTrayIcon, ArrowRightIcon } from '@heroicons/vue/24/outline';
</script>

<template>
  <Head title="Mesyuarat Agung Tahunan Ke-13 — AWQAF Holdings Berhad" />
  <PublicLayout>
    <main class="min-h-screen bg-[#f6f5f0]">
      <section class="border-b border-slate-200 bg-white">
        <div class="mx-auto max-w-6xl px-4 py-7 sm:px-6 sm:py-9">
          <div class="border-l-[3px] border-[#a8893e] pl-4 sm:pl-5">
            <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#8b7134]">Notis Rasmi AGM 2026</p>
            <h1 class="mt-2 text-2xl font-semibold tracking-tight text-[#153c32] sm:text-3xl">Mesyuarat Agung Tahunan Ke-13</h1>
            <p class="mt-1 text-sm font-bold tracking-[0.14em] text-slate-800 sm:text-base">AWQAF HOLDINGS BERHAD</p>
          </div>

          <div class="mt-6 grid overflow-hidden rounded-lg border border-slate-200 bg-[#fafaf8] sm:grid-cols-3">
            <div class="flex items-center gap-3 border-b border-slate-200 px-4 py-3 sm:border-b-0 sm:border-r">
              <CalendarDaysIcon class="h-4 w-4 shrink-0 text-[#9a7a31]"/>
              <div><p class="text-[10px] font-semibold uppercase tracking-wide text-slate-500">Tarikh</p><p class="text-sm font-semibold text-slate-900">Rabu, 21 Oktober 2026</p></div>
            </div>
            <div class="flex items-center gap-3 border-b border-slate-200 px-4 py-3 sm:border-b-0 sm:border-r">
              <ClockIcon class="h-4 w-4 shrink-0 text-[#9a7a31]"/>
              <div><p class="text-[10px] font-semibold uppercase tracking-wide text-slate-500">Masa</p><p class="text-sm font-semibold text-slate-900">10.30 pagi</p></div>
            </div>
            <div class="flex items-center gap-3 px-4 py-3">
              <MapPinIcon class="h-4 w-4 shrink-0 text-[#9a7a31]"/>
              <div><p class="text-[10px] font-semibold uppercase tracking-wide text-slate-500">Tempat</p><p class="text-sm font-semibold text-slate-900">Ibu Pejabat DPIM, Putrajaya</p></div>
            </div>
          </div>
        </div>
      </section>

      <section class="mx-auto max-w-6xl px-4 py-6 sm:px-6 sm:py-8">
        <div class="mb-3 flex items-center justify-between">
          <p class="text-xs font-bold uppercase tracking-[0.16em] text-slate-500">Maklumat & Dokumen AGM</p>
          <span class="hidden h-px flex-1 bg-slate-200 sm:ml-4 sm:block"></span>
        </div>

        <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
          <Link href="/agm/pengesahan-kehadiran" class="group flex min-h-[154px] flex-col rounded-lg bg-[#153c32] p-4 text-white shadow-sm transition hover:bg-[#1b4b3f]">
            <div class="flex items-center justify-between">
              <CheckCircleIcon class="h-5 w-5 text-[#d6bd76]"/>
              <span class="text-[10px] font-bold uppercase tracking-wider text-[#d6bd76]">Tindakan Utama</span>
            </div>
            <h2 class="mt-3 text-base font-bold">Pengesahan Kehadiran</h2>
            <p class="mt-1 text-xs leading-5 text-white/70">Sahkan kehadiran anda untuk AGM Ke-13.</p>
            <span class="mt-auto flex items-center gap-1 pt-3 text-xs font-bold text-[#ead79f]">Isi RSVP <ArrowRightIcon class="h-3.5 w-3.5"/></span>
          </Link>

          <a href="/dokumen/agm/notis-2026" target="_blank" rel="noopener" class="group flex min-h-[154px] flex-col rounded-lg border border-slate-200 bg-white p-4 transition hover:border-[#bca15d] hover:shadow-sm">
            <DocumentTextIcon class="h-5 w-5 text-[#8b7134]"/>
            <h2 class="mt-3 text-base font-bold text-slate-900">Notis AGM Ke-13</h2>
            <p class="mt-1 text-xs leading-5 text-slate-500">Notis rasmi Mesyuarat Agung Tahunan.</p>
            <span class="mt-auto pt-3 text-xs font-bold text-[#153c32]">Buka notis ↗</span>
          </a>

          <a href="/documents/agm/2026/Borang-Proksi-AGM-Ke-13.pdf" target="_blank" rel="noopener" class="group flex min-h-[154px] flex-col rounded-lg border border-slate-200 bg-white p-4 transition hover:border-[#bca15d] hover:shadow-sm">
            <div class="flex items-center justify-between">
              <ArrowDownTrayIcon class="h-5 w-5 text-[#8b7134]"/>
              <span class="rounded bg-red-50 px-2 py-0.5 text-[10px] font-bold text-red-700">AKHIR 19 OKT</span>
            </div>
            <h2 class="mt-3 text-base font-bold text-slate-900">Borang Proksi</h2>
            <p class="mt-1 text-xs leading-5 text-slate-500">Untuk ahli yang melantik wakil.</p>
            <span class="mt-auto pt-3 text-xs font-bold text-[#153c32]">Buka borang ↗</span>
          </a>

          <Link href="/korporat/laporan-tahunan" class="group flex min-h-[154px] flex-col rounded-lg border border-slate-200 bg-white p-4 transition hover:border-[#bca15d] hover:shadow-sm">
            <DocumentTextIcon class="h-5 w-5 text-[#8b7134]"/>
            <h2 class="mt-3 text-base font-bold text-slate-900">Penyata Kewangan 2025</h2>
            <p class="mt-1 text-xs leading-5 text-slate-500">Penyata Kewangan Diaudit tahun 2025.</p>
            <span class="mt-auto pt-3 text-xs font-bold text-[#153c32]">Lihat laporan →</span>
          </Link>
        </div>

        <div class="mt-4 border-t border-slate-200 pt-4">
          <div class="flex items-start gap-2.5 text-xs leading-5 text-slate-500">
            <MapPinIcon class="mt-0.5 h-4 w-4 shrink-0 text-[#8b7134]"/>
            <p><strong class="font-semibold text-slate-700">Lokasi penuh:</strong> Ibu Pejabat DPIM, M-02-05, Second Floor, Conezion Comercial, Persiaran IRC 3, Ioi Resort, 62502 Putrajaya.</p>
          </div>
        </div>
      </section>
    </main>
  </PublicLayout>
</template>
