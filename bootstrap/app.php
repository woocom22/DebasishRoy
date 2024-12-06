<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            'http://127.0.0.1:8000/user-registration',
            'http://127.0.0.1:8000/user-login',
            'http://127.0.0.1:8000/send-otp',
            'http://127.0.0.1:8000/verify-otp',
            'http://127.0.0.1:8000/reset-password'
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
