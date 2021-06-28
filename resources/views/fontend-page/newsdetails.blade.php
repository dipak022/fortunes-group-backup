 @extends('layouts.fontend.nav')
@section('content')
@php 
    $award_achievement=DB::table('award_achievement')
        ->orderBy('id','DESC')->limit(500)->get();
    

@endphp
<section>
    <div class="award_banner news_banner" style="background: url(./images/paper.jpg);">
<div class="award_content_body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="award_heading latest_heading_des">
                    <h2>{{ $news_event->title }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12 py-2">
            
                <div class="latest_news_body_des">
                    <div class="latest_news_date_des">
                        <h4>{{ $news_event->title }}</h4>
                        <p>Published <span>@php
								echo date("Y.m.d");
							@endphp</span></p>
                    </div>
                    <div class="latest_news_img_des">
                        <img src="{{ asset($news_event->image) }}" alt="" class="img-fluid img-responsive">
                    </div>
                    <div class="latest_description" data-aos="fade-up" data-aos-duration="600" data-aos-easing="linear">
                        <p>{!! $news_event->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection