<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/Api/user-subscribe',
        '/Api/verify-otp',
        '/Api/resend-otp',
        '/Api/insert-data',
        'Api/*'
    ];
}
