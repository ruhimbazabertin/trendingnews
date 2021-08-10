<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\District;
use App\Models\Post;
use DB;
use Auth;
use Image;

class PostController extends Controller
{

	public function index(){

		$posts = DB::table('posts')
				->join('categories', 'posts.category_id', 'categories.id')
				->join('subcategories', 'posts.subcategory_id', 'subcategories.id')
				->join('districts', 'posts.district_id', 'districts.id')
				->join('sub_districts', 'posts.subdistrict_id', 'sub_districts.id')
				->join('users', 'posts.user_id', 'users.id')
				->select('posts.*', 'categories.category_eng', 'subcategories.subcategory_eng', 'districts.district_eng', 'sub_districts.subdistrict_eng','users.name','users.email')
				->orderBy('id', 'desc')->paginate(5);

		return view('backend.post.index', compact('posts'));
	}

    public function createPost(){

    	$categories = Category::get();
    	$districts = District::get();

    	return view('backend.post.create', compact('categories', 'districts'));
    }

   public function storePost(Request $request){

		$validateData = $request->validate([

			'category_id' => 'required',
			'subcategory_id' => 'required',
			]);

		$data = array();

		$data['title_eng'] = $request->title_eng;
		$data['title_hind'] = $request->title_hind;
		$data['user_id'] = Auth::id();
		$data['category_id'] = $request->category_id;
		$data['subcategory_id'] = $request->subcategory_id;
		$data['district_id'] = $request->district_id;
		$data['subdistrict_id'] = $request->subdistrict_id;
		$data['tags_eng'] = $request->tags_hind;
		$data['tags_hind'] = $request->tags_hind;
		$data['details_eng'] = $request->details_eng;
		$data['details_hind'] = $request->details_hind;
		$data['headline'] = $request->headline;
		$data['first_section'] = $request->first_section;
		$data['first_section_thumbnail'] = $request->first_section_thumbnail;
		$data['big_thumbnail'] = $request->big_thumbnail;
		$data['post_date'] = date('d-m-y');
		$data['post_month'] = date("F");

		$image = $request->image;
		if ($image) {
			$image_one = uniqid().'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(500,300)->save('image/postimage/'.$image_one);

			$data['image'] = 'image/postimage/'.$image_one;

			DB::table('posts')->insert($data);

			$notification = array(

    			'message' => 'Post Inserted Successfully',
    			'alert-type' => 'success',
    		);

    	return Redirect()->route('all.post')->with($notification);

		}else{

				$notification = array(

    			'message' => 'Something Went Wrong.',
    			'alert-type' => 'error',
    		);

			return Redirect()->back()->with($notification);
		}
    	
    }

    public function editPost(Request $request, $id){

    	//$post = Post::find($id)->first();
    	$post = DB::table('posts')->where('id', $id)->first();
    	$categories = Category::get();
    	$districts = District::get();

    	return view('backend.post.edit', compact('post', 'categories', 'districts'));
    }

    public function updatePost(Request $request, $id){

    	$data = array();

		$data['title_eng'] = $request->title_eng;
		$data['title_hind'] = $request->title_hind;
		$data['user_id'] = Auth::id();
		$data['category_id'] = $request->category_id;
		$data['subcategory_id'] = $request->subcategory_id;
		$data['district_id'] = $request->district_id;
		$data['subdistrict_id'] = $request->subdistrict_id;
		$data['tags_eng'] = $request->tags_hind;
		$data['tags_hind'] = $request->tags_hind;
		$data['details_eng'] = $request->details_eng;
		$data['details_hind'] = $request->details_hind;
		$data['headline'] = $request->headline;
		$data['first_section'] = $request->first_section;
		$data['first_section_thumbnail'] = $request->first_section_thumbnail;
		$data['big_thumbnail'] = $request->big_thumbnail;

		$oldImage = $request->oldImage;

		$image = $request->image;
		if ($image) {
			$image_one = uniqid().'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(500,300)->save('image/postimage/'.$image_one);

			$data['image'] = 'image/postimage/'.$image_one;

			DB::table('posts')->where('id', $id)->update($data);

			unlink($oldImage);

			$notification = array(

    			'message' => 'Post Updated Successfully',
    			'alert-type' => 'success',
    		);

    	return Redirect()->route('all.post')->with($notification);

		}else{

			$data['image'] = $oldImage;

			DB::table('posts')->where('id', $id)->update($data);

			$notification = array(

    			'message' => 'Post Updated Successfully',
    			'alert-type' => 'success',
    		);

    		return Redirect()->route('all.post')->with($notification);
    }
}

    public function deletePost($id){

    	$post = Post::find($id);
    	unlink($post->image);
    	$post = Post::find($id)->delete();

    	//$post = DD::table('posts')->where('id', $id)->first();
    	//unlink($post->image);
    	//$post = DD::table('posts')->where('id', $id)->delete();

    		$notification = array(

    			'message' => 'Post Deleted Successfully',
    			'alert-type' => 'error',
    		);

    	return Redirect()->route('all.post')->with($notification);


    }


    public function getSubCategory($category_id){

    	$subcategory = DB::table('subcategories')->where('category_id', $category_id)->get();

    	return response()->json($subcategory);

    }

    public function getSubdistrict($district_id){

    	$subdistrict = DB::table('sub_districts')->where('district_id', $district_id)->get();

    	return response()->json($subdistrict);

    }
}
