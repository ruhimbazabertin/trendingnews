<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){

    	$categories = Category::latest()->paginate(2);

    	return view('backend.Category.index', compact('categories'));

    }

    public function addCategory(){

    	return view('backend.category.create');
    }

    public function storeCategory(Request $request){

    		$validateData = $request->validate([

    			'category_eng' => 'required|unique:categories|max:255',
    			'category_hind' => 'required|unique:categories|max:255',
    		]);

    		$category = new Category;

    		$category->category_eng = $request->category_eng;
    		$category->category_hind = $request->category_hind;

    		$category->save();

    		$notification = array(

    			'message' => 'Category Inserted Successfully',
    			'alert-type' => 'success',
    		);

    	return Redirect()->route('categories')->with($notification);
    }

    public function editCategory($id){

    		$category = Category::find($id);

    	return view('backend.category.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id){

     		$validateData = $request->validate([

    			'category_eng' => 'required|unique:categories|max:255',
    			'category_hind' => 'required|unique:categories|max:255',
    		]);

    		$category = Category::find($id)->update([

    			'category_eng' => $request->category_eng,
    			'category_hind' => $request->category_hind,

    		]);
    		$notification = array(

    			'message' => 'Category Updated Successfully',
    			'alert-type' => 'success',
    		);

    	return Redirect()->route('categories')->with($notification);
    }

    public function deleteCategory($id){

    	$category = Category::find($id)->delete();

    	    		$notification = array(

    			'message' => 'Category Deleted Successfully',
    			'alert-type' => 'error',
    		);


    	return Redirect()->route('categories')->with($notification);

    }
}
