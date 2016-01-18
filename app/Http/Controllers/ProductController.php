<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Cache;

class ProductController extends Controller
{
    public function show(Request $request){
    	// $products = Product::paginate(3);
    	// $products->setPath('/');
    	// if ($request->ajax()) {
     //        return Response::json(\View::make('layouts.products')->with(compact('products'))->render());
     //    }
    	// to use Cache Version Move the Route in Web Middleware in route.php
        // Uncomment Code Above if You Intend to Cache
        if (Cache::has('products')) {
        	$products = Cache::pull('products');
        	if ($request->ajax()) {
            return Response::json(\View::make('layouts.products')->with(compact('products'))->render());
        }
         
        }
        $products = Cache::rememberForever('products', function () {
        	$products = Product::paginate(3);
        	$products->setPath('/');
    	return $products;
    	

		});
		if ($request->ajax()) {
		$products = Cache::pull('products');
		return Response::json(\View::make('layouts.products')->with(compact('products'))->render());
 		}
    }
}
