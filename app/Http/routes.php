<?php


Route::group(['middleware' => 'web'], function () {
	Route::get('/notify', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
{
	$app_id = 167776416934911;

$app_secret = '66ff0a8282dc60c3007e05a1ba799fee';

$app_access_token = $app_id . '|' . $app_secret;
	$user = \Auth::loginUsingId(49);
	$user = \Auth::user();
	$fbID = $user->facebook_user_id;
	$response = $fb->post( '/' .$fbID. '/notifications',array(

                'template' => 'Master Powers!',

                'href' => '@'.$user->username,

                'access_token' => $app_access_token

            ) );    

print_r($response);
});
// Endpoint that is redirected to after an authentication attempt
    Route::get('getPaypalLink', 'PaypalController@getPaypalLink');
    Route::get('listpayment', 'PaypalController@indexPaypal');
    Route::get('payment/paypal/success', 'PaypalController@getDone');
    Route::get('payment/paypal/cancel', 'PaypalController@getCancel');
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

	Route::get('checkout', 'OrderController@getCheckOut');
	Route::post('checkout', 'OrderController@postCheckOut');
	
	Route::any("account/authenticate", [
  	"as"   => "account/authenticate",
  	"uses" => "Auth\AuthController@authenticate"
	]);
    
    Route::any("orders", [
  	"as"   => "orders",
  	"uses" => "OrderController@index"
	]);

    // Not Being Used 
	Route::get('showCart', 'CartController@showCart');

    // Get MOP AJAX Call
	Route::get('getBank', 'OrderController@getBank');
	Route::get('getOnlineBank', 'OrderController@getOnlineBank');
	Route::get('getMobileTransfer', 'OrderController@getMobileTransfer');
	Route::get('getRemittance', 'OrderController@getRemittance');
	// lOAD Payment Details
	Route::get('loadBDO', 'PaymentDetailsController@loadBDO');
	Route::get('loadBPI', 'PaymentDetailsController@loadBPI');
	Route::get('loadEASTWEST', 'PaymentDetailsController@loadEASTWEST');
	Route::get('loadUNIONBANK', 'PaymentDetailsController@loadUNIONBANK');
	Route::get('loadMETROBANK', 'PaymentDetailsController@loadMETROBANK');
	Route::get('loadSMARTMONEY', 'PaymentDetailsController@loadSMARTMONEY');
	Route::get('loadGCASH', 'PaymentDetailsController@loadGCASH');
	Route::get('loadWESTERUNION', 'PaymentDetailsController@loadWESTERUNION');
	Route::get('loadMONEYGRAM', 'PaymentDetailsController@loadMONEYGRAM');
	Route::get('loadCEBUANALHUILLIER', 'PaymentDetailsController@loadCEBUANALHUILLIER');
	Route::get('loadCEBUANAMLHUILLIER', 'PaymentDetailsController@loadCEBUANAMLHUILLIER');
	Route::get('loadLBCREMITTANCE', 'PaymentDetailsController@loadLBCREMITTANCE');
	Route::get('loadPALAWANEXPRESS', 'PaymentDetailsController@loadPALAWANEXPRESS');

	Route::post('deleteOrder', 'OrderController@deleteOrder');
	Route::post('viewItemOrder', 'OrderController@viewItemOrder');


	Route::post('postFormReceipt', [
  	"as"   => "formreceipt",
  	"uses" => "OrderController@postFormReceipt"]);

  	Route::post('postReceipt', [
  	"as"   => "postReceipt",
  	"uses" => "OrderController@postReceipt"]);

// \Auth::loginUsingId(1);
    
    // Cart AJAX Call
	Route::post('destroyCart', 'CartController@destroyCart');
	Route::post('addToCart', 'CartController@addToCart');
	Route::post('updateItem', 'CartController@updateItem');
	Route::post('removeCartItem', 'CartController@removeCartItem');


	// This Route is if You Wanted to Use Product Properties in DB and Associate it with Cart!
	Route::post('addProduct', 'CartController@addProduct');
	// Product Pagination
	Route::get('api/products', 'ProductController@show');

	Route::get('shipping-address',['as' => 'shipping-address', 'uses' =>  'DashboardController@showShippingAddress']);
	Route::post('shipping-address',['as' => 'shipping-address', 'uses' =>  'DashboardController@updateShippingAddress']);
	Route::get('edit-profile',['as' => 'show-profile', 'uses' => 'DashboardController@viewProfile']);
	Route::put('edit-profile',['as' => 'update-profile', 'uses' => 'DashboardController@editProfile']);
	Route::post('updateProfilePic',['as' => 'update-profile-pic', 'uses' => 'DashboardController@updateProfilePic']);
	Route::post('updateAboutMe',['as' => 'update-about-me', 'uses' => 'DashboardController@updateAboutMe']);
	Route::post('updateLinks',['as' => 'updateLinks', 'uses' => 'DashboardController@updateLinks']);
// Route::get('profile', ['as' => 'profile', 'uses' => 'UserController@edit']);

Route::get('/facebook/callback', ['as' => 'fbcallback', 'uses' => 'Auth\AuthController@fbcallback']);
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
Route::get('account/activate/{email}/{activation_code}', 'HomeController@activate');

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
        $taxrate = 0;
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