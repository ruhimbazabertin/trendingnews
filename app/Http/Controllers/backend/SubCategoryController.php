<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subcategory;
use App\Models\Category;

use DB;

class SubCategoryController extends Controller
{
        public function index(){

    	//$subcategories = Subcategory::latest()->paginate(2);
    	$subcategories = DB::table('subcategories')
    					->join('categories', 'subcategories.category_id', 'categories.id')
    					->select('subcategories.*', 'categories.category_eng')
    					->orderBy('id', 'desc')->paginate(3);

    	return view('backend.subcategory.index', compact('subcategories'));

    }

    public function addSubcategory(){

    	$categories = Category::get();

    	return view('backend.subcategory.create', compact('categories'));
    }

    public function storeSubcategory(Request $request){

    		$validateData = $request->validate([

    			'subcategory_eng' => 'required|unique:subcategories|max:255',
    			'subcategory_hind' => 'required|unique:subcategories|max:255',
    		]);

    		$subcategory = new subcategory;

    		$subcategory->subcategory_eng = $request->subcategory_eng;
    		$subcategory->subcategory_hind = $request->subcategory_hind;
    		$subcategory->category_id = $request->category_id;

    		$subcategory->save();

    		$notification = array(

    			'message' => 'SubCategory Inserted Successfully',
    			'alert-type' => 'success',
    		);

    	return Redirect()->route('subcategories')->with($notification);
    }

    public function editSubcategory($id){

    	$subcategory = DB::table('subcategories')->where('id', $id)->first();
    	$categories = Category::get();

    	return view('backend.subcategory.edit', compact('subcategory', 'categories'));
    }

    public function updatesubcategory(Request $request, $id){

    	    $validateData = $request->validate([

    			'subcategory_eng' => 'required|unique:subcategories|max:255',
    			'subcategory_hind' => 'required|unique:subcategories|max:255',
    			'category_id' => 'required',
    		]);

    	    $subcategory = Subcategory::find($id)->update([
    	    	'subcategory_eng' => $request->subcategory_eng,
    	    	'subcategory_hind' => $request->subcategory_hind,
    	    	'category_id'      => $request->category_id

    	    ]);

    	return Redirect()->route('subcategories');
    }

    public function deletesubcategory($id){

    	$subcategory = Subcategory::find($id)->delete();

    	$notification = array(

    		'message' => 'Subcategory Deleted Successfully',
    		'alert-type' => 'error',
    	);

    	return Redirect()->route('subcategories')->with($notification);

    }
}
