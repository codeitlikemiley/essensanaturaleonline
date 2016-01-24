<?php

Route::group(['middleware' => 'web'], function () {
	Route::post('searchProduct', 'SearchController@searchProduct');

	Route::get('search/autocomplete', 'SearchController@autocomplete');
    
    Route::get('/', 'HomeController@index');
   
	Route::get('/admin/product/new', 'ProductController@newProduct');
	Route::get('/admin/products', 'ProductController@index');
	Route::get('/admin/product/destroy/{id}', 'ProductController@destroy');
	Route::post('/admin/product/save', 'ProductController@add');

	// Show Single Product with Review
	Route::get('/products/{id}', 'ProductController@showProduct');
	Route::post('products/{id}', 'ProductController@submitReview');

	Route::get('getCheckOut', 'OrderController@getCheckOut');
	
	Route::any("account/authenticate", [
  	"as"   => "account/authenticate",
  	"uses" => "Auth\AuthController@authenticate"
	]);
    
    Route::any("order/index", [
  	"as"   => "order/index",
  	"uses" => "OrderController@index"
	]);

    // Not Being Used 
	Route::get('showCart', 'CartController@showCart');

    // AJAX Call
	Route::post('destroyCart', 'CartController@destroyCart');
	Route::post('addToCart', 'CartController@addToCart');
	Route::post('updateItem', 'CartController@updateItem');
	Route::post('removeCartItem', 'CartController@removeCartItem');


	// This Route is if You Wanted to Use Product Properties in DB and Associate it with Cart!
	Route::post('addProduct', 'CartController@addProduct');
	// Product Pagination
	Route::get('api/products', 'ProductController@show');

	Route::get('profile', function(){
		return view('pages.profile');
	});//show profile edit form
Route::get('profile', ['as' => 'profile', 'uses' => 'UserController@edit']);

//show login/signup form
Route::get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@login']);

//Post Login and Start Session
Route::post('login', ['as' => 'postLogin', 'uses' => 'Auth\AuthController@authenticate']);

// Log Out and End Session
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

//Submit an Email That You Want to Be Recovered
Route::post('password/email', ['as' => 'password/postEmail', 'uses' => 'Auth\PasswordController@sendLink']);

//After clicking Link in Email Show Password Reset Form
Route::get('password/reset/{email}/{activation_code}', ['as' => 'password/reset/', 'uses' => 'Auth\PasswordController@reset']);
//Grant Request for new password
Route::post('password/reset', ['as' => 'password/postReset', 'uses' => 'Auth\PasswordController@save']);

//Activates The User Account
Route::get('account/activate/{email}/{activation_code}', 'Auth\AuthController@activate');

//Ask to Resend a Verification Email for Activation
Route::get('/resendEmail', ['as' => 'resendEmail', 'uses' => 'Auth\AuthController@resendEmail']);

// Register A New User
Route::post('signup', ['as' => 'signup', 'uses' => 'Auth\AuthController@create']);

//Load Referral Link of A User {NOTE: ALWAYS MAKE THIS THE LAST LINE IN ROUTE!}
Route::get('@{link?}', ['as' => 'reflink', 'uses' => 'LinkController@showRefLink']);

View::composer('layouts.cart', function($view) {
		$cart = Cart::content();
        $subtotal = Cart::total();
        $shippingfee = 150;
        if (!$subtotal) {
            $shippingfee = 0;
        }

        if ($subtotal > 1150) {
            $shippingfee = 0;
        }
        $taxrate = 0.12;
        $tax = round($subtotal * $taxrate);
        $total = $subtotal + $shippingfee + $tax;

        $view->with(compact('cart', 'subtotal', 'tax', 'shippingfee', 'total'));
    });


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