<?php

namespace App\Http\Middleware;

use Closure;

class CatalogView
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
        if(session('view.catalog') == null) {session()->put('view.catalog', 'grid');} // устанавливаем стандартный вид каталога

        return $next($request);
    }
}
