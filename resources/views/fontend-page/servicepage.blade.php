@extends('layouts.fontend.nav')
@section('content')
@php 
    $slidder=DB::table('business_slider')
        ->orderBy('id','DESC')->limit(10)->get();

@endphp
    <section class="page_slider">
        <div class="flexslider">
            <ul class="slides">
                @foreach($business_sliders as $row)
                <li class="ds cover-image">
                    <img src="{{ asset($row->image) }}" alt="img">
                   
                </li>
                @endforeach
            </ul>
        </div> <!-- eof flexslider -->
    </section>
@php 
    $about=DB::table('about')
        ->orderBy('id','DESC')->limit(1)->get();

@endphp
    
@php 
    /*$about=DB::table('about')
        ->orderBy('id','DESC')->limit(1)->get();*/
    
@endphp
<section class="ls s-py-xl-160 text-sm-left text-center s-py-lg-130 s-py-md-90 s-py-60 c-gutter-60">
				<div class="container-fluid px-2">
					<div class="row">
						<div class="col-lg-6 col-12">
							<h2 class="special-heading text-sm-left text-center">
                                {{-- @foreach($mid_category as $row) --}}
								<span class="text-capitalize">
									{{ $mid_category->name }}
								</span>
                                {{-- @endforeach --}}
							</h2>
							<div class="divider-line bg-maincolor text-sm-left text-center"></div>
							<div class="fw-divider-space divider-30"></div>
							<ul class="our_values">
														
								<li>
									<p><span><i class="fas fa-long-arrow-alt-right"></i></span> {!! $mid_category->short_description !!}.
									</p>
								</li>
								
								
							</ul>
							<div class="divider-50 hidden-below-lg"></div>
							<div class="divider-30 hidden-above-lg"></div>
							@if($mid_category->facebook_link!=null)
                                                    <a href="{{$mid_category->facebook_link}}" class="btn btn-gradient big-btn"target="_blank" title="facebook">View More</a>
                            @else
                            @endif
							
							<div class="divider-60 hidden-below-lg"></div>
							<div class="divider-30 hidden-above-lg"></div>
							
							<div class="owl-carousel sync1" data-center="false" data-nav="false" data-margin="15" data-loop="true" data-responsive-lg="3" data-responsive-md="3" data-responsive-sm="2" data-responsive-xs="2">
								<img class="rounded" src="{{ asset($mid_category->image_one) }}" alt="">
								<img class="rounded" src="{{ asset($mid_category->image_two) }}" alt="">
								<img class="rounded" src="{{ asset($mid_category->image_three) }}" alt="">
								<img class="rounded" src="{{ asset($mid_category->image_four) }}" alt="">

							</div>
							
						</div>
						
						<div class="col-lg-6 col-12">
							<div class="divider-30 hidden-above-lg"></div>
							<div class="owl-carousel sync2" data-center="false" data-draggable="false" data-nav="false" data-margin="10" data-loop="true" data-responsive-lg="1" data-responsive-md="1" data-responsive-sm="1" data-responsive-xs="1">
								<img class="rounded" src="{{ asset($mid_category->image_one) }}" alt="">
								<img class="rounded" src="{{ asset($mid_category->image_two) }}" alt="">
								<img class="rounded" src="{{ asset($mid_category->image_three) }}" alt="">
								{{-- <img class="rounded" src="{{ asset('public/Frontend/') }}/images/gallery/square/04.jpg" alt=""> --}}
                                <img class="rounded" src="{{ asset($mid_category->image_four) }}" alt="">
							</div>
						</div>
						
					</div>
				</div>
			</section>


