<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\District;

class DistrictController extends Controller
{
        public function index(){

    	$districts = District::latest()->paginate(3);

    	return view('backend.district.index', compact('districts'));

    }

    public function addDistrict(){


    	return view('backend.district.create');
    }

    public function storeDistrict(Request $request){

    	$validateData = $request->validate([

    			'district_eng' => 'required|unique:districts|max:255',
    			'district_hind' => 'required|unique:districts|max:255',
    		]);

    		$district = new District;

    		$district->district_eng = $request->district_eng;
    		$district->district_hind = $request->district_hind;

    		$district->save();

    		$notification = array(

    			'message' => 'Category Inserted Successfully',
    			'alert-type' => 'success',
    		);

    	return Redirect()->route('district')->with($notification);

    }

    public function editDistrict($id){

    	$district = District::find($id);

    	return view('backend.district.edit', compact('district'));

    }

    public function updateDistrict(Request $request, $id){

    	     		$validateData = $request->validate([

    			'district_eng' => 'required|unique:districts|max:255',
    			'district_hind' => 'required|unique:districts|max:255',
    		]);

    		$district = District::find($id)->update([

    			'district_eng' => $request->district_eng,
    			'district_hind' => $request->district_hind,

    		]);
    		$notification = array(

    			'message' => 'District Updated Successfully',
    			'alert-type' => 'success',
    		);

    	return Redirect()->route('district')->with($notification);
    }

    public function deleteDistrict($id){

    	$district = District::find($id)->delete();

    	$notification = array(

    		'message' => 'District Deleted Successfully',
    		'alert-type' => 'error',

    	);

    	return Redirect()->route('district')->with($notification);

    }

}
