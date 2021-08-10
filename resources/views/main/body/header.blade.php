 @php
 $categories = DB::table('categories')->orderBy('id','ASC')->get();
 $social     = DB::table('socials')->first();
 @endphp

 <!-- header-start -->
	<section class="hdr_section">
		<div class="container-fluid">			
			<div class="row">
				<div class="col-xs-6 col-md-2 col-sm-4">
					<div class="header_logo">
						<a href=""><img src="{{asset('frontend/assets/img/demo_logo.png')}}"></a> 
					</div>
				</div>              
			<div class="col-xs-6 col-md-8 col-sm-8">
				<div id="menu-area" class="menu_area">
					<div class="menu_bottom">
						<nav role="navigation" class="navbar navbar-default mainmenu">
					<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<!-- Collection of nav links and other content for toggling -->
							<div id="navbarCollapse" class="collapse navbar-collapse">
								<ul class="nav navbar-nav">
									<li><a href="#">Home</a></li>

									@foreach($categories as $category)

									@php
									$subcategories = DB::table('subcategories')->where('category_id', $category->id)->get();
									@endphp

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									@if(session()->get('lang') == 'french')
									{{$category->category_hind}}
									@else
									{{$category->category_eng}}
									@endif
									<b class="caret"></b></a>
							<ul class="dropdown-menu">
								@foreach($subcategories as $row)
								<li><a href="#">
									@if(session()->get('lang') == 'french')
									{{$row->subcategory_hind}}
									@else
									{{$row->subcategory_eng}}
									@endif
								</a></li>
								@endforeach
							</ul>
							</li>
								@endforeach
							</div>
						</nav>											
					</div>
				</div>					
			</div> 
			<div class="col-xs-12 col-md-2 col-sm-12">
				<div class="header-icon">
					<ul>
						<!-- version-start -->

						@if(session()->get('lang') == 'french')
						<li class="version"><a href="{{route('lang.english')}}"><B>English</B></a></li>&nbsp;&nbsp;&nbsp;
						@else
						<li class="version"><a href="{{route('lang.french')}}"><B>French</B></a></li>&nbsp;&nbsp;&nbsp;
						@endif

						<!-- login-start -->
					
						<!-- search-start -->
						<li><div class="search-large-divice">
							<div class="search-icon-holder"> <a href="#" class="search-icon" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-search" aria-hidden="true"></i></a>
								<div class="modal fade bd-example-modal-lg" action="" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-times-circle" aria-hidden="true"></i> </button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">
														<div class="custom-search-input">
															<form>
																<div class="input-group">
																	<input class="search form-control input-lg" placeholder="search" value="Type Here.." type="text">
																	<span class="input-group-btn">
																	<button class="btn btn-lg" type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
																</span> </div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div></li>
							<!-- social-start -->
							<li>
								<div class="dropdown">
								  <button class="dropbtn-02"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
								  <div class="dropdown-content">
									<a href="{{$social->facebook}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
									<a href="{{$social->twitter}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
									<a href="{{$social->youtube}}" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a>
									<a href="{{$social->instagram}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
								  </div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.header-close -->
	
    <!-- top-add-start -->
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
					<div class="top-add"><img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt="" /></div>
				</div>
			</div>
		</div>
	</section> <!-- /.top-add-close -->
	
	<!-- date-start -->
    <section>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-12 col-sm-12">
					<div class="date">
						<ul>
							<li><i class="fa fa-map-marker" aria-hidden="true"></i>  Kigali </li>
							<li><i class="fa fa-calendar" aria-hidden="true"></i>  Thursday, 5th August 2021 </li>
							<li><i class="fa fa-clock-o" aria-hidden="true"></i> Update 5 min ago </li>
						</ul>
						
					</div>
				</div>
    		</div>
    	</div>
    </section><!-- /.date-close -->  

	<!-- notice-start -->

	@php

	$headlines = DB::table('posts')->where('posts.headline', 1)->limit(3)->get();
	$notice = DB::table('notices')->first();

	@endphp	 

        <section>
    	<div class="container-fluid">
			<div class="row scroll">
				<div class="col-md-2 col-sm-3 scroll_01 ">
					Breaking News :
				</div>
				
				<div class="col-md-10 col-sm-9 scroll_02">
					<marquee>
						@foreach($headlines as $row)
						*{{$row->title_eng}}
						@endforeach
					</marquee>
				</div>

			</div>
    	</div>
    </section>

    @if($notice->status == 1)
        <section>
    	<div class="container-fluid">
			<div class="row scroll">
				<div class="col-md-2 col-sm-3 scroll_01" style="background-color: green">
					Notice :
				</div>
				
				<div class="col-md-10 col-sm-9 scroll_02" style="background-color: red">
					<marquee>
						{{$notice->notice}}
					</marquee>
				</div>

			</div>
    	</div>
    </section>
    @endif
