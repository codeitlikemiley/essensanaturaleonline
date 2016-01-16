<?php

// NO Middleware and NO Api Rate Limiter
Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => 'api'], function () {
// Put Here Your Api Call


});
