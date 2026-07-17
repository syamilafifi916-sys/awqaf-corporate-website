<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ArrowLeftIcon } from '@heroicons/vue/24/outline';

const props = defineProps({ founder: Object });

const alt = `Foto rasmi ${props.founder.full_name}, ${props.founder.designation}`;
const bookCta = props.founder.book.cta_verified_url || route('hubungi');
</script>

<template>
    <Head :title="`Pengasas AWQAF — ${founder.full_name}`" />

    <PublicLayout>
        <!-- 1. Founder hero -->
        <section class="bg-slate-950">
            <div class="mx-auto max-w-6xl px-6 py-16 lg:px-8 lg:py-20">
                <Link :href="route('korporat.overview')" class="inline-flex items-center gap-1.5 text-sm font-medium text-slate-400 transition hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">
                    <ArrowLeftIcon class="h-4 w-4" /> Mengenai AWQAF
                </Link>

                <div class="mt-10 grid grid-cols-1 items-center gap-10 lg:grid-cols-12 lg:gap-16">
                    <div class="lg:col-span-5">
                        <div class="overflow-hidden rounded-3xl bg-gradient-to-b from-slate-100 to-white shadow-2xl">
                            <img
                                :src="`/images/${founder.portrait}`"
                                :alt="alt"
                                class="mx-auto h-auto w-full max-w-sm object-contain p-6"
                            />
                        </div>
                    </div>
                    <div class="lg:col-span-7">
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-emerald-400">Pengasas AWQAF</p>
                        <h1 class="mt-4 text-3xl font-bold leading-tight tracking-tight text-white sm:text-4xl lg:text-5xl">{{ founder.full_name }}</h1>
                        <p class="mt-3 text-lg text-slate-300">{{ founder.designation }}</p>
                        <p v-if="founder.passed_away" class="mt-1 text-sm text-slate-500">Kembali ke Rahmatullah pada {{ founder.passed_away }}. Al-Fatihah.</p>
                        <p class="mt-6 max-w-2xl leading-relaxed text-slate-300">{{ founder.summary }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2 + 3. Johor Corporation leadership + facts strip -->
        <section class="bg-white py-16 lg:py-20">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Kepimpinan Korporat</p>
                <h2 class="mt-3 text-2xl font-bold text-slate-900 sm:text-3xl">Pengalaman Menerajui Johor Corporation</h2>
                <div class="mt-6 max-w-3xl space-y-4">
                    <p v-for="(para, i) in founder.jcorp_experience.description" :key="i" class="leading-relaxed text-slate-700">{{ para }}</p>
                </div>

                <dl class="mt-12 grid grid-cols-1 gap-px overflow-hidden rounded-2xl border border-slate-100 bg-slate-100 sm:grid-cols-2 lg:grid-cols-4">
                    <div v-for="s in founder.jcorp_experience.stats" :key="s.label" class="bg-white p-6">
                        <dt class="text-2xl font-bold text-emerald-700">{{ s.value }}</dt>
                        <dd class="mt-2 text-sm leading-snug text-slate-500">{{ s.label }}</dd>
                    </div>
                </dl>
                <p class="mt-4 text-xs text-slate-400">Sumber: {{ founder.jcorp_experience.source }}</p>
            </div>
        </section>

        <!-- 4. Leadership philosophy -->
        <section class="bg-slate-50 py-16 lg:py-20">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Falsafah</p>
                <h2 class="mt-3 text-2xl font-bold text-slate-900 sm:text-3xl">Pendekatan Kepimpinan</h2>
                <ul class="mt-8 grid grid-cols-1 gap-x-10 gap-y-4 sm:grid-cols-2">
                    <li v-for="p in founder.leadership_principles" :key="p" class="flex items-start gap-3 text-slate-700">
                        <span class="mt-2 h-1.5 w-1.5 flex-none rounded-full bg-emerald-500"></span>
                        <span>{{ p }}</span>
                    </li>
                </ul>
            </div>
        </section>

        <!-- 5. Business Jihad -->
        <section class="bg-white py-16 lg:py-20">
            <div class="mx-auto max-w-3xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Gagasan</p>
                <h2 class="mt-3 text-2xl font-bold text-slate-900 sm:text-3xl">Gagasan Jihad Bisnes</h2>
                <div class="mt-6 space-y-4">
                    <p v-for="(para, i) in founder.business_jihad_summary" :key="i" class="leading-relaxed text-slate-700">{{ para }}</p>
                </div>
            </div>
        </section>

        <!-- 6. Waqaf An-Nur -->
        <section class="bg-slate-50 py-16 lg:py-20">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Konteks Sejarah</p>
                <h2 class="mt-3 text-2xl font-bold text-slate-900 sm:text-3xl">Pembangunan Waqaf An-Nur</h2>
                <ul class="mt-8 space-y-4">
                    <li v-for="(point, i) in founder.waqaf_an_nur_summary" :key="i" class="flex items-start gap-3 border-l-2 border-emerald-200 pl-5 text-slate-700">
                        <span>{{ point }}</span>
                    </li>
                </ul>
                <p class="mt-6 rounded-xl border border-slate-200 bg-white p-4 text-sm text-slate-500">
                    Waqaf An-Nur Corporation dipaparkan sebagai konteks sejarah model Waqaf Korporat dalam ekosistem JCorp sahaja. Ia bukan unit perniagaan semasa AWQAF Holdings Berhad.
                </p>
            </div>
        </section>

        <!-- 7. Legasi Kepimpinan — falsafah Waqaf Korporat diteruskan menerusi kepimpinan berturut -->
        <section class="bg-white py-16 lg:py-24">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Kesinambungan Amanah</p>
                <h2 class="mt-3 text-2xl font-bold text-slate-900 sm:text-3xl">Legasi Kepimpinan</h2>
                <p class="mt-6 max-w-3xl leading-relaxed text-slate-700">{{ founder.leadership_legacy.intro }}</p>

                <!-- Perjalanan institusi (konsep) — idea → institusi → kesinambungan.
                     Semata-mata konsep; hanya '2012' sebagai penanda permulaan, tiada tarikh lain. -->
                <ol class="mt-12 flex flex-col gap-3 sm:flex-row sm:items-center sm:gap-6">
                    <li class="sm:flex-1">
                        <p class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-400">2012</p>
                        <p class="mt-1.5 font-semibold text-slate-900">Pengasas memperkenalkan falsafah.</p>
                    </li>
                    <li aria-hidden="true" class="flex shrink-0 justify-start text-slate-300 sm:justify-center">
                        <svg class="h-5 w-5 rotate-90 sm:rotate-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6" /></svg>
                    </li>
                    <li class="sm:flex-1">
                        <p class="font-semibold text-slate-900">Institusi diperkukuh.</p>
                    </li>
                    <li aria-hidden="true" class="flex shrink-0 justify-start text-slate-300 sm:justify-center">
                        <svg class="h-5 w-5 rotate-90 sm:rotate-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6" /></svg>
                    </li>
                    <li class="sm:flex-1">
                        <p class="font-semibold text-slate-900">Institusi diteruskan hari ini.</p>
                    </li>
                </ol>

                <!-- Garis masa kepimpinan: setiap pengerusi ialah pertanda institusi.
                     Potret monokrom (monogram sementara) — mudah diganti apabila potret rasmi disediakan. -->
                <ol class="mt-16 border-t border-slate-100 pt-16 lg:mt-20 lg:pt-20">
                    <li
                        v-for="(c, i) in founder.leadership_legacy.chairmen"
                        :key="c.name"
                        class="relative flex gap-6 pb-16 last:pb-0 sm:gap-8 sm:pb-24"
                    >
                        <!-- Garis penghubung halus (di belakang potret) — dipusatkan pada potret 96px -->
                        <span
                            v-if="i < founder.leadership_legacy.chairmen.length - 1"
                            class="absolute left-12 top-12 z-0 h-[calc(100%-3rem)] w-px -translate-x-1/2 bg-slate-200"
                            aria-hidden="true"
                        ></span>

                        <!-- Potret monokrom (96px) — potret rasmi jika tersedia, jika tidak monogram.
                             Rangka & saiz sama untuk kedua-dua supaya kandungan campuran kelihatan konsisten. -->
                        <div class="relative z-10 flex-none">
                            <img
                                v-if="c.portrait"
                                :src="`/images/${c.portrait}`"
                                :alt="`Potret ${c.name}`"
                                width="96"
                                height="96"
                                loading="lazy"
                                decoding="async"
                                class="h-24 w-24 rounded-full object-cover object-top grayscale ring-1 ring-slate-900/5"
                            />
                            <div
                                v-else
                                class="flex h-24 w-24 items-center justify-center rounded-full bg-gradient-to-b from-slate-100 to-slate-200 ring-1 ring-slate-900/5"
                                role="img"
                                :aria-label="`Potret rasmi ${c.name} belum tersedia`"
                            >
                                <span class="text-lg font-semibold tracking-wide text-slate-400">{{ c.monogram }}</span>
                            </div>
                        </div>

                        <!-- Pertanda kepimpinan -->
                        <div class="pt-1">
                            <div class="flex flex-wrap items-center gap-x-3 gap-y-1.5">
                                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-emerald-700">{{ c.role }}</p>
                                <span v-if="c.current" class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-medium text-emerald-700">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Kini
                                </span>
                            </div>
                            <h3 class="mt-2 text-lg font-bold text-slate-900 sm:text-xl">{{ c.name }}</h3>
                            <p class="mt-1 text-sm font-medium text-slate-500">{{ c.term }}</p>
                            <p class="mt-3 max-w-2xl leading-relaxed text-slate-700">{{ c.description }}</p>
                        </div>
                    </li>
                </ol>

                <!-- Penutup bab Pengasas — pernyataan tenang, tiada CTA/butang. -->
                <p class="mt-12 max-w-2xl text-lg leading-relaxed text-slate-500 sm:mt-16 sm:text-xl sm:leading-relaxed">
                    Idea boleh lahir daripada seorang tokoh. Namun hanya institusi yang kukuh mampu
                    memastikan idea itu terus hidup merentasi generasi.
                </p>
            </div>
        </section>

        <!-- 8. AWQAF Holdings -->
        <section class="border-t border-slate-100 bg-white py-16 lg:py-20">
            <div class="mx-auto max-w-3xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Institusi</p>
                <h2 class="mt-3 text-2xl font-bold text-slate-900 sm:text-3xl">Penubuhan AWQAF Holdings Berhad</h2>
                <div class="mt-6 space-y-4">
                    <p v-for="(para, i) in founder.awqaf_contribution" :key="i" class="leading-relaxed text-slate-700">{{ para }}</p>
                </div>
                <Link :href="route('korporat.overview')" class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-700 hover:underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 focus-visible:ring-offset-2">
                    Maklumat korporat AWQAF →
                </Link>
            </div>
        </section>

        <!-- 9. Selected achievements -->
        <section class="bg-slate-50 py-16 lg:py-20">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Pengiktirafan</p>
                <h2 class="mt-3 text-2xl font-bold text-slate-900 sm:text-3xl">Pencapaian Terpilih</h2>
                <ul class="mt-8 grid grid-cols-1 gap-x-10 gap-y-4 sm:grid-cols-2">
                    <li v-for="a in founder.selected_achievements" :key="a" class="flex items-start gap-3 text-slate-700">
                        <span class="mt-2 h-1.5 w-1.5 flex-none rounded-full bg-emerald-500"></span>
                        <span>{{ a }}</span>
                    </li>
                </ul>
            </div>
        </section>

        <!-- 10. Legacy -->
        <section class="bg-white py-16 lg:py-20">
            <div class="mx-auto max-w-3xl px-6 lg:px-8">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-700">Warisan</p>
                <h2 class="mt-3 text-2xl font-bold text-slate-900 sm:text-3xl">Legasi</h2>
                <p class="mt-4 text-slate-600">Warisan beliau diteruskan menerusi:</p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <span v-for="l in founder.legacy" :key="l" class="rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-medium text-slate-700">{{ l }}</span>
                </div>
            </div>
        </section>

        <!-- 11. Book feature -->
        <section class="bg-slate-950 py-16 lg:py-20">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-10 lg:grid-cols-12 lg:gap-14">
                    <!-- Official biography cover (3D render, presented as the focus) -->
                    <div class="lg:col-span-4">
                        <img
                            src="/images/buku-biografi.webp"
                            :alt="`Muka depan buku ${founder.book.title} oleh ${founder.book.author}`"
                            width="1122"
                            height="1402"
                            loading="lazy"
                            decoding="async"
                            class="mx-auto w-full max-w-[17rem] drop-shadow-2xl"
                        />
                    </div>

                    <div class="lg:col-span-8">
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-emerald-400">Bacaan Lanjut</p>
                        <h2 class="mt-3 text-2xl font-bold text-white sm:text-3xl">{{ founder.book.title }}</h2>
                        <dl class="mt-6 grid grid-cols-1 gap-x-10 gap-y-3 text-sm sm:grid-cols-2">
                            <div><dt class="text-slate-500">Penulis</dt><dd class="text-slate-200">{{ founder.book.author }}</dd></div>
                            <div><dt class="text-slate-500">Tahun terbit</dt><dd class="text-slate-200">{{ founder.book.year }}</dd></div>
                            <div class="sm:col-span-2"><dt class="text-slate-500">Penerbit</dt><dd class="text-slate-200">{{ founder.book.publishers.join(' · ') }}</dd></div>
                            <div><dt class="text-slate-500">ISBN</dt><dd class="text-slate-200">{{ founder.book.isbn }}</dd></div>
                        </dl>

                        <Link :href="bookCta" class="mt-8 inline-flex items-center gap-2 rounded-lg bg-emerald-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-emerald-500 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                            {{ founder.book.cta_label }}
                        </Link>

                        <p class="mt-8 border-t border-white/10 pt-6 text-xs leading-relaxed text-slate-500">
                            {{ founder.book.copyright }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Source attribution -->
        <section class="border-t border-slate-100 bg-white py-10">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <p class="text-xs leading-relaxed text-slate-400">{{ founder.sources }}</p>
            </div>
        </section>
    </PublicLayout>
</template>
