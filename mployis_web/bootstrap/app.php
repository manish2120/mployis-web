<?php

use App\Http\Middleware\PassUserId;
use Illuminate\Foundation\Application;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfNotAuthenticated;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'candidate_auth' => RedirectIfNotAuthenticated::class,
            'candidate_page_auth' => RedirectIfAuthenticated::class,
            'candidate_id' => PassUserId::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
