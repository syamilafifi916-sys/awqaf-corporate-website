<?php

use App\Models\Report;
use App\Support\Seo;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

Route::get('/', function () {
    Seo::set([
        'title' => 'AWQAF Holdings Berhad — Waqaf Korporat untuk Kelestarian Ummah',
        'description' => 'AWQAF Holdings Berhad membangunkan waqaf korporat yang telus dan bertadbir urus baik, menyalurkan manfaat berterusan kepada pendidikan, kesihatan dan kebajikan komuniti.',
    ]);

    return Inertia::render('Welcome');
})->name('welcome');

Route::get('/wakaf/wakaf-korporat', function () {
    Seo::set([
        'title' => 'Waqaf Korporat® — Definisi & Ciri-ciri — AWQAF Holdings Berhad',
        'description' => 'Definisi Waqaf Korporat® dan lapan ciri asas yang menjadi penanda unik konsep ini menurut AWQAF Holdings Berhad.',
    ]);

    return Inertia::render('Waqaf/Corporate');
})->name('waqaf.corporate');

Route::get('/wakaf/kaedah-berwakaf', function () {
    Seo::set([
        'title' => 'Kaedah Berwakaf — AWQAF Holdings Berhad',
        'description' => 'Pilih kaedah berwakaf yang sesuai — atas talian, wakaf bulanan, atau secara manual.',
    ]);

    return Inertia::render('Waqaf/HowToContribute');
})->name('waqaf.howto');

Route::get('/wakaf/wakaf-bulanan', function () {
    Seo::set([
        'title' => 'Wakaf Bulanan — AWQAF Holdings Berhad',
        'description' => 'Sumbang secara konsisten setiap bulan menerusi caruman wakaf bulanan AWQAF Holdings Berhad.',
    ]);

    return Inertia::render('Waqaf/Monthly');
})->name('waqaf.monthly');

Route::get('/wakaf/kategori-pewakaf', function () {
    Seo::set([
        'title' => 'Kategori Pewakaf — AWQAF Holdings Berhad',
        'description' => 'Ketahui enam tahap keahlian pewakaf AWQAF Holdings Berhad, ditentukan secara automatik mengikut jumlah wakaf terkumpul.',
    ]);

    return Inertia::render('Waqaf/Categories');
})->name('waqaf.categories');

Route::get('/korporat/maklumat-korporat', function () {
    Seo::set([
        'title' => 'Maklumat Korporat — AWQAF Holdings Berhad',
        'description' => 'Visi, misi dan ahli Lembaga Pengarah AWQAF Holdings Berhad.',
    ]);

    return Inertia::render('Korporat/Overview');
})->name('korporat.overview');

// Pengasas — controlled corporate-history page (single source: founder.php).
Route::get('/korporat/pengasas', function () {
    $founder = require resource_path('data/founder.php');

    Seo::set([
        'title' => 'Pengasas AWQAF — Allahyarham Tan Sri Muhammad Ali Hashim',
        'description' => 'Peranan Allahyarham Tan Sri Muhammad Ali Hashim dalam membentuk Waqaf Korporat — kepimpinan di Johor Corporation, pembangunan Waqaf An-Nur, dan penubuhan AWQAF Holdings Berhad.',
        'image' => asset('images/'.$founder['portrait']),
        'type' => 'profile',
        'schema' => [
            '@context' => 'https://schema.org',
            '@type' => 'Person',
            'name' => $founder['full_name'],
            'jobTitle' => $founder['designation'],
            'image' => asset('images/'.$founder['portrait']),
            'worksFor' => [
                '@type' => 'Organization',
                'name' => 'AWQAF Holdings Berhad',
            ],
        ],
    ]);

    return Inertia::render('Korporat/Founder', [
        'founder' => $founder,
    ]);
})->name('korporat.founder');

