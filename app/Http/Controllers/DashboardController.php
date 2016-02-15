<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Link;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests\ProfileRequest;
use Validator;
use App\User;
use App\Http\Requests\UpdateLinkRequest;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('member', ['only' => ['viewProfile','editProfile','updateProfilePic','updateAboutMe']]);
        $this->middleware('auth');
    }

    public function showShippingAddress()
    {
    	return view('pages.profile');
    }

    public function updateShippingAddress(Request $request)
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

        $user = User::with('links','profile')->find(\Auth::user()->id);
        $data['id'] = $user->id;
        $data['profile_pic'] = $user->profile->profile_pic;
        $data['about_me'] = $user->profile->about_me;
        $data['first_name'] = $user->profile->first_name;
        $data['last_name'] = $user->profile->last_name;
        $data['display_name'] = $user->profile->display_name;
        $data['contact_no'] = $user->profile->contact_no;
        $data['address'] = $user->profile->address;
        $data['city'] = $user->profile->city;
        $data['province_state'] = $user->profile->province_state;
        $data['zip_code'] = $user->profile->zip_code;
        $data['country'] = $user->profile->country;
        $social_links= $user->profile->social_links;
        $data['social_links'] = $social_links;

        $contact_options= $user->profile->contact_options;
        $data['contact_options'] = $contact_options;
        $links = $user->links;
        $data['links'] =$links;
        

        return view('pages.edit_profile')->with(compact('data'));
    }

    public function updateLinks(Request $request){
         $updatelink = new UpdateLinkRequest();
         $validator         = Validator::make($request->all(), $updatelink->rules(), $updatelink->messages());
         if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()->toArray()], 400);
        }
        $userID = $request->user_id;
        $links = $request->links;

        \DB::beginTransaction();
        $link = User::find($userID)->links;

        for ($i = 0; $i < count($links); $i++){
            $reflink = $link->find($links[$i]['id']);
            $reflink->link = $links[$i]['link'];
            $reflink->save();
            try {
            if (!$reflink) {
                throw new \Exception('We Have Restricted You From Editing Others Link!');
            }
        } catch (\Exception $e) {
            \DB::rollback();

            $errors = [
            'ExceptionError' => $e->getMessage(),
            ];

            return response()->json(['success' => false, 'errors' => $errors], 400); // Failed Creation
        }
        }
        \DB::commit();
        return response()->json(['success' => true, 'message' => 'Link Have Been Renamed!'], 200);

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
