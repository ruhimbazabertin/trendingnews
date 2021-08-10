@extends('main.home_master')
@section('content')

@php

$firstsectionbig = DB::table('posts')->where('first_section_thumbnail', 1)->orderBy('id', 'desc')->first();

$firstsection = DB::table('posts')->where('first_section')->orderBy('id', 'desc')->limit(8)->get();

@endphp

<!-- 1st-news-section-start -->	
<section class="news-section">
<div class="container-fluid">
<div class="row">
	<div class="col-md-9 col-sm-8">
		<div class="row">
			<div class="col-md-1 col-sm-1 col-lg-1"></div>
			<div class="col-md-10 col-sm-10">
				<div class="lead-news">
<div class="service-img"><a href="#"><img src="{{asset($firstsectionbig->image)}}" width="800px" alt="Notebook"></a></div>
					<div class="content">
<h4 class="lead-heading-01"><a href="#">{{$firstsectionbig->title_eng}}</a> </h4>
			</div>
		</div>
	</div>
	
</div>

	<div class="row">
	 @foreach($firstsection as $row)
			<div class="col-md-3 col-sm-3">
				<div class="top-news">
					<a href="#"><img src="{{asset($row->image)}}" alt="Notebook"></a>
					<h4 class="heading-02"><a href="#">{{$row->title_eng}}</a> </h4>
				</div>
			</div>
	@endforeach
		</div>

		<!-- add-start -->	
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="add"><img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt="" /></div>
			</div>
		</div><!-- /.add-close -->	
		
		<!-- news-start -->
		<div class="row">

			@php
			$firstCategory = DB::table('categories')->first();

			$firstCatPostBig = DB::table('posts')->where('category_id', $firstCategory->id)->where('big_thumbnail',1)->first();

			$firstCatPostSmall = DB::table('posts')->where('category_id', $firstCategory->id)->where('big_thumbnail',NULL)->limit(3)->get();
			@endphp

			<div class="col-md-6 col-sm-6">
				<div class="bg-one">
					<div class="cetagory-title"><a href="#">{{$firstCategory->category_eng}} <span>More <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="top-news">
								<a href="#"><img src="{{asset($firstCatPostBig->image)}}" alt="Notebook"></a>
								<h4 class="heading-02"><a href="#">{{$firstCatPostBig->title_eng}}</a> </h4>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">

							@foreach($firstCatPostSmall as $small)

							<div class="image-title">
								<a href="#"><img src="{{asset($small->image)}}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">{{$small->title_eng}}</a> </h4>
							</div>
							@endforeach

						</div>
					</div>
				</div>
			</div>

			@php
			$secondCategory = DB::table('categories')->skip(1)->first();

			$secondCatPostBig = DB::table('posts')->where('category_id', $secondCategory->id)->where('big_thumbnail',1)->first();

			$secondCatPostSmall = DB::table('posts')->where('category_id', $secondCategory->id)->where('big_thumbnail',NULL)->limit(3)->get();
			@endphp

			<div class="col-md-6 col-sm-6">
				<div class="bg-one">
					<div class="cetagory-title"><a href="#">{{$secondCategory->category_eng}}<span>More <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="top-news">
								<a href="#"><img src="{{asset($secondCatPostBig->image)}}" alt="Notebook"></a>
								<h4 class="heading-02"><a href="#">{{$secondCatPostBig->title_eng}}</a> </h4>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">

							@foreach($secondCatPostSmall as $small)

							<div class="image-title">
								<a href="#"><img src="{{asset($small->image)}}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">{{$small->title_eng}}</a> </h4>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>					
	</div>
	<div class="col-md-3 col-sm-3">
		<!-- add-start -->	
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="sidebar-add"><img src="{{asset('assets/img/add_01.jpg')}}" alt="" /></div>
			
			</div>
		</div><!-- /.add-close -->	

		@php
		$livetv = DB::table('live_tvs')->first();
		@endphp
		
		@if($livetv->status == 1 )
		
		<!-- youtube-live-start -->	
		<div class="cetagory-title-03">Live TV</div>
		<div class="photo">
			<div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
				<iframe width="853" height="480" src="https://www.youtube.com/embed/{{$livetv->embed_code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 
				

			</div>
		</div><!-- /.youtube-live-close -->	

		@endif

		<!-- facebook-page-start -->
		<div class="cetagory-title-03">Facebook </div>
		<div class="fb-root">
			facebook page here
		</div><!-- /.facebook-page-close -->	
		
		<!-- add-start -->	
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="sidebar-add">
					<img src="{{asset('frontend/assets/img/add_01.jpg')}}" alt="" />
				</div>
			</div>
		</div><!-- /.add-close -->	
	</div>