Route::get('/ketelusan', function () {
    Seo::set([
        'title' => 'Pusat Ketelusan — AWQAF Holdings Berhad',
        'description' => 'Laporan kewangan diaudit, tadbir urus korporat, Lembaga Pengarah, jawatankuasa dan status pematuhan AWQAF Holdings Berhad — semua di satu tempat.',
    ]);

    return Inertia::render('Ketelusan', [
        'latestAnnualReport' => Report::where('type', 'annual_report')->orderByDesc('year')->first(),
        'latestFinancialStatement' => Report::where('type', 'financial_statement')->orderByDesc('year')->first(),
    ]);
})->name('ketelusan');

// Berita (aktiviti korporat).
Route::get('/berita', function () {
    Seo::set([
        'title' => 'Berita & Acara — AWQAF Holdings Berhad',
        'description' => 'Aktiviti dan acara korporat AWQAF Holdings Berhad.',
    ]);

    return Inertia::render('Berita', [
        'items' => [
            ['date' => '6 November 2024', 'title' => 'Kunjungan ke Jabatan Perdana Menteri', 'body' => 'Membentangkan model Waqaf Korporat® kepada YAB Perdana Menteri.'],
            ['date' => '17 Julai 2024', 'title' => 'Meja Bulat bersama Menteri Ekonomi', 'body' => 'Membentangkan Formula Waqaf Korporat® sebagai instrumen pembangunan ekonomi ummah.'],
            ['date' => '22 Februari 2024', 'title' => 'MoU dengan Wakaf Pulau Pinang', 'body' => 'Kerjasama inisiatif teknologi pendidikan bersama MAINPP dan YIPP di bawah platform EduWAQF.'],
        ],
    ]);
})->name('berita');

// Hubungi Kami.
Route::get('/hubungi', function () {
    Seo::set([
        'title' => 'Hubungi Kami — AWQAF Holdings Berhad',
        'description' => 'Maklumat perhubungan AWQAF Holdings Berhad.',
    ]);

    return Inertia::render('Hubungi');
})->name('hubungi');

