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
        'client_id' => '755001047412-ccbkma21u13mbvtsdmld5v2avu4psui1.apps.googleusercontent.com',
        'client_secret' => '_GEPgvu_rHNVUAcT5vN-eGiK',
        'redirect' => 'https://moja.link/authorized/google/callback',
    ],

    'facebook' => [
        'client_id' => '318242009761030',
        'client_secret' => '45b4a20360437bcf1d24f77e4eeb100f',
        'redirect' => 'https://moja.link/facebook/callback',
    ],

];
