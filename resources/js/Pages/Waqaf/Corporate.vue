<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import WaqafModel from '@/Components/WaqafModel.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ArrowRightIcon } from '@heroicons/vue/24/outline';

const principles = [
    'Mengintegrasikan wakaf ke dalam pembangunan perniagaan dan ekonomi.',
    'Menggembleng penyertaan masyarakat ke dalam perniagaan mapan dan aset korporat.',
    'Beroperasi sebagai institusi korporat berstruktur, bukan kempen amal jangka pendek.',
    'Mengekalkan dan mengembangkan aset wakaf serta nilainya untuk manfaat jangka panjang.',
    'Memerlukan pengurusan profesional, keupayaan keusahawanan dan tadbir urus korporat.',
    'Tidak dimiliki secara peribadi oleh individu atau kumpulan korporat swasta eksklusif.',
    'Beroperasi tertakluk kepada perlembagaannya, prinsip Syariah dan tanggungjawab mutawalli.',
];

const characteristics = [
    {
        title: 'Penubuhan sebagai syarikat',
        body: 'Diperbadankan secara rasmi sebagai sebuah syarikat di bawah undang-undang korporat. Ini membolehkannya beroperasi dengan struktur tadbir urus, pelaporan dan akauntabiliti seperti entiti korporat lain.',
    },
    {
        title: 'Pengiktirafan sebagai mutawalli',
        body: 'Diiktiraf oleh pihak berkuasa agama sebagai pemegang amanah (mutawalli) yang sah. Pengiktirafan ini memberikan mandat untuk menerima dan menguruskan harta wakaf bagi pihak masyarakat.',
    },
    {
        title: 'Keupayaan menerima dana dan aset wakaf',
        body: 'Berkeupayaan menerima sumbangan wakaf dalam pelbagai bentuk — termasuk tunai, ekuiti, perniagaan dan hartanah. Aset yang diterima diuruskan sebagai amanah kekal.',
    },
    {
        title: 'Amalan korporat dan perniagaan terbaik',
        body: 'Beroperasi berdasarkan amalan korporat dan perniagaan terbaik. Pengurusan profesional dan keupayaan keusahawanan memastikan aset wakaf kekal produktif dan mampan.',
    },
    {
        title: 'Pengumpulan dan pengembangan aset',
        body: 'Memberi tumpuan kepada pengumpulan dan pengembangan nilai aset wakaf secara berterusan. Modal asal dikekalkan manakala hasil pertumbuhan menyokong manfaat jangka panjang.',
    },
    {
        title: 'Autonomi institusi',
        body: 'Mempunyai identiti dan autonomi institusi tersendiri. Ia tidak dimiliki secara peribadi oleh mana-mana individu atau kumpulan korporat swasta eksklusif.',
    },
    {
        title: 'Penyertaan serta akauntabiliti awam',
        body: 'Terbuka kepada penyertaan awam dan korporat sebagai pewakaf. Institusi beroperasi dengan pelaporan telus dan akauntabiliti kepada pemegang taruh.',
    },
    {
        title: 'Pematuhan Syariah dan Maqasid Syariah',
        body: 'Dipandu oleh prinsip Syariah dan Maqasid Syariah. Setiap aktiviti diselaraskan dengan tanggungjawab mutawalli dan matlamat kesejahteraan ummah.',
    },
];
</script>

