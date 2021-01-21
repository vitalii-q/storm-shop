<?php

namespace App\Http\Middleware;

use Closure;

class CheckCartIsNotEmpty
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
        if(session('cart.products') == null) {
            return redirect()->back();
        }

        return $next($request);
    }
}
