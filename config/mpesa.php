<?php

// return [
//     'env' => env('MPESA_ENV', 'sandbox'),
//     'consumer_key' => env('MPESA_CONSUMER_KEY'),
//     'consumer_secret' => env('MPESA_CONSUMER_SECRET'),
//     'business_shortcode' => env('MPESA_BUSINESS_SHORTCODE'),
//     'lipa_na_mpesa_passkey' => env('MPESA_LIPA_NA_MPESA_PASSKEY'),
//     'callback_url' => env('MPESA_CALLBACK_URL'),

//     'api_endpoints' => [
//         'sandbox' => 'https://sandbox.safaricom.co.ke',
//         'production' => 'https://api.safaricom.co.ke',
//     ],
// ];

return [
    'env' => env('MPESA_ENV', 'sandbox'),
    'consumer_key' => env('MPESA_CONSUMER_KEY'),
    'consumer_secret' => env('MPESA_CONSUMER_SECRET'),
    'business_shortcode' => env('MPESA_BUSINESS_SHORTCODE', '174379'),
    'lipa_na_mpesa_passkey' => env('MPESA_LIPA_NA_MPESA_PASSKEY', 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919'),
    'callback_url' => env('MPESA_CALLBACK_URL', 'https://yourdomain.com/mpesa/callback'),
    
    'api_endpoints' => [
        'sandbox' => 'https://sandbox.safaricom.co.ke',
        'production' => 'https://api.safaricom.co.ke',
    ],
    
    'test_credentials' => [
        'phone' => '254708374149',
        'amount' => 1
    ]
];
