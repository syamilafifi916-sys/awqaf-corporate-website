<?php

return [
    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        // Keep compatibility with the existing production variable name.
        'key' => env('RESEND_API_KEY', env('RESEND_KEY')),
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

    'portal' => [
        'url' => env('PORTAL_URL', 'http://localhost'),
        'ready' => filter_var(env('PORTAL_READY', false), FILTER_VALIDATE_BOOL),
    ],

    'reports' => [
        'base_url' => env('REPORTS_BASE_URL'),
    ],
];
