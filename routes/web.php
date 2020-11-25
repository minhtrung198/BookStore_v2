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

// Route::get('/', function () {
//     return view('fronts.home.index');
// });
//AUth
Route::get('/login','Auth\LoginController@showLoginForm')->name('form-login');
Route::post('/login','Auth\LoginController@login')->name('login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');

//admin
Route::get('/admin','Dashboard\HomeController@index')->name('admin-dashboard');

//Front
Route::get('/list-product','Front\ProductController@index')->name('list-product');


//homepage
Route::get('/','Front\HomeController@index')->name('front-dashboard');






Auth::routes();


