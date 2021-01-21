<?php

namespace App\Http\Middleware;

use Closure;

class AdminPanelView
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
        if(session('view.admin_panel') == null) {
            session()->put('view.admin_panel', 'sidebar');
        }

        return $next($request);
    }
}
