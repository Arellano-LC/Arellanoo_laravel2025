<?php

// app/Http/Middleware/EnsureUserIsAuthenticated.php
namespace App\Http\Middleware;

use Closure;

class EnsureUserIsAuthenticated
{
    public function handle($request, Closure $next)
    {
        if (!session('user_id')) {
            return redirect()->route('login')->withErrors('Please login to access that page.');
        }

        return $next($request);
    }
}
