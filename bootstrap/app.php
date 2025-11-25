<?php

use App\Http\Middleware\CheckMembership;
use App\Http\Middleware\IsAuth;
use App\Http\Middleware\HstsMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //

        $middleware->alias(
            [
                'isMember' => CheckMembership::class,
                'isAuth' => IsAuth::class,
                'hsts' => HstsMiddleware::class
            ]

        );
        $middleware->append(HstsMiddleware::class);
        $middleware->validateCsrfTokens(except: [

            'stripe/*',

            'http://example.com/foo/bar',

            'http://example.com/foo/*',
            'http://simple-movie.test/*'

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