{{-- Product Start --}}
 <section class="py-5">
                <div class="container" style="margin-top:150px;">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="special-heading text-center">
                                <span class="text-capitalize">
                                    Our Products
                                </span>
                            </h2>
                            <div class="divider-line bg-maincolor text-center"></div>
                            <div class="fw-divider-space divider-25"></div>
                            <p class="special-heading text-center">
                                <span>
                                <!--    Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam.-->
                                </span>
                            </p>
                            <div class="divider-35 hidden-below-lg"></div>
                            <div class="divider-30 hidden-above-lg"></div>
                        </div>
                    </div>
                    <div class="row justify-content-center pt-3">
                        <div class="col-md-12">
                            <div class="row">
                                 @foreach($project_categorys2 as $row)
                                <div class="col-md-3 py-2 px-1">
                                    <div class="member_body home_product_body">
                                        
                                        <div class="member_img home_product_img">
                                            <a href="http://solarbazarbd.com/" target="_blank">
                                            
                                            <img src="{{ asset($row->image) }}" alt="" class="img-fluid img-responsive">
                                            </a>
                                        </div>
                                        
                                        <div class="member_info">
                                            <a href="http://solarbazarbd.com/" target="_blank">
                                            <h5 style="text-align: center;">{{ $row->title }}</h5>
                                            </a>
                                            {{-- <p>{{ $row->position }}</p> --}}
                                        
                                        </div>
                                        <div class="team_mem_overlay">
                                            <p class="infor">{!! $row->description !!}.</p>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                            </div>
                        </div>
                        
                        
                        
                    </div>
                
                </div>
            </section>

            {{-- product End --}}

















@php
  $ImageGallery=DB::table('ImageGallery')
        ->orderBy('id','DESC')->limit(6)->get();
@endphp
@php 
        $pro_cat=DB::table('project_category')
            /*->join('project_image','project_category.id','project_image.id')
            ->select('project_category.*','project_image.user_id','project_image.user_value')*/
->orderBy('id','ASC')->limit(500)->get();



 $project_categorys=DB::table('pro_cat')
         ->orderBy('id','ASC')->limit(500)->get();




         /*$mid_category=DB::table('categoryImages')
           ->join('fortuneCategory','categoryImages.fortune_cat_id','fortuneCategory.id')->where('categoryImages.fortune_cat_id',$ids)->select('categoryImages.*','fortuneCategory.name','fortuneCategory.short_description')
        ->orderBy('id','DESC')->first();*/



$pro_cat1=DB::table('project_category')
            ->join('project_image','project_category.id','project_image.id')
            ->select('project_category.*','project_image.user_id','project_image.user_value')
->orderBy('id','ASC')->limit(500)->get();

        $pro_img=DB::table('project_image')
            ->orderBy('id','ASC')->limit(2000)->get();


