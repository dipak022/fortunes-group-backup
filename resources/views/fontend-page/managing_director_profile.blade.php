@extends('layouts.fontend.nav')
@section('content')
@php 
  $profil=DB::table('profil')
    ->orderBy('id','DESC')->limit(1)->get();
@endphp
<section class="py-5">
    <div class="container"style="margin-top:150px;">
        @foreach($profil as $row)
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="leader_body">
                    <div class="leader_img">
                        <img src="{{ asset($row->image) }}" alt="">
                    </div>
                    <div class="lead_name">
                        <p  style="text-align: center;">{{ $row->position }}</p>
                        <h5  style="text-align: center;">{{ $row->name }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="lead_info">
                    <p>
                        {!! $row->description !!}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section class="companies_product_section">
    <div class="container">
        @foreach($profil as $row)
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row image_gallery justify-content-center pt-3 company_mobile_slider">
                    <div class="col-md-3 my-0 px-0">
                        <div class="company_products_images">
                          <a href="{{ asset($row->image_one) }}" data-toggle="tooltip" data-placement="top" title="Festival">
                            <img
                              src="{{ asset($row->image_one) }}"
                              alt=""
                              data-lightbox="gallery.jpg"
                              class="img-responsive img-fluid"
                          />
                        </a>
                        <div class="product_name_on_img">
                            <p>Festival</p>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-3 my-0 px-0">
                        <div class="company_products_images">
                          <a href="{{ asset($row->image_two) }}" data-toggle="tooltip" data-placement="top" title="Festival">
                            <img
                              src="{{ asset($row->image_two) }}"
                              alt=""
                              data-lightbox="gallery.jpg"
                              class="img-responsive img-fluid"
                          /></a>
                          <div class="product_name_on_img">
                            <p>Festival</p>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-3 my-0 px-0">
                        <div class="company_products_images">
                          <a href="{{ asset($row->image_three) }}" data-toggle="tooltip" data-placement="top" title="Festival">
                            <img
                              src="{{ asset($row->image_three) }}"
                              alt=""
                              data-lightbox="gallery.jpg"
                              class="img-responsive img-fluid"
                          /></a>
                          <div class="product_name_on_img">
                            <p>Festival</p>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-3 my-0 px-0">
                        <div class="company_products_images">
                          <a href="{{ asset($row->image_four) }}" data-toggle="tooltip" data-placement="top" title="Festival">
                            <img
                              src="{{ asset($row->image_four) }}"
                              alt=""
                              data-lightbox="gallery.jpg"
                              class="img-responsive img-fluid"
                          />
                        </a>
                        <div class="product_name_on_img">
                            <p>Festival</p>
                        </div>
                        </div>
                      </div>
                    
                     
                    
                      
                </div>
            </div>
          

        </div>
        @endforeach
    </div>
</section>
@endsection