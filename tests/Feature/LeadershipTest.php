<?php

it('lists all nine directors on the board page', function () {
    $this->get('/korporat/lembaga-pengarah')
        ->assertOk()
        ->assertInertia(fn ($p) => $p->component('Korporat/Leadership/Index')->has('directors', 9));
});

it('serves each director profile with Person schema and portrait', function () {
    $slugs = ['mohammad-sahar-mat-din','ramli-bin-tahir','salihin-bin-abang','azizah-abdul-rahman',
        'rafeah-ariffin','khairul-shahril-hamzah','abdul-hakim-jaafar','shamsuddin-hayroni','ishak-bin-ismail'];
    foreach ($slugs as $slug) {
        $this->get("/korporat/lembaga-pengarah/{$slug}")
            ->assertOk()
            ->assertSee('"@type":"Person"', false)
            ->assertInertia(fn ($p) => $p->component('Korporat/Leadership/Show')->where('director.slug', $slug));
        expect(file_exists(public_path("images/leadership/{$slug}.jpg")))->toBeTrue();
    }
});

it('404s an unknown director', function () {
    $this->get('/korporat/lembaga-pengarah/tiada')->assertNotFound();
});

it('leadership data has one source of truth with nine active directors', function () {
    $data = require resource_path('data/leadership.php');
    expect(collect($data)->where('status', 'active'))->toHaveCount(9);
});
