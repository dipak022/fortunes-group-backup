@extends('layouts.fontend.nav')
@section('content')
@php 
    $latest_news=DB::table('latest_news')
        ->orderBy('id','DESC')->limit(500)->get();
    

@endphp
<section>
    <div class="award_banner news_banner" style="background: url(./images/paper.jpg);">
<div class="award_content_body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="award_heading latest_heading">
                    <h2>Latest News</h2>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</section>
<section class="py-5" data-aos="fade-up" data-aos-duration="600" data-aos-easing="linear"   data-aos-offset="270">
    <div class="container">
    	
        <div class="row justify-content-center ">
        	@foreach($latest_news as $row)
            <div class="col-md-4 py-2">
            
                <div class="latest_news_body">
                    <div class="latest_news_img">
                        <div class="latest_nes_date">
                            <p>{{ $row->date }}</p>
                        </div>
                        <img src="{{ $row->image }}" alt="" class="img-fluid img-responsive">
                        <div class="latest_title">
                            <h5><a href="">{{ $row->title }}</a></h5>
                        </div>
                    </div>
                    <p><a href="{{ url('latest/news/details/') }}/{{\Crypt::encrypt($row->id)}}">Read More</a></p>
                </div>
              
            </div>
           @endforeach
        </div>
        
    </div>
</section>
@endsection