<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use Cart;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\MailController as Mail;

class HomeController extends Controller
{
    public $mail;
    protected $shippingfee = 150;
    protected $taxrate = .12;

    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

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
    public function activate($email, $activation_code)
    {
        try {
            $user = User::where('email', $email)->where('activation_code', $activation_code)->firstOrFail();
            $user->verifyEmail();
            $this->mail->activated($user);

            return \View::make('auth.active');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('login');
        }
    }
}
