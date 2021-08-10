@extends('admin.admin_master')

@section('admin')
 <div class="content-wrapper">
	<div class="row">
	  <div class="col-12 grid-margin stretch-card">
	    <div class="card corona-gradient-card">
	      <div class="card-body py-0 px-0 px-sm-3">
	        <div class="row align-items-center">
	          <div class="col-4 col-sm-3 col-xl-2">
	            <img src="{{asset('backend/assets/images/dashboard/Group126@2x.png')}}" class="gradient-corona-img img-fluid" alt="">
	          </div>
	         <div class="col-5 col-sm-7 col-xl-8 p-0">
	            <h4 class="mb-1 mb-sm-0">Welcome to Trends News</h4>
	          </div>
	          <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
	            <span>
	              <a href="{{url('/')}}" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Visit frontend</a>
	            </span>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
   </div>

   <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Category</h4>
        <form  action="{{route('update.category', $category->id)}}" method="POST">
        	@csrf
          <div class="form-group">
            <label for="category_eng">Category English</label>
            <input type="text" class="form-control" name="category_eng" value="{{$category->category_eng}}" placeholder="Enter English Category">

            @error('category_eng')
            <span class="text-danger">{{$message}}</span>
            @enderror

          </div>
          <div class="form-group">
            <label for="categoryFrench">Category French</label>
            <input type="text" class="form-control" name="category_hind" value="{{$category->category_hind}}" placeholder="Enter French Category">

            @error('category_hind')
            <span class="text-danger">{{$message}}</span>
            @enderror

          </div>
          <button type="submit" class="btn btn-primary mr-2">Update Category</button>
        </form>
      </div>
    </div>
      </div>




   @endsection