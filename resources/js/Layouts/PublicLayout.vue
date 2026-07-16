<script setup>
import BrandMark from '@/Components/BrandMark.vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import { nextTick, onBeforeUnmount, onMounted, ref } from 'vue';

const page = usePage();
const openMenu = ref(null);

const menus = [
    {
        label: 'Waqaf',
        items: [
            { label: 'Waqaf Korporat', href: () => route('waqaf.corporate') },
            { label: 'Kaedah Berwakaf', href: () => route('waqaf.howto') },
            { label: 'Wakaf Bulanan', href: () => route('waqaf.monthly') },
            { label: 'Kategori Pewakaf', href: () => route('waqaf.categories') },
        ],
    },
    {
        label: 'Korporat',
        items: [
            { label: 'Maklumat Korporat', href: () => route('korporat.overview') },
            { label: 'Laporan Tahunan', href: () => route('korporat.reports') },
        ],
    },
];

const flatLinks = [
    { label: 'Laporan & Tadbir Urus', href: () => route('ketelusan') },
    { label: 'Program & Inisiatif', href: () => route('program.index') },
    { label: 'Muat Turun', href: () => route('korporat.reports') },
];

// ── Accessible mobile menu (VISUAL-001 CON-1) ────────────────────────
const mobileOpen = ref(false);
const menuToggle = ref(null);
const menuPanel = ref(null);

const focusables = () =>
    menuPanel.value
        ? [...menuPanel.value.querySelectorAll('a[href], button:not([disabled])')].filter(
              (el) => el.offsetParent !== null,
          )
        : [];

const onKeydown = (event) => {
    if (event.key === 'Escape') {
        closeMobile();
        return;
    }
    if (event.key !== 'Tab') return;

    // Focus trap: keep Tab focus inside the open panel.
    const items = focusables();
    if (items.length === 0) return;
    const first = items[0];
    const last = items[items.length - 1];

    if (event.shiftKey && document.activeElement === first) {
        event.preventDefault();
        last.focus();
    } else if (!event.shiftKey && document.activeElement === last) {
        event.preventDefault();
        first.focus();
    }
};

const openMobile = async () => {
    mobileOpen.value = true;
    document.addEventListener('keydown', onKeydown);
    document.body.style.overflow = 'hidden';
    await nextTick();
    focusables()[0]?.focus();
};

const closeMobile = () => {
    if (!mobileOpen.value) return;
    mobileOpen.value = false;
    document.removeEventListener('keydown', onKeydown);
    document.body.style.overflow = '';
    menuToggle.value?.focus();
};

const toggleMobile = () => (mobileOpen.value ? closeMobile() : openMobile());

let stopNavigate;
onMounted(() => {
    // Close the menu whenever an in-app navigation starts.
    stopNavigate = router.on('start', () => {
        if (mobileOpen.value) closeMobile();
    });
});
onBeforeUnmount(() => {
    document.removeEventListener('keydown', onKeydown);
    document.body.style.overflow = '';
    stopNavigate?.();
});
</script>

