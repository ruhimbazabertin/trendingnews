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

<div class="col-lg-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Video Gallery</h4>
    
   <div class="template-demo">
   	<a href="{{route('add.video')}}"><button type="button" class="btn btn-primary btn-fw" style="float: right;">Add Video</button></a>
   </div>

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th> # </th>
            <th> Video Title </th>
            <th> Type </th>
            <th colspan="2"> Action </th>
          </tr>
        </thead>
        <tbody>
        	@php($count = 1)
        @foreach($videos as $video)
          <tr>
            <td> {{$count++}} </td>
            <td> {{$video->title}} </td>
           
            <td> 
             @if($video->type == 1 )
             <span class="badge badge-success">Big Video</span>
             @else
             <span class="badge badge-info">Small Video</span>
             @endif
            </td>

            <td>
            <a href="" class="btn btn-info">Edit</a>
            <a href="{{route('delete.video',$video->id)}}" onclick="return confirm('Are You Sure Enough?')" class="btn btn-danger">Delete</a>
         </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
   {{ $videos->links('pagination-links') }}
</div>
</div>

@endsection