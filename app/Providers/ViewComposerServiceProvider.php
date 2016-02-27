<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cart;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeTopCart();
        $this->composerBtmCart();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composeTopCart()
    {
        view()->composer('layouts.cart', function($view)
        {
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
    }

    private function composerBtmCart()
    {
        view()->composer('layouts.btmsheet', function($view)
        {
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
    }
}
