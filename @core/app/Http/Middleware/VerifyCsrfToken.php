<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $addHttpCookie = true;
    protected $except = [
       'paytm-ipn',
       'paypal-ipn',
       'admin-home/payment/cashfree-ipn',
        'admin-home/payment/sslcommerz/success',
        'admin-home/payment/sslcommerz/failure',
    ];
}
