<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed, onMounted, onUnmounted } from 'vue';
import { CalendarDaysIcon, ClockIcon, MapPinIcon, CheckCircleIcon, DocumentTextIcon, ArrowDownTrayIcon, ArrowRightIcon } from '@heroicons/vue/24/outline';

const now = ref(Date.now());
let timer;
const target = new Date('2026-10-21T10:30:00+08:00').getTime();
const remaining = computed(() => Math.max(0, target - now.value));
const countdown = computed(() => {
  let seconds = Math.floor(remaining.value / 1000);
  const days = Math.floor(seconds / 86400); seconds %= 86400;
  const hours = Math.floor(seconds / 3600); seconds %= 3600;
  const minutes = Math.floor(seconds / 60);
  return { days, hours, minutes, seconds: seconds % 60 };
});
onMounted(() => { timer = setInterval(() => { now.value = Date.now(); }, 1000); });
onUnmounted(() => clearInterval(timer));
</script>

<template>
  <Head title="Mesyuarat Agung Tahunan Ke-13 — AWQAF Holdings Berhad" />
  <PublicLayout>
    <main class="min-h-screen bg-[#f7f6f1]">
      <section class="relative overflow-hidden border-b border-[#e6e1d4] bg-gradient-to-br from-white via-[#fdfcf8] to-[#f3efe3]">
        <div class="pointer-events-none absolute right-0 top-0 h-full w-1/3 opacity-50">
          <div class="absolute -right-28 -top-40 h-96 w-96 rounded-full border border-[#b99648]/20"></div>
          <div class="absolute -right-10 -top-20 h-64 w-64 rounded-full border border-[#b99648]/15"></div>
        </div>
        <div class="relative mx-auto max-w-6xl px-4 py-7 sm:px-6 sm:py-9">
          <div class="grid gap-5 lg:grid-cols-[1fr_300px] lg:items-center">
            <div>
              <div class="flex items-center gap-3"><span class="h-px w-8 bg-[#a8893e]"></span><p class="text-[10px] font-bold uppercase tracking-[0.25em] text-[#8b7134]">Mesyuarat Agung Tahunan</p></div>
              <h1 class="mt-3 text-[26px] font-semibold leading-tight tracking-tight text-[#103b31] sm:text-[36px]">Mesyuarat Agung Tahunan Ke-13</h1>
              <p class="mt-1 text-sm font-bold tracking-[0.18em] text-[#98772e] sm:text-base">AWQAF HOLDINGS BERHAD</p>
            </div>

            <div class="rounded-2xl border border-[#d9d0b9] bg-white/80 p-3.5 shadow-[0_12px_35px_rgba(37,57,48,0.07)] backdrop-blur">
              <div class="mb-2.5 flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.15em] text-[#80682f]"><ClockIcon class="h-4 w-4"/> Masa sehingga AGM</div>
              <div class="grid grid-cols-4 gap-1.5">
                <div v-for="(value, key) in countdown" :key="key" class="rounded-lg bg-[#f7f8f4] px-1 py-2 text-center">
                  <div class="text-lg font-bold tabular-nums text-[#123d32]">{{ String(value).padStart(2, '0') }}</div>
                  <div class="mt-0.5 text-[9px] text-slate-500">{{ key === 'days' ? 'Hari' : key === 'hours' ? 'Jam' : key === 'minutes' ? 'Minit' : 'Saat' }}</div>
                </div>
              </div>
            </div>
          </div>

          <div class="mt-6 grid overflow-hidden rounded-xl border border-[#ded9ca] bg-white/75 shadow-[0_8px_24px_rgba(37,57,48,0.04)] backdrop-blur sm:grid-cols-[0.9fr_0.7fr_1.8fr]">
            <div class="flex items-center gap-3 border-b border-[#e4e0d5] px-4 py-3.5 sm:border-b-0 sm:border-r">
              <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#f3ecd9]"><CalendarDaysIcon class="h-4.5 w-4.5 text-[#94742d]"/></span>
              <div><p class="text-[9px] font-bold uppercase tracking-wider text-slate-400">Tarikh</p><p class="text-sm font-bold text-[#173c33]">Rabu, 21 Oktober 2026</p></div>
            </div>
            <div class="flex items-center gap-3 border-b border-[#e4e0d5] px-4 py-3.5 sm:border-b-0 sm:border-r">
              <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#f3ecd9]"><ClockIcon class="h-4.5 w-4.5 text-[#94742d]"/></span>
              <div><p class="text-[9px] font-bold uppercase tracking-wider text-slate-400">Masa</p><p class="text-sm font-bold text-[#173c33]">10.30 pagi</p></div>
            </div>
            <div class="flex items-start gap-3 px-4 py-3.5">
              <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#f3ecd9]"><MapPinIcon class="h-4.5 w-4.5 text-[#94742d]"/></span>
              <div><p class="text-[9px] font-bold uppercase tracking-wider text-slate-400">Tempat</p><p class="text-sm font-bold text-[#173c33]">Ibu Pejabat DPIM</p><p class="mt-0.5 text-[11px] leading-4 text-slate-500">M-02-05, Second Floor, Conezion Comercial, Persiaran IRC 3, Ioi Resort, 62502 Putrajaya</p></div>
            </div>
          </div>
        </div>
      </section>

      <section class="mx-auto max-w-6xl px-4 py-6 sm:px-6 sm:py-8">
        <div class="mb-3 flex items-center gap-3"><p class="shrink-0 text-[10px] font-bold uppercase tracking-[0.18em] text-slate-500">Maklumat & Dokumen AGM</p><span class="h-px flex-1 bg-[#ddd8ca]"></span></div>
        <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
          <Link href="/agm/pengesahan-kehadiran" class="group relative flex min-h-[158px] flex-col overflow-hidden rounded-xl border border-[#315b50] bg-gradient-to-br from-[#16493c] to-[#0d352c] p-4 text-white shadow-[0_12px_28px_rgba(18,61,50,0.14)] transition hover:-translate-y-1 hover:shadow-lg">
            <span class="absolute -right-8 -top-8 h-24 w-24 rounded-full border border-white/10"></span>
            <div class="flex items-center justify-between"><span class="grid h-9 w-9 place-items-center rounded-full bg-[#e5ce8b] text-[#123d32]"><CheckCircleIcon class="h-4.5 w-4.5"/></span><span class="text-[9px] font-bold uppercase tracking-wider text-[#e8d596]">Tindakan Utama</span></div>
            <h2 class="mt-3 text-base font-bold">Pengesahan Kehadiran</h2><p class="mt-1 text-xs leading-5 text-white/70">Sahkan kehadiran anda untuk urusan penyelarasan.</p>
            <span class="mt-auto flex items-center gap-1 pt-3 text-xs font-bold text-[#ead79f]">Isi RSVP <ArrowRightIcon class="h-3.5 w-3.5"/></span>
          </Link>

          <a href="/dokumen/agm/notis-2026" target="_blank" rel="noopener" class="group flex min-h-[158px] flex-col rounded-xl border border-[#e2ded3] bg-white p-4 shadow-[0_5px_18px_rgba(30,50,40,0.035)] transition hover:-translate-y-1 hover:border-[#c3aa6d] hover:shadow-md">
            <span class="grid h-9 w-9 place-items-center rounded-full bg-[#f5efdf] text-[#8b7134]"><DocumentTextIcon class="h-4.5 w-4.5"/></span><h2 class="mt-3 text-base font-bold text-[#173c33]">Notis AGM Ke-13</h2><p class="mt-1 text-xs leading-5 text-slate-500">Notis rasmi Mesyuarat Agung Tahunan Ke-13.</p><span class="mt-auto pt-3 text-xs font-bold text-[#8b7134]">Buka notis ↗</span>
          </a>

          <a href="/documents/agm/2026/Borang-Proksi-AGM-Ke-13.pdf" target="_blank" rel="noopener" class="group flex min-h-[158px] flex-col rounded-xl border border-[#e2ded3] bg-white p-4 shadow-[0_5px_18px_rgba(30,50,40,0.035)] transition hover:-translate-y-1 hover:border-[#c3aa6d] hover:shadow-md">
            <div class="flex items-center justify-between"><span class="grid h-9 w-9 place-items-center rounded-full bg-[#f5efdf] text-[#8b7134]"><ArrowDownTrayIcon class="h-4.5 w-4.5"/></span><span class="rounded-md bg-red-50 px-2 py-1 text-[9px] font-bold text-red-700">AKHIR 19 OKT</span></div><h2 class="mt-3 text-base font-bold text-[#173c33]">Borang Proksi</h2><p class="mt-1 text-xs leading-5 text-slate-500">Untuk ahli yang melantik wakil menghadiri AGM.</p><span class="mt-auto pt-3 text-xs font-bold text-[#8b7134]">Buka borang ↗</span>
          </a>

          <Link href="/korporat/laporan-tahunan" class="group flex min-h-[158px] flex-col rounded-xl border border-[#e2ded3] bg-white p-4 shadow-[0_5px_18px_rgba(30,50,40,0.035)] transition hover:-translate-y-1 hover:border-[#c3aa6d] hover:shadow-md">
            <span class="grid h-9 w-9 place-items-center rounded-full bg-[#f5efdf] text-[#8b7134]"><DocumentTextIcon class="h-4.5 w-4.5"/></span><h2 class="mt-3 text-base font-bold text-[#173c33]">Penyata Kewangan 2025</h2><p class="mt-1 text-xs leading-5 text-slate-500">Penyata Kewangan Diaudit tahun 2025.</p><span class="mt-auto pt-3 text-xs font-bold text-[#8b7134]">Lihat laporan →</span>
          </Link>
        </div>
      </section>
    </main>
  </PublicLayout>
</template>
