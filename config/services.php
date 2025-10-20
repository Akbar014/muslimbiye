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
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID', '111594154296-9od9rbi096jiies1nc9b8e4p6563suko.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET', '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'),
        'redirect' => env('APP_URL', 'https://muslimbie.com').'/customer/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID','499552845600752'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET','0b5af382c5277a6296744f5afd2a6189'),
        'redirect' => env('APP_URL', 'https://muslimbie.com').'/auth/facebook/callback',
    ],

    'google_analytics' => [
        'credentials' => storage_path('app/google-analytics/credentials.json'),
        'property_id' => env('GOOGLE_ANALYTICS_PROPERTY_ID'),
    ],

];
