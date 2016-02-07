<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use App\OnlineBank;
use App\MobileTransfer;
use App\Remittance;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PaymentDetailsController extends Controller
{
	protected $address = '797 F Yabut Compound 9 De Pebrero St. Mandaluyong City 1550 Metro Manila Philippines';
    public function loadBDO(Request $request)
    {
    if($request->ajax()){
     $bank = Bank::where('account_id' ,'010150019025')->select('account_id', 'name', 'account_name')->first();
     $mop = $bank->name;
     $account_name = $bank->account_name;
     $account_id = $bank->account_id;
     $address = null;
    return \Response::json(\View::make('layouts.forms.paymentdetails')->with(compact('mop', 'account_name', 'account_id', 'address'))->render());
     }
    }
    public function loadBPI(Request $request)
    {
    if($request->ajax()){
     $bank = Bank::where('account_id' ,'2689020383')->select('account_id', 'name', 'account_name')->first();
     $mop = $bank->name;
     $account_name = $bank->account_name;
     $account_id = $bank->account_id;
     $address = null;
    return \Response::json(\View::make('layouts.forms.paymentdetails')->with(compact('mop', 'account_name', 'account_id', 'address'))->render());
    }
    }
    public function loadMETROBANK(Request $request)
    {
    if($request->ajax()){
     $bank = Bank::where('account_id' ,'9876543210')->select('account_id', 'name', 'account_name')->first();
     $mop = $bank->name;
     $account_name = $bank->account_name;
     $account_id = $bank->account_id;
     $address = null;
    return \Response::json(\View::make('layouts.forms.paymentdetails')->with(compact('mop', 'account_name', 'account_id', 'address'))->render());
    }
    }
    public function loadUNIONBANK(Request $request)
    {
    if($request->ajax()){
     $bank = Bank::where('account_id' ,'1234567890')->select('account_id', 'name', 'account_name')->first();
     $mop = $bank->name;
     $account_name = $bank->account_name;
     $account_id = $bank->account_id;
     $address = null;
    return \Response::json(\View::make('layouts.forms.paymentdetails')->with(compact('mop', 'account_name', 'account_id', 'address'))->render());
    }
    }
    public function loadEASTWEST(Request $request)
    {
     if($request->ajax()){
     $bank = Bank::where('account_id' ,'200009019676')->select('account_id', 'name', 'account_name')->first();
     $mop = $bank->name;
     $account_name = $bank->account_name;
     $account_id = $bank->account_id;
     $address = null;
    return \Response::json(\View::make('layouts.forms.paymentdetails')->with(compact('mop', 'account_name', 'account_id', 'address'))->render());
    }
    }
    public function loadGCASH(Request $request)
    {
    if($request->ajax()){
     $mobile = MobileTransfer::where('account_id' ,'09063508097')->select('name', 'account_name', 'account_id')->first();
      $mop = $mobile->name;
     $account_name = $mobile->account_name;
     $account_id = $mobile->account_id;
     $address = null;
    return \Response::json(\View::make('layouts.forms.paymentdetails')->with(compact('mop', 'account_name', 'account_id', 'address'))->render());
    }
    }
    public function loadSMARTMONEY(Request $request)
    {
    if($request->ajax()){
     $mobile = MobileTransfer::where('account_id' ,'5299676029033103')->select('name', 'account_name', 'account_id')->first();
     $mop = $mobile->name;
     $account_name = $mobile->account_name;
     $account_id = $mobile->account_id;
     $address = null;
    return \Response::json(\View::make('layouts.forms.paymentdetails')->with(compact('mop', 'account_name', 'account_id', 'address'))->render());
    }
    }
    public function loadWESTERUNION(Request $request)
    {
    if($request->ajax()){
    $remittance = Remittance::where('id', 1)->select('name', 'account_name', 'account_id')->first();
    $mop = $remittance->name;
    $account_name = $remittance->account_name;
    $account_id = $remittance->account_id;
    $address = $this->address;
 	return \Response::json(\View::make('layouts.forms.paymentdetails')->with(compact('mop', 'account_name', 'account_id','address'))->render());
    }
    }
    public function loadMONEYGRAM(Request $request)
    {
    if($request->ajax()){
	$remittance = Remittance::where('id', 2)->select('name', 'account_name', 'account_id')->first();
    $mop = $remittance->name;
    $account_name = $remittance->account_name;
    $account_id = $remittance->account_id;
    $address = $this->address;
    return \Response::json(\View::make('layouts.forms.paymentdetails')->with(compact('mop', 'account_name', 'account_id','address'))->render());
    }
	}
    public function loadCEBUANALHUILLIER(Request $request)
    {
    if($request->ajax()){
	$remittance = Remittance::where('id', 3)->select('name', 'account_name', 'account_id')->first();
    $mop = $remittance->name;
    $account_name = $remittance->account_name;
    $account_id = $remittance->account_id;
    $address = $this->address;
    return \Response::json(\View::make('layouts.forms.paymentdetails')->with(compact('mop', 'account_name', 'account_id','address'))->render());
    }
}
    public function loadCEBUANAMLHUILLIER(Request $request)
    {
    if($request->ajax()){
	$remittance = Remittance::where('id', 4)->select('name', 'account_name', 'account_id')->first();
    $mop = $remittance->name;
    $account_name = $remittance->account_name;
    $account_id = $remittance->account_id;
    $address = $this->address;
    return \Response::json(\View::make('layouts.forms.paymentdetails')->with(compact('mop', 'account_name', 'account_id','address'))->render());
    }
}

    public function loadLBCREMITTANCE(Request $request)
    {
    if($request->ajax()){
	$remittance = Remittance::where('id', 5)->select('name', 'account_name', 'account_id')->first();
    $mop = $remittance->name;
    $account_name = $remittance->account_name;
    $account_id = $remittance->account_id;
    $address = $this->address;
    return \Response::json(\View::make('layouts.forms.paymentdetails')->with(compact('mop', 'account_name', 'account_id','address'))->render());
    }
	}
    public function loadPALAWANEXPRESS(Request $request)
    {
    if($request->ajax()){
    $remittance = Remittance::where('id', 6)->select('name', 'account_name', 'account_id')->first();
    $mop = $remittance->name;
    $account_name = $remittance->account_name;
    $account_id = $remittance->account_id;
    $address = $this->address;
    return \Response::json(\View::make('layouts.forms.paymentdetails')->with(compact('mop', 'account_name', 'account_id','address'))->render());
    }
    }
}
