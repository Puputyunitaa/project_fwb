<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\LogMiddleware;
use App\Http\Middleware\StafMiddleware;
use App\Http\Middleware\SupervisorMiddleware;
use Illuminate\Auth\Middleware\Authenticate;
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
        $middleware->alias([
            'admin' => AdminMiddleware::class,
            'staf' => StafMiddleware::class,
            'supervisor' => SupervisorMiddleware::class,
            'log' => LogMiddleware::class,
            'auth' => Authenticate::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
