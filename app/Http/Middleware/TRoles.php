<?php

namespace App\Http\Middleware;

use Closure;

class TRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        if (!auth()->user()->hasARole(explode('|', $roles))) {
            abort(401);
        }

        return $next($request);
    }
}
