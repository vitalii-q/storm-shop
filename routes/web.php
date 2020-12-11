<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'MainController@index')->name('index');

Route::get('/logout', 'Auth\LoginController@logout')->name('get_logout'); // разлогинится

Route::get('/admin', 'AdminController@index')->name('admin');
Route::group(['middleware' => 'auth'], function () { // доступ авторизованным пользователям

    Route::get('/personal', 'PersonalController@index')->name('personal');
});

Route::get('/catalog', 'MainController@catalog')->name('catalog');
Route::get('/catalog/{category}', 'MainController@category')->name('category');
Route::get('/catalog/brand/{brand}', 'MainController@brand')->name('brand');
Route::get('/catalog/brand/{brand}/{category}', 'MainController@brandCategory')->name('brand_category');
Route::get('/catalog/{category}/{product}', 'MainController@product')->name('product');

Route::get('/cart', 'CartController@cart')->name('cart');
Route::post('/cart/add', 'CartController@add')->name('cart_add'); // роут добавления товара в корзину post
Route::post('/cart/remove', 'CartController@remove')->name('cart_remove'); // роут удаления товара из корзины post
Route::post('/cart/update', 'CartController@update')->name('cart_update'); // роут обновления корзины
Route::get('/cart/clear', 'CartController@clear')->name('cart_clear'); // роут обновления корзины
Route::get('/checkout', 'CartController@checkout')->name('checkout'); // страница оформления заказа
Route::get('/buy', 'CartController@buy')->name('buy'); // оформление заказа

Route::get('/about', 'MainController@about')->name('about');

Route::get('/blog', 'MainController@blog')->name('blog');
Route::get('/blog/category/{blog}', 'MainController@blogCategory')->name('blog_category');
Route::get('/blog/{article}', 'MainController@article')->name('article');

Route::get('/contacts', 'MainController@contacts')->name('contacts');
Route::post('/contacts/submit', 'FormsController@contactMessage')->name('contacts_submit');

Route::post('/subscription', 'FormsController@subscription')->name('subscription');


