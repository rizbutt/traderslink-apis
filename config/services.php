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
    
    'firebase' => [
        'api_key' => 'AIzaSyBG78N2CA0cj7-Mr293Y6DT2Qh8XH-2ysk',
        'auth_domain' => 'innercity-3a92d.firebaseapp.com',
        'database_url' => 'https://innercity-3a92d-default-rtdb.firebaseio.com',
        'project_id' => 'innercity-3a92d',
        'storage_bucket' => 'innercity-3a92d.appspot.com',
        'messaging_sender_id' => '489819368551',
        'app_id' => '1:489819368551:web:a03b7bba1376e6b09ff8c2',
        'measurement_id' => 'G-XN5DNGCJF5',
    ],

];
