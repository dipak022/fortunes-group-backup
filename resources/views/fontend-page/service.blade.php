@extends('layouts.fontend.nav')
@section('content')
{{-- $selary=DB::table('advance_salaries')
    	                  ->join('employees','advance_salaries.emp_id','employees.id')
    	                  ->select('advance_salaries.*','employees.name','employees.sallery','employees.image')
    	                  ->orderBy('id','DESC')
    	                  ->get();  --}}
 @php 
    
        /*echo "<pre>";
        print_r($mid_category);
        exit();*/
        $team=DB::table('Team')
        ->orderBy('id','DESC')->limit(100)->get();

@endphp

    <!-- ==================== Company Info Start =================== -->
    
    <section class="company_banner_section py-5" >
        <div class="container" style="margin-top:150px;">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="company_name">
                        <h2><span>{{ $mid_category->name }}</span></h2>
                    </div>
                    <div class="company_description pt-3">
                        <p>{{ $mid_category->short_description }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="company_img">
                        <img src="{{ asset($mid_category->image_one) }}" alt="" class="img-responsive img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="companies_product_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="company_name">
                        <h2><span>{{ $mid_category->name }}</span> Panel</h2>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="row image_gallery justify-content-center pt-3 company_mobile_slider">
                        <div class="col-md-3 my-0 px-0">
                            <div class="company_products_images">
                              <a href="{{ asset($mid_category->image_one) }}" data-toggle="tooltip" data-placement="top" title="{{ $mid_category->name }}">
                                <img
                                  src="{{ asset($mid_category->image_one) }}"
                                  alt=""
                                  data-lightbox="gallery.jpg"
                                  class="img-responsive img-fluid"
                              />
                            </a>
                            <div class="product_name_on_img">
                                <p>{{ $mid_category->name }}</p>
                            </div>
                            </div>
                          </div>
                          <div class="col-md-3 my-0 px-0">
                            <div class="company_products_images">
                              <a href="{{ asset($mid_category->image_two) }}" data-toggle="tooltip" data-placement="top" title="{{ $mid_category->name }}">
                                <img
                                  src="{{ asset($mid_category->image_two) }}"
                                  alt=""
                                  data-lightbox="gallery.jpg"
                                  class="img-responsive img-fluid"
                              /></a>
                              <div class="product_name_on_img">
                                <p>{{ $mid_category->name }}</p>
                            </div>
                            
                            </div>
                          </div>
                          <div class="col-md-3 my-0 px-0">
                            <div class="company_products_images">
                              <a href="{{ asset($mid_category->image_three) }}" data-toggle="tooltip" data-placement="top" title="{{ $mid_category->name }}">
                                <img
                                  src="{{ asset($mid_category->image_three) }}"
                                  alt=""
                                  data-lightbox="gallery.jpg"
                                  class="img-responsive img-fluid"
                              /></a>
                              <div class="product_name_on_img">
                                <p>{{ $mid_category->name }}</p>
                            </div>
                            </div>
                          </div>
                          <div class="col-md-3 my-0 px-0">
                            <div class="company_products_images">
                              <a href="{{ asset($mid_category->image_four) }}" data-toggle="tooltip" data-placement="top" title="{{ $mid_category->name }}">
                                <img
                                  src="{{ asset($mid_category->image_four) }}"
                                  alt=""
                                  data-lightbox="gallery.jpg"
                                  class="img-responsive img-fluid"
                              /></a>
                              <div class="product_name_on_img">
                                <p>{{ $mid_category->name }}</p>
                            </div>
                            </div>
                          </div>
                          
                        
                    </div>
                </div>
              

            </div>
        </div>
    </section>

    <!-- =========Member part start ============= -->
    <section class="team_member_section py-5">
        <div class="container"style="margin-top:150px;">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="company_name">
                        <h2>Honourable  <span>Members</span></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center pt-3">
                @foreach($team as $row)
                <div class="col-md-3 py-2">
                    <div class="member_body">
                        <div class="member_img">
                            <img src="{{ asset($row->image) }}" alt="" class="img-fluid img-responsive">
                        </div>
                        <div class="member_info">
                            <h5>{{ $row->name }}</h5>
                            <p>{{ $row->position }}</p>
                            
                        </div>
                    </div>
                </div>
               @endforeach
               
            </div>
        </div>
    </section>
@endsection