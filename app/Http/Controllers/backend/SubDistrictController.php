<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SubDistrict;
use App\Models\District;
use DB;

class SubDistrictController extends Controller
{
    public function index(){

    	    	$subdistricts = DB::table('sub_districts')
    					->join('districts', 'sub_districts.district_id', 'districts.id')
    					->select('sub_districts.*', 'districts.district_eng')
    					->orderBy('id', 'desc')->paginate(3);


    	return view('backend.subdistrict.index', compact('subdistricts'));
    }

    public function addSubdistrict(){

    	$districts = District::get();

    	return view('backend.subdistrict.create', compact('districts'));
    }

    public function storeSubdistrict(Request $request){

    		    	$validateData = $request->validate([

    			'subdistrict_eng' => 'required|unique:sub_districts|max:255',
    			'subdistrict_hind' => 'required|unique:sub_districts|max:255',
    			'district_id' => 'required',
    		]);

    		$subdistrict = new SubDistrict;

    		$subdistrict->subdistrict_eng = $request->subdistrict_eng;
    		$subdistrict->subdistrict_hind = $request->subdistrict_hind;
    		$subdistrict->district_id      = $request->district_id;

    		$subdistrict->save();

    		$notification = array(

    			'message' => 'SubDistrict Inserted Successfully',
    			'alert-type' => 'success',
    		);

    	return Redirect()->route('subdistrict')->with($notification);
    }

    public function editSubdistrict($id){

    	$subdistrict = SubDistrict::find($id);
    	$districts    = 	District::get();

    	return view('backend.subdistrict.edit', compact('subdistrict','districts'));

    }

    public function updateSubdistrict(Request $request,$id){

    	    	$validateData = $request->validate([

    			'subdistrict_eng' => 'required|unique:sub_districts|max:255',
    			'subdistrict_hind' => 'required|unique:sub_districts|max:255',
    			'district_id' => 'required',
    		]);

    		$subdistrict = SubDistrict::find($id)->update([

    			'subdistrict_eng' => $request->subdistrict_eng,
    			'subdistrict_hind' => $request->subdistrict_hind,
    			'district_id'   => $request->district_id,

    		]);
    		$notification = array(

    			'message' => 'SubDistrict Updated Successfully',
    			'alert-type' => 'success',
    		);


    	return Redirect()->route('subdistrict')->with($notification);
    }

    public function deleteSubdistrict($id){

    	$subdistrict = SubDistrict::find($id)->delete();

	    	$notification = array(

			'message' => 'SubDistrict Deleted Successfully',
			'alert-type' => 'error',
		);

    	return Redirect()->route('subdistrict')->with($notification);
    }
}