</div>
</div>
</section><!-- /.1st-news-section-close -->

<!-- 2nd-news-section-start -->	
<section class="news-section">
<div class="container-fluid">
<div class="row">

			@php
			$threeCategory = DB::table('categories')->skip(2)->first();

			$threeCatPostBig = DB::table('posts')->where('category_id', $threeCategory->id)->where('big_thumbnail',1)->first();

			$threeCatPostSmall = DB::table('posts')->where('category_id', $threeCategory->id)->where('big_thumbnail',NULL)->limit(3)->get();
			@endphp

	<div class="col-md-6 col-sm-6">
		<div class="bg-one">
			<div class="cetagory-title-02"><a href="#">{{$threeCategory->category_eng}} <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="top-news">
						<a href="#"><img src="{{asset($threeCatPostBig->image)}}" alt="Notebook"></a>
						<h4 class="heading-02"><a href="#">{{$threeCatPostBig->title_eng}}</a> </h4>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					@foreach($threeCatPostSmall as $small)
					<div class="image-title">
						<a href="#"><img src="{{asset($small->image)}}" alt="Notebook"></a>
						<h4 class="heading-03"><a href="#">{{$small->title_eng}}</a> </h4>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

			@php
			$fourCategory = DB::table('categories')->skip(3)->first();

			$fourCatPostBig = DB::table('posts')->where('category_id', $fourCategory->id)->where('big_thumbnail',1)->first();

			$fourCatPostSmall = DB::table('posts')->where('category_id', $fourCategory->id)->where('big_thumbnail',NULL)->limit(3)->get();
			@endphp

	<div class="col-md-6 col-sm-6">
		<div class="bg-one">
			<div class="cetagory-title-02"><a href="#">{{$fourCategory->category_eng}} <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="top-news">
						<a href="#"><img src="{{asset($fourCatPostBig->image)}}" alt="Notebook"></a>
						<h4 class="heading-02"><a href="#">{{$fourCatPostBig->title_eng}}</a> </h4>
					</div>
				</div>
				@foreach($fourCatPostSmall as $small)
				<div class="col-md-6 col-sm-6">
					<div class="image-title">
						<a href="#"><img src="{{asset($small->image)}}" alt="Notebook"></a>
						<h4 class="heading-03"><a href="#">{{$small->title_eng}}</a> </h4>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
<!-- ******* -->

@php
$fiveCategory = DB::table('categories')->skip(4)->first();

$fiveCatPostBig = DB::table('posts')->where('category_id', $fiveCategory->id)->where('big_thumbnail',1)->first();

$fiveCatPostSmall = DB::table('posts')->where('category_id', $fiveCategory->id)->where('big_thumbnail',NULL)->limit(3)->get();
@endphp

<div class="row">
	<div class="col-md-6 col-sm-6">
		<div class="bg-one">
			<div class="cetagory-title-02"><a href="#">{{$fiveCategory->category_eng}}<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="top-news">
						<a href="#"><img src="{{asset($fiveCatPostBig->image)}}" alt="Notebook"></a>
						<h4 class="heading-02"><a href="#">{{$fiveCatPostBig->title_eng}}</a> </h4>
					</div>
				</div>
				@foreach($fiveCatPostSmall as $small)
				<div class="col-md-6 col-sm-6">
					<div class="image-title">
						<a href="#"><img src="{{asset($small->image)}}" alt="Notebook"></a>
						<h4 class="heading-03"><a href="#">{{$small->title_eng}}</a> </h4>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6">
		<div class="bg-one">
			<div class="cetagory-title-02"><a href="#">{{$fiveCategory->category_eng}}<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="top-news">
						<a href="#"><img src="{{asset($fiveCatPostBig->image)}}" alt="Notebook"></a>
						<h4 class="heading-02"><a href="#">{{$fiveCatPostBig->title_eng}}</a> </h4>
					</div>
				</div>
				@foreach($fiveCatPostSmall as $small)
				<div class="col-md-6 col-sm-6">
					<div class="image-title">
						<a href="#"><img src="{{asset($small->image)}}" alt="Notebook"></a>
						<h4 class="heading-03"><a href="#">{{$small->title_eng}}</a> </h4>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
