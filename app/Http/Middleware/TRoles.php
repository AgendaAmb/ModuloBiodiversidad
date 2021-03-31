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
    public function handle($request, Closure $next,string $roles)
    {
        
        if (!auth()->user()->hasRole($roles)) {
            abort(401);
        }
        return $next($request);
    }
}
