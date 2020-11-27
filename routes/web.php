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

Route::get('/', function () {
    return view('fronts.home.index');
});
// Route::get('/admin', function () {
//     return view('dashboards.layout.index')->name('dashboards.layout.index');
// });
//AUth
Route::get('/login','Auth\LoginController@showLoginForm')->name('form-login');
Route::post('/login','Auth\LoginController@login')->name('login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('form-register');
Route::post('/register','Auth\RegisterController@register')->name('register');

//admin
Route::get('/admin','Dashboard\HomeController@index')->name('admin-dashboard');

//Front
Route::get('/product','Front\ProductController@index')->name('list-product');
Route::get('/product/{id}/detail','Front\ProductController@productDetail')->name('product.detail');


//homepage
Route::get('/','Front\HomeController@index')->name('front-dashboard');



Auth::routes();

Route::get('/admin/list_role', 'Dashboard\RoleController@index')->name('dashboards.roles.list_role');

Route::get('/admin/list_address', 'Dashboard\AddressController@index')->name('dashboards.addresses.list_address');

Route::get('/admin/list_author', 'Dashboard\AuthorController@index')->name('dashboards.authors.list_author');

Route::get('/admin/list_publisher', 'Dashboard\PublisherController@index')->name('dashboards.publishers.list_publisher');

Route::get('/admin/list_category', 'Dashboard\CategoryController@index')->name('dashboards.categories.list_category');

Route::get('/admin/list_user', 'Dashboard\UserController@index')->name('dashboards.users.list_user');

Route::get('/admin/list_orderAddress', 'Dashboard\OrderAddressController@index')->name('dashboards.orderAddresses.list_orderAddress');

Route::get('/admin/list_orderDetail', 'Dashboard\OrderDetailController@index')->name('dashboards.orderDetails.list_orderDetail');

Route::get('/admin/list_order', 'Dashboard\OrderController@index')->name('dashboards.orders.list_order');

Route::get('/admin/list_product', 'Dashboard\ProductController@index')->name('dashboards.products.list_product');

Route::get('/admin/list_review', 'Dashboard\ReviewController@index')->name('dashboards.reviews.list_review');

//Create:

Route::get('/admin/create_role', 'Dashboard\RoleController@create')->name('dashboards.roles.create_role');

Route::get('/admin/create_address', 'Dashboard\AddressController@create')->name('dashboards.addresses.create_address');

Route::get('/admin/create_author', 'Dashboard\AuthorController@create')->name('dashboards.authors.create_author');

Route::get('/admin/create_publisher', 'Dashboard\PublisherController@create')->name('dashboards.publishers.create_publisher');

Route::get('/admin/create_category', 'Dashboard\CategoryController@create')->name('dashboards.categories.create_category');

Route::get('/admin/create_user', 'Dashboard\UserController@create')->name('dashboards.users.create_user');

Route::get('/admin/create_orderAddress', 'Dashboard\OrderAddressController@create')->name('dashboards.orderAddresses.create_orderAddress');

Route::get('/admin/create_orderDetail', 'Dashboard\OrderDetailController@create')->name('dashboards.orderDetails.create_orderDetail');

Route::get('/admin/create_order', 'Dashboard\OrderController@create')->name('dashboards.orders.create_order');

Route::get('/admin/create_product', 'Dashboard\ProductController@create')->name('dashboards.products.create_product');

Route::get('/admin/create_review', 'Dashboard\ReviewController@create')->name('dashboards.reviews.create_review');

//Store:

Route::post('/admin/list_role', 'Dashboard\RoleController@store')->name('dashboards.roles.store');

Route::post('/admin/list_address', 'Dashboard\AddressController@store')->name('dashboards.addresses.store');

Route::post('/admin/list_author', 'Dashboard\AuthorController@store')->name('dashboards.authors.store');

Route::post('/admin/list_publisher', 'Dashboard\PublisherController@store')->name('dashboards.publishers.store');

Route::post('/admin/list_category', 'Dashboard\CategoryController@store')->name('dashboards.categories.store');

Route::post('/admin/list_user', 'Dashboard\UserController@store')->name('dashboards.users.store');

Route::post('/admin/list_orderAddress', 'Dashboard\OrderAddressController@store')->name('dashboards.orderAddresses.store');

Route::post('/admin/list_orderDetail', 'Dashboard\OrderDetailController@store')->name('dashboards.orderDetails.store');

Route::post('/admin/list_order', 'Dashboard\OrderController@store')->name('dashboards.orders.store');

Route::post('/admin/list_product', 'Dashboard\ProductController@store')->name('dashboards.products.store');

Route::post('/admin/list_review', 'Dashboard\ReviewController@store')->name('dashboards.reviews.store');

//Edit:

Route::get('/admin/{id}/edit_role', 'Dashboard\RoleController@edit')->name('dashboards.roles.edit_role');

Route::get('/admin/{id}/edit_address', 'Dashboard\AddressController@edit')->name('dashboards.addresses.edit_address');

Route::get('/admin/{id}/edit_author', 'Dashboard\AuthorController@edit')->name('dashboards.authors.edit_author');

Route::get('/admin/{id}/edit_publisher', 'Dashboard\PublisherController@edit')->name('dashboards.publishers.edit_publisher');

Route::get('/admin/{id}/edit_category', 'Dashboard\CategoryController@edit')->name('dashboards.categories.edit_category');

Route::get('/admin/{id}/edit_user', 'Dashboard\UserController@edit')->name('dashboards.users.edit_user');

Route::get('/admin/{id}/edit_orderAddress', 'Dashboard\OrderAddressController@edit')->name('dashboards.orderAddresses.edit_orderAddress');

Route::get('/admin/{id}/edit_orderDetail', 'Dashboard\OrderDetailController@edit')->name('dashboards.orderDetails.edit_orderDetail');

Route::get('/admin/{id}/edit_order', 'Dashboard\OrderController@edit')->name('dashboards.orders.edit_order');

Route::get('/admin/{id}/edit_product', 'Dashboard\ProductController@edit')->name('dashboards.products.edit_product');

Route::get('/admin/{id}/edit_review', 'Dashboard\ReviewController@edit')->name('dashboards.reviews.edit_review');

//Update:

Route::put('/admin/{id}/list_role', 'Dashboard\RoleController@update')->name('dashboards.roles.update');

Route::put('/admin/{id}/list_address', 'Dashboard\AddressController@update')->name('dashboards.addresses.update');

Route::put('/admin/{id}/list_author', 'Dashboard\AuthorController@update')->name('dashboards.authors.update');

Route::put('/admin/{id}/list_publisher', 'Dashboard\PublisherController@update')->name('dashboards.publishers.update');

Route::put('/admin/{id}/list_category', 'Dashboard\CategoryController@update')->name('dashboards.categories.update');

Route::put('/admin/{id}/list_user', 'Dashboard\UserController@update')->name('dashboards.users.update');

Route::put('/admin/{id}/list_orderAddress', 'Dashboard\OrderAddressController@update')->name('dashboards.orderAddresses.update');

Route::put('/admin/{id}/list_orderDetail', 'Dashboard\OrderDetailController@update')->name('dashboards.orderDetails.update');

Route::put('/admin/{id}/list_order', 'Dashboard\OrderController@update')->name('dashboards.orders.update');

Route::put('/admin/{id}/list_product', 'Dashboard\ProductController@update')->name('dashboards.products.update');

Route::put('/admin/{id}/list_review', 'Dashboard\ReviewController@update')->name('dashboards.reviews.update');

//Destroy:

Route::delete('/admin/{id}/list_role', 'Dashboard\RoleController@destroy')->name('dashboards.roles.destroy');

