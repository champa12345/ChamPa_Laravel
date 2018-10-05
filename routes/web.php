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



Route::group(['middleware'=>'adminLogin', 'prefix'=>'admin'], function() {
    Route::get('/', function () {
        return view('master_admin');
    });
    Route::group(['prefix'=>'users'], function() {
        Route::resource('listcategories', 'CategoryAdminController');
    });
    Route::group(['prefix'=>'product'], function() {
        Route::resource('listproducts', 'CategoryAdminController');
    });
    Route::group(['prefix'=>'category'], function() {
        Route::resource('listusers', 'CategoryController@getListCategory');
    });
});


Route::get('', 'HomeClientController@index')->name('trangchu');
Route::resource('categorytypes', 'CategoryClientController');
Route::resource('products', 'ProductClientController');
Route::resource('checkouts', 'CheckoutController');
Route::resource('updatecarts', 'AddToCartClientController');
Route::get('contact', 'PageController@contact')->name('lienhe');
Route::get('about', 'PageController@about')->name('taikhoan');
Route::get('addToCart/{id}', 'PageController@addToCart')->name('addToCart');
Route::get('viewcarts', 'PageController@viewCart')->name('viewCart');
Route::get('/searchproduct', 'PageController@searchProduct')->name('searchProduct');
Route::resource('comments', 'CommentController');
Route::get('/callback/{social}', 'SocialAuthController@callback');
Route::get('/auth/facebook', 'SocialAuthController@redirectToProvider')->name('facebook.login');
Route::get('/auth/facebook/callback', 'SocialAuthController@handleProviderCallback');
Auth::routes();


