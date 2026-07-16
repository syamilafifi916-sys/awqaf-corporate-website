<?php

it('shows the programme hub with all five programmes', function () {
    $this->get('/program')
        ->assertOk()
        ->assertInertia(fn ($p) => $p->component('Program/Index')->has('programs', 5));
});

it('shows each programme detail page', function () {
    foreach (['zuriatcare', 'eduwaqf', 'awqaf4health', 'curves', 'infaq'] as $slug) {
        $this->get("/program/{$slug}")
            ->assertOk()
            ->assertInertia(fn ($p) => $p->component('Program/Show')->where('program.slug', $slug));
    }
});

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
