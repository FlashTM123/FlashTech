<?php

use App\Http\Middleware\AdminLoginMiddleware;
use App\Http\Middleware\CustomerLoginMiddleware;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(callback: function (Middleware $middleware) {
        $middleware->alias([
            'adminLoginMiddleware' => AdminLoginMiddleware::class,
            'customerLoginMiddleware' => CustomerLoginMiddleware::class,
            'role' => RoleMiddleware::class,
        ]);

})
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
