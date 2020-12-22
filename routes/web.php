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

    Route::resource('catalog/categories', 'Catalog\CategoriesController', ['as' => 'admin.catalog']);
    Route::resource('catalog/brands', 'Catalog\BrandsController', ['as' => 'admin.catalog']);
    Route::resource('catalog/products', 'Catalog\ProductsController', ['as' => 'admin.catalog']);
    Route::resource('catalog/attributes', 'Catalog\AttributesController', ['as' => 'admin.catalog']);
    Route::resource('catalog/attribute/{attribute}/values', 'Catalog\AttributeValuesController', ['as' => 'admin.catalog.attribute']);
    Route::resource('catalog/product/{product}/skus', 'Catalog\SkusController', ['as' => 'admin.catalog']);

    Route::resource('blog/categories', 'Blog\CategoriesController', ['as' => 'admin.blog']);
    Route::resource('blog/articles', 'Blog\ArticlesController', ['as' => 'admin.blog']); // статьи блога

    Route::resource('pages/main/slider', 'Pages\Main\SliderController', ['as' => 'admin.pages.main']);
});

// личный кабинет
Route::group(['middleware' => 'auth'], function () { // доступ авторизованным пользователям
    Route::get('/personal', 'PersonalController@index')->name('personal');
    Route::get('/personal/edit', 'PersonalController@edit')->name('personal_edit');
    Route::post('/personal/update', 'PersonalController@update')->name('personal_update');
});

// сайт
Route::get('/catalog', 'MainController@catalog')->name('catalog');
Route::get('/catalog/{category}', 'MainController@category')->name('category');
Route::get('/catalog/brand/{brand}', 'MainController@brand')->name('brand');
Route::get('/catalog/brand/{brand}/{category}', 'MainController@brandCategory')->name('brand_category');
Route::get('/catalog/{category}/{product}', 'MainController@product')->name('product');
Route::post('/catalog/sku', 'MainController@sku')->name('sku');

Route::get('/cart', 'CartController@cart')->name('cart');
Route::post('/cart/add', 'CartController@add')->name('cart_add'); // роут добавления товара в корзину post
Route::post('/cart/remove', 'CartController@remove')->name('cart_remove'); // роут удаления товара из корзины post
Route::post('/cart/update', 'CartController@update')->name('cart_update'); // роут обновления корзины
Route::get('/cart/clear', 'CartController@clear')->name('cart_clear'); // роут обновления корзины
Route::get('/checkout', 'CartController@checkout')->name('checkout'); // страница оформления заказа
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

