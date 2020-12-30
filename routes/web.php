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
Route::get('/passwords','Auth\ForgotPasswordController@getFormResetPassword')->name('get-reset-password');
Route::post('/passwords','Auth\ForgotPasswordController@sendResetPassword')->name('send-reset-password');
Route::get('/passwords/reset','Auth\ForgotPasswordController@resetPassword')->name('reset-password');
Route::get('/passwords/link','Auth\ForgotPasswordController@resetLinkPassword')->name('link-password');
Route::post('/passwords/reset','Auth\ForgotPasswordController@saveResetPassword')->name('save-password');

//send-mail
Route::get('/contact-us','Front\HomeController@showContactForm')->name('form-contact');
Route::post('contact-us','Front\HomeController@sendEmail')->name('send-contact');
//Front
//show product
Route::get('/product','Front\ProductController@index')->name('list-product');
Route::get('/product/items','Front\ProductController@getListProduct')->name('list-items');
//show product category
Route::get('/product/{id}','Front\ProductController@cateProduct')->name('cate-product');
//show infomation user detail
// Route::get('/user/infomation/','Front\UserController@index')->name('userr-infomation');
Route::get('/user/{id}/infomation','Front\UserController@show')->name('user-infomation');
//Route::get('/user/{id}/','Front\UserController@show')->name('show-user-detail');
//show edit user
// Route::get('/user/{id}/detail','Front\UserController@edit')->name('user-edit');
//update infomation
Route::put('/user/{id}','Front\UserController@update')->name('user-update');
//show detail product
Route::get('/product/{id}/detail','Front\ProductController@productDetail')->name('product.detail');
//show book new
Route::get('/product/new','Front\ProductController@newBook')->name('product.new');

//comment
Route::post('/comment/{id}','Front\CommentController@comment')->name('comment');

//Cart
Route::post('/add-cart-ajax','Front\CartController@add_cart_ajax')->name('add-cart');
Route::get('/show-cart-items','Front\CartController@showCartbyAjax')->name('show-cartt');//show cart ajax
Route::post('/update-cart','Front\CartController@updateCarbyAjax')->name('update-cart');
Route::get('/delete-cart/{session_id}','Front\CartController@deleteCart')->name('delete-cart');
Route::get('/reset','Front\CartController@deleteAll')->name('reset-items');

Route::post('/save-cart','Front\CartController@save_cart')->name('save-cart');
Route::get('/show-cart','Front\CartController@index')->name('show-cart');
Route::get('/delete-to-cart/{rowId}','Front\CartController@deleteToCart')->name('delete-to-cart');
Route::post('/update-to-cart','Front\CartController@updateQuantityToCart')->name('update-to-cart-quantity');

//Checkout
Route::get('/show-checkout','Front\OrderController@index')->name('show-checkout');
Route::post('/show-payment','Front\OrderController@show')->name('show-payment');
Route::post('/save-checkout-order','Front\OrderController@save_checkout')->name('save-checkout');


//homepage
Route::get('/','Front\HomeController@index')->name('front-dashboard');

//Search
Route::post('/search','Front\HomeController@search')->name('get-search');
//search autocomplete
Route::post('/autocomplete','Front\HomeController@searchauto')->name('searchcomplete');

Auth::routes();

//Admin-User:
Route::get('/admin','Dashboard\HomeController@index')->name('admin-dashboard');//dashboard

Route::get('/login','Auth\LoginController@showLoginForm')->name('form-login');

Route::post('/login','Auth\LoginController@login')->name('login');

Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('form-register');

Route::post('/register','Auth\RegisterController@register')->name('register');

//List:

Route::get('/admin/list_role', 'Dashboard\RoleController@index')->name('dashboards.roles.list_role');

Route::get('/admin/list_author', 'Dashboard\AuthorController@index')->name('dashboards.authors.list_author');//->middleware('isAdmin')

Route::get('/admin/list_publisher', 'Dashboard\PublisherController@index')->name('dashboards.publishers.list_publisher');//->middleware('isAdmin')

Route::get('/admin/list_category', 'Dashboard\CategoryController@index')->name('dashboards.categories.list_category');//->middleware('isAdmin')

Route::get('/admin/list_user', 'Dashboard\UserController@index')->name('dashboards.users.list_user');//->middleware('isAdmin')

