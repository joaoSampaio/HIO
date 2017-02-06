<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'sparkpost' => [
        'secret' => 'your-sparkpost-key',
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '948239501878979',
        'client_secret' => 'c48d7b6ef2d379c1dc9218863a394d20',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

//    'facebook' => [
//        'client_id' => '948239501878979',
//        'client_secret' => 'c48d7b6ef2d379c1dc9218863a394d20',
//        'redirect' => 'http://hio.mobilebysampaio.eu/auth/facebook/callback',
//    ],

];
