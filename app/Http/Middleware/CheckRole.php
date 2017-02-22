<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        if($request->user()->type != $role){

            return \Redirect::away('https://www.youtube.com/watch?v=pXMQQE7ZeJo');
        }
        return $next($request);
    }

}
