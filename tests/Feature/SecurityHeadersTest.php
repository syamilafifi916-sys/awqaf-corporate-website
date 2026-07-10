<?php

test('responses carry the baseline security headers', function () {
    $response = $this->get('/');

    $response->assertOk();
    $response->assertHeader('X-Content-Type-Options', 'nosniff');
    $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
    $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
    $response->assertHeader('Permissions-Policy', 'camera=(), geolocation=(), microphone=(), payment=()');
});

test('HSTS is not sent outside production', function () {
    $response = $this->get('/');

    expect($response->headers->has('Strict-Transport-Security'))->toBeFalse();
});
