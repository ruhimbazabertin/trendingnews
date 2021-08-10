<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Video;

use DB;
use Image;

class GalleryController extends Controller
{
    public function photoGallery(){

    	$galleries = DB::table('photos')->orderBy('id', 'desc')->paginate(5);

    	return view('backend.gallery.photos', compact('galleries'));
    }

    public function addPhoto(){


    	return view('backend.gallery.createPhoto');
    }

    public function storePhoto(Request $request){

    	$data = array();

		$data['title'] = $request->title;
		$data['type'] = $request->type;


		$image = $request->photo;
		if ($image) {
			$image_one = uniqid().'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(500,300)->save('image/photogallery/'.$image_one);

			$data['photo'] = 'image/photogallery/'.$image_one;

			DB::table('photos')->insert($data);

			$notification = array(

    			'message' => 'New Photo Inserted Successfully',
    			'alert-type' => 'success',
    		);

    	return Redirect()->route('photo.gallery')->with($notification);

		}else{

				$notification = array(

    			'message' => 'Something Went Wrong.',
    			'alert-type' => 'error',
    		);

			return Redirect()->back()->with($notification);
    }
	}

	public function deletePhoto($id){

		$photo = DB::table('photos')->where('id', $id)->first();

		unlink($photo->photo);

		$photo = DB::table('photos')->where('id', $id)->delete();

				$notification = array(

    			'message' => 'Photo Deleted Successfully',
    			'alert-type' => 'success',
    		);

		return Redirect()->back()->with($notification);

	}

	public function videoGallery(){

		$videos = DB::table('videos')->orderBy('id', 'desc')->paginate(5);

		return view('backend.gallery.videos', compact('videos'));
	}

	public function addVideo(){

		return view('backend.gallery.createVideo');
	}

	public function storeVideo(Request $request){

		$data = array();

		$data['title'] = $request->title;
		$data['embed_code'] = $request->embed_code;
		$data['type'] = $request->type;

		DB::table('videos')->insert($data);

		$notification = array(

    		'message' => 'New Video Inserted Successfully',
    		'alert-type' => 'success',
    		);

		return Redirect()->route('video.gallery')->with($notification);

	}

	public function deleteVideo($id){

		$video = Video::find($id)->delete();

			$notification = array(

    		'message' => 'Video Deleted Successfully',
    		'alert-type' => 'success',
    		);

		return Redirect()->route('video.gallery')->with($notification);

	}

}
