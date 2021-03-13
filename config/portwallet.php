<?php
$route = env('APP_URL', 'http://localhost:8000');
return [
    'app_key' => env('PORTWALLET_KEY', '7b4d31f390ec93726b05fd30b5504457'),
    'app_secret_key' => env('PORTWALLET_SECRET_KEY', '85cb1de47d5bd9a3eaedbbc60b649bf3'),
    'time' => time(),
    'currency' => 'BDT',
    'payment_url' => env('PORTWALLET_PAYMENT_URL', 'https://payment.portwallet.com/payment/'),
    'redirect_url' => env('PORTWALLET_REDIRECT_URL', $route.'/payment/transaction/verify')
];