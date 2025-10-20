<?php
return [
    'analytics' => [
        'credentials' => storage_path('app/google-analytics/credentials.json'),
        'property_id' => env('GOOGLE_ANALYTICS_PROPERTY_ID'),
    ],
];
