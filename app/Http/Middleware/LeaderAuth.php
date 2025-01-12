<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class LeaderAuth
{ 
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('leader')->check()) {
            return redirect()->route('leader.login');
        }

        return $next($request);
    }
}
