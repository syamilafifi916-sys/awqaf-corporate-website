<?php

namespace App\Http\Controllers;

use App\Support\Seo;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Program & Inisiatif hub.
 *
 * Every figure below was verified visually against the source PDF page
 * (not extracted text alone) and is labelled with its reporting year, the
 * source report, and the figure type (received / distributed / revenue /
 * membership / cumulative). Do not present any figure as "current" — each
 * is tied to the year the report states.
 */
class ProgramController extends Controller
{
    public function index(): Response
    {
        Seo::set([
            'title' => 'Program & Inisiatif — AWQAF Holdings Berhad',
            'description' => 'Program dan inisiatif AWQAF Holdings Berhad — ZuriatCARE, EduWAQF, AWQAF4Health, CURVES dan Infaq — dengan fakta daripada Laporan Tahunan.',
        ]);

        return Inertia::render('Program/Index', [
            'programs' => collect(self::programs())->map(fn ($p) => [
                'slug' => $p['slug'],
                'name' => $p['name'],
                'entity' => $p['entity'],
                'category' => $p['category'],
                'status' => $p['status'],
                'overview' => $p['overview'],
                'headline' => $p['figures'][0] ?? null,
            ])->values(),
        ]);
    }

    public function show(string $slug): Response
    {
        $program = self::programs()[$slug] ?? throw new NotFoundHttpException;

        Seo::set([
            'title' => $program['name'].' — Program & Inisiatif — AWQAF Holdings Berhad',
            'description' => $program['overview'],
        ]);

        return Inertia::render('Program/Show', [
            'program' => $program,
            'others' => collect(self::programs())
                ->reject(fn ($p) => $p['slug'] === $slug)
                ->map(fn ($p) => ['slug' => $p['slug'], 'name' => $p['name'], 'category' => $p['category']])
                ->values(),
        ]);
    }

