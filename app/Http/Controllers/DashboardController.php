<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests\ProfileRequest;
use Validator;
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

    public function editProfile(Request $request)
    {
        
        $data = Profile::find(\Auth::user()->id);
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['display_name'] = $request->display_name;
        $data['contact_no'] = $request->contact_no;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['province_state'] = $request->province_state;
        $data['zip_code'] = $request->zip_code;
        $data['country'] = $request->country;
        
        $data['social_links'] = $request->social_links;
        // $social_links['facebook'] = $request->social_links['facebook'];
        // $social_links['twitter'] = $request->social_links['twitter'];
        // $social_links['instagram'] = $request->social_links['instagram'];

        $data['contact_options'] = $request->contact_options;
        // $contact_options['globe'] = $request->contact_options['globe'];
        // $contact_options['smart'] = $request->contact_options['smart'];
        // $contact_options['sun'] = $request->contact_options['sun'];
        // $contact_options['tm'] = $request->contact_options['tm'];
        $data->save();
        return \Redirect::back();
    }

    public function viewProfile()
    {
        $data=array();

        $user = Profile::find(\Auth::user()->id);
        $data['first_name'] = $user->first_name;
        $data['last_name'] = $user->last_name;
        $data['display_name'] = $user->display_name;
        $data['contact_no'] = $user->contact_no;
        $data['address'] = $user->address;
        $data['city'] = $user->city;
        $data['province_state'] = $user->province_state;
        $data['zip_code'] = $user->zip_code;
        $data['country'] = $user->country;
        $social_links= $user->social_links;
        $data['social_links'] = $social_links;
        // $social_links['facebook'] = $user->social_links['facebook'];
        // $social_links['twitter'] = $user->social_links['twitter'];
        // $social_links['instagram'] = $user->social_links['instagram'];
        $contact_options= $user->contact_options;
        $data['contact_options'] = $contact_options;
        // $contact_options['globe'] = $user->contact_options['globe'];
        // $contact_options['smart'] = $user->contact_options['smart'];
        // $contact_options['sun'] = $user->contact_options['sun'];
        // $contact_options['tm'] = $user->contact_options['tm'];
        // return $data;




        return view('pages.edit_profile')->with(compact('data'));
    }
}
