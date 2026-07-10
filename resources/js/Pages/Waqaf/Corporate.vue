<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import {
    BanknotesIcon,
    BookOpenIcon,
    BriefcaseIcon,
    BuildingOffice2Icon,
    ChartBarIcon,
    ScaleIcon,
    ShieldCheckIcon,
    UserGroupIcon,
} from '@heroicons/vue/24/outline';
import { Head, Link } from '@inertiajs/vue3';

const characteristics = [
    {
        icon: BuildingOffice2Icon,
        title: 'Penubuhan Sebagai Syarikat',
        body: 'Ditubuhkan secara rasmi sebagai sebuah syarikat, tertakluk kepada undang-undang korporat dan tadbir urus yang mantap.',
    },
    {
        icon: ShieldCheckIcon,
        title: 'Pengiktirafan Rasmi Sebagai Mutawalli',
        body: 'Diiktiraf secara rasmi oleh pihak berkuasa agama negeri sebagai pemegang amanah (mutawalli) yang sah untuk menerima wakaf.',
    },
    {
        icon: BanknotesIcon,
        title: 'Kuasa Menerima Sumbangan Pelbagai Bentuk',
        body: 'Berkuasa menerima sumbangan dalam pelbagai bentuk — tunai, ekuiti, perniagaan, hartanah, mahupun aset intelek.',
    },
    {
        icon: BriefcaseIcon,
        title: 'Amalan Perniagaan Profesional',
        body: 'Beroperasi menggunakan amalan perniagaan dan kecemerlangan keusahawanan yang profesional bagi memastikan kelestarian.',
    },
    {
        icon: ChartBarIcon,
        title: 'Fokus Pertumbuhan Aset Jangka Panjang',
        body: 'Mengutamakan pertumbuhan nilai aset wakaf secara jangka panjang, bukan sekadar pengagihan segera.',
    },
    {
        icon: ScaleIcon,
        title: 'Status Autonomi & Tadbir Urus Profesional',
        body: 'Mempunyai identiti korporat dan kuasa autonomi sepenuhnya — bebas daripada kawalan mana-mana entiti swasta eksklusif, diterajui oleh eksekutif profesional.',
    },
    {
        icon: UserGroupIcon,
        title: 'Keterbukaan & Penglibatan Awam',
        body: 'Terbuka kepada penyertaan awam dan korporat sebagai pewakaf, dengan pelaporan telus dan mekanisme penglibatan pemegang taruh.',
    },
    {
        icon: BookOpenIcon,
        title: 'Pemerkasaan Syariah & Maqasid Al-Syariah',
        body: 'Dipandu oleh prinsip dan matlamat Syariah, menjana kekayaan menerusi kaedah perniagaan yang beretika demi kesejahteraan masyarakat.',
    },
];
</script>

<template>
    <Head title="Waqaf Korporat" />

    <PublicLayout>
        <section class="relative overflow-hidden bg-slate-950 py-24">
            <div class="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-emerald-600/20 blur-3xl"></div>
            <div class="relative mx-auto max-w-4xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-400">Definisi</p>
                <h1 class="mt-3 text-4xl font-bold text-white">Apa itu Waqaf Korporat®?</h1>
                <div class="mt-8 space-y-4 text-slate-300">
                    <p>
                        Waqaf Korporat® ialah satu inovasi yang menghubungkan institusi wakaf Islam secara langsung
                        ke dalam sistem pembangunan ekonomi negara — yang kini didominasi oleh organisasi
                        perniagaan dan korporat swasta. Matlamat jangka panjangnya adalah mewujudkan keseimbangan
                        dalam sistem ekonomi tersebut, supaya majoriti rakyat turut menikmati akses dan manfaat
                        yang adil daripada perkembangan sektor perniagaan negara.
                    </p>
                    <p>
                        Ia berfungsi sebagai institusi berasaskan komuniti yang menggerakkan sumber masyarakat
                        untuk menjadi peneraju dalam membangunkan perniagaan mapan milik komuniti — berbeza
                        daripada yayasan atau badan amanah biasa, kerana Waqaf Korporat® tidak dimiliki oleh
                        mana-mana entiti swasta atau kumpulan korporat eksklusif.
                    </p>
                    <p>
                        Konsep ini turut diposisikan sebagai <strong class="text-white">sektor ekonomi ketiga</strong> —
                        selain sektor kerajaan dan swasta — yang membuka akses kepada usahawan Muslim golongan
                        pertengahan dan perusahaan kecil-sederhana (PKS) untuk turut memiliki dan mengembangkan
                        aset berkualiti, sesuatu yang selama ini lebih tertumpu kepada kalangan modal swasta
                        eksklusif. Hasil keuntungan yang dijana kekal sebagai aset wakaf kekal, sebahagiannya
                        disalurkan kepada program kebajikan untuk manfaat masyarakat.
                    </p>
                    <p class="text-sm text-slate-400">
                        "Waqaf Korporat®" merupakan konsep yang didaftarkan sebagai harta intelek dan dilesenkan
                        khusus kepada AWQAF Holdings Berhad.
                    </p>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-6xl px-6 py-20 lg:px-8">
            <div class="text-center">
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Lapan Ciri Asas</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900">Ciri-ciri Waqaf Korporat</h2>
                <p class="mx-auto mt-3 max-w-2xl text-slate-500">
                    Daripada perspektif AWQAF Holdings Berhad, lapan ciri ini menjadi penanda unik konsep
                    Waqaf Korporat® yang membezakannya daripada model wakaf konvensional.
                </p>
            </div>

            <div class="mt-14 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div
                    v-for="(item, i) in characteristics"
                    :key="item.title"
                    class="relative rounded-2xl border border-slate-100 p-6 transition hover:border-emerald-200 hover:shadow-md"
                >
                    <span class="text-xs font-bold text-slate-200">0{{ i + 1 }}</span>
                    <div class="mt-2 flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                        <component :is="item.icon" class="h-6 w-6" />
                    </div>
                    <h3 class="mt-4 text-sm font-semibold text-slate-900">{{ item.title }}</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-500">{{ item.body }}</p>
                </div>
            </div>

            <div class="mt-10 text-center">
                <Link :href="route('waqaf.categories')" class="text-sm font-semibold text-emerald-700 hover:underline">
                    Lihat kategori pewakaf →
                </Link>
            </div>
        </section>
    </PublicLayout>
</template>
