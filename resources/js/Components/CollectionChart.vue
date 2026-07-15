<script setup>
import { ref } from 'vue';

const props = defineProps({
    data: {
        type: Array,
        required: true, // [{ year: 2024, amount: 206356 }, ...]
    },
    dark: {
        type: Boolean,
        default: false,
    },
});

const active = ref(null);

const maxAmount = Math.max(...props.data.map((d) => d.amount));
const barHeight = (amount) => Math.max(4, Math.round((amount / maxAmount) * 180));

const formatRm = (value) => 'RM ' + Number(value).toLocaleString('en-MY');
</script>

<template>
    <div class="relative">
        <div
            v-if="active !== null"
            class="pointer-events-none absolute -top-2 left-1/2 z-10 -translate-x-1/2 -translate-y-full rounded-lg px-3 py-2 text-xs font-semibold shadow-lg transition"
            :class="dark ? 'bg-white text-slate-900' : 'bg-slate-900 text-white'"
            :style="{ left: `calc(${(active + 0.5) * (100 / data.length)}% )` }"
        >
            {{ formatRm(data[active].amount) }}
            <div class="text-[10px] font-normal opacity-70">{{ data[active].year }}</div>
        </div>

        <div class="flex items-end gap-2 overflow-x-auto pb-2 sm:gap-4" role="group" :aria-label="`Carta kutipan wakaf tahunan dari ${data[0].year} hingga ${data[data.length - 1].year}`">
            <button
                v-for="(c, i) in data"
                :key="c.year"
                type="button"
                class="group flex flex-1 flex-col items-center gap-2 rounded-md focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"
                :aria-label="`${c.year}: ${formatRm(c.amount)}`"
                @mouseenter="active = i"
                @mouseleave="active = null"
                @focus="active = i"
                @blur="active = null"
            >
                <div
                    class="w-full min-w-[20px] rounded-t-sm bg-gradient-to-t transition-all duration-300 ease-out"
                    :class="[
                        dark ? 'from-emerald-700 to-emerald-400' : 'from-emerald-600 to-emerald-400',
                        active === i ? 'opacity-100 ring-2 ring-emerald-300' : 'opacity-90 group-hover:opacity-100',
                    ]"
                    :style="{ height: barHeight(c.amount) + 'px' }"
                ></div>
                <span class="text-[10px] font-medium" :class="dark ? 'text-slate-300' : 'text-slate-500'">
                    '{{ String(c.year).slice(2) }}
                </span>
            </button>
        </div>
    </div>
</template>
