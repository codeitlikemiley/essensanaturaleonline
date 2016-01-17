<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

class ProductController extends Controller
{
    public function show(Request $request){
    	$products = Product::paginate(3);
    	$products->setPath('/');
    	if ($request->ajax()) {
            return Response::json(\View::make('layouts.products')->with(compact('products'))->render());
        }
 
    }
}
