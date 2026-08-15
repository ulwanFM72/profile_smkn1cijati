<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return redirect()->route('home')
                ->with('login_required', 'Silakan login terlebih dahulu untuk mengakses halaman admin.');
        }

        return $next($request);
    }
}
