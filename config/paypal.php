<?php

return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'),
    'sandbox' => [
        'client_id'      => env('PAYPAL_SANDBOX_CLIENT_ID', ''),
        'secret_key'      => env('PAYPAL_SANDBOX_CLIENT_SECRET', ''),
    ],
    'live' => [
        'client_id'      => env('PAYPAL_LIVE_CLIENT_ID', ''),
        'secret_key'      => env('PAYPAL_LIVE_CLIENT_SECRET', ''),
    ],
];
