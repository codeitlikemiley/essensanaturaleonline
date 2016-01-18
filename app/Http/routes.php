<?php

Route::group(['middleware' => 'web'], function () {
	Route::post('searchProduct', 'SearchController@searchProduct');

	Route::get('search/autocomplete', 'SearchController@autocomplete');
    Route::auth();
    Route::get('/', 'HomeController@index');
	Route::get('api/products', 'ProductController@show');
    

});

Route::group(['middleware' => 'api'], function () {
    // Put Here Your Api Call

});
