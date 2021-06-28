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
                                
                                @foreach($pro_cat as $row)
                                    <a href="#"class="selected" data-filter=".{{ $row->id }}"> {{ $row->pro_category_name }}</a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center" >
                        <div class="col-md-6 text-center street pb-3">
                            <div class="categoy_title">
                                <h4>{{ $row->pro_category_name }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row isotope-wrapper portfolio masonry-layout c-mb-30" data-filters=".gallery-filters">
                        @foreach($pro_cat as $rows)
                        @foreach($pro_img as $rows1)
                        @if($rows1->user_value==1 && $rows1->user_id==$rows->id)
                        
                        <div class="col-xl-4 col-sm-6 {{ $rows->id }}">
                          
                            <div class="vertical-item  content-absolute text-center ds home_category">
                                <div class="item-media">
                                    <img src="{{ $rows1->gallery_image }}" alt="img">
                                </div>
                                
                                <div class="item-content">
                                            <div class="links-wrap">
                                                <a class="link-zoom photoswipe-link" title="" href="images/solar_ipp.png"></a>
                                                <a class="link-anchor" title="" href="gallery-single.html"></a>
                                            </div>
                                            <h6>
                                                <a href="gallery-single.html">Lorem ipsum dolor sit</a>
                                            </h6>

                                        </div>
                                        <div class="gallery_overlay">
                                        <div class="gallery_ov_content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda eveniet consequuntur perspiciatis consequatur incidunt. Facere deleniti accusantium alias adipisci eum totam vero, id minima veritatis provident minus delectus molestiae porro.</p>
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


