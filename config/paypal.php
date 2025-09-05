<?php

return [
    'base_url' => env('PAYPAL_MODE', 'sandbox') === 'sandbox' ? 'https://api-m.sandbox.paypal.com' : 'https://api-m.paypal.com',
    'mode'      => env('PAYPAL_MODE', 'sandbox'), // sandbox or live
    'client_id' => env('PAYPAL_CLIENT_ID', ''),
    'secret'    => env('PAYPAL_SECRET', ''),
    'currency'  => env('PAYPAL_CURRENCY', 'USD'),
];
