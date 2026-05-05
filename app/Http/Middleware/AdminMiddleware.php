<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     * Hanya user dengan role 'admin' yang bisa mengakses.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Halaman ini khusus untuk Admin.');
        }

        return $next($request);
    }
}
