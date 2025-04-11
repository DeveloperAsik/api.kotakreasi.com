<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))->withRouting(
                web: __DIR__ . '/../routes/web.php',
                commands: __DIR__ . '/../routes/console.php',
                health: '/up',
        )->withMiddleware(function (Middleware $middleware) {
            $middleware->prepend(Authenticate::class);
            $middleware->use([
                \Illuminate\Session\Middleware\StartSession::class,
                \Illuminate\View\Middleware\ShareErrorsFromSession::class,
                \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
                \Illuminate\Http\Middleware\HandleCors::class,
                \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
                \Illuminate\Http\Middleware\FrameGuard::class,
                \Fruitcake\Cors\HandleCors::class,
                \App\Http\Middleware\Cors::class,
                \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
                \App\Http\Middleware\TrustProxies::class,
                \App\Http\Middleware\TrimStrings::class,
                \App\Http\Middleware\Authenticate::class
            ]);
        })->withExceptions(function (Exceptions $exceptions) {
            //
        })->create();
