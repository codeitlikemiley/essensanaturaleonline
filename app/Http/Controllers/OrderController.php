<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemOrder;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\User;
use Response;
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
use Bouncer;
use App\Http\Requests\SubmitReceiptInfoRequest;



class OrderController extends Controller
{
    protected $shippingfee = 150;
    protected $taxrate = 0;
    protected $method = array('pickup', 'deliver');
    protected $bank_name = array('BDO', 'BPI', 'UNIONBANK', 'METROBANK', 'EASTWEST');
    protected $online_bank_name = array('BDO', 'BPI', 'UNIONBANK');
    protected $mobile_carrier = array('SMARTMONEY', 'GCASH');
    protected $remittance_name = array('WESTER UNION','MONEY GRAM', 'CEBUANA LHUILLIER', 'CEBUANA MLHUILLIER', 'LBC REMITTANCE', 'PALAWAN EXPRESS');
    protected $mop = [
        'App\Bank' => 'Bank Deposit',
        'App\OnlineBank' => 'Online Bank Transfer',
        'App\MobileTransfer' => 'Mobile Cash Transfer',
        'App\Remittance' => 'Money Remittance'
        ];
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function postFormReceipt(Request $request)
    {
     $input = $request->all();
     $submitreceipt = new SubmitReceiptInfoRequest();
        $validator         = Validator::make($request->all(), $submitreceipt->rules(), $submitreceipt->messages());

        // Validate Form
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()->toArray()], 400);
        }

     // if($request->ajax()){
        $order = Order::find($request->input('order_id'));
        if($order->status === 'unpaid'){
        $order->status = 'verification';
        $order->save();
        }
        $sts = $order->status; // Create admin panel where you can change status of order
        

        $mop = $order->mop;
        
        $mop->transaction_no = $request->input('transaction_no');
        $mop->account_name = $request->input('account_name');
        $mop->account_id = $request->input('account_id');
        $mop->amount =  $request->input('amount');
        $mop->date_paid = $request->input('date_paid');
        // $mop->receipt =  $request->input('receipt');
        $mop->save();

        // return response()->json(['success' => true, 'message' => 'Receipt Info Sent!', 'sts' => $sts], 200);
    // }
        return Redirect::back();
    }

    public function getBank(Request $request){
        if($request->ajax()){
        $mop = $this->bank_name;
        $type = 'Bank';
        $option = "Bank Deposit";
        // return response()->json(['html' => \View::make('layouts.mop')->with(compact('mop', 'type', 'option'))->render(), 'success' => true], 200);
        return \Response::json(\View::make('layouts.mop')->with(compact('mop', 'type', 'option'))->render());
        
        }
        
    }

    public function viewItemOrder(Request $request){
     
     try {
     $userID = \Auth::user()->id;
     $user = User::find($userID);
     $order = $user->orders()->findOrFail($request->input('id'));

     } catch (\Exception $e) {
        $errors = [
            'ExceptionError' => $e->getMessage(),
            ];
     return response()->json(['success' => false, 'message' => $errors], 400);

     }
     $itemOrder = $order->itemOrders()->get();
     // If User Admin
     if(\Bouncer::is($user)->an('admin')){
     // return view('layouts.itemOrder')->with(compact('itemOrder', 'order'));
     return response()->json(['success' => true, 'message' => 'Admin : Order Items Retrieve!', 'html' => \View::make('layouts.itemOrder')->with(compact('itemOrder', 'order'))->render()], 200);
  
     }
     // If User Owns the Items Order
     if(\Bouncer::allows('view-itemOrder', ItemOrder::class))
     {
     // return view('layouts.itemOrder')->with(compact('itemOrder', 'order'));
     return response()->json(['success' => true, 'message' => 'Order Items Retrieve!', 'html' => \View::make('layouts.itemOrder')->with(compact('itemOrder', 'order'))->render()], 200);

     }
     $errors = [
            'UnauthorizeError' => 'Unauthorized To View Order Item!',
            ];
     return response()->json(['success' => false, 'message' => $errors], 400);

     

    }
    public function deleteOrder(Request $request){
     $userID = \Auth::user()->id;
     $user = User::find($userID);
     $orderID = $request->input('order_id');
     $order = Order::findOrFail($orderID);
     
     if(\Bouncer::allows('delete-order', Order::class))
      {
        $itemOrders = $user->orders()->find($orderID)->itemOrders()->get();
        foreach ($itemOrders as $item) {
            $item->delete();
        }
        $user->orders()->find($orderID)->mop->delete();
        $user->orders()->find($orderID)->delete();
        return response()->json(['success' => true, 'message' => 'Order Deleted!'], 200);
      }

      if(\Bouncer::is($user)->an('admin')){
        $user = User::find($userID);
        
        $itemOrders = $user->orders()->find($orderID)->itemOrders()->get();
        foreach ($itemOrders as $item) {
            $item->delete();
        }
        $user->orders()->find($orderID)->mop->delete();
        $user->orders()->find($orderID)->delete();
        return response()->json(['success' => true, 'message' => 'Admin : Order Deleted!'], 200);
     }
        return response()->json(['success' => false, 'message' => 'Unauthorized To Delete Order!'], 400);

    }

    public function editOrder(Request $request){
     $userID = \Auth::user()->id;
     $user = User::find($userID);
     $orderID = $request->input('id');
     
     // if User is Admin
     if(Bouncer::is($user)->an('admin')){
        $order = Order::findOrFail($orderID);
        $order->status = $status;
        $order->method = $method;
        $order->shipment_fee = $shippingfee;
        $order->sub_total = $subtotal;
        $order->tax = $tax;
        $order->total = $total;
        $order->save(); 
     }
     // if User Owns the Order
     if(\Bouncer::allows('edit-order', Order::class)){
        $order = $user->orders()->find($orderID);
        $order->status = $status;
        $order->method = $method;
        $order->shipment_fee = $shippingfee;
        $order->sub_total = $subtotal;
        $order->tax = $tax;
        $order->total = $total;
        $order->save(); 
     }
    }
    public function postReceipt(Request $request) {
      $input = $request->all();
        
        // VALIDATION RULES
        $rules = array(
            'attachment' => 'image|max:3000',
        );
    
       // PASS THE INPUT AND RULES INTO THE VALIDATOR
        $validation = Validator::make($input, $rules);
 
        // CHECK GIVEN DATA IS VALID OR NOT
        if ($validation->fails()) {
            // return Redirect::to('/')->with('message', $validation->errors->first());
        return response()->json(['success' => false, 'message' => 'validation failed!'], 400);
        
        }
        
        
           $file = array_get($input,'attachment');
           // SET UPLOAD PATH
            $destinationPath = 'uploads';
            // GET THE FILE EXTENSION
            $extension = $file->getClientOriginalExtension();
            // RENAME THE UPLOAD WITH RANDOM NUMBER
            $fileName = rand(11111, 99999) . str_random(12). '.' . $extension;

            $receipt_url = $destinationPath.'/'.$fileName;
            // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
            $upload_success = $file->move($destinationPath, $fileName);

            $order = Order::find($request->input('id'));
            if ($order->attachment) {
                $file = str_replace("uploads/","",$order->attachment);
                \Storage::delete($file);
            }
            $order->attachment = $receipt_url;
            $order->save();
            var_dump($order);
        
        // IF UPLOAD IS SUCCESSFUL SEND SUCCESS MESSAGE OTHERWISE SEND ERROR MESSAGE
        if ($upload_success) {
            // return Redirect::to('/')->with('message', 'Image uploaded successfully');
        
        return response()->json(['success' => true, 'message' => 'Uploaded Successfully!'], 200);
        
        }
    }
    
    public function getOnlineBank(Request $request){
        if($request->ajax()){
            $mop = $this->online_bank_name;
            $type = 'Online Bank';
            $option = "Online Bank Transfer";
        // return response()->json(['html' => \View::make('layouts.mop')->with(compact('mop', 'type', 'option'))->render(), 'success' => true], 200);
        return \Response::json(\View::make('layouts.mop')->with(compact('mop', 'type', 'option'))->render());

        }
    }
    public function getMobileTransfer(Request $request){
        if($request->ajax()){
          $mop = $this->mobile_carrier;
          $type = 'Mobile Carrier';
          $option = "Mobile Cash Transfer";

        // return response()->json(['html' => \View::make('layouts.mop')->with(compact('mop', 'type', 'option'))->render(), 'success' => true], 200);
        return \Response::json(\View::make('layouts.mop')->with(compact('mop', 'type', 'option'))->render());
        
        }
    }
    public function getRemittance(Request $request){
        if($request->ajax()){
            $mop = $this->remittance_name;
            $type = 'Remittance';
            $option = "Money Remittance";

        // return response()->json(['html' => \View::make('layouts.mop')->with(compact('mop', 'type', 'option'))->render(), 'success' => true], 200);
        return \Response::json(\View::make('layouts.mop')->with(compact('mop', 'type', 'option'))->render());
        
        }
    }
    
    

    public function getCheckOut(Request $request)
    {
        if(!Cart::count()){
            return redirect('/');
        }
        $mop = $this->mop;
        $method = $this->method;
        $bank_name = $this->bank_name;
        $online_bank_name = $this->online_bank_name;
        $mobile_carrier = $this->mobile_carrier;
        $remittance_name = $this->remittance_name;


        $message = "Review Your Order!";
        return view('layouts.getCheckOut')->with(compact('mop','method', 'bank_name', 'online_bank_name' , 'mobile_carrier', 'remittance_name'));
        // return response()->json(['html' => \View::make('layouts.getCheckOut')->with(compact('mop', 'method', 'bank_name', 'online_bank_name', 'mobile_carrier', 'remittance_name'))->render(), 'success' => true, 'message' => $message], 200);
    }

    public function postCheckOut(Request $request)
    {
        
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
        if($method === 'pickup'){
            $shippingfee = 0;
        }

        $taxrate = $this->taxrate;
        $tax = round($subtotal * $taxrate);
        $total = $subtotal + $shippingfee + $tax;
       
        $order = new Order();
        $order->user_id = $userID;
        $order->status = $status;
        $order->method = $method;
        $order->shipment_fee = $shippingfee;
        $order->sub_total = $subtotal;
        $order->tax = $tax;
        $order->total = $total;

        

        $model = $request->input('mop');
        
        $mop = new $model();
        $mop->name = $request->input('name');
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
        $user = User::find($userID);
        Bouncer::allow($user)->to('remove-order', $order);
        Bouncer::allow($user)->to('edit-order', $order);
        Bouncer::allow($user)->to('view-itemOrder', ItemOrder::class);
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

        // Order Successfully Created
        DB::commit();
        Cart::destroy();
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
