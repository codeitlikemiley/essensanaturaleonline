<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests\ProfileRequest;
use Validator;
use Input;
use App\User;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile()
    {
    	return view('pages.profile');
    }

    public function updateProfile(Request $request)
    {
    	if($request->ajax){
    		
    	
    	$profilerequest = new ProfileRequest();
        $validator    = Validator::make($request->all(), $profilerequest->rules(), $profilerequest->messages());
    	if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()->toArray()], 400);
        }
        $mobile_no = $request->contact_no;
        $address = $request->address;
        $city = $request->city;
        $province_state = $request->province_state;
        $zip_code = $request->zip_code;
        $country = $request->country;

        $profileID = Auth::user()->profile->id;
        $profile = Profile::find($profileID);
        $profile->contact_no = $mobile_no;
        $profile->address = $address;
        $profile->city = $city;
        $profile->province_state = $province_state;
        $profile->zip_code = $zip_code;
        $profile->country = $country;
        $profile->save();
        return response()->json(['success' => true, 'message' => 'Profile Updated!'], 200);
        }
    }
}
