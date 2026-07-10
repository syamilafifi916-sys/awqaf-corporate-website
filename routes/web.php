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

Route::get('/kebajikan', function () {
    Seo::set([
        'title' => 'Program Kebajikan — AWQAF Holdings Berhad',
        'description' => 'ZuriatCARE, EduWAQF dan AWQAF4Health — program kebajikan yang disalurkan menerusi dana waqaf korporat.',
    ]);

    return Inertia::render('Kebajikan/Overview');
})->name('kebajikan.overview');

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
        ->add(Url::create(route('ketelusan'))->setPriority(0.7))
        ->add(Url::create(route('kebajikan.overview'))->setPriority(0.6))
        ->add(Url::create(route('korporat.reports'))->setPriority(0.5));

    return $sitemap->toResponse(request());
});
