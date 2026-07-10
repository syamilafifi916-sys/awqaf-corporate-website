<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), geolocation=(), microphone=(), payment=()');

        // HSTS only in production over HTTPS — enabling it on localhost
        // would poison the browser's HTTPS cache for local development.
        if (app()->environment('production') && $request->secure()) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }

        // Full CSP with nonces is a deployment-hardening task (see
        // deployment-runbook.md) — Vite/Inertia inline scripts need nonce
        // plumbing before a strict CSP can be enabled without breakage.

        return $response;
    }
}
