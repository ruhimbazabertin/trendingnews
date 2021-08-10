@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@php
$subcategories = DB::table('subcategories')->where('category_id', $post->category_id)->get();
$subdistricts = DB::table('sub_districts')->where('district_id', $post->district_id)->get();
@endphp

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

   <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Post</h4>
                    <form action="{{route('update.post',$post->id)}}" method="post" enctype="multipart/form-data">
                      @csrf

                      <div class="row">
                      <div class="form-group col-md-6">
                      <div class="form-group">
                        <label for="title_eng">Title in English</label>
                        <input type="text" class="form-control" name="title_eng" value="{{$post->title_eng}}">
                      </div>
                    </div>

                     <div class="form-group col-md-6">
                      <div class="form-group">
                        <label for="title_hind">Title in French</label>
                        <input type="text" class="form-control" name="title_hind" value="{{$post->title_eng}}">
                      </div>
                    </div>
                  </div><!-- End -->

                      <div class="row">
                      <div class="form-group col-md-6">
                      <div class="form-group">
                      <label for="Category">Category</label>
                       <select class="form-control" name="category_id">
                          <option disabled="" selected="">-- Select Category --</option>
                          @foreach($categories as $category)
                          <option value="{{$category->id}}"
                            <?php if($category->id == $post->category_id) {
                              echo "selected"; } ?> >
                            {{$category->category_eng}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                     <div class="form-group col-md-6">
                      <div class="form-group">
                        <label for="subCategory">SubCategory</label>
                          <select class="form-control" name="subcategory_id" id="subcategory_id">
                          <option disabled="" selected="">-- Select SubCategory --</option>
                          @foreach($subcategories as $subcategory)
                           <option value="{{$subcategory->id}}"
                            <?php if($subcategory->id == $post->subcategory_id) {
                              echo "selected"; } ?> >
                            {{$subcategory->subcategory_eng}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div><!-- End --> 

                      <div class="row">
                      <div class="form-group col-md-6">
                      <div class="form-group">
                      <label for="Category">District</label>
                       <select class="form-control" name="district_id">
                          <option disabled="" selected="">-- Select District --</option>
                          @foreach($districts as $district)
                          <option value="{{$district->id}}"
                            <?php if($district->id == $post->district_id) {
                              echo "selected"; } ?> >
                            {{$district->district_eng}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                     <div class="form-group col-md-6">
                      <div class="form-group">
                        <label for="subCategory">SubDistrict</label>
                          <select class="form-control" id="subdistrict_id" name="subdistrict_id">
                          <option disabled="" selected="">-- Select SubDistrict --</option>
                          @foreach($subdistricts as $subdistrict)
                           <option value="{{$subdistrict->id}}"
                            <?php if($subdistrict->id == $post->subdistrict_id) {
                              echo "selected"; } ?> >
                            {{$subdistrict->subdistrict_eng}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div><!-- End --> 

                     <div class="row">
                      <div class="form-group col-md-6">
                      <div class="form-group">
                        <label for="tag_eng">New Image Upload</label>
                        <input type="file" class="form-control" name="image">
                      </div>
                    </div>

                     <div class="form-group col-md-6">
                      <div class="form-group">
                        <label for="tag_hind">Old Image Uploaded</label>
                        <img src="{{ URL::to($post->image) }}" style="width: 70px; height: 50px;">
                        <input type="hidden"  name="oldImage" value="{{$post->image}}">
                      </div>
                    </div>
                  </div><!-- End -->

                     <div class="row">
                      <div class="form-group col-md-6">
                      <div class="form-group">
                        <label for="tag_eng">Tags English</label>
                        <input type="text" class="form-control" name="tags_eng" value="{{$post->tags_eng}}">
                      </div>
                    </div>

                     <div class="form-group col-md-6">
                      <div class="form-group">
                        <label for="tag_hind">Tags French</label>
                        <input type="text" class="form-control" name="tags_hind" value="{{$post->tags_hind}}">
                      </div>
                    </div>
                  </div><!-- End -->


                     <div class="form-group">
                     <label for="detail_eng">Detail English</label>
                       <textarea class="form-control" name="details_eng" id="summernote1">{{$post->details_eng}}
                       </textarea>
                      </div>

                    <div class="form-group">
                     <label for="detail_hind">Detail French</label>
                       <textarea class="form-control" name="details_hind" id="summernote2">{{$post->details_hind}}
                       </textarea>
                      </div>

                      <hr/>
                      <h4 class="text-center">Extra Options</h4>
                      <br/>

                      <div class="row">
                          <label class="form-check-label col-md-3">
                            <input type="checkbox" name="headline" class="form-check-input" value="1" <?php if($post->headline ==1 ){echo "checked";} ?> >Headline <i class="input-helper"></i>
                          </label>
                           <label class="form-check-label col-md-3">
                            <input type="checkbox" name="big_thumbnail" class="form-check-input" value="1" <?php if($post->big_thumbnail ==1 ){echo "checked";} ?> >General Big Thumbnail <i class="input-helper"></i>
                          </label>
                           <label class="form-check-label col-md-3">
                            <input type="checkbox" name="first_section" class="form-check-input" value="1"
                            <?php if($post->first_section ==1 ){echo "checked";} ?> >First Section <i class="input-helper"></i>
                          </label>
                            <label class="form-check-label col-md-3">
                            <input type="checkbox" name="first_section_thumbnail" class="form-check-input">First Section BigThumbnail <i class="input-helper" value="1" <?php if($post->first_section_thumbnail ==1 ){echo "checked";} ?> ></i>
                          </label>
                      </div><!--End Row-->
                        <br/>
                        <br/>
                      <button type="submit" class="btn btn-primary mr-2">Update Post</button>
                    </form>
                  </div>
                </div>
              </div>


<!-- This is for Category -->
<script type="text/javascript">
   $(document).ready(function() {
         $('select[name="category_id"]').on('change', function(){
             var category_id = $(this).val();
             if(category_id) {
                 $.ajax({
                     url: "{{  url('/get/subcategory/') }}/"+category_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        $("#subcategory_id").empty();
                              $.each(data,function(key,value){
                                  $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_eng+'</option>');
                              });
                     },
                    
                 });
             } else {
                 alert('danger');
             }
         });
     });
</script>

<!-- This is for District -->
<script type="text/javascript">
   $(document).ready(function() {
         $('select[name="district_id"]').on('change', function(){
             var district_id = $(this).val();
             if(district_id) {
                 $.ajax({
                     url: "{{  url('/get/subdistrict/') }}/"+district_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        $("#subdistrict_id").empty();
                              $.each(data,function(key,value){
                                  $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_eng+'</option>');
                              });
                     },
                    
                 });
             } else {
                 alert('danger');
             }
         });
     });
</script>


   @endsection