<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Website;

use DB;

class WebsiteController extends Controller
{
    public function websiteSetting(){

    	$websites = DB::table('websites')->orderBy('id', 'desc')->paginate(5);

    	return view('backend.website.index', compact('websites'));
    }

    public function addWebsite(){


    	return view('backend.website.create');
    }

    public function storeWebsite(Request $request){

    	$website = new Website;

    	$website->website_name = $request->website_name;
    	$website->website_link = $request->website_link;

    	$website->save();

    	$notification = array(

    		'message' => 'New Website Added successfully.' , 
    		'alert_type' => 'success',
    	);

    	return Redirect()->route('all.website')->with($notification);
    }

    public function deleteWebsite($id){

    	$website = Website::find($id)->delete();

    	    $notification = array(

    		'message' => 'Website Deleted successfully.' , 
    		'alert_type' => 'success',
    	);

    	return Redirect()->back()->with($notification);
    }

}