<!-- add-start -->	
<div class="row">
	<div class="col-md-6 col-sm-6">
		<div class="add"><img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt="" /></div>
	</div>
	<div class="col-md-6 col-sm-6">
		<div class="add"><img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt="" /></div>
	</div>
</div><!-- /.add-close -->	

</div>
</section><!-- /.2nd-news-section-close -->

<!-- 3rd-news-section-start -->	
<section class="news-section">
<div class="container-fluid">
<div class="row">
	<div class="col-md-9 col-sm-9">
		<div class="cetagory-title-02"><a href="#">Feature  <i class="fa fa-angle-right" aria-hidden="true"></i> all district news tab here <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
		
		<div class="row">
			<div class="col-md-4 col-sm-4">
				<div class="top-news">
					<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
					<h4 class="heading-02"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="image-title">
					<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
					<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
				</div>
				<div class="image-title">
					<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
					<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
				</div>
				<div class="image-title">
					<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
					<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="image-title">
					<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
					<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
				</div>
				<div class="image-title">
					<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
					<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
				</div>
				<div class="image-title">
					<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
					<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
				</div>
			</div>
		</div>
		<!-- ******* -->
		<br />
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="cetagory-title-02"><a href="#">Sci-Tech<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="bg-gray">
					<div class="top-news">
						<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
						<h4 class="heading-02"><a href="#">Facebook Messenger gets shiny new logo </a> </h4>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="news-title">
					<a href="#">Facebook Messenger gets shiny new logo </a>
				</div>
				<div class="news-title">
					<a href="#">Facebook Messenger gets shiny new logo </a>
				</div>
				<div class="news-title">
					<a href="#">Facebook Messenger gets shiny new logo</a>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="news-title">
					<a href="#">Facebook Messenger gets shiny new logo </a>
				</div>
				<div class="news-title">
					<a href="#">Facebook Messenger gets shiny new logo </a>
				</div>
				<div class="news-title">
					<a href="#">Facebook Messenger gets shiny new logo </a>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="sidebar-add">
					<img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt="" />
				</div>
			</div>
		</div><!-- /.add-close -->	


	</div>
	<div class="col-md-3 col-sm-3">
		<div class="tab-header">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs nav-justified" role="tablist">
				<li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">Latest</a></li>
				<li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">Popular</a></li>
				<li role="presentation" ><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">Popular1</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content ">
				<div role="tabpanel" class="tab-pane in active" id="tab21">
					<div class="news-titletab">
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="tab22">
					<div class="news-titletab">
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
					</div>                                          
				</div>
				<div role="tabpanel" class="tab-pane fade" id="tab23">	
					<div class="news-titletab">
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
						<div class="news-title-02">
							<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
						</div>
					</div>						                                          
				</div>
			</div>
		</div>

		<div class="cetagory-title-03">Old News  </div>
		<form action="" method="post">
			<div class="old-news-date">
			   <input type="text" name="from" placeholder="From Date" required="">
			   <input type="text" name="" placeholder="To Date">			
			</div>
			<div class="old-date-button">
				<input type="submit" value="search ">
			</div>
	   </form>
	   <!-- news -->
	   <br><br><br><br><br>

	   			@php

				$websitelink = DB::table('websites')->get();

				@endphp

	   <div class="cetagory-title-04"> Important Website</div>
	   <div class="">

	   	@foreach($websitelink as $row)

	   	<div class="news-title-02">
	   		<h4 class="heading-03"><a href="{{$row->website_link}}"><i class="fa fa-check" aria-hidden="true"></i> {{$row->website_name}}  </a> </h4>
	   	</div>

	   	@endforeach

	</div>
</div>
</div>
</section><!-- /.3rd-news-section-close -->









<!-- gallery-section-start -->	
<section class="news-section">
<div class="container-fluid">
<div class="row">
	<div class="col-md-8 col-sm-7">
		<div class="gallery_cetagory-title"> Photo Gallery </div>

		@php
		$photoBig = DB::table('photos')->where('type', 1)->orderBy('id','desc')->first();
		$photosmall = DB::table('photos')->where('type', 0)->orderBy('id','desc')->limit(4)->get();
		@endphp

		<div class="row">
            <div class="col-md-8 col-sm-8">
                <div class="photo_screen">
                    <div class="myPhotos" style="width:100%">
                          <img src="{{asset($photoBig->photo)}}"  alt="Avatar">
                    </div>
                </div>
            </div>
            @foreach($photosmall as $small)
            <div class="col-md-4 col-sm-4">
                <div class="photo_list_bg">
                    
                    <div class="photo_img photo_border active">
                        <img src="{{asset($small->photo)}}" alt="image" onclick="currentDiv(1)">
                        <div class="heading-03">
                            {{$small->title}}
                        </div>
                    </div>
                </div>        
            </div>
            @endforeach
        </div>

        <!--=======================================
        Video Gallery clickable jquary  start
    ========================================-->

                <script>
                        var slideIndex = 1;
                        showDivs(slideIndex);

                        function plusDivs(n) {
                          showDivs(slideIndex += n);
                        }

                        function currentDiv(n) {
                          showDivs(slideIndex = n);
                        }

                        function showDivs(n) {
                          var i;
                          var x = document.getElementsByClassName("myPhotos");
                          var dots = document.getElementsByClassName("demo");
                          if (n > x.length) {slideIndex = 1}
                          if (n < 1) {slideIndex = x.length}
                          for (i = 0; i < x.length; i++) {
                             x[i].style.display = "none";
                          }
                          for (i = 0; i < dots.length; i++) {
                             dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                          }
                          x[slideIndex-1].style.display = "block";
                          dots[slideIndex-1].className += " w3-opacity-off";
                        }
                    </script>

    <!--=======================================
        Video Gallery clickable  jquary  close
    =========================================-->

	</div>
	<div class="col-md-4 col-sm-5">
		<div class="gallery_cetagory-title"> Video Gallery </div>

		@php
		$videobig = DB::table('videos')->where('type', 1)->orderBy('id','desc')->first();
		$videosmall = DB::table('videos')->where('type', 0)->orderBy('id','desc')->limit(4)->get();
		@endphp

		<div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="video_screen">
                    <div class="myVideos" style="width:100%">
                        <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                        <iframe width="853" height="480" src="https://www.youtube.com/embed/{{$videobig->embed_code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
            
                <div class="gallery_sec owl-carousel">
                	@foreach($videosmall as $small)
                        <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                        <iframe width="853" height="480" src="https://www.youtube.com/embed/{{$small->embed_code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                     {{$small->title}}
                    @endforeach

                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>


        <script>
            var slideIndex = 1;
            showDivss(slideIndex);

            function plusDivs(n) {
              showDivss(slideIndex += n);
            }

            function currentDivs(n) {
              showDivss(slideIndex = n);
            }

            function showDivss(n) {
              var i;
              var x = document.getElementsByClassName("myVideos");
              var dots = document.getElementsByClassName("demo");
              if (n > x.length) {slideIndex = 1}
              if (n < 1) {slideIndex = x.length}
              for (i = 0; i < x.length; i++) {
                 x[i].style.display = "none";
              }
              for (i = 0; i < dots.length; i++) {
                 dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
              }
              x[slideIndex-1].style.display = "block";
              dots[slideIndex-1].className += " w3-opacity-off";
            }
        </script>

	</div>
</div>
</div>
</section><!-- /.gallery-section-close -->

	@endsection