    /**
     * Verified programme data. Figures cross-checked against the PDF page.
     */
    private static function programs(): array
    {
        return [
            'zuriatcare' => [
                'slug' => 'zuriatcare',
                'name' => 'Yayasan ZuriatCARE',
                'entity' => 'Yayasan ZuriatCARE (YZC)',
                'category' => 'Kebajikan & Kesihatan Mental',
                'status' => 'Aktif',
                'period' => 'Ditubuhkan Ogos 2020',
                'overview' => 'Yayasan kebajikan di bawah Kumpulan AWQAF yang menjalankan program perlindungan sosial dan kesedaran kesihatan mental untuk komuniti.',
                'established' => 'Ditubuhkan pada Ogos 2020 dengan kelulusan Bahagian Hal Ehwal Undang-Undang, Jabatan Perdana Menteri.',
                'subprograms' => [
                    ['name' => 'Peluang Kedua', 'desc' => 'Perlindungan golongan remaja yang hamil tidak dirancang serta bayi mereka, termasuk pembangunan modal insan dan remaja keciciran pembelajaran.'],
                    ['name' => 'CAMELLIA', 'desc' => 'Campaign for Mental Illness Inclusivity and Mental Health Awareness — program kesedaran isu kesihatan dan penyakit mental.'],
                    ['name' => 'AWAS Malaysia', 'desc' => 'AWareness Against Suicide — sokongan pencegahan bunuh diri menerusi AWAS Buddy dan talian Text-a-Buddy.'],
                ],
                'figures' => [
                    ['year' => 2022, 'label' => 'Dana diterima', 'value' => 'RM118,150', 'type' => 'Diterima', 'source' => 'Laporan Tahunan 2022, ms 40'],
                    ['year' => 2022, 'label' => 'Agihan dilaksanakan', 'value' => 'RM97,098', 'type' => 'Diagihkan', 'source' => 'Laporan Tahunan 2022, ms 40'],
                ],
                'note' => null,
                'external' => ['label' => 'Laman rasmi Yayasan ZuriatCARE', 'url' => 'https://www.yayasanzuriatcare.org/'],
                'reports' => [2022, 2023],
            ],
            'eduwaqf' => [
                'slug' => 'eduwaqf',
                'name' => 'EduWAQF',
                'entity' => 'Tabung EduWAQF, AWQAF Holdings Berhad',
                'category' => 'Pendidikan',
                'status' => 'Aktif',
                'period' => 'Tabung wakaf pendidikan',
                'overview' => 'Tabung wakaf pendidikan yang memperkasa pelajar dan institusi pendidikan menerusi kelestarian sumber wakaf.',
                'established' => null,
                'subprograms' => [],
                'figures' => [
                    ['year' => 2022, 'label' => 'Agihan keseluruhan (terkumpul)', 'value' => 'RM241,307', 'type' => 'Terkumpul', 'source' => 'Laporan Tahunan 2022, ms 41'],
                    ['year' => 2022, 'label' => 'Agihan bagi tahun 2022', 'value' => 'RM8,000', 'type' => 'Diagihkan', 'source' => 'Laporan Tahunan 2022, ms 41'],
                ],
                'note' => 'Agihan tahun 2022 sebanyak RM8,000 disalurkan kepada empat persatuan/NGO: SRAR Pusat Pelajar Islam, PEMIKIR, Untuk Malaysia dan Camellia–YZC. Angka terkumpul RM241,307 ialah jumlah kumulatif tabung, bukan agihan satu tahun. (Laporan Tahunan 2022, ms 41)',
                'external' => null,
                'reports' => [2022],
            ],
            'awqaf4health' => [
                'slug' => 'awqaf4health',
                'name' => 'AWQAF4Health',
                'entity' => 'Tabung AWQAF4Health, AWQAF Holdings Berhad',
                'category' => 'Kesihatan',
                'status' => 'Aktif',
                'period' => 'Tabung wakaf kesihatan',
                'overview' => 'Tabung wakaf kesihatan yang menyalurkan sumbangan kepada inisiatif kesihatan dan kebajikan komuniti.',
                'established' => null,
                'subprograms' => [],
                'figures' => [
                    ['year' => 2022, 'label' => 'Agihan keseluruhan (terkumpul)', 'value' => 'RM219,423', 'type' => 'Terkumpul', 'source' => 'Laporan Tahunan 2022, ms 41'],
                    ['year' => 2022, 'label' => 'Agihan bagi tahun 2022', 'value' => 'RM56,964', 'type' => 'Diagihkan', 'source' => 'Laporan Tahunan 2022, ms 41'],
                ],
                'note' => 'Agihan tahun 2022 disalurkan bagi Tabung Bersatu Hati DPIM, Sumbangan Test-Kit COVID-19 dan Program Bakti Insan. Angka terkumpul RM219,423 ialah jumlah kumulatif tabung. (Laporan Tahunan 2022, ms 41)',
                'external' => null,
                'reports' => [2022],
            ],
            'curves' => [
                'slug' => 'curves',
                'name' => 'CURVES',
                'entity' => 'AHB Wellness Sdn Bhd',
                'category' => 'Perniagaan — Kecergasan & Kesejahteraan Wanita',
                'status' => 'Aktif',
                'period' => 'Cawangan sejak 2020',
                'overview' => 'Rangkaian francais pusat kecergasan dan kesejahteraan khusus wanita di bawah AHB Wellness Sdn Bhd, sebahagian portfolio perniagaan Kumpulan AWQAF.',
                'established' => null,
                'subprograms' => [],
                'figures' => [
                    ['year' => 2022, 'label' => 'Pendapatan keseluruhan', 'value' => 'RM520,754', 'type' => 'Pendapatan', 'source' => 'Laporan Tahunan 2022, ms 32'],
                    ['year' => 2022, 'label' => 'Ahli aktif (akhir Dis 2022)', 'value' => '413 ahli', 'type' => 'Keahlian', 'source' => 'Laporan Tahunan 2022, ms 32'],
                ],
                'note' => 'Cawangan: Bukit Jelutong, Setia Alam (dibuka awal 2022) dan Bangi Sentral (dibuka pertengahan 2023). Pendapatan 2022 meningkat 268% berbanding 2021. (Laporan Tahunan 2022, ms 32)',
                'external' => null,
                'reports' => [2022, 2023, 2024],
            ],
            'infaq' => [
                'slug' => 'infaq',
                'name' => 'Infaq',
                'entity' => 'AHB Fintech Sdn Bhd',
                'category' => 'Teknologi Kewangan Wakaf',
                'status' => 'Aktif',
                'period' => 'Platform digital',
                'overview' => 'Platform digital yang memudahkan penajaan — seperti iftar Ramadan — dengan jejak niat yang jelas, resit segera dan pelaporan telus.',
                'established' => null,
                'subprograms' => [],
                'figures' => [],
                'note' => 'Butiran prestasi kewangan program akan dikemas kini apabila disahkan daripada laporan tahunan.',
                'external' => null,
                'reports' => [2024],
            ],
        ];
    }
}
