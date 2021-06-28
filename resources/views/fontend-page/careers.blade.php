@extends('layouts.fontend.nav')
@section('content')
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">-->
<section>
				<div class="container">
					<!--<div class="row">
						<div class="col-md-12 text-center">
							<h1>Careers</h1>
							<div class="breadcrumb-wrap">
								<ol class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.html">Home</a>
									</li>
									<li class="breadcrumb-item">
										<a href="#">Pages</a>
									</li>
									<li class="breadcrumb-item active">
										Careers
									</li>
								</ol>
							</div>

						</div>


					</div>-->
				</div>
			</section>


			<section class="py-5">
				<div class="career_form">
					<div class="container" style="margin-top:150px;">
					  <div class="row justify-content-center pb-3">
						<div class="col-md-10">
						  <div class="career_banner_tittel text-center">
							<h2>Find Your Career. You Deserve it.</h2>
						  </div>
						</div>
					  </div>
					  <div class="row justify-content-center py-5">
						<div class="col-md-6 inner_career_form">
						  <div class="main_form">
							<form action="{{ url('search/') }}" method="GET">
							  <div class="row justify-content-center">
								<div class="col-md-6">
								  <div class="custom_input_box">
									<div class="form-group">
									  <input
										type="text"
										class="form-control career_form_control typeahead" required=""
										placeholder="keywords"
										name="search"id="search"
									  />
									</div>
								  </div>
								</div>
							
								<div class="col-md-6">
								  <button type="submit" class="btn btn-block find_btn">
									Find job
								  </button>
								</div>
							  </div>
							</form>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
			</section>
			
			
			 
			<section class="ls s-pt-xl-160 s-pt-lg-130 s-pt-md-90 s-pt-60 s-pb-xl-160 s-pb-lg-130 s-pb-md-90 s-pb-60">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<h2 class="special-heading text-center">
								<span class="text-capitalize">
									Open Vacancies
								</span>
							</h2>
							<div class="divider-line bg-maincolor text-center"></div>
							<div class="fw-divider-space divider-25"></div>
							<p class="special-heading text-center">
								<span>
									Ours Job
								</span>
							</p>
							<div class="divider-50 hidden-below-lg"></div>
							<div class="divider-30 hidden-above-lg"></div>
						</div>
						<div class="col-12 col-xl-10 offset-xl-1">
							<div class="tabs-accardion">
								
								<div class="tab-content">

									<div class="tab-pane fade show active" id="tab01_pane" role="tabpanel" aria-labelledby="tab01">
										<div id="accordion01" role="tablist">						
											@foreach($searces as $row)
											<div class="card">
												
												<div class="card-header" role="tab" id="">
													<h5>
														<a class="collapsed" data-toggle="collapse" href="#{{ $row->id }}" aria-expanded="false" aria-controls="collapse3">
															{{ $row->title }}
														</a>
													</h5>
												</div>
												<div id="{{ $row->id }}" class="collapse" role="tabpanel" aria-labelledby="collapse3_header" data-parent="#accordion01">
													<div class="card-body">
														{{-- <div class="side-item">
															
															


														</div> --}}
														<div class="row justify-content-center">
															<div class="col-md-12 text-justify">
																<p>
																	{!! $row->description !!}
																</p>
															</div>
                                                           <div class="col-md-6">
                                                           	<div class="career_form infor_form">
					
					  
					  <div class="row justify-content-center py-5">
						<div class="col-md-12 inner_career_form">
						  <div class="main_form">
							<form method="post" action="{{ route('store.applyinfo') }}"enctype="multipart/form-data">
                                    	@csrf
							  <div class="row justify-content-center">
								<div class="col-md-12 py-2">
								  <div class="custom_input_box">
									<div class="form-group">
									  <input
										type="email"
										class="form-control career_form_control"
										placeholder="Email"
										required
										name="email"
									  />
									</div>
								  </div>
								</div>
								<div class="col-md-12 py-2">
								  <div class="form-group">
									<input
									  type="text"
									  class="form-control career_form_control"
									  placeholder="Name"
									  name="name"
									  required
									/>
								  </div>
								</div>
								<div class="col-md-12 py-2">
									<div class="form-group">
									  <input
										type="text"
										class="form-control career_form_control"
										placeholder="Phone number"
										name="phone"
										required
									  />
									</div>
								  </div>
								<div class="col-md-12 py-2">
								  <div class="form-group">
									<label for="exampleFormControlFile1">Upload your cv</label>
									<input type="file" class="form-control career_form_control" name="file" id="exampleFormControlFile1" required>
								  </div>
								</div>
								<div class="col-md-12 pt-3">
								  <button type="submit" class="btn btn-block ">
									Send
								  </button>
								</div>
							  </div>
							</form>
						  </div>
						</div>
					  </div>
					
				  </div>
                                                           </div>
                                                           <div class="col-md-6">
                                                           	<div class="item-content">
																
																<h6>Duties & Responsibilities:</h6>
																<ul class="list-styled">
																	
																	@php
																		$color=$row->Responsibilities;
                                                                        $product_color= explode(',', $color);
																	@endphp
																	@foreach($product_color as $color)
																	<li>{{ $color }}</li>
																	@endforeach
																</ul>
																<h6>Required Knowledge & Skills:</h6>
																<ul class="list-styled">
																	
																	@php
																		$skills=$row->skills;
                                                                        $skill= explode(',', $skills);
																	@endphp
																	@foreach($skill as $skil)
																	<li>{{ $skil }}</li>
																	@endforeach
																</ul>
															</div>
                                                           </div>
														 </div>
													</div>
												</div>
												
											</div>
                                        @endforeach	
										</div>
									</div>
								</div>
							</div>
						</div>
	           		</div>
				</div>
			</section>
			<section class="py-5">
				<div class="career_form infor_form">
					<div class="container">
					  <div class="row justify-content-center pb-3">
						<div class="col-md-8">
						  <div class="career_banner_tittel text-center">
							<h2>Please complete this form.</h2>
						  </div>
						</div>
					  </div>
					  <div class="row justify-content-center py-5">
						<div class="col-md-6 inner_career_form">
						  <div class="main_form">
							<form method="post" action="{{ route('store.applyinfo') }}"enctype="multipart/form-data">
                                    	@csrf
							  <div class="row justify-content-center">
								<div class="col-md-6">
								  <div class="custom_input_box">
									<div class="form-group">
									  <input
										type="email"
										class="form-control career_form_control"
										placeholder="Email"
										required
										name="email"
									  />
									</div>
								  </div>
								</div>
								<div class="col-md-6">
								  <div class="form-group">
									<input
									  type="text"
									  class="form-control career_form_control"
									  placeholder="Name"
									  name="name"
									  required
									/>
								  </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									  <input
										type="text"
										class="form-control career_form_control"
										placeholder="Phone number"
										name="phone"
										required
									  />
									</div>
								  </div>
								<div class="col-md-6">
								  <div class="form-group">
									<label for="exampleFormControlFile1">Upload your cv</label>
									<input type="file" class="form-control career_form_control" name="file" id="exampleFormControlFile1" required>
								  </div>
								</div>
								<div class="col-md-6 pt-3">
								  <button type="submit" class="btn btn-block ">
									Send
								  </button>
								</div>
							  </div>
							</form>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
			</section>
		<!--	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous"></script>
-->
            <script>
            	
            	var path = "{{ route('autocomplate') }}";
            	$('.typeahead').typeahead({

            		source:function(terms,process){
            			return $.get(path,{terms:terms},function(data){
            				return process(data);
            			});
            		}
            	});

            </script>

@endsection


{{--  --}}

