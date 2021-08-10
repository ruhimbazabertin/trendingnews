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
        <h4 class="card-title">Notice Setting</h4>

        @if($notice->status == 1 )
        <div class="template-demo">
        <a href="{{route('Desactive.notice', $notice->id)}}"><button type="button" class="btn btn-danger btn-fw">Desactivate Notice</button></a>
        </div>
        <small class="text-success">Now Notice is Activated</small><br/><br/>
        @else
       <div class="template-demo">
        <a href="{{route('activate.notice', $notice->id)}}"><button type="button" class="btn btn-primary btn-fw">Activate Notice</button></a>
        </div>
        <small class="text-danger">Now Notice is Disactivated</small><br/><br/>
        
        @endif

        <form  action="{{route('update.notice', $notice->id)}}" method="post">
        	@csrf
          
         <div class="form-group">
         <label for="embed_code">Notice</label>
           <textarea class="form-control" name="notice"  id="summernote1">{{$notice->notice}}
           </textarea>
          </div>
      
          <button type="submit" class="btn btn-primary mr-2">Update Notice</button>
        </form>
      </div>
    </div>
      </div>




   @endsection