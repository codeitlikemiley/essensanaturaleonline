<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;

class HomeController extends Controller
{
    protected $shippingfee = 150;
    protected $taxrate = .12;

    public function index()
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
        $products = Product::paginate(3);

        return view('pages.app')->with(compact('cart', 'subtotal', 'tax', 'shippingfee', 'total', 'products'));
    }
}
