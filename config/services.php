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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'linkedin' => [
        'client_id' => '78x5ocu0ej2fv0',
        'client_secret' => 'ET1TvPKrnpahtKYU',
        'redirect' => 'http://th2-0.com/auth/linkedin/callback',
    ],

    'facebook' => [ 
        'client_id' => '896531404086997',
        'client_secret' => 'af3e7769b91a204affa4a68a65e6cd94',
        'redirect' => 'https://th2-0.com/auth/facebook/callback', 
    ],

    'google' => [ 
        'client_id' => env('GOOGLE_ID'),
        'client_secret' => env('GOOGLE_SECRET'),
        'redirect' => env('GOOGLE_URL'), 
    ],
];
