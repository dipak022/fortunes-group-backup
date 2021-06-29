<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

@php
$cetegory=DB::table('cetegory')->get();
@endphp
@php
$Setting=DB::table('Setting')
->orderBy('id','ASC')->limit(1)->get();
@endphp
<!-- Mirrored from webdesign-finder.com/html/nafta/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Nov 2020 14:25:41 GMT -->

<head>
	<title>Fortunes Group</title>
	<link rel="icon" href="{{ asset('public/favicon.png') }}" type="image/png" sizes="16x16">
	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="format-detection" content="telephone=no">


	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<!-- 
	<link rel="stylesheet" href="{{ asset('public/Frontend/css/animations.css') }}">
	<link rel="stylesheet" href="{{ asset('public/Frontend/css/font-awesome5.css') }}">
	<link rel="stylesheet" href="{{ asset('public/Frontend/css/icomoon.css') }}">
	<link rel="stylesheet" href=" {{ asset('public/Frontend/css/slick.css') }} ">
    <link rel="stylesheet" href="{{asset('public/Frontend/css/slick-theme.css')}}">
	
    <link rel="stylesheet" href="{{ asset('public/Frontend/css/shop.css') }}" class="color-switcher-link">
    <link rel="stylesheet" href="{{ asset('public/Frontend/css/main.css') }}" class="color-switcher-link">
    <script src="{{ asset('public/Frontend/js/vendor/modernizr-2.6.2.min.js') }}"></script>-->
	<link rel="stylesheet" href="{{ asset('public/Frontend/css/bootstrap.min.css') }} ">

	<link rel="stylesheet" href="{{ asset('public/Frontend/css/animations.css') }}">

	<link rel="stylesheet" href="{{ asset('public/Frontend/css/font-awesome5.css') }}">
	<link rel="stylesheet" href="{{ asset('public/Frontend/css/icomoon.css') }}">
	<link rel="stylesheet" href=" {{ asset('public/Frontend/css/slick.css') }} ">
	<link rel="stylesheet" href="{{asset('public/Frontend/css/slick-theme.css')}}">
	<link rel="stylesheet" href="{{ asset('public/Frontend/css/shop.css') }}" class="color-switcher-link">
	<link rel="stylesheet" href="{{ asset('public/Frontend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('public/Frontend/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('public/Frontend/css/new.css') }}">
	<link rel="stylesheet" href="{{ asset('public/Frontend/css/revision.css') }}">
	<link rel="stylesheet" href="{{ asset('public/Frontend/css/main.css') }}" class="color-switcher-link">
	<script src="{{ asset('public/Frontend/js/vendor/modernizr-2.6.2.min.js') }}"></script>






</head>

