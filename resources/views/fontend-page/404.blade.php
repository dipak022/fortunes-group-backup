@extends('layouts.fontend.nav')
@section('content')
@php 
    $about=DB::table('about')
        ->orderBy('id','DESC')->limit(1)->get();
    $abouts=DB::table('about')
        ->orderBy('id','DESC')->limit(5)->get();
    $team=DB::table('Team')
        ->orderBy('id','DESC')->limit(10)->get();

@endphp



		

			<section class="ls ms hero-bg s-py-xl-180 s-py-lg-160 s-py-md-90 s-py-60 s-overlay error-404 not-found page_404">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12 d-flex justify-content-center flex-column align-items-center">
							<img src="{{ asset('public/Frontend/img/404.png') }} " alt="">
							<h3 class="text-center">The Page You Requested Cannot Be Found!</h3>
							<div class="d-flex flex-wrap justify-content-center">
								<a class="btn btn-darkgrey big-btn" href="{{ url('/') }}">back home</a>
								<a class="btn btn-darkgrey big-btn" href="{{ url('contact/') }}">contact us</a>
							</div>

						</div>
					</div>
				</div>
			</section>

		

			<section class="py-10">
				<div class="container"></div>
			</section>

			

		</div><!-- eof #box_wrapper -->
	</div><!-- eof #canvas -->


@endsection