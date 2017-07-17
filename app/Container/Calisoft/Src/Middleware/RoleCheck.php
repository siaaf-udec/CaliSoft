<?php

namespace App\Container\Calisoft\Src\Middleware;

use Closure;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if($request->user()->role != $role) return abort(403);

        $response = $next($request);
        return $response->header("Cache-Control", "no-cache, no-store, must-revalidate");
    }
}