<template>
    <Head title="Waqaf Korporat" />

    <PublicLayout>
        <!-- Definition -->
        <section class="bg-slate-950 py-20 lg:py-24">
            <div class="mx-auto max-w-4xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-400">Konsep</p>
                <h1 class="mt-3 text-4xl font-bold text-white sm:text-5xl">Apa itu Waqaf Korporat®?</h1>
                <div class="mt-8 space-y-4 leading-relaxed text-slate-300">
                    <p>
                        Waqaf Korporat mengintegrasikan wakaf ke dalam pembangunan perniagaan dan ekonomi.
                        Ia menggembleng penyertaan masyarakat untuk membangunkan perniagaan mapan dan aset
                        korporat yang menjana manfaat berterusan.
                    </p>
                    <p>
                        Berbeza daripada kempen amal jangka pendek, Waqaf Korporat beroperasi sebagai sebuah
                        institusi korporat berstruktur. Aset wakaf dan nilainya dikekalkan serta dikembangkan
                        untuk manfaat jangka panjang, menerusi pengurusan profesional, keupayaan keusahawanan
                        dan tadbir urus korporat.
                    </p>
                    <p class="text-sm text-slate-400">
                        "Waqaf Korporat®" merupakan konsep yang didaftarkan sebagai harta intelek dan dilesenkan
                        khusus kepada AWQAF Holdings Berhad.
                    </p>
                </div>

                <ul class="mt-10 grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <li v-for="p in principles" :key="p" class="flex items-start gap-3 text-sm text-slate-300">
                        <span class="mt-1.5 h-1.5 w-1.5 flex-none rounded-full bg-emerald-400"></span>
                        <span>{{ p }}</span>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Ciri-ciri (editorial numbered) -->
        <section class="bg-white py-20">
            <div class="mx-auto max-w-4xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Lapan Ciri Asas</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Ciri-ciri Waqaf Korporat</h2>
                <p class="mt-3 max-w-2xl text-slate-500">
                    Lapan ciri yang menjadi penanda konsep Waqaf Korporat sebagaimana dilaksanakan oleh
                    AWQAF Holdings Berhad.
                </p>

                <ol class="mt-12 space-y-10">
                    <li v-for="(item, i) in characteristics" :key="item.title" class="flex gap-6">
                        <span class="flex-none text-2xl font-bold tabular-nums text-emerald-200">{{ String(i + 1).padStart(2, '0') }}</span>
                        <div class="border-l border-slate-100 pl-6">
                            <h3 class="text-lg font-semibold text-slate-900">{{ item.title }}</h3>
                            <p class="mt-2 leading-relaxed text-slate-600">{{ item.body }}</p>
                        </div>
                    </li>
                </ol>
            </div>
        </section>

        <!-- 30 / 70 model -->
        <section class="border-t border-slate-100 bg-slate-50 py-20">
            <div class="mx-auto max-w-4xl px-6 lg:px-8">
                <div class="text-center">
                    <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Model Pelaksanaan AWQAF</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900">Model Waqaf Korporat</h2>
                    <p class="mx-auto mt-3 max-w-2xl text-slate-500">
                        Waqaf Korporat ialah konsep institusi yang lebih luas. Model 30% / 70% di bawah ialah
                        model pelaksanaan AWQAF sebagaimana dinyatakan dalam Profil Syarikat — bukan nisbah
                        yang terpakai secara universal kepada setiap institusi Waqaf Korporat.
                    </p>
                </div>
                <div class="mt-12">
                    <WaqafModel />
                </div>
            </div>
        </section>

        <!-- Contribution CTA -->
        <section class="bg-white py-16">
            <div class="mx-auto max-w-4xl px-6 text-center lg:px-8">
                <h2 class="text-2xl font-bold text-slate-900">Ingin menyertai sebagai pewakaf?</h2>
                <p class="mx-auto mt-3 max-w-xl text-slate-500">Ketahui kaedah berwakaf yang disediakan oleh AWQAF Holdings Berhad.</p>
                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <Link :href="route('waqaf.howto')" class="inline-flex items-center gap-2 rounded-lg bg-emerald-600 px-7 py-3.5 text-sm font-semibold text-white transition hover:bg-emerald-500 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 focus-visible:ring-offset-2">
                        Wakaf Sekarang <ArrowRightIcon class="h-4 w-4" />
                    </Link>
                    <Link :href="route('waqaf.categories')" class="rounded-lg border border-slate-300 px-7 py-3.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">
                        Lihat Kategori Pewakaf
                    </Link>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
