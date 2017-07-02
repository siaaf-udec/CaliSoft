<?php

namespace App\Http\Middleware;

use Closure;

class CheckProject
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
          $user = $request->user();
          return $user->FK_ProyectoId ? $user->goHome() : $next($request);
    }
}
