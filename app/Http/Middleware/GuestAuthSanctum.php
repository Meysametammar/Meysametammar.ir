<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GuestAuthSanctum
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->bearerToken()) {
            Auth::setUser(
                auth()
                    ->guard("sanctum")
                    ->user()
            );
            // Log::debug($request->bearerToken());
            // Log::debug(Auth::guard("sanctum")->check());
        }
        return $next($request);
    }
}
