<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('auth.login');
        }

        if (Auth::user()->role !== $role) {
            return redirect()->route('auth.login')->with('error', 'Anda tidak punya akses!');
        }

        return $next($request);
    }
}
