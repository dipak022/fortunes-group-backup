@extends('layouts.fontend.nav')
@section('content')
@php 
    $slidder=DB::table('slidder')
        ->orderBy('id','ASC')->limit(15)->get();
@endphp
   <section style="margin-top:50px;" class="page_slider">
        <div class="flexslider">
            <ul class="slides">
                @foreach($slidder as $row)
                <li class="ds cover-image">
                    <img src="{{ $row->slidder_image }}" alt="img">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="intro_layers_wrapper">
                                    <div class="intro_layers">
                                        <div class="intro_layer">
                                          
                                            <h2 class="text-capitalize intro_featured_word">
                                                {{ $row->description }}
                                            </h2>
                                           
                                            <h6 class="intro_before_featured_word">Visit Now</h6>
                                            <a href="http://solarbazarbd.com/" class="btn btn-outline-darkgrey big-btn" target="_blank">Solar Bazar</a>
											<span class="text-divider">&</span>
											<a href="https://www.facebook.com/fdigimart/" class="btn btn-outline-darkgrey big-btn" target="_blank">Digital Mart</a>
                                        </div>
                                    </div> 
                                </div> 
                            </div> 
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div> 
    </section>
    
    
    
    
    	<!-- ======================= Banner part start ======================= -->

	<!--		<section class="banner_section">
				<div class="banner_container">
				     @foreach($slidder as $row)
					<div class="banner_img" style="background: url({{ $row->slidder_image }});">
						<div class="banner_content_body">
							<div class="container-fluid">
								<div class="row justify-content-center">
									<div class="col-md-10">
										<div class="banner_content">
											<h2>{{ $row->name }}</h2>
											<p>{{ $row->description }}</p>
											<p>{{ $row->short_description }}</p>
											<div class="all_button">
												<a href="http://solarbazarbd.com/" class="btn btn-outline-darkgrey big-btn" target="_blank">Solar Bazar</a>
											</div>
											<div class="all_button">
											
											<h4 class="text-divider">&</h4>
											<a href="https://www.facebook.com/fdigimart/" class="btn btn-outline-darkgrey big-btn" target="_blank">Digital Mart</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				
				</div>
			</section>-->
			<!-- ======================= Banner part end ======================= -->
    
    
    
@php 
    $mid_category=DB::table('fortuneCategory')
        ->orderBy('id','DESC')->limit(20)->get()->sortBy("priority");
@endphp
<!--
    <section class="ds text-sm-left text-center container-px-0 c-gutter-0">
        <div class="container-fluid">
            <div class="row service-v2 group_slider">
                @foreach($mid_category as $row)
                <div class="col-sm-6 col-md-4 col-xl-12   ">
                    <div class="icon-box service-single with-icon layout2 ds text-center com_body">
                        <a class="link-icon" href="service-single2.html">
                            <div class="icon-styled  fs-50">
                                <img src="{{ $row->image }}" alt="">
                            </div>
                        </a>
                        <a href="service-single2.html">
                            <h5>
                                {{ $row->name }}
                            </h5>
                        </a>

                        <p>
                         {{  Str::limit( strip_tags($row->short_description),150) }}
                        </p>
                        <a class="btn btn-outline-darkgrey" href="{{ url('service/'.$row->id) }}">
                            Know More
                        </a>
                    </div>
                </div> 
                @endforeach
            </div>
        </div>
    </section>-->

			<section class="ds text-sm-left text-center container-px-0 c-gutter-0">
				<div class="container-fluid">
					<div class="row group_slider">
						@foreach($mid_category as $row)
						<div class="col-sm-6 col-md-4 col-xl-12   ">
							<div class="icon-box service-single with-icon layout2 ds text-center com_body">
								<a class="link-icon" href="#">
									<div class="icon-styled  fs-50">
										<img src="{{ $row->image }}" alt="">
									</div>
								</a>
								<a href="service-single2.html">
									<h5>
										{{ $row->name }}
									</h5>
								</a>

								<p>{{  Str::limit( strip_tags($row->short_description),150) }} </p>
								<a class="btn btn-outline-darkgrey" href="{{ $row->name }}/{{\Crypt::encrypt($row->id)}}">
                                    {{-- {{ $row->name }}/{{\Crypt::encrypt($row->id)}} --}}
									Visit Now
								</a>
							</div>
						</div>
					@endforeach
					</div>
				</div>
			</section>
@php 
    $about=DB::table('about')
        ->orderBy('id','DESC')->limit(1)->get();