<template>
    <div class="min-h-screen bg-white text-slate-800">
        <header class="sticky top-0 z-40 border-b border-slate-100 bg-white/90 backdrop-blur">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8">
                <Link href="/" class="flex items-center gap-3">
                    <BrandMark class="h-10 w-10" />
                    <div class="leading-tight">
                        <div class="text-sm font-semibold tracking-wide text-slate-900">AWQAF HOLDINGS</div>
                        <div class="text-xs text-slate-500">Berhad</div>
                    </div>
                </Link>

                <nav class="hidden items-center gap-1 lg:flex">
                    <div
                        v-for="menu in menus"
                        :key="menu.label"
                        class="relative"
                        @mouseenter="openMenu = menu.label"
                        @mouseleave="openMenu = null"
                        @focusin="openMenu = menu.label"
                        @focusout="openMenu = null"
                    >
                        <button
                            type="button"
                            class="rounded-lg px-4 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-slate-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"
                            :aria-expanded="openMenu === menu.label"
                            @click="toggle(menu.label)"
                        >
                            {{ menu.label }}
                        </button>

                        <div
                            v-show="openMenu === menu.label"
                            class="absolute left-0 top-full w-56 rounded-xl border border-slate-100 bg-white p-2 shadow-lg"
                        >
                            <component
                                :is="typeof item.href === 'function' ? Link : 'a'"
                                v-for="item in menu.items"
                                :key="item.label"
                                :href="typeof item.href === 'function' ? item.href() : item.href"
                                class="block rounded-lg px-3 py-2 text-sm text-slate-600 transition hover:bg-emerald-50 hover:text-emerald-700"
                            >
                                {{ item.label }}
                            </component>
                        </div>
                    </div>

                    <Link
                        v-for="link in flatLinks"
                        :key="link.label"
                        :href="link.href()"
                        class="rounded-lg px-4 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-slate-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"
                    >
                        {{ link.label }}
                    </Link>
                </nav>

                <div class="flex items-center gap-3">
                    <a
                        :href="page.props.portalUrl"
                        class="hidden rounded-lg bg-emerald-700 px-4 py-2 text-sm font-medium text-white transition hover:bg-emerald-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 focus-visible:ring-offset-2 sm:inline-block"
                    >
                        Portal Pewakaf
                    </a>

                    <button
                        ref="menuToggle"
                        type="button"
                        class="inline-flex items-center justify-center rounded-lg p-2 text-slate-700 transition hover:bg-slate-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 lg:hidden"
                        :aria-expanded="mobileOpen"
                        aria-controls="mobile-menu"
                        aria-label="Buka menu navigasi"
                        @click="toggleMobile"
                    >
                        <svg v-if="!mobileOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
                        </svg>
                        <svg v-else class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </header>

        <!-- Mobile navigation drawer -->
        <Transition
            enter-active-class="transition duration-200 ease-out"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition duration-150 ease-in"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div v-if="mobileOpen" class="fixed inset-0 z-50 lg:hidden">
                <div class="absolute inset-0 bg-slate-900/40" @click="closeMobile" aria-hidden="true"></div>

                <div
                    id="mobile-menu"
                    ref="menuPanel"
                    class="absolute inset-y-0 right-0 flex w-full max-w-xs flex-col overflow-y-auto bg-white shadow-xl"
                    role="dialog"
                    aria-modal="true"
                    aria-label="Menu navigasi"
                >
                    <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">
                        <div class="flex items-center gap-2">
                            <BrandMark class="h-8 w-8" />
                            <span class="text-sm font-semibold text-slate-900">AWQAF HOLDINGS</span>
                        </div>
                        <button
                            type="button"
                            class="rounded-lg p-2 text-slate-500 transition hover:bg-slate-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"
                            aria-label="Tutup menu"
                            @click="closeMobile"
                        >
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <nav class="flex-1 px-3 py-4" aria-label="Navigasi utama mudah alih">
                        <template v-for="menu in menus" :key="menu.label">
                            <p class="px-3 pb-1 pt-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                {{ menu.label }}
                            </p>
                            <Link
                                v-for="item in menu.items"
                                :key="item.label"
                                :href="item.href()"
                                class="block rounded-lg px-3 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-emerald-50 hover:text-emerald-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"
                            >
                                {{ item.label }}
                            </Link>
                        </template>

                        <div class="my-3 border-t border-slate-100"></div>

                        <Link
                            v-for="link in flatLinks"
                            :key="link.label"
                            :href="link.href()"
                            class="block rounded-lg px-3 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-emerald-50 hover:text-emerald-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"
                        >
                            {{ link.label }}
                        </Link>
                    </nav>

                    <div class="border-t border-slate-100 p-4">
                        <a
                            :href="page.props.portalUrl"
                            class="block rounded-lg bg-emerald-700 px-4 py-3 text-center text-sm font-semibold text-white transition hover:bg-emerald-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 focus-visible:ring-offset-2"
                        >
                            Portal Pewakaf
                        </a>
                    </div>
                </div>
            </div>
        </Transition>

        <main>
            <slot />
        </main>

        <footer class="border-t border-slate-100 bg-slate-50">
            <div class="mx-auto grid max-w-7xl grid-cols-2 gap-8 px-6 py-12 sm:grid-cols-4 lg:px-8">
                <div class="col-span-2 sm:col-span-1">
                    <BrandMark class="h-10 w-10" />
                    <p class="mt-4 text-sm text-slate-500">
                        AWQAF Holdings Berhad — memacu pengurusan waqaf korporat untuk kelestarian ummah.
                    </p>
                </div>

                <div>
                    <h4 class="text-sm font-semibold text-slate-900">Wakaf</h4>
                    <ul class="mt-4 space-y-2 text-sm text-slate-500">
                        <li><Link :href="route('waqaf.corporate')" class="hover:text-emerald-700">Waqaf Korporat</Link></li>
                        <li><Link :href="route('waqaf.howto')" class="hover:text-emerald-700">Kaedah Berwakaf</Link></li>
                        <li><Link :href="route('waqaf.categories')" class="hover:text-emerald-700">Kategori Pewakaf</Link></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-semibold text-slate-900">Korporat</h4>
                    <ul class="mt-4 space-y-2 text-sm text-slate-500">
                        <li><Link :href="route('korporat.overview')" class="hover:text-emerald-700">Maklumat Korporat</Link></li>
                        <li><Link :href="route('korporat.reports')" class="hover:text-emerald-700">Laporan Tahunan</Link></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-semibold text-slate-900">Laporan &amp; Program</h4>
                    <ul class="mt-4 space-y-2 text-sm text-slate-500">
                        <li><Link :href="route('ketelusan')" class="hover:text-emerald-700">Laporan &amp; Tadbir Urus</Link></li>
                        <li><Link :href="route('korporat.reports')" class="hover:text-emerald-700">Laporan Tahunan</Link></li>
                        <li><Link :href="route('program.index')" class="hover:text-emerald-700">Program &amp; Inisiatif</Link></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-200 px-6 py-6 text-center text-xs text-slate-500 lg:px-8">
                © {{ new Date().getFullYear() }} AWQAF Holdings Berhad. Hak cipta terpelihara.
            </div>
        </footer>
    </div>
</template>
