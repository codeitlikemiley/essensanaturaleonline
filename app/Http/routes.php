<?php

Route::group(['middleware' => 'web'], function () {
	Route::post('searchProduct', 'SearchController@searchProduct');

	Route::get('search/autocomplete', 'SearchController@autocomplete');
    Route::auth();
    Route::get('/', 'HomeController@index');
    Route::get('/addProduct/{productId}', 'CartController@addItem');
	Route::get('/removeItem/{productId}', 'CartController@removeItem');
	Route::get('/cart', 'CartController@showCart');
    

});

Route::group(['middleware' => 'api'], function () {
	Route::get('api/products', 'ProductController@show');

});