@endphp
@if($project_categorys1!=null)
<section class="ds s-overlay portfolio-section  s-py-xl-160 s-py-lg-130 s-py-md-90 s-py-60 text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="special-heading text-center">
                                <span class="text-capitalize">
                                    Our Projects
                                </span>
                            </h2>
                            <div class="divider-50 hidden-below-lg"></div>
                            <div class="divider-30 hidden-above-lg"></div>
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-xl-10">
                                    <div class="filters gallery-filters">
                                        {{-- @foreach($pro_cat as $row)
                                            <a href="#"class="selected" data-filter=".{{ $row->id }}"> {{ $row->pro_category_name }}</a>
                                        @endforeach --}}
                                            <div class="all_links">
                                            <button type="button" class="collapsible" >{{ $project_categorys1->cat_name ?? '' }}</button>
                                            <div class="mlbs_content" data-parent="#accordion">
                                                <ul>
                                                    @php 


                                                            $projectcategorys=DB::table('project_category')->where('procat_id',$project_categorys1->id)->get();
                                                           
                                                    @endphp
                                                    @foreach($projectcategorys as $row)
                                                    <li><a href="#" data-filter=".{{ $row->id }}">{{ $row->pro_category_name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                           </div>
                                          

                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6 text-center street pb-3">
                                    <div class="categoy_title">
                                        <h4>{{-- {{ $row->pro_category_name }} --}}</h4>
                                    </div>
                                </div>
                            </div>


                            <div class="row isotope-wrapper portfolio masonry-layout c-mb-30" data-filters=".gallery-filters">
                                @foreach($pro_cat as $rows)
                                @foreach($pro_img as $rows1)
                                @if($rows1->user_value==1 && $rows1->user_id==$rows->id)
                                <div class="col-xl-4 col-sm-6  {{ $rows->id }}">

                                    <div class="vertical-item  content-absolute text-center ds home_category">
                                        <div class="item-media">
                                            <img src="{{ asset($rows1->gallery_image) }}" alt="img">

                                        </div>
                                        <div class="item-content">
                                            

                                        </div>
                                        <div class="gallery_overlay">
                                        <div class="gallery_ov_content">
                                            <p>{!! $rows1->description !!}</p>
                                        </div>
                                        </div>
                                    </div>

                                </div>
                                  @else
                        @endif
                        @endforeach
                        @endforeach

                            </div>
                            <div class="mt--30"></div>
                            
                        </div>
                    </div>
                </div>
            </section>
            @else
            @endif
          

{{-- @php

    $Faq=DB::table('Faq')
        ->orderBy('id','DESC')->limit(5)->get();
    $Faq_img=DB::table('Faq')
        ->orderBy('id','DESC')->limit(9)->get();
@endphp
    <section class="ls  s-py-xl-160 s-py-lg-130 s-py-md-90 s-py-60 text-sm-left text-center c-gutter-60">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h2 class="special-heading text-sm-left text-center">
								<span class="text-capitalize">
									FAQ & Information
								</span>
                    </h2>
                    <div class="divider-50 hidden-below-lg"></div>
                    <div class="divider-30 hidden-above-lg"></div>
                    <div id="accordion01{{ $row->id ??'' }}" role="tablist">
                        
                       
                        @foreach($Faq as $row)
                                
                                <div class="card">
                                    <div class="card-header" role="tab" id="collapse02_header">
                                        <h5>
                                            <a class="collapsed" data-toggle="collapse" href="#collapse02{{ $row->id }}" aria-expanded="false" aria-controls="collapse02">
                                                {{ $row->title }}
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse02{{ $row->id }}" class="collapse" role="tabpanel" aria-labelledby="collapse02_header" data-parent="#accordion01">
                                        <div class="card-body">
                                            {{ $row->short_description }}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        
                       
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="divider-30 hidden-above-lg"></div>
                    <div class="row isotope-wrapper masonry-layout {{ asset('public/Frontend/') }}/images-grid c-mb-30 c-gutter-30">
                        @foreach($Faq_img as $row)
                        <div class="col-lg-4  col-sm-6  ">
                            <a href="#">
                                <div class="bordered text-center p-xl-11 p-20 rounded">
                                    <img src="{{ asset($row->image) }}" alt="">
                                </div>
                            </a>
                        </div>
                        @endforeach
                       
                    
                        
                        
                    </div>
                    <div class="mt--30"></div>
                </div>
            </div>
        </div>
    </section> --}}











    <section class="pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="partners_title text-center">
                        <h2>Ours Company</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center py-5">
                <div class="col-md-12">
                    <div class="partner_slider_container m-auto">
                        <img src="{{ asset('public/Frontend/') }}/images/fortune_agro.png" alt="">
                        <img src="{{ asset('public/Frontend/') }}/images/fortune_assets.png" alt="">
                        <img src="{{ asset('public/Frontend/') }}/images/fortune_bazar.png" alt="">
                        <img src="{{ asset('public/Frontend/') }}/images/fortune_digital.png" alt="">
                        <img src="{{ asset('public/Frontend/') }}/images/fortune_electronics.png" alt="">
                        <img src="{{ asset('public/Frontend/') }}/images/fortune_foundation.png" alt="">
                        <img src="{{ asset('public/Frontend/') }}/images/fortune_institute.png" alt="">
                        <img src="{{ asset('public/Frontend/') }}/images/fortune_international.png" alt="">
                        <img src="{{ asset('public/Frontend/') }}/images/fortune_motors.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

