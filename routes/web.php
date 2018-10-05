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

        Route::get('/listUser', 'UserController@getListUser')->name('listUser');

        Route::get('addUser', 'UserController@getAddUser')->name('addUser');
        Route::post('addUser', 'UserController@postAddUser');

        Route::get('editUser/{id}', 'UserController@getEditUser')->name('editUser');
        Route::post('editUser/{id}', 'UserController@postEditUser');

        Route::get('/delete/{id}', 'UserController@getDeleteUser')->name('deleteUser');
    });
    
    Route::group(['prefix'=>'product'], function() {
        Route::get('/listProduct', 'ProductController@getListProduct')->name('listProduct');

        Route::get('addProduct', 'ProductController@getAddProduct')->name('addProduct');
        Route::post('addProduct', 'ProductController@postAddProduct');

        Route::get('editProduct/{id}', 'ProductController@getEditProduct')->name('editProduct');
        Route::post('editProduct/{id}', 'ProductController@postEditProduct');

        Route::get('/delete/{id}', 'ProductController@getDeleteProduct')->name('deleteProduct');

    });
    
    Route::group(['prefix'=>'category'], function() {
        Route::get('/listCategory', 'CategoryController@getListCategory')->name('listCategory');

        Route::get('/addCategory', 'CategoryController@getAddCategory')->name('addCategory');
        Route::post('/addCategory', 'CategoryController@postAddCategory');

        Route::get('editCategory/{id}', 'CategoryController@getEditCategory')->name('editCategory');
        Route::post('editCategory/{id}', 'CategoryController@postEditCategory');

        Route::get('/delete/{id}', 'CategoryController@getDeleteCategory')->name('deleteCategory');

        Route::post('category-import', 'CategoryController@importCategory')->name('importCategory');
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


