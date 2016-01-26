<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemOrder;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\User;
// use App\Bank;
// use App\OnlineBank;
// use App\MobileTransfer;
// use App\Remittance;
// use App\Http\Requests\CreateOrderRequest;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Redirect;

class OrderController extends Controller
{
    protected $shippingfee = 150;
    protected $taxrate = .12;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCheckOut(Request $request)
    {
        $mop = [
        'App\Bank' => 'Bank',
        'App\OnlineBank' => 'OnlineBank',
        'App\Remittance' => 'Remittance',
        'App\MobileTransfer' => 'MobileTransfer'
        ];
        $method = array('pickup', 'deliver');
        $bank_name = array('BDO', 'BPI', 'UNIONBANK', 'METROBANK', 'EASTWEST');
        $online_bank_name = array('BDO', 'BPI', 'UNIONBANK');
        $mobile_carrier = array('SMARTMONEY', 'GCASH');
        $remittance_name = array('WESTER UNION','MONEY GRAM', 'CEBUANA LHUILLIER', 'CEBUANA MLHUILLIER', 'LBC REMITTANCE', 'PALAWAN EXPRESS');


        $message = "Review Your Order!";
        return view('layouts.getCheckOut')->with(compact('mop','method', 'bank_name', 'online_bank_name' , 'mobile_carrier', 'remittance_name'));
        // return response()->json(['html' => \View::make('layouts.getCheckOut')->with(compact('mop', 'method', 'bank_name', 'online_bank_name', 'mobile_carrier', 'remittance_name'))->render(), 'success' => true, 'message' => $message], 200);
    }

    public function postCheckOut(Request $request)
    {
        // $createOrderRequest = new CreateOrderRequest();
        // $validator         = Validator::make($request->all(), $createOrderRequest->rules(), $createOrderRequest->messages());
        // if ($validator->fails()) {
        //     return response()->json(['success' => false, 'errors' => $validator->errors()->toArray()], 400);
        // }
        DB::beginTransaction();
        $userID = \Auth::user()->id; 
        $cart = Cart::content();
        if(!$cart->count()){
            return "Add Item to Cart!";
        }
        $subtotal = Cart::total();

        $status = 'unpaid';
        if($request->input('mop') == 'App\CreditCard'){
            $status = 'paid';
            //method 
            // return
        }
        $method = $request->input('method');
        
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
        // $transaction = substr(md5(rand()), 0, 7);
        $mop = new $model();
        $mop->name = $request->input('name');
        // $mop->transaction_id = $transaction;
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
        try {
            if (!$order && !$mop && !$itemOrder) {
                throw new \Exception('Order Creation Failed!');
            }
        } catch (\Exception $e) {
            DB::rollback();

            $errors = [
            'ExceptionError' => $e->getMessage()
            
            ];

            return response()->json(['success' => false, 'errors' => $errors], 400); // Failed Creation
        }

        // Account Successfully Created
        DB::commit();
        Cart::destroy();
        // return response()->json(['html' => \View::make('layouts.addToCart')->with(compact('item'))->render(), 'success' => true, 'message' => $message, 'itemID' => $itemID, 'subtotal' => $subtotal, 'tax' => $tax, 'shippingfee' => $shippingfee, 'total' => $total], 200);
        return Redirect::to('/orders');
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
        
    $user = User::with('orders.mop')->find(\Auth::user()->id);
    
    return view('pages.orders')->with('user' ,$user);
    
    }

    
}