Route::get('/admin/list_orderDetail', 'Dashboard\OrderDetailController@index')->name('dashboards.orderDetails.list_orderDetail');//->middleware('isAdmin')

Route::get('/admin/list_order', 'Dashboard\OrderController@index')->name('dashboards.orders.list_order');//->middleware('isAdmin')

Route::get('/admin/list_product', 'Dashboard\ProductController@index')->name('dashboards.products.list_product');//->middleware('isAdmin')

Route::get('/admin/list_review', 'Dashboard\ReviewController@index')->name('dashboards.reviews.list_review');//->middleware('isAdmin')

//Create:

Route::get('/admin/create_role', 'Dashboard\RoleController@create')->name('dashboards.roles.create_role');

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

Route::delete('/admin/{id}/list_author', 'Dashboard\AuthorController@destroy')->name('dashboards.authors.destroy');

Route::delete('/admin/{id}/list_publisher', 'Dashboard\PublisherController@destroy')->name('dashboards.publishers.destroy');

Route::delete('/admin/{id}/list_category', 'Dashboard\CategoryController@destroy')->name('dashboards.categories.destroy');

Route::delete('/admin/{id}/list_user', 'Dashboard\UserController@destroy')->name('dashboards.users.destroy');

Route::delete('/admin/{id}/list_order', 'Dashboard\OrderController@destroy')->name('dashboards.orders.destroy');

Route::delete('admin/{id}/list_product', 'Dashboard\ProductController@destroy')->name('dashboards.products.destroy');

//Show:

Route::get('/admin/{id}/detail_user', 'Dashboard\UserController@show')->name('dashboards.users.detail_user');

Route::get('/admin/{id}/detail_product', 'Dashboard\ProductController@show')->name('dashboards.products.detail_product');

//Search:

Route::get('/admin/search_user', 'Dashboard\UserController@search')->name('dashboards.users.search');

Route::get('/admin/search_product', 'Dashboard\ProductController@search')->name('dashboards.products.search');


// //Sort Delete - Role:

Route::get('/admin/record_role', 'Dashboard\RoleController@record')->name('dashboards.roles.record_role');

Route::put('/admin/{id}role', 'Dashboard\RoleController@restore')->name('dashboards.roles.restore');

Route::Delete('/admin/{id}role', 'Dashboard\RoleController@force')->name('dashboards.roles.force');

// //Sort Delete - User:

Route::get('/admin/record_user', 'Dashboard\UserController@record')->name('dashboards.users.record_user');

Route::put('/admin/{email}/user', 'Dashboard\UserController@restore')->name('dashboards.users.restore');

Route::Delete('/admin/{email}/user', 'Dashboard\UserController@force')->name('dashboards.users.force');

// //Sort Delete - Author:

Route::get('/admin/record_author', 'Dashboard\AuthorController@record')->name('dashboards.authors.record_author');

Route::put('/admin/{id}/author', 'Dashboard\AuthorController@restore')->name('dashboards.authors.restore');

Route::Delete('/admin/{id}/author', 'Dashboard\AuthorController@force')->name('dashboards.authors.force');

//Sort Delete - Publisher:

Route::get('/admin/record_publisher', 'Dashboard\PublisherController@record')->name('dashboards.publishers.record_publisher');

Route::put('/admin/{id}/publisher', 'Dashboard\PublisherController@restore')->name('dashboards.publishers.restore');

Route::Delete('/admin/{id}/publisher', 'Dashboard\PublisherController@force')->name('dashboards.publishers.force');

// //Sort Delete - Category:

Route::get('/admin/record_category', 'Dashboard\CategoryController@record')->name('dashboards.categories.record_category');

Route::put('/admin/{id}/category', 'Dashboard\CategoryController@restore')->name('dashboards.categories.restore');

Route::Delete('/admin/{id}/category', 'Dashboard\CategoryController@force')->name('dashboards.categories.force');

//Sort Delete - Product:

Route::get('/admin/record_product', 'Dashboard\ProductController@record')->name('dashboards.products.record_product');

Route::put('/admin/{name}', 'Dashboard\ProductController@restore')->name('dashboards.products.restore');

Route::Delete('/admin/{name}', 'Dashboard\ProductController@force')->name('dashboards.products.force');

//Sort Delete - Order:

//Sort Delete - Review:

Route::post('/admin/sortBy', 'Dashboard\ProductController@sort')->name('dashboards.products.sort');