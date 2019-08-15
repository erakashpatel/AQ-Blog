<?php

namespace AQ_Blog\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Carbon;
use Closure;

class LastUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            $expiresAt = Carbon::now()->addSecond();
            Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);
        }

        return $next($request);
    }
}
