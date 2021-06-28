 @extends('layouts.fontend.nav')
@section('content')
@php 
    $prassad=DB::table('prassad')
        ->orderBy('id','DESC')->limit(500)->get();
    

@endphp
<section>
    <div class="award_banner" style="background: url(./images/award.jpg);">
<div class="award_content_body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="award_heading">
                    <h2>prass ad</h2>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</section>

<section class="py-5" data-aos="fade-up" data-aos-duration="600" data-aos-easing="linear"   data-aos-offset="270">
    <div class="container">
    	@foreach($prassad as $row)
        <div class="row justify-content-center awr_gallery">
            <div class="col-md-3 py-2 px-1">
                <a href="{{ asset($row->image)}}">
                    <div class="awr_img">
                        <img src="{{ asset($row->image) }}" alt="" class="img-fluid img-responsive">
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection 