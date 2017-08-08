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
    public function handle($request, Closure $next)
    {
        $roles = array_slice(func_get_args(), 2);
        
        if (array_search($request->user()->role, $roles) === FALSE) {
            return abort(403);
        }

        $response = $next($request);
        return $response->header("Cache-Control", "no-cache, no-store, must-revalidate");
    }
}
