<script setup>
import { Link } from '@inertiajs/vue3';
import { ArrowLongDownIcon, ArrowRightIcon } from '@heroicons/vue/24/outline';

// `preview` renders the compact homepage version; default renders the full model.
defineProps({
    preview: { type: Boolean, default: false },
});

const programmes = ['Yayasan ZuriatCARE', 'EduWAQF', 'AWQAF4Health'];
const reinvestment = [
    'Pengembangan aset',
    'Pengukuhan aktiviti ekonomi',
    'Pertumbuhan sumber pendapatan jangka panjang',
];
</script>

<template>
    <!-- Compact preview (homepage) -->
    <div v-if="preview">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="rounded-2xl border border-emerald-100 bg-emerald-50/50 p-6">
                <div class="text-4xl font-bold text-emerald-700 sm:text-5xl">30%</div>
                <p class="mt-2 font-semibold text-slate-900">Program Kebajikan</p>
                <p class="mt-1 text-sm text-slate-500">Yayasan ZuriatCARE · EduWAQF · AWQAF4Health</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                <div class="text-4xl font-bold text-slate-900 sm:text-5xl">70%</div>
                <p class="mt-2 font-semibold text-slate-900">Pelaburan Semula</p>
                <p class="mt-1 text-sm text-slate-500">Pengembangan aset dan sumber pendapatan jangka panjang.</p>
            </div>
        </div>
    </div>

    <!-- Full model -->
    <div v-else>
        <!-- Accessible text equivalent of the diagram -->
        <p class="sr-only">
            Model aliran Waqaf Korporat AWQAF: Pewakaf menyertai aktiviti Pelaburan dan Perniagaan AWQAF.
            Daripada hasil aktiviti tersebut, 30 peratus disalurkan kepada program kebajikan iaitu Yayasan
            ZuriatCARE, EduWAQF dan AWQAF4Health, manakala 70 peratus dilaburkan semula untuk pengembangan aset,
            pengukuhan aktiviti ekonomi dan pertumbuhan sumber pendapatan jangka panjang.
        </p>

        <div class="mx-auto max-w-2xl" aria-hidden="true">
            <!-- Pewakaf -->
            <div class="rounded-xl border border-slate-200 bg-white px-6 py-4 text-center">
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-400">Sumber</p>
                <p class="mt-1 text-lg font-bold text-slate-900">Pewakaf</p>
            </div>
            <div class="flex justify-center py-3">
                <ArrowLongDownIcon class="h-6 w-6 text-slate-300" />
            </div>
            <!-- Pelaburan & Perniagaan -->
            <div class="rounded-xl border border-slate-900 bg-slate-900 px-6 py-4 text-center">
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-emerald-400">Aktiviti AWQAF</p>
                <p class="mt-1 text-lg font-bold text-white">Pelaburan &amp; Perniagaan</p>
            </div>
            <div class="flex justify-center py-3">
                <ArrowLongDownIcon class="h-6 w-6 text-slate-300" />
            </div>

            <!-- 30 / 70 split -->
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div class="rounded-2xl border border-emerald-100 bg-emerald-50/60 p-6">
                    <div class="text-5xl font-bold text-emerald-700">30%</div>
                    <p class="mt-3 font-semibold text-slate-900">Program Kebajikan</p>
                    <ul class="mt-3 space-y-1.5 text-sm text-slate-600">
                        <li v-for="p in programmes" :key="p" class="flex items-start gap-2">
                            <span class="mt-1.5 h-1.5 w-1.5 flex-none rounded-full bg-emerald-500"></span>
                            <span>{{ p }}</span>
                        </li>
                    </ul>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                    <div class="text-5xl font-bold text-slate-900">70%</div>
                    <p class="mt-3 font-semibold text-slate-900">Pelaburan Semula</p>
                    <ul class="mt-3 space-y-1.5 text-sm text-slate-600">
                        <li v-for="r in reinvestment" :key="r" class="flex items-start gap-2">
                            <span class="mt-1.5 h-1.5 w-1.5 flex-none rounded-full bg-slate-400"></span>
                            <span>{{ r }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <p class="mx-auto mt-8 max-w-2xl text-sm leading-relaxed text-slate-600">
            Sebahagian daripada hasil aktiviti pelaburan dan perniagaan AWQAF disalurkan kepada program kebajikan,
            manakala sebahagian besar dilaburkan semula bagi mengembangkan aset dan sumber pendapatan jangka panjang.
        </p>
        <p class="mx-auto mt-3 max-w-2xl text-xs text-slate-400">Sumber model: Profil Syarikat AWQAF Holdings Berhad.</p>

        <div v-if="$slots.cta" class="mx-auto mt-8 max-w-2xl">
            <slot name="cta" />
        </div>
    </div>
</template>
