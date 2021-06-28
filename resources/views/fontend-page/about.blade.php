@extends('layouts.fontend.nav')
@section('content')
@php 
    $chairmaninfo=DB::table('chairmaninfo')
        ->orderBy('id','DESC')->limit(1)->get();
    

@endphp
			<section class="ls s-py-xl-160 s-py-lg-130 s-py-md-90 s-py-60">
				<div class="container">
					@foreach($chairmaninfo as $row)
					<div class="row">
						<div class="col-12 col-lg-3 text-center">
							<div class="chairmen_body">
								<div class="chairmen_img">
									<img src=" {{ asset($row->image) }}" alt="">
								</div>
								<div class="chairmen_message">
									<p>{{  $row->position }}
									</p>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-9 text-justify">
							<div class="divider-35 hidden-above-lg"></div>
							<div class="divider--5"></div>
							
							<p class="excerpt">{{ $row->shortdescription }}</p>
							<p >{!! $row->description !!}</p>
							
						</div>
					</div>
					@endforeach
				</div>
			</section>

		

			<section class="py-10">
				<div class="container"></div>
			</section>

		</div><!-- eof #box_wrapper -->
	</div><!-- eof #canvas -->


@endsection