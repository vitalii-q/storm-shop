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

Route::get('/logout', 'Auth\LoginController@logout')->name('get_logout'); // разлогинится
Route::get('/locale', 'MainController@changeLocale')->name('locale'); // смена локализации
Route::get('/currency', 'MainController@changeCurrency')->name('currency'); // смена валюты

Route::group(['middleware' => 'SetLocale'], function () { // локализированные страницы
    Auth::routes();

    Route::get('/', 'MainController@index')->name('index');

    // личный кабинет
    Route::group(['middleware' => 'auth'], function () { // доступ авторизованным пользователям
        Route::group(['middleware' => 'PersonalView'], function () {
            Route::get('/personal/{user_id}', 'PersonalController@index')->name('personal');
            Route::get('/personal/{user_id}/order/{order_id}', 'PersonalController@order')->name('personal_order');
            Route::get('/personal/{user_id}/edit', 'PersonalController@edit')->name('personal_edit');
            Route::post('/personal/update', 'PersonalController@update')->name('personal_update');
            Route::post('/personal/view', 'PersonalController@view'); // переключатель вида
            Route::post('/desire', 'DesiresController@desire'); // добавление желания
        });

        Route::get('/personal/{user_id}/desires', 'PersonalController@index')->name('desires')->middleware('PersonalDesiresView'); // вид желаний
    });

    // сайт
    Route::group([
        'middleware' => 'catalogView', // вид каталога
        'prefix' => 'catalog',
    ], function () {
        Route::get('/', 'MainController@catalog')->name('catalog');
        Route::post('view', 'MainController@catalogView');
        Route::post('filter', 'FilterController@filter');
        Route::post('filter/reset', 'FilterController@filterReset'); // сброс фильтра
        Route::get('{category}', 'MainController@category')->name('category');
        Route::get('brand/{brand}', 'MainController@brand')->name('brand');
        Route::get('brand/{brand}/{category}', 'MainController@brandCategory')->name('brand_category');
        Route::get('{category}/{product}', 'MainController@product')->name('product');
        Route::post('sku', 'MainController@sku')->name('sku');
    });

    Route::get('/cart', 'CartController@cart')->name('cart')->middleware('CheckCartIsNotEmpty');
    Route::post('/cart/add', 'CartController@add')->name('cart_add'); // роут добавления товара в корзину post
    Route::post('/cart/remove', 'CartController@remove')->name('cart_remove'); // роут удаления товара из корзины post
    Route::post('/cart/update', 'CartController@update')->name('cart_update'); // роут обновления корзины
    Route::post('/cart/check', 'CartController@check'); // роут проверки sku в корзине
    Route::post('/cart/get/skuinfo', 'CartController@getAttributesNameAndValuesName'); // получить имена атрибутов и значений
    Route::get('/cart/clear', 'CartController@clear')->name('cart_clear'); // роут обновления корзины
    Route::get('/checkout', 'CartController@checkout')->name('checkout')->middleware('CheckCartIsNotEmpty'); // страница оформления заказа
    Route::get('/buy', 'CartController@buy')->name('buy'); // оформление заказа

    Route::get('/about', 'MainController@about')->name('about');

    Route::get('/blog', 'BlogController@blog')->name('blog');
    Route::post('/blog/tag', 'BlogController@ajaxBlog')->name('ajax_blog');
    Route::get('/blog/tag/{tag}', 'BlogController@tagBlog')->name('tag_blog');
    Route::get('/blog/category/{blog}', 'BlogController@blogCategory')->name('blog_category');
    Route::get('/blog/{article}', 'BlogController@article')->name('article');
    Route::post('/blog/comment', 'BlogController@comment')->name('comment');

    Route::get('/contacts', 'MainController@contacts')->name('contacts');
    Route::post('/contacts/submit', 'FormsController@contactMessage')->name('contacts_submit');

    Route::post('/subscription', 'FormsController@subscription')->name('subscription');

    Route::get('/search', 'SearchController@index')->name('search')->middleware('SearchView');
    Route::post('/search/view', 'SearchController@searchView');
});

// админ панель
Route::group([
    'middleware' => ['admin', 'AdminPanelView'], // доступ администрации
    'namespace' => 'Admin',
    'prefix' => 'admin',
], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::post('view', 'AdminController@view');
    Route::resource('notifications', 'NotificationController', ['as' => 'admin']);

    Route::resource('/orders', 'OrderController', ['as' => 'admin']);

    Route::resource('catalog/categories', 'Catalog\CategoriesController', ['as' => 'admin.catalog']);
    Route::resource('catalog/brands', 'Catalog\BrandsController', ['as' => 'admin.catalog']);
    Route::resource('catalog/products', 'Catalog\ProductsController', ['as' => 'admin.catalog']);
    Route::resource('catalog/attributes', 'Catalog\AttributesController', ['as' => 'admin.catalog']);
    Route::resource('catalog/attribute/{attribute}/values', 'Catalog\AttributeValuesController', ['as' => 'admin.catalog.attribute']);
    Route::resource('catalog/product/{product}/skus', 'Catalog\SkusController', ['as' => 'admin.catalog']);

    Route::resource('blog/categories', 'Blog\CategoriesController', ['as' => 'admin.blog']);
    Route::resource('blog/articles', 'Blog\ArticlesController', ['as' => 'admin.blog']); // статьи блога
    Route::resource('blog/tags', 'Blog\TagsController', ['as' => 'admin.blog']); // статьи блога

    Route::resource('pages/main/slider', 'Pages\Main\SliderController', ['as' => 'admin.pages.main']);
});

Route::fallback(function(){ return response()->view('errors.404', [], 404); }); // добавил для видимости авторизованного пользователя на странице 404
