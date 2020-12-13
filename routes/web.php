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

// админ панель
Route::group([
    'middleware' => 'admin', // доступ администрации
    'namespace' => 'Admin',
    'prefix' => 'admin',
], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/orders', 'AdminController@orders')->name('admin_orders');

    Route::resource('catalog/categories', 'Catalog\CategoryController', ['names' => [ // категории каталога
        'index' => 'admin.catalog.categories.index',
        'create' => 'admin.catalog.categories.create',
        'store' => 'admin.catalog.categories.store',
        'edit' => 'admin.catalog.categories.edit',
        'update' => 'admin.catalog.categories.update',
        'destroy' => 'admin.catalog.categories.destroy',
    ]]);

    Route::resource('blog/categories', 'Blog\CategoryController', ['names' => [ // категории блога
        'index' => 'admin.blog.categories.index',
        'create' => 'admin.blog.categories.create',
        'store' => 'admin.blog.categories.store',
        'edit' => 'admin.blog.categories.edit',
        'update' => 'admin.blog.categories.update',
        'destroy' => 'admin.blog.categories.destroy',
    ]]);

    Route::resource('blog/articles', 'Blog\ArticlesController', ['names' => [ // статьи блога
        'index' => 'admin.blog.articles.index',
        'create' => 'admin.blog.articles.create',
        'store' => 'admin.blog.articles.store',
        'edit' => 'admin.blog.articles.edit',
        'update' => 'admin.blog.articles.update',
        'destroy' => 'admin.blog.articles.destroy',
    ]]);
});

// личный кабинет
Route::group(['middleware' => 'auth'], function () { // доступ авторизованным пользователям
    Route::get('/personal', 'PersonalController@index')->name('personal');
});

// сайт
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

