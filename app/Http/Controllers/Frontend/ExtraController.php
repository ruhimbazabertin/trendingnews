<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;

class ExtraController extends Controller
{
    public function french(){

    	Session::get('lang');
    	Session()->forget('lang');
    	Session()->put('lang', 'french');
    	return Redirect()->back();

    }

    public function english(){

    	Session::get('lang');
    	Session()->forget('lang');
    	Session()->put('lang', 'english');
    	return Redirect()->back();


    }
}
