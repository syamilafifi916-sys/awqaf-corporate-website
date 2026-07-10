<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Maklumat Korporat" />

    <PublicLayout>
        <section class="mx-auto max-w-5xl px-6 py-20 lg:px-8">
            <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Korporat</p>
            <h1 class="mt-3 text-4xl font-bold text-slate-900">Visi &amp; Misi</h1>

            <div class="mt-10 grid grid-cols-1 gap-8 sm:grid-cols-2">
                <div class="rounded-2xl border border-slate-100 p-8">
                    <h2 class="font-semibold text-emerald-700">Visi</h2>
                    <p class="mt-3 text-slate-600">
                        Menjadi peneraju waqaf korporat yang memanfaatkan aset dan perniagaan berasaskan wakaf
                        untuk memacu transformasi ekonomi ke arah masyarakat yang adil dan sejahtera.
                    </p>
                </div>
                <div class="rounded-2xl border border-slate-100 p-8">
                    <h2 class="font-semibold text-emerald-700">Misi</h2>
                    <ul class="mt-3 space-y-2 text-slate-600">
                        <li>• Membina perniagaan dan aset berasaskan dana wakaf bagi mewujudkan peluang ekonomi baharu untuk masyarakat.</li>
                        <li>• Menjadi institusi waqaf korporat pimpinan komuniti yang memperkasakan ekonomi umat menerusi pendekatan perniagaan.</li>
                        <li>• Membangunkan usaha keusahawanan yang memberi manfaat meluas menerusi model kewangan wakaf yang lestari.</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="overflow-hidden bg-slate-950 py-20">
            <div class="mx-auto grid max-w-6xl grid-cols-1 items-start gap-12 px-6 lg:grid-cols-5 lg:px-8">
                <div class="lg:sticky lg:top-24 lg:col-span-2">
                    <div class="overflow-hidden rounded-2xl bg-gradient-to-b from-slate-100 to-white shadow-2xl">
                        <img
                            src="/images/pengasas-tan-sri-muhammad-ali-hashim.png"
                            alt="Allahyarham Tan Sri Muhammad Ali Hashim, Pengasas AWQAF Holdings Berhad"
                            class="h-auto w-full object-contain p-6"
                        />
                    </div>
                </div>
                <div class="lg:col-span-3">
                    <p class="text-sm font-semibold uppercase tracking-wider text-emerald-400">Pengasas AWQAF</p>
                    <h2 class="mt-3 text-3xl font-bold text-white">Allahyarham Tan Sri Muhammad Ali Hashim</h2>

                    <div class="mt-6 space-y-4 text-sm leading-relaxed text-slate-300">
                        <p>
                            Beliau merupakan Presiden Dewan Perdagangan Islam Malaysia (DPIM) (2012–2017) dan
                            Pengerusi AWQAF Holdings Berhad (2012–2017), institusi Waqaf Korporat yang berasaskan
                            komuniti pertama di Malaysia.
                        </p>
                        <p>
                            Beliau berkelulusan Ijazah Sarjana Muda Ekonomi (Kepujian) dari Universiti Malaya pada
                            tahun 1969. Beliau dianugerahkan Doktor Kehormat dalam bidang keusahawanan, perniagaan
                            dan pengurusan Islam dari sembilan universiti di Malaysia.
                        </p>
                        <p>
                            Tan Sri Muhammad Ali diiktiraf sebagai usahawan korporat yang cemerlang selepas
                            kerjayanya selama 28 tahun sebagai Ketua Pegawai Eksekutif Johor Corporation (JCorp,
                            1982–2010). Pada akhir perjawatannya, Johor Corporation diiktiraf sebagai salah satu
                            syarikat terkemuka di Malaysia dengan lebih daripada 280 syarikat dan 65,000 pekerja.
                            Jumlah nilai permodalan pasaran syarikat PLC di bawah JCorp pada akhir tahun 2010
                            berjumlah RM18.1 bilion.
                        </p>
                        <p>
                            Kajian oleh Oxford University mengenai Waqaf Korporat pada tahun 2010 menyatakan
                            bahawa "Jihad Bisnes, Waqaf Korporat dan Intrapreneurship adalah sangat berkesan dan
                            jauh terkehadapan daripada apa yang mungkin dicapai oleh kaedah pembangunan ekonomi
                            konvensional dan kaedah dorongan polisi yang sedia ada".
                        </p>
                        <p>
                            Tan Sri Muhammad Ali juga merupakan Pengasas Waqaf An-Nur Corporation Bhd (WANCorp),
                            institusi Waqaf Korporat pertama di Malaysia yang ditubuhkan oleh JCorp pada tahun
                            1998. Aset wakaf WANCorp berjumlah RM250 juta pada awal penubuhan; pada akhir 2014,
                            lebih daripada dua kali ganda melebihi RM500 juta; dan menjelang akhir tahun 2015,
                            jumlah nilai aset WANCorp telah meningkat tiga kali ganda kepada hampir RM800 juta.
                        </p>
                        <p>
                            Beliau telah menulis empat buku, yang terbaru bertajuk "Strategi Jihad Bisnes" (2015),
                            dan penulis bersama dalam dua skrip pementasan drama. Tan Sri Muhammad Ali disenaraikan
                            oleh Pusat Pengajian Strategik Islam Diraja Jordan, Amman, sebagai salah satu daripada
                            "500 Muslim Paling Berpengaruh di Dunia" selama dua tahun berturut-turut pada 2016 dan
                            2017.
                        </p>
                        <p class="text-slate-400">
                            Beliau kembali ke Rahmatullah pada 31 Oktober 2017. Al-Fatihah.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-slate-50 py-16">
            <div class="mx-auto max-w-5xl px-6 text-center lg:px-8">
                <h2 class="text-xl font-semibold text-slate-900">Lembaga Pengarah &amp; Tadbir Urus</h2>
                <p class="mx-auto mt-2 max-w-xl text-sm text-slate-500">
                    Senarai penuh Ahli Lembaga Pengarah, jawatankuasa dan laporan diaudit boleh disemak di
                    Pusat Ketelusan kami.
                </p>
                <Link
                    :href="route('ketelusan')"
                    class="mt-6 inline-block rounded-lg bg-emerald-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-emerald-800"
                >
                    Lihat Laporan &amp; Tadbir Urus
                </Link>
            </div>
        </section>
    </PublicLayout>
</template>
