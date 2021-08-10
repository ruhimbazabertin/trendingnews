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
        <h4 class="card-title">Update Prayer Settings</h4>
        <form  action="{{ route('update.prayer', $prayer->id) }}" method="post">
        	@csrf
          <div class="form-group">
            <label for="category_eng">Monday</label>
            <input type="text" class="form-control" name="monday" value="{{$prayer->monday}}">

            @error('monday')
            <span class="text-danger">{{$message}}</span>
            @enderror

          </div>
          <div class="form-group">
            <label for="categoryFrench">Tuesday</label>
            <input type="text" class="form-control" name="tuesday" value="{{$prayer->tuesday}}">

            @error('tuesday')
            <span class="text-danger">{{$message}}</span>
            @enderror

          </div>
          <div class="form-group">
            <label for="categoryFrench">Wednesday</label>
            <input type="text" class="form-control" name="wednesday" value="{{$prayer->wednesday}}">

            @error('wednesday')
            <span class="text-danger">{{$message}}</span>
            @enderror

          </div>
          <div class="form-group">
            <label for="categoryFrench">Thursday</label>
            <input type="text" class="form-control" name="thursday" value="{{$prayer->thursday}}">

            @error('thursday')
            <span class="text-danger">{{$message}}</span>
            @enderror

          </div>
          <div class="form-group">
            <label for="categoryFrench">Friday</label>
            <input type="text" class="form-control" name="friday" value="{{$prayer->friday}}">

            @error('friday')
            <span class="text-danger">{{$message}}</span>
            @enderror

          </div>
          <div class="form-group">
            <label for="categoryFrench">Suterday</label>
            <input type="text" class="form-control" name="suterday" value="{{$prayer->suterday}}">

            @error('suterday')
            <span class="text-danger">{{$message}}</span>
            @enderror

          </div>

          <button type="submit" class="btn btn-primary mr-2">Update Prayers</button>
        </form>
      </div>
    </div>
      </div>




   @endsection