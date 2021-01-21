<?php

namespace App\Http\Middleware;

use Closure;

class PersonalView
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
        if(session('view.personal') == null) {session()->put('view.personal', 'orders');}

        return $next($request);
    }
}
