<?php

use function Pest\Laravel\get;

it('serves the Wakaf Sekarang destination (kaedah berwakaf)', function () {
    get('/wakaf/kaedah-berwakaf')->assertOk();
});

it('serves the expanded Waqaf Korporat page', function () {
    get('/wakaf/wakaf-korporat')->assertOk();
});

it('serves the Corporate Information page', function () {
    get('/korporat/maklumat-korporat')->assertOk();
});

it('permanently redirects verified legacy informational URLs', function (string $legacyPath, string $targetRoute) {
    get($legacyPath)
        ->assertStatus(301)
        ->assertRedirect(route($targetRoute));
})->with([
    ['/info-awqaf/pengenalan-awqaf/maklumat-korporat/pengasas-awqaf', 'korporat.founder'],
    ['/info-awqaf/pengenalan-awqaf/kenyataan-korporat', 'korporat.overview'],
    ['/hubungan-pihak-berkepentingan/taklimat-pelaburpihak-berkepentingan/tadbir-urus-korporat', 'ketelusan'],
    ['/hubungan-pihak-berkepentingan/laporan/info-kewangan', 'korporat.reports'],
    ['/portal-pewaqif/hubungi-kami', 'hubungi'],
    ['/ahli-lembaga-pengarah-2025', 'korporat.leadership.index'],
]);

it('keeps the Berita route available even though it is unlinked from navigation', function () {
    // Content/route retained; only removed from nav, homepage and corporate page.
    get('/berita')->assertOk();
});

it('gives every portfolio a contribution-to-objectives statement', function () {
    $portfolios = collect(require resource_path('data/portfolios.php'));

    $portfolios->each(function ($p) {
        expect($p['contribution'] ?? null)->not->toBeNull("{$p['slug']} missing contribution");
    });
});

it('labels property projects with an explicit verification status', function () {
    $property = collect(require resource_path('data/portfolios.php'))->firstWhere('slug', 'hartanah');

    expect($property['status_legend'])->toContain('Cadangan / tertakluk pengesahan');
    expect($property['projects'][0]['status'])->toBe('Cadangan / tertakluk pengesahan');
});

it('includes an education consultancy activity under the education portfolio', function () {
    $education = collect(require resource_path('data/portfolios.php'));
    $activityNames = collect($education->firstWhere('slug', 'pendidikan')['activities'])->pluck('name');

    expect($activityNames)->toContain('Perundingan pendidikan');
});

it('does not fabricate a Facebook link for CURVES Bangi Sentral', function () {
    $health = collect(require resource_path('data/portfolios.php'))->firstWhere('slug', 'kesihatan-kesejahteraan');
    $bangi = collect($health['branches'])->firstWhere('name', 'CURVES Bangi Sentral');

    expect($bangi['url'])->toBeNull();
});