<body oncopy="return false" oncut="return false">



	<!-- search modal -->
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<div class="widget widget_search">
			<form method="get" class="searchform search-form" action="#">
				<div class="form-group">
					<input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input">
				</div>
				<button type="submit" class="btn">Search</button>
			</form>
		</div>
	</div>
	<div id="team-form" class="ds modal">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="form-wrapper ls rounded">
						<form class="contact-form" method="post" action="{{ route('contact.submit') }}">
							<div class="row c-mb-20">
								<div class="col-12 form-title text-center form-builder-item">
									<div class="header title">
										<h4><span class="thin">Contact</span> me</h4>
									</div>
								</div>
							</div>
							<div class="row c-mb-20">
								<div class="col-sm-12">
									<div class="form-group has-placeholder">
										<label for="name333">Full Name <span class="required">*</span></label>
										<input type="text" aria-required="true" size="30" value="" name="name" id="name333" class="form-control" placeholder="Your name">
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group has-placeholder">
										<label for="phone35533">Email address<span class="required">*</span></label>
										<input type="tel" aria-required="true" size="30" name="phone" id="" class="form-control" placeholder="Phone Number">
									</div>
								</div>
							</div>
							<div class="row c-mb-20">
								<div class="col-sm-12">
									<div class="form-group has-placeholder">
										<label for="message333">Message</label>
										<textarea aria-required="true" rows="3" cols="45" name="msg" id="message333" class="form-control" placeholder="Message"></textarea>
									</div>
								</div>
							</div>
							<div class="row c-mb-20">
								<div class="col-sm-12 mb-0 mt-10 text-center">
									<div class="form-group">
										<input class="btn btn-gradient" type="submit" value="Contact me">
									</div>
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>


		</div>


	</div>


	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls p-normal">
			<!-- Uncomment this UL with LI to show messages in modal popup to your user: -->
			<!--
		<ul class="list-unstyled">
			<li>Message To User</li>
		</ul>
		-->

		</div>
	</div><!-- eof .modal -->

	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">
			<div class="">
			
	<div class="top_header">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-md-9">
					<marquee direction="left">
						@foreach($Setting as $row)
						{{ $row->coppyright }}
						@endforeach

					</marquee>
				</div>
				<div class="col-md-3 text-right ">
					<div class="phone_info">
						<h4>{{ $row->mobile_number }}</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<header class="page_header header-1 ds bg-transparent s-py-xl-20 s-py-10 custom_nav">

		<div class="container-fluid">

			<div class="row d-flex align-items-center justify-content-center">
				<div class="col-xl-2 col-md-2 col-12 text-center">
					<a href="{{ url('/') }}" class="logo">
						@foreach( $Setting as $row)
						<img src="{{ asset($row->logo) }}" style="height: 50px;width: 50px;" alt="">
						@endforeach
						 <span class="d-flex flex-column">
										<span class="logo-text color-darkgrey">Welcome</span>
										<span class="logo-subtext">Welcometo fortunes group</span>
									</span>
					</a>
				</div>
				<div class="col-xl-10 col-md-10 col-1 text-right">
					<!-- main nav start -->
					<nav class="top-nav">
						<ul class="nav sf-menu">
						    <a href="https://business-center.fortunes-group.com/" class="btn btn-outline-darkgrey big-btn" target="_blank">BUSINESS CENTER</a>


							<li class="active">
								<a href="{{ url('/') }}">Home</a>
							
							</li>

							
							<li class="nav-item about_dropdown">
								<a class="nav-link" href="javascript:void(0);">About Us <span><i class="fas fa-chevron-right"></i></span></a>
								<div class="about_mega_drop">
									<ul>
										<li><a href="{{ url('companyview/') }}">Company Overview</a>
										
											<span class="drop_rigth_icon"><i class="fas fa-chevron-right"></i></span>
										</li>
										<li><a href="">Leadership</a>
											<div class="about_sub_drop">
												<ul>
													<li><a href="{{ route('chairman_profile') }}">Chairman's Profile</a></li>
													<li><a href="{{ route('chairman_message') }}">Chairman's message</a></li>
													<li><a href="{{ route('managing_director_profile') }}">Managing Director's Profile</a></li>

												</ul>
											</div>
											<span class="drop_rigth_icon"><i class="fas fa-chevron-right"></i></span>
										</li>
										<li><a href="{{ url('team/') }}">Our Team</a>
										
											<span class="drop_rigth_icon"><i class="fas fa-chevron-right"></i></span>
										</li>
										<li><a href="{{ url('bankers/') }}">Bankers & Associates</a>
											
											<span class="drop_rigth_icon"><i class="fas fa-chevron-right"></i></span>
										</li>
									</ul>
								</div>

							</li>

							
							


								@php
											$subcategory=DB::table('fortuneCategory')->get()->sortBy("priority");
											@endphp
											
													
										<li class="about_dropdown">
											<a class="nav-link" href="javascript:void(0)">Companies <span><i class="fas fa-chevron-down"></i></span></a>
											<div class="about_mega_drop">
												@foreach($subcategory as $sub)
											  <ul>

												<li><img src="{{ asset($sub->image) }}" style="height: 20px;width: 30px;"> 
													
										@php
										 $urls= url()->current();
										 $urls=null;
										@endphp
										@if($sub->webside_link!=NULL)
                                    <a href="{{ $sub->webside_link }}" target="_blank">{{ $sub->name }}</a>
                                    @else
                                    	<a href="{{ $urls }}/backup-fortunes-group/{{ $sub->name }}/{{\Crypt::encrypt($sub->id)}}">{{ $sub->name }}</a>
                                    @endif
									 
									</li>
												
												
												
											</ul>
											@endforeach
											</div>
						  
										</li>
						
							<li class="nav-item about_dropdown">
								<a class="nav-link" href="javascript:void(0);">Media Corner<span><i class="fas fa-chevron-right"></i></span></a>
								<div class="about_mega_drop">
									<ul>
										<li><a href="{{ url('achievements/') }}">Awards & Achievements</a>
											<span class="drop_rigth_icon"><i class="fas fa-chevron-right"></i></span>
										</li>
										<li><a href="#">Media Center</a>
											<div class="about_sub_drop">
												<ul>
													<li><a href="{{ url('tvcs/') }}">TVC & AV</a></li>
													<li><a href="{{ url('prassads/') }}">Press Ad</a></li>
												</ul>
											</div>
											<span class="drop_rigth_icon"><i class="fas fa-chevron-right"></i></span>
										</li>
										<li><a href="{{ url('newsevents/') }}">News & Events</a>
											<span class="drop_rigth_icon"><i class="fas fa-chevron-right"></i></span>
										</li>
									</ul>
								</div>
							</li>


							<li>
								<a href="{{ url('career/') }}">Career</a>
							</li>



							<!-- contacts -->
							<li>
								<a href="{{ url('contact/') }}">Contact</a>
							</li>
							<li class="nav-item about_dropdown">
								<a class="nav-link" href="javascript:void(0);">More<span><i class="fas fa-chevron-right"></i></span></a>
								<div class="about_mega_drop about_more">
									<ul>
										<li><a href="{{ url('latestsnews/') }}">Latest News</a>
											<span class="drop_rigth_icon"><i class="fas fa-chevron-right"></i></span>
										</li>

										<li><a href="{{ url('blogs/') }}">Blog</a>
											<span class="drop_rigth_icon"><i class="fas fa-chevron-right"></i></span>
										</li>
										<li><a href="{{ url('faqs/') }}">FAQ</a>
											<span class="drop_rigth_icon"><i class="fas fa-chevron-right"></i></span>
										</li>
										<li><a href="{{ url('csrs/') }}">CSR</a>
											<span class="drop_rigth_icon"><i class="fas fa-chevron-right"></i></span>
										</li>
									</ul>
								</div>
							</li>
							<!-- eof contacts -->
						</ul>


					</nav>
					<!-- eof main nav -->
				</div>
				{{-- <div class="col-xl-3 col-md-7 col-12  d-flex justify-content-md-end">
								<ul class="top-includes">
									<li class="metaphone">
										@foreach( $Setting as $row)
										<a href="#">{{ $row->mobile_number }}</a>
				@endforeach

				</li>

				</ul>


			</div> --}}

		</div>

		</div>
		<!-- header toggler -->
		<span class="toggle_menu"><span>menu</span></span>
	</header>
	</div>


	@yield('content')





	<footer class="page_footer text-center text-sm-left  ds  s-pt-55 s-pb-60 s-pt-md-85 s-pb-md-90 s-pt-lg-125 s-pb-lg-130 s-pt-xl-160 s-pb-xl-155 c-gutter-30 s-parallax c-mb-50 c-mb-lg-0">
		<div class="container">
			<div class="row justify-content-center">

				<div class="col-lg-4 col-md-6  animate" data-animation="fadeInUp">
					<a href="{{ url('/') }}" class="logo">
						@foreach( $Setting as $row)
						<img src="{{ asset($row->logo) }} " alt="">
						@endforeach
						<span class="d-flex flex-column">
							<span class="logo-text color-darkgrey">Fortunes</span>
							<span class="logo-subtext">Fortunes &amp; Group</span>
						</span>
					</a>
					<div class="widget widget_mailchimp">


						<p>
							Get latest news for Subscribe
						</p>

						<form class="signup" action="http://webdesign-finder.com/">
							<label for="mailchimp_email">
								<span class="screen-reader-text">Subscribe:</span>
							</label>

							<input id="mailchimp_email" name="email" type="email" class="form-control mailchimp_email" placeholder="Email Address">

							<button type="submit" class="search-submit">
								<span class="screen-reader-text">Subscribe</span>
							</button>
							<div class="response"></div>
						</form>

					</div>
					@foreach( $Setting as $row)
					@if($row->fb_link==NULL)
					@else
					<a href="{{ $row->fb_link }}" class="fab fa-facebook-f rounded-icon bg-icon fs-16" title="facebook"></a>
					@endif
					@if($row->tw_link==NULL)
					@else
					<a href="{{ $row->tw_link }}" class="fab fa-twitter rounded-icon bg-icon fs-16" title="telegram"></a>
					@endif
					@if($row->lind_link==NULL)
					@else
					<a href="{{ $row->lind_link }}" class="fab fa-linkedin-in rounded-icon bg-icon fs-16" title="linkedin"></a>
					@endif
					@if($row->instra_link==NULL)
					@else
					<a href="{{ $row->instra_link }}" class="fab fa-instagram rounded-icon bg-icon fs-16" title="instagram"></a>
					@endif
					@endforeach
				</div>

				<div class="col-lg-3 col-md-6 animate" data-animation="fadeInUp">

					<div class="widget widget_icons_list">
						<h3 class="widget-title">Contact Detail</h3>
						<ul>
							<li class="icon-inline ">
								<div class="icon-styled icon-top  bordered round fs-16">
									<i class="fas fa-phone"></i>
								</div>
								@foreach( $Setting as $row)
								<p>{{ $row->mobile_number }}</p>
								@endforeach
							</li>
							<li class="icon-inline">
								<div class="icon-styled icon-top bordered round  fs-16">
									<i class="fas fa-envelope"></i>


								</div>
								@foreach( $Setting as $row)
								<p style="font-size: 14px;"><a href="#">{{ $row->email }}</a></p>
								@endforeach
							</li>
							<li class="icon-inline">
								<div class="icon-styled icon-top bordered round  fs-16">
									<i class="fas fa-map-marker-alt"></i>
								</div>
								@foreach( $Setting as $row)
								<p>
									{{ $row->address }}

								</p>
								@endforeach

							</li>

						</ul>
					</div>
				</div>

				<div class="col-lg-2 col-md-6 animate" data-animation="fadeInUp">

					<div class="widget widget_nav_menu mb-0">
						<h3 class="widget-title">Quick Links</h3>
						<ul class="list-unstyled">
							<li>
								<a href="{{ url('/about') }}">About</a>
							</li>
							<li>
								<a href="{{ url('/career') }}">Career</a>
							</li>
							<li>
								<a href="{{ url('/') }}">Service</a>
							</li>

							<li>
								<a href="{{ url('contact/')}}">Contact Us</a>
							</li>
						</ul>
					</div>


				</div>

				<!--<div class="col-lg-3 col-md-6 animate" data-animation="fadeInUp">
					<div class="widget widget_nav_menu mb-0">
						<h3 class="widget-title">All Companies</h3>
						<ul class="list-unstyled">
							@php
							$subcategory=DB::table('subcategory')->where('category_id',$row->id)->get();
							@endphp

							@foreach($subcategory as $sub)
							<li>



								@php
								$urls= url()->current();
								$urls=null;
								@endphp
								<a href="{{ $urls }}
													/final/{{ $sub->subcategory_name }}/{{\Crypt::encrypt($sub->id)}}">{{ $sub->subcategory_name }}</a>


							</li>
							@endforeach
							{{-- <li>
										<a href="#">Fortune International</a>
									</li>
									<li>
										<a href="#">Soler Bazar</a>
									</li>

									<li>
										<a href="#">Fortune Electronics</a>
									</li> --}}
						</ul>
					</div>
				</div>-->
				<div class="col-lg-3 col-md-6 animate" data-animation="fadeInUp">
							<div class="widget widget_nav_menu mb-0">
								<h3 class="widget-title">All Companies</h3>
								<ul class="list-unstyled">
									@php
											$subcategory=DB::table('fortuneCategory')->get()->sortBy("priority");
											@endphp
											
													@foreach($subcategory as $sub)
									<li>
										
											
											
													@php
													 $urls= url()->current();
													$urls=null;
													@endphp
											@if($sub->webside_link!=NULL)
                                    <a href="{{ $sub->webside_link }}" target="_blank">{{ $sub->name }}</a>
                                    @else
                                    	<a href="{{ $urls }}
													/{{ $sub->name }}/{{\Crypt::encrypt($sub->id)}}">{{ $sub->name }}</a>
                                    @endif
											
												
									</li>
									@endforeach
									
								</ul>
							</div>
						</div>


			</div>
		</div>

	</footer>


	<div id="copyright"></div>

	<section class="page_copyright ds ms s-bordertop-container s-py-30">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-12 text-center animate" data-animation="scaleAppear">
					<a href="{{ url('/') }}">
						<div class="mb-10">

							@foreach( $Setting as $row)
							<img src="{{ asset($row->logo) }} " alt="">
							@endforeach

						</div>
					</a>
				</div>
				<div class="col-md-12 text-center animate" data-animation="scaleAppear">
					<h6 class="fs-12 text-uppercase">&copy; Copyright <span class="copyright_year">@php
							echo date('Y');
							@endphp</span> All right reserved by fortunes-group </h6>
				</div>
			</div>
		</div>
	</section>


	</div><!-- eof #box_wrapper -->
	</div><!-- eof #canvas -->

	<!--<script src="js/compressed.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/"></script>
	<script src="js/main.js"></script>

	<script src="js/switcher.js"></script>-->


	<script src="{{ asset('public/Frontend/js/compressed.js') }}"></script>
	<script src="{{asset('public/Frontend/js/slick.min.js')}}"></script>
	<!--<script src="{{asset('public/Frontend/js/aos.js')}}"></script>--> 

	

	<script src="{{ asset('public/Frontend/js/revise.js') }}"></script>
	<script src="{{ asset('public/Frontend/js/slick.js') }}"></script>
	<script src="{{asset('public/Frontend/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{ asset('public/Frontend/js/main.js') }}"></script>
	<script src="{{ asset('public/Frontend/js/switcher.js') }}"></script>

	<!-- Google Map Script -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0pr5xCHpaTGv12l73IExOHDJisBP2FK4&amp;callback=initGoogleMap"></script>

</body>


<!-- Mirrored from webdesign-finder.com/html/nafta/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Nov 2020 14:31:25 GMT -->

</html>