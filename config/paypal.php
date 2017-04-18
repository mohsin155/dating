<?php

return [
    'username' => env('PAYPAL_API_USERNAME','mohsinhassanme_api1.gmail.com'),
    'password' => env('PAYPAL_API_PASSWORD','GGS6ZSZKBT3SE8YW'),
    'signature' => env('PAYPAL_API_SIGNATURE','AFcWxV21C7fd0v3bYYYRCpSSRl31AdtZUxYqvTJ4OuY.GN8rwCwA95.M'),
    'app_id' => env('PAYPAL_APP_ID',''), // Used for testing Adaptive Payments API in sandbox mode
    'api_url' => env('PAYPAL_API_URL','https://api-3t.sandbox.paypal.com/nvp'),
    'currency' => 'USD',
    'locale' => 'en_US', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    'express_url' => 'https://www.sandbox.paypal.com/cgi-bin/webscr',
];
