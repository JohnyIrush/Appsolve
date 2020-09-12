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
    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('pk_test_51H9qTECmoUmjZivfKU4rPUUpjCxOW3obeJS07Yspbj3f3M1QyYITbxiBjliGJfYq4pdMSs1pg36Dx2JpN9Ir7UHn00Z5hpub3d'),
        'secret' => env('sk_test_51H9qTECmoUmjZivffN9vpQY2Jlj1388UY1MgpW8Bs4EJxDVR7EsVoW9kNwYn0wnkRQIiDjqUIT5iq0FDTwdaX7R300zT50QHkU'),
    ],
    
    'github' => [
        'client_id' =>env('GITHUB_CLIENT'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => env('GITHUB_REDIRECT_URL')
    ]

    
];
