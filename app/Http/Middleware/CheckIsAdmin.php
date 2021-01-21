<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
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
        if(Auth::check()) { // проверка авторизации
            if(Auth::user()->privilege == 1) { // проверка на администратора
                return $next($request);
            }
        }

        return redirect()->route('index');
    }
}
