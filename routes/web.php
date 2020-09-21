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

Route::get('/', 'HomeController@index')->name('index');
Route::post('upload-image', 'UploadController@upload')->name('upload-image');
Route::get('danhmuc/{slug}', 'ClientController@getCategories')->name('categories');
Route::get('getProductCategories', 'HomeController@getProductCategories')->name('getProductCategories');
Route::get('info', 'ClientController@getInfo')->name('info');
Route::get('sanpham/{slug}', 'HomeController@getProduct')->name('getProduct');
Route::get('giohang', 'ClientController@Cart')->name('cart');
Route::post('addToCart', 'ClientController@addToCart')->name('addToCart');
Route::post('updateCart', 'ClientController@updateCart')->name('updateCart');
Route::post('removeCart', 'ClientController@removeCart');
Route::get('thanhtoan', 'ClientController@checkout')->name('checkout');
Route::post('thanhtoan', 'ClientController@postCheckout')->name('postCheckOut');
Route::get('getProvince', 'ClientController@getProvince')->name('getProvince');
Route::get('getCountry', 'ClientController@getCountry')->name('getCountry');
Route::group(['prefix' => 'admin'], function(){
    Auth::routes(['register' => false]);
});
Route::group(['prefix'=>'/admin', 'middleware' => 'auth'],function(){
    Route::get('/','AdminController@index')->name('admin');
    Route::get('getCategories', 'UploadController@getCategories')->name('getCategories');

    Route::resource('danhmuc', 'CategoriesController');
    Route::resource('product', 'ProductController');
});




Route::get('/home', 'HomeController@index')->name('home');
