<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Product;
use Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SearchController extends Controller
{
    public function autocomplete(Request $request)
    {
        
        $term    = e($request->input('term'));
        $results = array();
        $queries = DB::table('products')
        ->where('name', 'LIKE', '%' . $term . '%')
        ->take(10)->get();

        foreach ($queries as $query) {
            $results[] = ['id' => $query->id, 'value' => $query->name];
        }

        return Response::json($results);
    }
    public function searchProduct(Request $request)
    {
        try {
            $product       = $request->input('q');
            $productdata = Product::findByName($product);
            $message    = 'Loading... ' . $productdata['name'] . '\'s Info';

            return response()->json(['productdata' => $productdata, 'message' => $message], 200);
        } catch (ModelNotFoundException $e) {
            $product       = $request->input('q');
            $message    = 'Can\'t Find ' . $product . ' in Database';

            return response()->json(['productdata' => $product, 'message' => $message], 400);
        }
    }
}