@endphp
    <section class="pt-5"><!--ls main-testimonial s-py-xl-160 s-py-lg-130 s-py-md-90 s-py-60-->
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5 text-center">
                    <h2 class="special-heading text-center">
								<span class="text-capitalize">
									Welcome to fortunes group
								</span>
                    </h2>
                    <div class="divider-30"></div>
                    <a class="btn btn-gradient big-btn" href="/">Visit Now</a>
                </div>
                @foreach($about as $row)
                <div class="col-12 col-lg-7 text-justify">
                    <div class="divider-35 hidden-above-lg"></div>
                    <div class="divider--5"></div>
                    <p class="excerpt">
                        {{ $row->shortdescription }}
                    </p>
                    <p>
                        {!! $row->description !!}


                    </p>
                </div>
                @endforeach
                <!-- <div class="col-12 col-lg-3 text-sm-left text-center">
                    <div class="divider-35 hidden-above-lg"></div>
                    <div class="signature">
                        <div class="signature-image">
                            <img src="{{ asset('public/Frontend/') }}/images/team/testimonial2.jpg" alt="">
                        </div>
                        <div class="signature-content">
                            <span>Diana T. Davis</span>
                            <img src="{{ asset('public/Frontend/') }}/images/signature.png" alt="">
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    @php 
    $services=DB::table('services')
            ->join('categoryImages','services.id','categoryImages.fortune_cat_id')
            ->select('services.*','categoryImages.image_one','categoryImages.image_two','categoryImages.image_three','categoryImages.image_four')
            ->orderBy('id','DESC')->limit(10)->get();
    $services_one=DB::table('services')
            ->join('categoryImages','services.id','categoryImages.fortune_cat_id')
            ->select('services.*','categoryImages.image_one','categoryImages.image_two','categoryImages.image_three','categoryImages.image_four')
            ->orderBy('id','DESC')->limit(10)->get();
  /*  $services_two=DB::table('categoryImages')
            ->join('services','categoryImages.fortune_cat_id','services.id')
            ->select('categoryImages.*','services.title','services.description','services.vedio_or_link','services.sub_title')
            ->orderBy('id','DESC')->limit(3)->get();*/


           /* $services_two=DB::table('services')
            ->join('categoryImages','services.id','categoryImages.fortune_cat_id')
            ->select('services.*','categoryImages.image_one','categoryImages.image_two','categoryImages.image_three','categoryImages.image_four')
            ->orderBy('id','DESC')->limit(10)->get();*/


            $services_two=DB::table('fortuneCategory')
            ->join('categoryImages','fortuneCategory.id','categoryImages.fortune_cat_id')
            ->select('fortuneCategory.*','categoryImages.image_one','categoryImages.image_two','categoryImages.image_three','categoryImages.image_four','categoryImages.webside_link','categoryImages.facebook_link','categoryImages.priority')->orderBy('categoryImages.priority')->limit(500)->get();


            /*$mid_categorys=DB::table('fortuneCategory')
        ->orderBy('id','DESC')->limit(12)->get();*/
            

    $count=0;       

    @endphp
    @foreach($services_two as $row)
    @php
      $count++;
      $result=$count%2;
      
    @endphp
    @if($count%2=='0')
    <section class="video_popup ls py-5 text-sm-left text-center container-px-0" id="video_popup"><!-- Padding touched -->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xs-12 col-12 col-lg-6">
                            <div class="video_bg " id="video_bg">
                                <div class="mid_slid_one">

                                    <!--{{ $count }}-->
                                    <img src="{{ asset($row->image_one) }}" alt="01">
                                    <img src="{{ asset($row->image_two) }}" alt="02">
                                    <img src="{{ asset($row->image_three) }}" alt="03">
                                    <img src="{{ asset($row->image_four) }}" alt="04">
                                </div>
                                
                            </div>    
                        </div>
                        <div class="col-xs-12 col-12 col-lg-6">
                            <div class="content-center pt-5">
                                <h2 class="special-heading numeric text-sm-left text-center">
                                    <span class="text-capitalize">
                                        {{ $row->name }}
                                    </span>
                                </h2>
                                <div class="divider-45 hidden-below-lg"></div>
                                <div class="divider-30 hidden-above-lg"></div>
                                <p>
                                    {!! $row->short_description  !!}

                                </p>
                                <div class="divider-45 hidden-below-lg"></div>
                                <div class="divider-30 hidden-above-lg"></div>
                                <div class="site_link">
                                    @if($row->webside_link!=null)
                                    <!--<a href="{{ $row->name }}/{{\Crypt::encrypt($row->id)}}">visit now</a>-->
                                    
                                    <a href="{{ $row->webside_link }}" target="_blank">visit now</a>
                                    @else
                                    @endif
                                    
                                    
                                    
                                    {{-- <a href="{{ $urls }}
                                                    /final/{{ $sub->subcategory_name }}/{{\Crypt::encrypt($sub->id)}}">{{ $sub->subcategory_name }}</a>
                                                    {{ url('servicepage/'.$row->id) }} --}}
                                                    
                                    @if($row->facebook_link!=null)
                                                    <a href="{{$row->facebook_link}}" class="fab fa-facebook-f"target="_blank" title="facebook"></a>
                                    @else
                                    @endif                
                                                    
                                </div>
                                <div class="divider--10"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    
    @else
     <section class="video_popup ls py-5 text-sm-left text-center container-px-0"id="video_popup"><!-- Padding touched -->
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-xs-12 col-12 col-lg-6 pt-5">
                            <div class="content-center">
                                <h2 class="special-heading numeric text-sm-left text-center">
                                    <span class="text-capitalize">
                                        {{ $row->name }}
                                    </span>
                                </h2>
                                <div class="divider-45 hidden-below-lg"></div>
                                <div class="divider-30 hidden-above-lg"></div>
                                <p>
                                    {!! $row->short_description  !!}

                                </p>
                                <div class="divider-45 hidden-below-lg"></div>
                                <div class="divider-30 hidden-above-lg"></div>
                                <div class="site_link">
                                     @if($row->webside_link!=NULL)
                                    
                                    <!--<a href="{{ $row->name }}/{{\Crypt::encrypt($row->id)}}">visit now</a>-->
                                    
                                    <a href="{{ $row->webside_link }}" target="_blank">visit now</a>
                                    @else
                                    @endif
									 @if($row->facebook_link!=NULL)
                                                    <a href="{{$row->facebook_link}}" class="fab fa-facebook-f"target="_blank" title="facebook"></a>
                                    @else
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-12 col-lg-6">
                            <div class="video_bg " id="video_bg">
                                <div class="mid_slid_two">
                                    
                                    <img src="{{ asset($row->image_one) }}" alt="01">
                                    <img src="{{ asset($row->image_two) }}" alt="02">
                                    <img src="{{ asset($row->image_three) }}" alt="03">
                                    <img src="{{ asset($row->image_four) }}" alt="04">
                                        
                                 </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    @endif
   @endforeach
   
    
   
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
         ->orderBy('id','ASC')->limit(500)->get()->sortBy("priority");
