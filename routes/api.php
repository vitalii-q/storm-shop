<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * API с ауентификацией
 * http://storm-shop.loc/api/user/2?api_token=fdgjkcrt439dfsjy3c9vme39bdxeb428
 */
Route::middleware('auth_api')->match(['post', 'get'], '/user/{id}', function (Request $request, $id) {
    $user = \App\Models\User::find($id);
    if(!$user) return response('', 404);
    return $user;
});
