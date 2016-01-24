<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemOrder;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Bank;
// use App\OnlineBank;
// use App\MobileTransfer;
// use App\Remittance;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $shippingfee = 150;
    protected $taxrate = .12;

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function getCheckOut(Request $request)
    {
        $userID = 1; // Auth::user()->id;
        $cart = Cart::content();
        if(!$cart->count()){
            return "Add Item to Cart!";
        }
        $subtotal = Cart::total();

        $status = 'unpaid';
        if($request->input('mop') == 'CreditCard'){
            $status = 'paid';
        }
        $method = 'deliver';
        if($request->input('method') == 'pickup'){
            $method = 'pickup';
        }
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
       
        $order = new Order();
        $order->user_id = $userID;
        $order->status = $status;
        $order->shipment_fee = $shippingfee;
        $order->sub_total = $subtotal;
        $order->tax = $tax;
        $order->total = $total;

        

        $model = $request->input('mop');
        if(!$request->input('mop')){
            $model = 'App\Bank';
        }
        $transaction = substr(md5(rand()), 0, 7);
        $mop = new $model();
        $mop->transaction_id = $transaction;
        $mop->amount =  $total;
        $mop->save();
        $mop->orderPayment()->save($order);
        


        foreach ($cart as $item) {
            $itemOrder = new ItemOrder();
            $itemOrder->product_id = $item->id;
            $itemOrder->name = $item->name;
            $itemOrder->qty = $item->qty;
            $itemOrder->price = $item->price;
            $options = array(
            "size" => $item->options->has('size') ? $item->options->size : '',
            "weight" => $item->options->has('weight') ? $item->options->weight : '',
            "volume" => $item->options->has('volume') ? $item->options->volume : '',
            "color" => $item->options->has('color') ? $item->options->color : ''
            );
            $itemOrder->options =$options;
            $order->itemOrders()->save($itemOrder);
        }
        Cart::destroy();
        return 'Done';
        
    }

    public function checkout(Request $request)
    {
        $token = $request->input('stripeToken');

        //Retriieve cart information
        $cart = Cart::where('user_id',Auth::user()->id)->first();
        $items = $cart->cartItems;
        $total=0;
        foreach($items as $item){
            $total+=$item->product->price;
        }
        if(
            Auth::user()->charge($total*100, [
            'source' => $token,
            'receipt_email' => Auth::user()->email,
        ])){

            $order = new Order();
            $order->total_paid= $total;
            $order->user_id=Auth::user()->id;
            $order->save();

            foreach($items as $item){
                $orderItem = new OrderItem();
                $orderItem->order_id=$order->id;
                $orderItem->product_id=$item->product->id;
                $orderItem->file_id=$item->product->file->id;
                $orderItem->save();

                CartItem::destroy($item->id);
        }
            return redirect('/order/'.$order->id);

        }else{
            return redirect('/cart');
        }

    }

    // public function index(){
    //     $orders = Order::where('user_id',Auth::user()->id)->get();

    //     return view('order.list',['orders'=>$orders]);
    // }

    public function viewOrder($orderId){
        $order = Order::find($orderId);
        return view('order.view',['order'=>$order]);
    }

    // start here >> this should be for admin
    public function index(Request $request)
    {
    $query = Order::with([
      "user",
      "itemOrders.product.category"
    ]);
    $user = $request->input('user_id');
    if ($user)
    {
      $query->where("user_id", $user);
    }
    return $query->get();
    }

    public function switchToJack($lid)
    {
    }
}
