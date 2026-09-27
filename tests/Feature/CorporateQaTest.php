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

it('keeps the property portfolio free of unverified project claims', function () {
    $property = collect(require resource_path('data/portfolios.php'))->firstWhere('slug', 'hartanah');

    expect($property['status_legend'])->toBeNull();
    expect($property['projects'])->toBeEmpty();
});

it('describes the current approved education portfolio activities', function () {
    $education = collect(require resource_path('data/portfolios.php'))->firstWhere('slug', 'pendidikan');
    $activityNames = collect($education['activities'])->pluck('name');

    expect($activityNames)
        ->toContain('Pembangunan modal insan')
        ->toContain('Pendidikan berteraskan nilai')
        ->toContain('Pembangunan ekosistem pendidikan')
        ->toContain('Pembangunan belia & komuniti')
        ->toContain('Perkongsian strategik dalam pendidikan');
});

it('does not fabricate a Facebook link for CURVES Bangi Sentral', function () {
    $health = collect(require resource_path('data/portfolios.php'))->firstWhere('slug', 'kesihatan-kesejahteraan');
    $bangi = collect($health['branches'])->firstWhere('name', 'CURVES Bangi Sentral');

    expect($bangi['url'])->toBeNull();
});
