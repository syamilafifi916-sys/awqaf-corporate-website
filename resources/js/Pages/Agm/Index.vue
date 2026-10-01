<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { CalendarDaysIcon, ClockIcon, MapPinIcon, CheckCircleIcon, DocumentTextIcon, ArrowDownTrayIcon } from '@heroicons/vue/24/outline';
</script>

<template>
  <Head title="AGM Ke-13 — AWQAF Holdings Berhad" />
  <PublicLayout>
    <main class="bg-slate-50">
      <section class="border-b border-slate-200 bg-white">
        <div class="mx-auto max-w-5xl px-5 py-10 sm:px-6 sm:py-14">
          <p class="text-sm font-semibold uppercase tracking-[0.18em] text-amber-700">Mesyuarat Agung Tahunan</p>
          <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">AGM Ke-13 AWQAF Holdings Berhad</h1>
          <p class="mt-3 max-w-2xl text-base leading-7 text-slate-600">Pusat rasmi untuk pengesahan kehadiran, Notis AGM, Borang Proksi dan Penyata Kewangan Diaudit 2025.</p>
          <div class="mt-7 grid gap-3 sm:grid-cols-3">
            <div class="flex gap-3 rounded-2xl border border-slate-200 p-4"><CalendarDaysIcon class="h-5 w-5 shrink-0 text-amber-700"/><div><div class="text-xs font-medium text-slate-500">Tarikh</div><div class="mt-1 font-semibold text-slate-900">Rabu, 21 Oktober 2026</div></div></div>
            <div class="flex gap-3 rounded-2xl border border-slate-200 p-4"><ClockIcon class="h-5 w-5 shrink-0 text-amber-700"/><div><div class="text-xs font-medium text-slate-500">Masa</div><div class="mt-1 font-semibold text-slate-900">10.30 pagi</div></div></div>
            <div class="flex gap-3 rounded-2xl border border-slate-200 p-4"><MapPinIcon class="h-5 w-5 shrink-0 text-amber-700"/><div><div class="text-xs font-medium text-slate-500">Lokasi</div><div class="mt-1 font-semibold text-slate-900">Ibu Pejabat DPIM, Putrajaya</div></div></div>
          </div>
        </div>
      </section>

      <section class="mx-auto max-w-5xl px-5 py-8 sm:px-6 sm:py-10">
        <div class="grid gap-4 sm:grid-cols-2">
          <Link href="/agm/pengesahan-kehadiran" class="group rounded-2xl border-2 border-amber-500 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
            <div class="flex items-start justify-between gap-4"><CheckCircleIcon class="h-7 w-7 text-amber-700"/><span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-900">Tindakan utama</span></div>
            <h2 class="mt-5 text-xl font-bold text-slate-950">Pengesahan Kehadiran (RSVP)</h2>
            <p class="mt-2 text-sm leading-6 text-slate-600">Sahkan kehadiran anda ke Mesyuarat Agung Tahunan Ke-13.</p>
            <div class="mt-5 font-semibold text-amber-800">Buat pengesahan →</div>
          </Link>

          <a href="/dokumen/agm/notis-2026" target="_blank" rel="noopener" class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
            <DocumentTextIcon class="h-7 w-7 text-slate-700"/>
            <h2 class="mt-5 text-xl font-bold text-slate-950">Notis AGM Ke-13</h2>
            <p class="mt-2 text-sm leading-6 text-slate-600">Baca atau muat turun dokumen rasmi Notis Mesyuarat Agung Tahunan Ke-13.</p>
            <div class="mt-5 font-semibold text-slate-800">Buka notis ↗</div>
          </a>

          <a href="/documents/agm/2026/Borang-Proksi-AGM-Ke-13.pdf" target="_blank" rel="noopener" class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
            <ArrowDownTrayIcon class="h-7 w-7 text-slate-700"/>
            <h2 class="mt-5 text-xl font-bold text-slate-950">Borang Proksi</h2>
            <p class="mt-2 text-sm leading-6 text-slate-600">Untuk ahli yang perlu melantik wakil bagi menghadiri AGM.</p>
            <div class="mt-4 inline-flex rounded-lg bg-red-50 px-3 py-2 text-sm font-semibold text-red-700">Tarikh akhir: 19 Oktober 2026</div>
            <div class="mt-4 font-semibold text-slate-800">Buka borang ↗</div>
          </a>

          <Link href="/korporat/laporan-tahunan" class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
            <DocumentTextIcon class="h-7 w-7 text-slate-700"/>
            <h2 class="mt-5 text-xl font-bold text-slate-950">Penyata Kewangan Diaudit 2025</h2>
            <p class="mt-2 text-sm leading-6 text-slate-600">Semak Penyata Kewangan Diaudit 2025 melalui halaman laporan rasmi AWQAF.</p>
            <div class="mt-5 font-semibold text-slate-800">Lihat laporan →</div>
          </Link>
        </div>

        <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-5 text-sm leading-6 text-slate-600">
          <strong class="text-slate-900">Lokasi penuh:</strong> Ibu Pejabat DPIM, M-02-05, Second Floor, Conezion Comercial, Persiaran IRC 3, Ioi Resort, 62502 Putrajaya.
        </div>
      </section>
    </main>
  </PublicLayout>
</template>
