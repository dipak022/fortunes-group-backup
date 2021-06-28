{{-- @extends('layouts.fontend.nav')
@section('content')
@php 
    $award_achievement=DB::table('award_achievement')
        ->orderBy('id','DESC')->limit(500)->get();
    

@endphp

@endsection --}}

@extends('layouts.fontend.nav')
@section('content')
@php 
    $tvc_av=DB::table('tvc_av')
        ->orderBy('id','DESC')->limit(500)->get();
    

@endphp
<section>
    <div class="award_banner" style="background: url({{ asset('public/Frontend/image/02.jpg') }});">
<div class="award_content_body">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="award_heading">
                    <h2>TVC & AV</h2>
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
        	@foreach($tvc_av as $row)
            <div class="col-md-6 py-2">
            
                <div class="tvc_video_body">
                    <iframe width="560" height="315" src="{{ $row->vedio_link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection