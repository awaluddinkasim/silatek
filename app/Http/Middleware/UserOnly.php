<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->guard('user')->check()) {
            return $next($request);
        }

        if (auth()->guard('dekan')->check() || auth()->guard('admin')->check() || auth()->guard('staf')->check()) {
            abort(403, 'Halaman ini hanya dapat diakses oleh mahasiswa');
        }

        session(['url.intended' => $request->url()]);

        return to_route('login');
    }
}
