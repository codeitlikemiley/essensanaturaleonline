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

        if (Cache::has('products')) {
        	$products = Cache::pull('products');
        	
            return Response::json(\View::make('layouts.products')->with(compact('products'))->render());
        }
         
        
        $products = Cache::rememberForever('products', function () {
        	$products = Product::paginate(3);
        	$products->setPath('/');
    	return $products;
		});

		$products = Cache::pull('products');
		return Response::json(\View::make('layouts.products')->with(compact('products'))->render());
    }
}
