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
    <h4 class="card-title">Post Page</h4>
    
   <div class="template-demo">
    <a href="{{route('create.post')}}"><button type="button" class="btn btn-primary btn-fw" style="float: right;">Add Post</button></a>
   </div>

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Post_Title</th>
            <th>Category</th>
            <th>District</th>
            <th>Image</th>
            <th>User_Name</th>
            <th>Post_Date</th>
            <th colspan="2"> Action </th>
          </tr>
        </thead>
        <tbody>
          @php($count = 1)
        @foreach($posts as $post)
          <tr>
            <td> {{$count++}} </td>
            <td> {{ Str::limit($post->title_eng, 10)}} </td>
            <td> {{$post->category_eng}} </td>
            <td> {{$post->district_eng}} </td>
            <td> <img src="{{asset($post->image) }}" style="height: 50px; width: 50px;" />  </td>
            <td> {{$post->name}} </td>   
            <td> {{ Carbon\Carbon::parse($post->post_date)->diffForHumans()}} </td>
            <td>
            <a href="{{route('edit.post', $post->id)}}" class="btn btn-info">Edit</a>
            <a href="{{route('delete.post', $post->id)}}" onclick="return confirm('Are You Sure Enough?')" class="btn btn-danger">Delete</a>
         </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
   {{ $posts->links('pagination-links') }}
</div>
</div>

@endsection