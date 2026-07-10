<script setup>
import BrandMark from '@/Components/BrandMark.vue';
import { Link, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

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
    { label: 'Ketelusan', href: () => route('ketelusan') },
    { label: 'Impak', href: () => route('kebajikan.overview') },
    { label: 'Muat Turun', href: () => route('korporat.reports') },
];

const toggle = (label) => {
    openMenu.value = openMenu.value === label ? null : label;
};
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
                    >
                        <button
                            type="button"
                            class="rounded-lg px-4 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-slate-900"
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
                        class="rounded-lg px-4 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-slate-900"
                    >
                        {{ link.label }}
                    </Link>
                </nav>

                <div class="flex items-center gap-3">
                    <a
                        :href="page.props.portalUrl"
                        class="rounded-lg bg-emerald-700 px-4 py-2 text-sm font-medium text-white transition hover:bg-emerald-800"
                    >
                        Portal Pewakaf
                    </a>
                </div>
            </div>
        </header>

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
                    <h4 class="text-sm font-semibold text-slate-900">Ketelusan &amp; Impak</h4>
                    <ul class="mt-4 space-y-2 text-sm text-slate-500">
                        <li><Link :href="route('ketelusan')" class="hover:text-emerald-700">Pusat Ketelusan</Link></li>
                        <li><Link :href="route('ketelusan')" class="hover:text-emerald-700">Tadbir Urus</Link></li>
                        <li><Link :href="route('kebajikan.overview')" class="hover:text-emerald-700">Program Impak</Link></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-200 px-6 py-6 text-center text-xs text-slate-400 lg:px-8">
                © {{ new Date().getFullYear() }} AWQAF Holdings Berhad. Hak cipta terpelihara.
            </div>
        </footer>
    </div>
</template>
