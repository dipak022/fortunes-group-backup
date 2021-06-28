@extends('layouts.fontend.nav')
@section('content')
@php 
    $blog=DB::table('blog')
        ->orderBy('id','DESC')->limit(500)->get();
    

@endphp
<section>
    <div class="award_banner" style="background: url(./images/paper.jpg);">
<div class="award_content_body">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="award_heading">
                    <h2>News &
                        Events</h2>
                        <p>Be with us and be updated with all
                            the news and event information from Super Start Group.</p>
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
        	@foreach($blog as $row)
            <div class="col-md-4 py-2">
                
                <div class="news_body">
                    <div class="news_img">
                        <img src="{{ $row->image }}" alt="" class="img-fluid img-responsive">
                    </div>
                    <div class="news_content">
                        <h5><a href="">{{ $row->title }}</a></h5>
                        <p>{!!  Str::limit( strip_tags($row->description),160) !!}</p>
                        <p><a href="{{ url('blog/details/') }}/{{\Crypt::encrypt($row->id)}}">Read More</a></p>
                    </div>
                </div>
                
              
            </div>
          
          @endforeach
        </div>
        
    </div>
</section>
@endsection