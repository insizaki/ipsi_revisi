<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MahasiswaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth('mahasiswa')->check() && auth('mahasiswa')->user()->isMahasiswa()) {
            return $next($request);
        }
        return redirect('/mahasiswa/dashboard'); // Sesuaikan dengan halaman atau tindakan yang sesuai
    }
}
