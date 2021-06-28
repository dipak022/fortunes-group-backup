@extends('layouts.fontend.nav')
@section('content')
@php
$Setting=DB::table('Setting')
    ->orderBy('id','ASC')->limit(1)->get();

@endphp


	<section class="page_title ds s-parallax s-pb-xl-80  s-pb-lg-100  s-pb-md-90 s-pt-md-190 s-pt-180 s-pb-60">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<h1>Contacts US</h1>

						</div>


					</div>
				</div>
			</section>

			<section class="ls  container-px-xl-0">
				<div class="container-fluid">

					<div class="row">
						<div class="col-lg-6 col-xl-7 ls ">
							<div class="special-column">
								<div class="fw-divider-space divider-xl-160 divider-lg-130 divider-md-90 divider-60"></div>
								<h2 class="special-heading text-left">
									<span class="text-capitalize">
										Contact Us
									</span>
								</h2>
								<div class="divider-line bg-maincolor"></div>
								<div class="fw-divider-space divider-25"></div>
								<p class="special-heading text-left">
									<span>
										
									</span>
								</p>
								<div class="divider-50 hidden-below-lg"></div>
								<div class="divider-30 hidden-above-lg"></div>
								<!--<form class="contact-form" method="post" action="{{ route('contactus.submit') }}">-->
								<form class="contact-form" method="" action="#">
									@csrf
									@if(Session::has('massage_send'))
									<div class="alert alert-success" role="alert">
										{{ Session::get('massage_send') }}
									</div>
									@endif
									<div class="row c-mb-10 c-gutter-10">
										<div class="col-lg-6">
											<div class="form-group has-placeholder">
												<label for="name335x5553">Full Name <span class="required">*</span></label>
												<i class="fas fa-user"></i>
												<input type="text" required="" aria-required="true" size="30" value="" name="name" id="name335x5553" class="form-control" placeholder="Full Name">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group has-placeholder">
												<label for="email333">Email address<span class="required">*</span></label>
												<i class="fas fa-envelope"></i>
												<input type="email" aria-required="true" size="30" value="" required="" name="email" id="email333" class="form-control" placeholder="Email">
											</div>
										</div>
									</div>
									<div class="row c-mb-10 c-gutter-10">
										<div class="col-lg-6">
											<div class="form-group has-placeholder">
												<label for="name3355553">Phone Number <span class="required">*</span></label>
												<i class="fas fa-phone"></i>
												<input type="text" aria-required="true" size="30" required="" value="" name="phone" id="name3355553" class="form-control" placeholder="Phone Number">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group has-placeholder">
												<label for="name3355d553">Subject <span class="required">*</span></label>
												<i class="fas fa-paperclip"></i>
												<input type="text" aria-required="true" size="30" required="" value="" name="subject" id="name3355d553" class="form-control" placeholder="Subject">
											</div>
										</div>
									</div>
									<div class="row c-mb-10 c-gutter-10">
										<div class="col-sm-12">
											<div class="form-group has-placeholder">
												<label for="message335553">Message</label>
												<i class="fas fa-edit"></i>
												<textarea aria-required="true" rows="8" cols="45" required="" name="message" id="message335553" class="form-control" placeholder="Your Message"></textarea>
											</div>
										</div>
									</div>
									<div class="row c-mb-10 c-gutter-10">
										<div class="col-sm-12 mb-0 mt-lg-50 mt-30">
											<div class="form-group">
												<input class="btn btn-gradient big-btn" type="submit" value="Send message">
											</div>
										</div>
									</div>
								</form>
								<div class="fw-divider-space divider-xl-160 divider-lg-130 divider-md-90 divider-60"></div>
							</div>
						</div>
						<div class="col-lg-6 col-xl-5 text-sm-left text-center ls ms animate" data-animation="scaleAppear">
							@foreach($Setting as $row)
							<div class="special-column2">

								<div class="fw-divider-space divider-xl-160 divider-lg-130 divider-md-90 divider-60"></div>
								<div class="media text-center text-sm-left">
									<div class="icon-styled fs-60 color-main">
										<i class="ico ico-location"></i>
									</div>
									<div class="media-body">
										<h6 class="">
											Our Address
										</h6>
										<p class="">{{ $row->address }}</p>
									</div>
								</div>
								<div class="divider-50 hidden-below-lg"></div>
								<div class="divider-30 hidden-above-lg"></div>
								<div class="divider-line bg-maincolor text-center"></div>
								<div class="divider-60 hidden-below-lg"></div>
								<div class="divider-30 hidden-above-lg"></div>
								<div class="media text-center text-sm-left">
									<div class="icon-styled fs-60 color-main">
										<i class="ico ico-call"></i>
									</div>
									<div class="media-body">
										<h6 class="">
											Our Number
										</h6>
										<p class="">{{ $row->mobile_number }}</p>
									</div>
								</div>
								<div class="divider-50 hidden-below-lg"></div>
								<div class="divider-30 hidden-above-lg"></div>
								<div class="divider-line bg-maincolor text-center"></div>
								<div class="divider-60 hidden-below-lg"></div>
								<div class="divider-30 hidden-above-lg"></div>
								<div class="media text-center text-sm-left">
									<div class="icon-styled fs-60 color-main">
										<i class="ico ico-email"></i>
									</div>
									<div class="media-body">
										<h6 class="">
											Our Email
										</h6>
										<p class="">{{ $row->email }}</p>
									</div>
								</div>
								<div class="divider-50 hidden-below-lg"></div>
								<div class="divider-30 hidden-above-lg"></div>
								<div class="divider-line bg-maincolor text-center"></div>
								<div class="divider-60 hidden-below-lg"></div>
								<div class="divider-30 hidden-above-lg"></div>
								<span class="social-icons">
									<a href="{{ $row->fb_link }}" class="fab fa-facebook-f bg-icon light-bg rounded-icon"></a>
									<a href="{{ $row->tw_link }}" class="fab fa-twitter bg-icon light-bg rounded-icon"></a>
									<a href="{{ $row->lind_link }}" class="fab fa-linkedin-in bg-icon light-bg rounded-icon"></a>
									<a href="{{ $row->instra_link }}" class="fab fa-instagram bg-icon light-bg rounded-icon"></a>
								</span>
								<div class="fw-divider-space divider-xl-160 divider-lg-130 divider-md-90 divider-60"></div>

							</div>
							@endforeach
						</div>
						<!--.col-* -->
					</div>
				</div>
			</section>
		

			


		</div><!-- eof #box_wrapper -->
	</div><!-- eof #canvas -->
@endsection