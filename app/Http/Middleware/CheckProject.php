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
           
          if( count($user->projects()->get()) > 0 ){
              return redirect()->route('mensaje'); 
          } else{
              return $next($request);
          }
    }
}
