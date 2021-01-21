<?php

namespace App\Http\Middleware;

use Closure;

class SearchView
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
        if(session('view.search') == null) {session()->put('view.search', 'catalog');}

        return $next($request);
    }
}
