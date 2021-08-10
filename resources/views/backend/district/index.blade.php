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
    <h4 class="card-title">District Page</h4>
    
   <div class="template-demo">
   	<a href="{{route('add.district')}}"><button type="button" class="btn btn-primary btn-fw" style="float: right;">Add District</button></a>
   </div>

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th> # </th>
            <th> District Eng </th>
            <th> District French </th>
            <th colspan="2"> Action </th>
          </tr>
        </thead>
        <tbody>
        	@php($count = 1)
        @foreach($districts as $district)
          <tr>
            <td> {{$count++}} </td>
            <td> {{$district->district_eng}} </td>
            <td> {{$district->district_hind}} </td>
            <td>
            <a href="{{ route('edit.district',$district->id) }}" class="btn btn-info">Edit</a>
            <a href="{{ route('delete.district',$district->id) }}" onclick="return confirm('Are You Sure Enough?')" class="btn btn-danger">Delete</a>
         </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
   {{ $districts->links('pagination-links') }}
</div>
</div>

@endsection