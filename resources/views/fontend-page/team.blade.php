@extends('layouts.fontend.nav')
@section('content')
@php
$team=DB::table('Team')
->orderBy('id','DESC')->limit(10)->get()->sortBy("priority");
@endphp
<section class="py-5">
	<div class="container" style="margin-top:150px;">
		<div class="row">
			<div class="col-12">
				<h2 class="special-heading text-center">
					<span class="text-capitalize">
						Our Team
					</span>
				</h2>
				<div class="divider-line bg-maincolor text-center"></div>
				<div class="fw-divider-space divider-25"></div>
				<p class="special-heading text-center">
					<span>
						<!--	Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam.-->
					</span>
				</p>
				<div class="divider-35 hidden-below-lg"></div>
				<div class="divider-30 hidden-above-lg"></div>
			</div>
		</div>

		<div class="row justify-content-center pt-3">
			@foreach($team as $row)
			<div class="col-md-3 py-2">
				<div class="member_body">
					<div class="member_img">
						<img src="{{ asset($row->image) }}" alt="" class="img-fluid img-responsive">
					</div>
					<div class="member_info">
						<h5>{{ $row->name }}</h5>
						<p>{{ $row->position }}</p>

						<p class="infor">{!! $row->short_description !!}. </p>

					</div>
				</div>
			</div>
			@endforeach
		</div>

	</div>
</section>
@endsection