// Portfolio Pelaburan hub (investment/business portfolios — 4 items).
Route::get('/portfolio', [\App\Http\Controllers\PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{slug}', [\App\Http\Controllers\PortfolioController::class, 'show'])->name('portfolio.show');

// Program & Inisiatif hub (welfare programmes — 3 items).
Route::get('/program', [\App\Http\Controllers\ProgramController::class, 'index'])->name('program.index');

// Legacy programme slugs → new locations. Registered BEFORE the {slug}
// wildcard so they win. CURVES and Infaq moved OUT of Programmes into their
// respective investment portfolios.
Route::get('/program/zuriatcare', fn () => redirect()->route('program.show', 'yayasan-zuriatcare', 301));
Route::get('/program/curves', fn () => redirect()->route('portfolio.show', 'kesihatan-kesejahteraan', 301));
Route::get('/program/infaq', fn () => redirect()->route('portfolio.show', 'fintech', 301));

Route::get('/program/{slug}', [\App\Http\Controllers\ProgramController::class, 'show'])->name('program.show');

// Legacy path → new hub.
Route::get('/kebajikan', fn () => redirect()->route('program.index', [], 301))->name('kebajikan.overview');

// Lembaga Pengarah (data-driven; single source: resources/data/leadership.php).
Route::get('/korporat/lembaga-pengarah', [\App\Http\Controllers\LeadershipController::class, 'index'])->name('korporat.leadership.index');
Route::get('/korporat/lembaga-pengarah/{slug}', [\App\Http\Controllers\LeadershipController::class, 'show'])->name('korporat.leadership.show');

Route::get('/korporat/laporan-tahunan', function () {
    Seo::set([
        'title' => 'Laporan Tahunan & Penyata Kewangan — AWQAF Holdings Berhad',
        'description' => 'Muat turun Laporan Tahunan dan Penyata Kewangan Diaudit AWQAF Holdings Berhad bagi tahun 2015 hingga 2023.',
    ]);

    $reports = Report::orderByDesc('year')->get()->groupBy('year')->map(function ($group) {
        return $group->map(fn ($report) => [
            'type' => $report->type,
            'title' => $report->title,
            'url' => $report->url,
        ]);
    });

    return Inertia::render('Korporat/Reports', [
        'reportsByYear' => $reports,
    ]);
})->name('korporat.reports');

// Member authentication lives exclusively in the member portal (ADR-001).
// The only login on this app is Filament's staff panel at /admin.

Route::get('/sitemap.xml', function () {
    $sitemap = Sitemap::create()
        ->add(Url::create(route('welcome'))->setPriority(1.0))
        ->add(Url::create(route('waqaf.corporate'))->setPriority(0.8))
        ->add(Url::create(route('waqaf.howto'))->setPriority(0.7))
        ->add(Url::create(route('waqaf.monthly'))->setPriority(0.6))
        ->add(Url::create(route('waqaf.categories'))->setPriority(0.8))
        ->add(Url::create(route('korporat.overview'))->setPriority(0.6))
        ->add(Url::create(route('korporat.founder'))->setPriority(0.6))
        ->add(Url::create(route('ketelusan'))->setPriority(0.7))
        ->add(Url::create(route('korporat.leadership.index'))->setPriority(0.7))
        ->add(Url::create(route('portfolio.index'))->setPriority(0.7))
        ->add(Url::create(route('portfolio.show', 'pendidikan'))->setPriority(0.5))
        ->add(Url::create(route('portfolio.show', 'kesihatan-kesejahteraan'))->setPriority(0.5))
        ->add(Url::create(route('portfolio.show', 'hartanah'))->setPriority(0.5))
        ->add(Url::create(route('portfolio.show', 'fintech'))->setPriority(0.5))
        ->add(Url::create(route('program.index'))->setPriority(0.7))
        ->add(Url::create(route('program.show', 'yayasan-zuriatcare'))->setPriority(0.5))
        ->add(Url::create(route('program.show', 'eduwaqf'))->setPriority(0.5))
        ->add(Url::create(route('program.show', 'awqaf4health'))->setPriority(0.5))
        ->add(Url::create(route('berita'))->setPriority(0.5))
        ->add(Url::create(route('hubungi'))->setPriority(0.5))
        ->add(Url::create(route('korporat.reports'))->setPriority(0.5));

    return $sitemap->toResponse(request());
});

// Dynamic robots.txt — sitemap URL always matches the deployed domain
// (a static public/robots.txt would hard-code the wrong host per environment).
Route::get('/robots.txt', function () {
    $body = implode("\n", [
        'User-agent: *',
        'Allow: /',
        'Disallow: /admin',          // Filament staff panel — never index
        'Disallow: /admin/*',
        '',
        'Sitemap: '.url('/sitemap.xml'),
        '',
    ]);

    return response($body, 200, ['Content-Type' => 'text/plain']);
});

// ── Legacy awqaf.com.my → awqaf.my path redirects (301) ──────────────
// The primary domain redirect (awqaf.com.my → awqaf.my) is configured at
// the DNS/CDN layer per RELEASE-003. These in-app rules catch legacy PATHS
// forwarded to the new host so old bookmarks/search results land correctly.
// Only paths confirmed against the legacy site are mapped; complete the rest
// from the legacy sitemap/Search Console export before cutover (RELEASE-003
// DNS Cutover Checklist), then add them here.
$legacyRedirects = [
    'info-awqaf/waqaf-korporat' => 'waqaf.corporate',
    'info-awqaf/ciri-ciri-waqaf-korporat' => 'waqaf.corporate',
    'info-awqaf/kaedah-berwakaf' => 'waqaf.howto',
    'info-awqaf/kategori-pewakaf' => 'waqaf.categories',
];
foreach ($legacyRedirects as $old => $routeName) {
    Route::get('/'.$old, fn () => redirect()->route($routeName, [], 301));
}
