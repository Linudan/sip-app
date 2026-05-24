<?php

use App\Http\Middleware\AdminPanelAccess;
use App\Http\Middleware\CheckProfileCompletion;
use App\Http\Middleware\UserPanelAccess;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin.panel' => AdminPanelAccess::class,
            'user.panel' => UserPanelAccess::class,
            'profile.complete' => CheckProfileCompletion::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
