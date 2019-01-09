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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/',[
    'uses'=> 'FrontendController@index',
    'as'=> 'front'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('product/details/{slug}',[
    'uses'=> 'ShopController@show',
    'as'=> 'single.product'
]);
Route::post('/cart/add',[
    'uses'=> 'CartsController@store',
    'as'=> 'cart.add'
]);

Route::get('/cart',[
    'uses'=> 'CartsController@show',
    'as'=> 'cart.show'
]);
Route::get('/cart/remove/{id}',[
    'uses'=> 'CartsController@remove',
    'as'=> 'cart.remove'
]);
Route::get('/cart/minus/{id}',[
    'uses'=>'CartsController@minus',
    'as'=> 'cart.minus'
]);
Route::get('cart/plus/{id}',[
    'uses'=> 'CartsController@plus',
    'as'=> 'cart.plus'
]);
Route::get('/cart/checkout',[
    'uses'=> 'CartsController@checkout',
    'as'=> 'cart.checkout'
]);
Route::post('pay/checkout',[
    'uses'=> 'CartsController@pay',
    'as'=> 'pay.checkout'
]);

Route::group(['prefix'=>'admin','middleware'=> 'auth'],function(){

    Route::get('/add_products',[
        'uses'=> 'ProductsController@index',
        'as'=> 'add.products'
    ]);
    Route::get('show/product',[
        'uses'=> 'ProductsController@show',
        'as'=> 'show.products'
    ]);
    Route::post('products/store',[
        'uses'=> 'ProductsController@store',
        'as'=> 'products.store'
    ]);
    Route::get('product/edit/{id}',[
        'uses'=> 'ProductsController@edit',
        'as'=> 'product.edit'
    ]);
    Route::post('product/update/{id}',[
        'uses'=> 'ProductsController@update',
        'as'=> 'product.update'
    ]);
    Route::get('product/delete/{id}',[
        'uses'=> 'ProductsController@destroy',
        'as'=> 'product.delete'
    ]);
    Route::get('add/category',[
        'uses'=> 'CategoryController@index',
        'as'=> 'add.category'
    ]);
    Route::get('show/categories',[
        'uses'=> 'CategoryController@show',
        'as'=>'show.category'
    ]);
    Route::post('category/store',[
        'uses'=> 'CategoryController@store',
        'as'=> 'category.store'
    ]);
    Route::get('category/edit/{id}',[
        'uses'=> 'CategoryController@edit',
        'as'=> 'category.edit'
    ]);
    Route::get('category/delete/{id}',[
        'uses'=> 'CategoryController@destroy',
        'as'=> 'category.delete'
    ]);
    Route::post('category/update/{id}',[
        'uses'=> 'CategoryController@update',
        'as'=> 'category.update'
    ]);

});
