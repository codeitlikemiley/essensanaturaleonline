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
        $this->middleware('member', ['except' => ['updateAboutMe', 'updateProfilePic', 'viewProfile']]);
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
        
        $data['display_name'] = $request->display_name;
        $data['contact_no'] = $request->contact_no;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['province_state'] = $request->province_state;
        $data['zip_code'] = $request->zip_code;
        $data['country'] = $request->country;

        $data['social_links'] = $request->social_links;
        
        $data['contact_options'] = $request->contact_options;

        $data->save();
        return \Redirect::back();
    }

    public function viewProfile()
    {
        $data=array();

        $user = Profile::find(\Auth::user()->id);
        $data['id'] = $user->id;
        $data['profile_pic'] = $user->profile_pic;
        $data['about_me'] = $user->about_me;
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

        $contact_options= $user->contact_options;
        $data['contact_options'] = $contact_options;

        return view('pages.edit_profile')->with(compact('data'));
    }

    public function updateProfilePic(Request $request){
        
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

            $profilepic = $destinationPath.'/'.$fileName;
            // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
            $upload_success = $file->move($destinationPath, $fileName);

            $profile = Profile::find($request->input('id'));
            // Assign Old File Variable
            $oldfile = $profile->profile_pic;
            // Delete Old Receipt if There is
            if ($oldfile) {
                \File::delete($profile->profile_pic);
            }
            // Attach the New Receipt
            $profile->profile_pic = $profilepic;
            $profile->save();
            $data['profile_pic'] = $profile->profile_pic;
            
        // IF UPLOAD IS SUCCESSFUL SEND SUCCESS MESSAGE OTHERWISE SEND ERROR MESSAGE
        if ($upload_success) {
            // return Redirect::to('/')->with('message', 'Image uploaded successfully');
        
        return response()->json(['html' => \View::make('layouts.forms.profilepic')->with(compact('data'))->render(), 'success' => true, 'message' => 'Uploaded Successfully!'], 200);
        
        }
    }

    public function updateAboutMe(Request $request){
        $profile = \Auth::user()->profile;
        $profile->about_me = $request->input('about_me');
        $profile->save();
        // return \Redirect::back();
        return response()->json(['success' => true, 'message' => 'About Me Updated!'], 200);

    }
}
