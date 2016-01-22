<?php

Route::group(['middleware' => 'web'], function () {
	Route::post('searchProduct', 'SearchController@searchProduct');

	Route::get('search/autocomplete', 'SearchController@autocomplete');
    Route::auth();
    Route::get('/', 'HomeController@index');
   
	Route::get('/admin/product/new', 'ProductController@newProduct');
	Route::get('/admin/products', 'ProductController@index');
	Route::get('/admin/product/destroy/{id}', 'ProductController@destroy');
	Route::post('/admin/product/save', 'ProductController@add');

	// Show Single Product with Review
	Route::get('/products/{id}', 'ProductController@showProduct');
	Route::post('products/{id}', 'ProductController@submitReview');


	
	Route::any("account/authenticate", [
  	"as"   => "account/authenticate",
  	"uses" => "Auth\AuthController@authenticate"
	]);
    
    Route::any("order/index", [
  	"as"   => "order/index",
  	"uses" => "OrderController@index"
	]);

    // AJAX Call
	Route::post('destroyCart', 'CartController@destroyCart');
	Route::get('addToCart', 'CartController@addToCart');
	Route::post('updateItem', 'CartController@updateItem');
	Route::get('showCart', 'CartController@showCart');
	Route::post('removeCartItem', 'CartController@removeCartItem');


	// This Route is if You Wanted to Use Product Properties in DB and Associate it with Cart!
	Route::post('addProduct', 'CartController@addProduct');
	Route::get('api/products', 'ProductController@show');

});

Route::group(['middleware' => 'api'], function () {
	
	Route::any("category/index", [
	  "as"   => "category/index",
	  "uses" => "CategoryController@index"
	]);
	Route::any("product/index", [
	  "as"   => "product/index",
	  "uses" => "ProductController@index"
	]);

});