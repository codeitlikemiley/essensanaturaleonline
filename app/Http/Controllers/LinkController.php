<?php

namespace App\Http\Controllers;

use App\Link;
use Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Product;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * [showRefLink description]
     * Route::get('{link?}', ['as' => 'reflink', 'uses' => 'LinkController@showRefLink']);
     *
     * @param [text] $link [referral link]
     *
     * @return [json] [all info about the link]
     */
    public function showRefLink($link = null)
    {
        //  // If it has a Sponsor Cookie
        if (\Cookie::has('sponsor')) {
            $cookie = \Cookie::get('sponsor');
            $link = $cookie['link'];
            $link  = Link::findByLink($link)->load('user.profile');
            $product = Product::find(1);
            return view('pages.referralLink')->with(compact('link','product'));
        }
        // Check if the Provided Link is Valid  Redirect to Home if Invalid Link!
        try {
            $link = Link::findByLink($link);
            $sp_lid = $link->id;
            // If Sponsor is Not Active LeapFrog to ActiveSponsor
            if(!$link->active){
            $sp_lid= $link->activeSponsor($sp_lid);
            }
            // Load User Profile
            $link  = Link::find($sp_lid)->load('user.profile');
            $splink = [];
            $splink['id'] = $link->id;
            $splink['user_id'] = $link->user_id;
            $splink['link'] = $link->link;
            // Load Product
            $product = Product::find(1);
            
            // Assign $splink to the cookie
            // Note Cookie Wont Be Created if Exceeded More than 4kb
            // Cookie set Forever / 5 Years or until Cache Clear
            // No Needed To Return With Cookie if it is Queue
            
            $cookie = \Cookie::queue('sponsor', $splink, 2628000);

            // Return Referral View with Variable Link
              return view('pages.referralLink')->with(compact('link','product'));

            // LINK PROVIDED IS INVALID REDIRECT HOME
            } catch (ModelNotFoundException $e) {
                return Redirect::to('/');

         }
    }

         

}
