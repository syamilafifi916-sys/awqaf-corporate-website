<?php

// Hub counts and detail pages are covered by PortfolioProgrammeTest, which
// asserts the post-separation reality (3 welfare programmes, 4 investment
// portfolios). CURVES and Infaq now live under Portfolio, not Program.

it('404s an unknown programme', function () {
    $this->get('/program/tiada')->assertNotFound();
});

it('redirects the legacy kebajikan path to the programme hub', function () {
    $this->get('/kebajikan')->assertRedirect('/program');
});

it('seeds the 2021 audited financial statement record', function () {
    $this->seed(\Database\Seeders\ReportSeeder::class);
    expect(\App\Models\Report::where('year', 2021)->where('type', 'financial_statement')->exists())->toBeTrue();
});
