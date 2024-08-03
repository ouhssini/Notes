<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Unverified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->email_verified_at !== null && $request->routeIs('verification.notice')) {
            return to_route('homepage');
        } elseif (Auth::user()->email_verified_at == null) {
            return redirect()->route('verification.notice');
        } else {
          return $next($request);
        }
    }
}