$pro_cat1=DB::table('project_category')
            ->join('project_image','project_category.id','project_image.id')
            ->select('project_category.*','project_image.user_id','project_image.user_value')
->orderBy('id','ASC')->limit(500)->get();

        $pro_img=DB::table('project_image')
            ->orderBy('id','ASC')->limit(2000)->get();


@endphp
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


                                          @foreach($project_categorys as $row)
                                            <div class="all_links">
                                               
                                            
                                            <button type="button" class="collapsible" >{{ $row->cat_name }}</button>
                                            <div class="mlbs_content" data-parent="#accordion">
                                                <ul>
                                                    @php
                                                       
                                                            $projectcategorys=DB::table('project_category')->where('procat_id',$row->id)->get();
                                                           
                                                    @endphp
                                                    @foreach($projectcategorys as $row)
                                                    <li><a href="#" data-filter=".{{ $row->id }}">{{ $row->pro_category_name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                           </div>
                                          @endforeach

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
                                            <img src="{{ $rows1->gallery_image }}" alt="img">

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
@php
    $Faq=DB::table('Faq')
        ->orderBy('id','DESC')->limit(5)->get();
    $Faq_img=DB::table('Faq')
        ->orderBy('id','DESC')->limit(9)->get();
@endphp
    <section class="ls  s-py-xl-160 s-py-lg-130 s-py-md-90 s-py-60 text-sm-left text-center c-gutter-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <h2 class="special-heading text-sm-left text-center">
								<span class="text-capitalize">
									FAQ & Information
								</span>
                    </h2>
                    <div class="divider-50 hidden-below-lg"></div>
                    <div class="divider-30 hidden-above-lg"></div>
                    <div id="accordion01{{ $row->id ??'' }}" role="tablist">
                        {{-- <div class="card">
                            <div class="card-header" role="tab" id="collapse01_header">
                                <h5>
                                    <a data-toggle="collapse" href="#collapse01" aria-expanded="true" aria-controls="collapse01">
                                        Get to know us
                                    </a>
                                </h5>
                            </div>

                            <div id="collapse01" class="collapse show" role="tabpanel" aria-labelledby="collapse01_header" data-parent="#accordion01">
                                <div class="card-body">
                                    Our team has been gelpingclients throughout the country for 10 years lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                                </div>
                            </div>
                        </div> --}}
                       
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
                                            {!! $row->description !!}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        
                       
                    </div>
                </div>
                <!--<div class="col-12 col-lg-6">-->
                <!--    <div class="divider-30 hidden-above-lg"></div>-->
                <!--    <div class="row isotope-wrapper masonry-layout {{ asset('public/Frontend/') }}/images-grid c-mb-30 c-gutter-30">-->
                <!--        @foreach($Faq_img as $row)-->
                <!--        <div class="col-lg-4  col-sm-6  ">-->
                <!--            <a href="#">-->
                <!--                <div class="bordered text-center p-xl-11 p-20 rounded">-->
                <!--                    <img src="{{ asset($row->image) }}" alt="">-->
                <!--                </div>-->
                <!--            </a>-->
                <!--        </div>-->
                <!--        @endforeach-->
                       
                    
                        
                        
                <!--    </div>-->
                <!--    <div class="mt--30"></div>-->
                <!--</div>-->
            </div>
        </div>
    </section>



    <section class="ls ms pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="partners_title text-center">
                        <h2>Our Companies </h2>
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
