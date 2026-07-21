<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    // AWQAF Member Portal — the single identity authority for members
    // (ADR-001). Production: https://member.awqaf.my
    'portal' => [
        'url' => env('PORTAL_URL', 'http://localhost'),
        // Postponed for the static corporate release: when false, public
        // portal CTAs render a non-clickable "Akan Dibuka" status instead
        // of linking to an unavailable portal (AWQAF-CORPORATE-STATIC-001).
        'ready' => filter_var(env('PORTAL_READY', false), FILTER_VALIDATE_BOOL),
    ],

];
