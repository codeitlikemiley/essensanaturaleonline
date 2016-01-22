<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use App\Review;

class ProductController extends Controller
{
    public function show(Request $request){
    	$products = Product::paginate(3);
    	$products->setPath('/');
    	if ($request->ajax()) {
            return Response::json(\View::make('layouts.products')->with(compact('products'))->render());
        }
 
    }

    public function index(Request $request){ // Show a View to Load All Products in Tabular Form
        $query    = Product::with(["category"]);
        $category = $request->input("categoryID");
        if ($category)
        {
          $query->where("category_id", $category);
        }
        return $query->get();
    }

    public function destroy($id){ // Submit a Request to Delete a Product
    	try{
    		Product::destroy($id);
    	} catch (\Exception $e){
    		$messages = ['failed' => 'Product Deletion Failed!'];
        return response()->json(['success' => false, 'messages' => $messages], 400);
    	}
        
        $messages = ['success' => 'Product Deleted!'];
        return response()->json(['success' => true, 'messages' => $messages], 200);	
    }
 
    public function newProduct(){ // Create a View with Form For Creating Product
        return view('admin.new');
    }

    public function add(Request $request) { // Submit a Request Form to Add / Create New Product
    	try{
		$product  = new Product();
        $product->name = $request->input('name');
        $product->summary = $request->input('summary');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image = $request->input('image');
        $product->stock = $request->input('stock');
        $product->published = true;
        $product->save();
    	}   catch (\Exception $e) {
    	$messages = ['failed' => 'Adding Product Failed!'];
        return response()->json(['success' => false, 'messages' => $messages], 400);	
    	}   
        
 		$messages = ['success' => 'Product Added!'];
        return response()->json(['success' => true, 'messages' => $messages], 200);
        }

        public function showProduct($id)
        {
        $product = Product::find($id);
        // Get all reviews that are not spam for the product and paginate them
        $reviews = $product->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->paginate(10);

        return \View::make('products.show', array('product'=>$product,'reviews'=>$reviews));
        }

        public function submitReview($id)
        {
            $input = array(
                'comment' => Input::get('comment'),
                'rating'  => Input::get('rating')
                );
            // instantiate Rating model
            $review = new Review;

            // Validate that the user's input corresponds to the rules specified in the review model 
            $validator = Validator::make( $input, $review->getCreateRules());

            // If input passes validation - store the review in DB, otherwise return to product page with error message 
            if ($validator->passes()) {
            $review->storeReviewForProduct($id, $input['comment'], $input['rating']);
            return \Redirect::to('products/'.$id.'#reviews-anchor')->with('review_posted',true);
            } 

            return \Redirect::to('products/'.$id.'#reviews-anchor')->withErrors($validator)->withInput();
        }
}
