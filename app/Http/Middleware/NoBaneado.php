<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class NoBaneado
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
        if (Auth::user() &&  Auth::user()->fecha_de_baneo==null) {
            return $next($request);
        }
        return redirect()->route('baneado');
    }
}
