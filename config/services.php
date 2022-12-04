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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '116714953964-v32t49fc9v7bp54pmh3t4bb1ckvd81sa.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/login/callback/google',
    ],

    'facebook' => [
        'client_id' => '975627760062085',
        'client_secret' => 'da5098ffd38ee1562075196a45659ce2',
        'redirect' => 'http://127.0.0.1:8000/login/callback/facebook',
    ],

];
