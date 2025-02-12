<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!auth()->check() || !auth()->user()->hasRole($role)) {
            Alert::error('Error', 'Anda Tidak Memiliki Akses Ke Halaman Ini !!!');

            return redirect()->route('dashboard.index')->with('error', 'Anda Tidak Memiliki Akses Ke Halaman Ini !!!');
        }

        return $next($request);
    }
}
