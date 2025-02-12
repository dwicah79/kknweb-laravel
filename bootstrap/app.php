<?php

use App\Http\Middleware\RoleMiddleware as CustomRoleMiddleware;
use Illuminate\Foundation\Application;
use Spatie\Permission\Middleware\RoleMiddleware as SpatieRoleMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => CustomRoleMiddleware::class, // Gunakan alias untuk middleware custom
            'spatie.role' => SpatieRoleMiddleware::class, // Alias untuk middleware dari Spatie
            'permission' => PermissionMiddleware::class, // Middleware permission dari Spatie
            'sweetalert' => \RealRashid\SweetAlert\ToSweetAlert::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
