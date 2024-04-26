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
        $middleware->alias([
            'auth.cliente' => \App\Http\Middleware\RedirectCliente::class,
            'auth.contador' => \App\Http\Middleware\RedirectContador::class,
            'auth.encargado' => \App\Http\Middleware\RedirectEncargado::class,
            'auth.supervisor' => \App\Http\Middleware\RedirectSupervisor::class,
            'auth.vendedor' => \App\Http\Middleware\RedirectVendedor::class,
          ]);
        })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
