<?php

it('serves the Berita page', function () {
    $this->get('/berita')->assertOk()->assertInertia(fn ($p) => $p->component('Berita')->has('items'));
});

it('serves the Hubungi Kami page', function () {
    $this->get('/hubungi')->assertOk()->assertInertia(fn ($p) => $p->component('Hubungi'));
});

it('ships the official logo asset and favicon', function () {
    expect(file_exists(public_path('images/brand/awqaf-symbol.png')))->toBeTrue();
    expect(file_exists(public_path('favicon.ico')))->toBeTrue();
});

it('locked navigation routes all resolve', function () {
    foreach (['korporat.overview', 'waqaf.corporate', 'program.index', 'ketelusan', 'berita', 'hubungi'] as $name) {
        $this->get(route($name))->assertOk();
    }
});
