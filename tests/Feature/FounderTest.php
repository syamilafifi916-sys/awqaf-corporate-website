<?php

use function Pest\Laravel\get;

it('serves the Pengasas page with founder data', function () {
    get('/korporat/pengasas')
        ->assertOk()
        ->assertInertia(fn ($p) => $p
            ->component('Korporat/Founder')
            ->where('founder.full_name', 'Allahyarham Tan Sri Muhammad Ali Hashim')
            ->where('founder.designation', 'Pengasas Bersama AWQAF Holdings Berhad')
            ->has('founder.jcorp_experience.stats', 4)
        );
});

it('does not claim AWQAF was founded in 1998', function () {
    $founder = require resource_path('data/founder.php');
    $blob = json_encode($founder);

    // 1998 belongs only to the JCorp/WANCorp historical context, never to AWQAF's founding.
    expect($blob)->not->toContain('1998');
    expect($founder['awqaf_contribution'][1])->toContain('2012');
});

it('routes the book CTA to enquiry until a verified purchase URL exists', function () {
    $founder = require resource_path('data/founder.php');

    expect($founder['book']['cta_verified_url'])->toBeNull();
    expect($founder['book']['cta_label'])->toBe('Pertanyaan Pembelian Buku');
    expect($founder['book']['isbn'])->toBe('978-967-251-667-5');
});

it('exposes no book PDF in the public directory', function () {
    $pdfs = glob(public_path('*.pdf')) ?: [];
    $hashimImages = array_map('basename', glob(public_path('images/*hashim*')) ?: []);

    // No book PDF / biography dump anywhere in public/.
    foreach ($pdfs as $pdf) {
        expect(basename($pdf))->not->toContain('hashim');
    }

    // Only the approved official founder portraits may exist — the hero portrait
    // and the timeline (Kesinambungan Amanah) portrait. Guards against any
    // biography image dump while allowing the two Board-approved assets.
    $approved = [
        'pengasas-tan-sri-muhammad-ali-hashim.png',
        'chairman-muhammad-ali-hashim.webp',
    ];
    foreach ($hashimImages as $img) {
        expect($approved)->toContain($img);
    }
});

it('emits Person schema and portrait OpenGraph image', function () {
    $html = get('/korporat/pengasas')->getContent();

    expect($html)->toContain('"@type":"Person"')
        ->and($html)->toContain('Muhammad Ali Hashim')
        ->and($html)->toContain('pengasas-tan-sri-muhammad-ali-hashim.png');
});

it('lists the Pengasas route in the sitemap', function () {
    $xml = get('/sitemap.xml')->assertOk()->getContent();

    expect($xml)->toContain('/korporat/pengasas');
});
