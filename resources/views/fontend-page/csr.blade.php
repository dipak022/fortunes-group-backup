@extends('layouts.fontend.nav')
@section('content')
@php 
    $csr=DB::table('csr')
        ->orderBy('id','DESC')->limit(500)->get();
    

@endphp
<section>
    <div class="award_banner" style="background: url(./images/award.jpg);">
<div class="award_content_body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="award_heading">
                    <h2>CSR</h2>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</section>
<section class="py-5" data-aos="fade-up" data-aos-duration="600" data-aos-easing="linear"   data-aos-offset="270">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="csr_details">
                    <p>Corporate social responsibility (CSR) is a self-regulating business model that helps a company be socially accountable—to itself, its stakeholders, and the public. By practicing corporate social responsibility, also called corporate citizenship, companies can be conscious of the kind of impact they are having on all aspects of society, including economic, social, and environmental.</p>
                    <ul>
                        <li>Corporate social responsibility is important to both consumers and companies.</li>
                        <li>Starbucks is a leader in creating corporate social responsibility programs in many aspects of its business. </li>
                        <li>Corporate responsibility programs are a great way to raise morale in the workplace. </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section  data-aos="fade-up" data-aos-duration="600" data-aos-easing="linear"   data-aos-offset="270">
    <div class="container">
<div class="row justify-content-center">
    <div class="col-md-10">
            <div class="row csr_gallery">
            	@foreach($csr as $row)
                <div class="col-md-3 p-1">
                    <a href="{{ $row->image }}">
                        <div class="csr_img">
                            <img src="{{ $row->image }}" alt="">
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
    </div>
</div>
    </div>
</section>
@endsection