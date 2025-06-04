<?php

use App\Http\Middleware\UserOnly;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'user-only' => UserOnly::class,
        ]);

        RedirectIfAuthenticated::redirectUsing(function () {
            if (Auth::guard('admin')->check()) {
                return route('admin.dashboard');
            } elseif (Auth::guard('dekan')->check()) {
                return route('dekan.dashboard');
            } elseif (Auth::guard('staf')->check()) {
                return route('staf.dashboard');
            } elseif (Auth::guard('user')->check()) {
                return route('index');
            } else {
                Auth::logout();
                return route('login');
            }
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
