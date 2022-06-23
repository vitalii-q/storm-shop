<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateApi extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        $request->query('api_token');
        if(empty($token)) {
            $token = $request->input('api_token');
        }
        if(empty($token)) {
            $token = $request->bearerToken();
        }

        if($token === config('apitokens')[0]) return;
        $this->unauthenticated($request, $guards);
    }
}
