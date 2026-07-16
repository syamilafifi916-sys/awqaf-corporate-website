<?php

use function Pest\Laravel\get;

it('serves the Portfolio hub with exactly four investment portfolios', function () {
    get('/portfolio')
        ->assertOk()
        ->assertInertia(fn ($p) => $p->component('Portfolio/Index')->has('portfolios', 4));
});

it('serves every portfolio detail page', function () {
    foreach (['pendidikan', 'kesihatan-kesejahteraan', 'hartanah', 'fintech'] as $slug) {
        get("/portfolio/{$slug}")
            ->assertOk()
            ->assertInertia(fn ($p) => $p->component('Portfolio/Show')->where('portfolio.slug', $slug));
    }
});

it('serves the Programme hub with exactly three welfare programmes', function () {
    get('/program')
        ->assertOk()
        ->assertInertia(fn ($p) => $p->component('Program/Index')->has('programmes', 3));
});

it('serves every programme detail page', function () {
    foreach (['yayasan-zuriatcare', 'eduwaqf', 'awqaf4health'] as $slug) {
        get("/program/{$slug}")
            ->assertOk()
            ->assertInertia(fn ($p) => $p->component('Program/Show')->where('programme.slug', $slug));
    }
});

it('does not expose CURVES or Infaq as welfare programmes', function () {
    $programmes = collect(require resource_path('data/programmes.php'))->pluck('slug');

    expect($programmes)->not->toContain('curves')
        ->and($programmes)->not->toContain('infaq')
        ->and($programmes)->toHaveCount(3);
});

it('places CURVES under the health portfolio and Infaq under fintech', function () {
    $portfolios = collect(require resource_path('data/portfolios.php'))->keyBy('slug');

    $healthUnits = collect($portfolios['kesihatan-kesejahteraan']['units'])->pluck('name');
    $fintechUnits = collect($portfolios['fintech']['units'])->pluck('name');

    expect($healthUnits)->toContain('CURVES')
        ->and($fintechUnits)->toContain('Infaq');
});

it('redirects legacy programme slugs to their new homes', function () {
    get('/program/zuriatcare')->assertRedirect('/program/yayasan-zuriatcare');
    get('/program/curves')->assertRedirect('/portfolio/kesihatan-kesejahteraan');
    get('/program/infaq')->assertRedirect('/portfolio/fintech');
});

it('returns 404 for the retired zuriatcare slug served directly', function () {
    // The old slug now only exists as a redirect; the canonical page is the new slug.
    get('/program/nonexistent-programme')->assertNotFound();
});

it('exposes Portfolio and Lembaga Pengarah in the sitemap', function () {
    $xml = get('/sitemap.xml')->assertOk()->getContent();

    expect($xml)->toContain('/portfolio')
        ->and($xml)->toContain('/portfolio/pendidikan')
        ->and($xml)->toContain('/program/yayasan-zuriatcare')
        ->and($xml)->not->toContain('/program/curves');
});
