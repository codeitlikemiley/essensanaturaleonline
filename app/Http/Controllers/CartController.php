<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class CartController extends Controller
{
    protected $shippingfee = 150;
    protected $taxrate = .12;

    public function showCart()
    {
        $cart = Cart::content();
        $subtotal = Cart::total();
        $shippingfee = $this->shippingfee;
        if (!$subtotal) {
            $shippingfee = 0;
        }

        if ($subtotal > 1150) {
            $shippingfee = 0;
        }
        $taxrate = $this->taxrate;
        $tax = round($subtotal * $taxrate);
        $total = $subtotal + $shippingfee + $tax;

        // return view('layouts.cart')->with(compact('cart', 'taxrate', 'tax', 'shippingfee', 'total', 'subtotal'));
        return \Response::json(\View::make('layouts.cart')->with(compact('cart', 'subtotal', 'tax', 'shippingfee', 'total'))->render());
    }

    public function addToCart(Request $request)
    {
        try {
            $product_id = $request->input('product_id');
            $product = Product::find($product_id);
            if (!$product) {
                throw new \Exception('Product ID Does Not Exist!');
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Product ID Does Not Exist!'], 400);
        }

        Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));

        $rowId = Cart::search(array('id' => $request->input('product_id')));
        $item = Cart::get($rowId[0]);
        $itemID = 'item'.$item->id;
        $shippingfee = $this->shippingfee;
        $subtotal = Cart::total();
        if (!$subtotal) {
            $shippingfee = 0;
        }

        if ($subtotal > 1150) {
            $shippingfee = 0;
        }
        $taxrate = $this->taxrate;
        $tax = round($subtotal * $taxrate);
        $total = $subtotal + $shippingfee + $tax;
        $message = $item->name.' Added To Cart!';
        // return view('layouts.addToCart')->with(compact('item'))->render();
        return response()->json(['html' => \View::make('layouts.addToCart')->with(compact('item'))->render(), 'success' => true, 'message' => $message, 'itemID' => $itemID, 'subtotal' => $subtotal, 'tax' => $tax, 'shippingfee' => $shippingfee, 'total' => $total], 200);
    }

    public function updateItem(Request $request)
    {
        if($request->isMethod('post')){
        try {
            $rowId = Cart::search(array('id' => $request->input('product_id')));
            if (!$rowId) {
                throw new \Exception('Product ID Does Not Exist!');
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Product ID Does Not Exist!'], 400);
        }
        if (!is_numeric($request->input('qty'))) {
            return response()->json(['success' => false, 'message' => 'Qty is Not Valid!'], 400);
        }
        if ($request->input('qty') >= 1) {
        Cart::update($rowId[0], $request->input('qty'));
        $cart = Cart::content();
        $subtotal = Cart::total();
        $shippingfee = $this->shippingfee;
        if (!$subtotal) {
            $shippingfee = 0;
        }

        if ($subtotal > 1150) {
            $shippingfee = 0;
        }
        $taxrate = $this->taxrate;
        $tax = round($subtotal * $taxrate);
        $total = $subtotal + $shippingfee + $tax;

        if ($request->ajax()) {
        return \Response::json(\View::make('layouts.cart')->with(compact('cart', 'subtotal', 'tax', 'shippingfee', 'total'))->render());
        }
        } else {
            $qty = $request->input('qty');
            try {
                if ($qty <= 0) {
                    throw new \Exception('Zero or Negative Qty');
                }
            } catch (\Exception $e) {
                $item = Cart::get($rowId[0]);
                $itemID = 'item'.$item->id;
                Cart::remove($rowId[0]);
                $cart = Cart::content();
                $subtotal = Cart::total();
                $shippingfee = $this->shippingfee;
                if (!$subtotal) {
                    $shippingfee = 0;
                }

                if ($subtotal > 1150) {
                    $shippingfee = 0;
                }
                $taxrate = $this->taxrate;
                $tax = round($subtotal * $taxrate);
                $total = $subtotal + $shippingfee + $tax;

        
                if ($request->ajax()) {
                return \Response::json(\View::make('layouts.cart')->with(compact('cart', 'subtotal', 'tax', 'shippingfee', 'total'))->render());
                }
                
            }
        }
    }
    }

    public function destroyCart(Request $request)
    {
        if($request->isMethod('post')){
        Cart::destroy();
        $cart = Cart::content();
        $subtotal = 0;
        $tax = 0;
        $shippingfee = 0;
        $total = 0;
        // return view('layouts.cart')->with(compact('cart', 'taxrate', 'tax', 'shippingfee', 'total', 'subtotal'));
        return \Response::json(\View::make('layouts.cart')->with(compact('cart', 'subtotal', 'tax', 'shippingfee', 'total'))->render());
        }
        
    }

    public function removeCartItem(Request $request)
    {
        if($request->isMethod('post')){
        try {
            $rowId = Cart::search(array('id' => $request->input('product_id')));
            if (!$rowId) {
                throw new \Exception('Product ID Does Not Exist!');
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Product ID Does Not Exist!'], 400);
        }

        $item = Cart::get($rowId[0]);
        $itemID = 'item'.$item->id;
        $message = $item->name.' is Removed From Cart!';
        Cart::remove($rowId[0]);

        $cart = Cart::content();
        $subtotal = Cart::total();
        $shippingfee = $this->shippingfee;
        if (!$subtotal) {
            $shippingfee = 0;
        }

        if ($subtotal > 1150) {
            $shippingfee = 0;
        }
        $taxrate = $this->taxrate;
        $tax = round($subtotal * $taxrate);
        $total = $subtotal + $shippingfee + $tax;

        // return view('layouts.cart')->with(compact('cart', 'taxrate', 'tax', 'shippingfee', 'total', 'subtotal'));
        // return response()->json(['html' => \View::make('layouts.addToCart')->with(compact('item'))->render(), 'success' => true, 'message' => $message, 'itemID' => $itemID, 'subtotal' => $subtotal, 'tax' => $tax, 'shippingfee' => $shippingfee, 'total' => $total], 200);
        if ($request->ajax()) {
        return \Response::json(\View::make('layouts.cart')->with(compact('cart', 'subtotal', 'tax', 'shippingfee', 'total'))->render());
        }
    }
    }

    public function addProduct(Request $request)
    {
        if($request->isMethod('post')){
        $id = $request->input('product_id');
        $qty = $request->input('qty');
        try {
            
            $product = Product::find($id);
            if (!$product) {
                throw new \Exception('Product ID Does Not Exist!');
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Product ID Does Not Exist!'], 400);
        }
        
        Cart::associate('Product', 'App')->add(array('id' => $id, 'name' => $product->name, 'qty' => $qty, 'price' => $product->price));
        
        $cart = Cart::content();
        $subtotal = Cart::total();
        $shippingfee = $this->shippingfee;
        if (!$subtotal) {
            $shippingfee = 0;
        }

        if ($subtotal > 1150) {
            $shippingfee = 0;
        }
        $taxrate = $this->taxrate;
        $tax = round($subtotal * $taxrate);
        $total = $subtotal + $shippingfee + $tax;

        // return view('layouts.cart')->with(compact('cart', 'taxrate', 'tax', 'shippingfee', 'total', 'subtotal'));
        // return response()->json(['html' => \View::make('layouts.addToCart')->with(compact('item'))->render(), 'success' => true, 'message' => $message, 'itemID' => $itemID, 'subtotal' => $subtotal, 'tax' => $tax, 'shippingfee' => $shippingfee, 'total' => $total], 200);
        if ($request->ajax()) {
        return \Response::json(\View::make('layouts.cart')->with(compact('cart', 'subtotal', 'tax', 'shippingfee', 'total'))->render());
        }
    }

    }

}
