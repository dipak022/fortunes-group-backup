@extends('layouts.backend.top-left-nav')
  @section('details')
   
           <!-- Right Side Content Start -->
         <section id="content" class="seipkon-content-wrapper">
            <div class="page-content">
               <div class="container-fluid">
                   
                  <!-- Breadcromb Row Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="breadcromb-area">
                           <div class="row">
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-left">
                                    <h3>Add Image Gallery Info</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="#">Deshbord</a></li>
                                       <li>Frontend</li>
                                       <li>Image Gallery</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   <div style="margin-top: 5px;">
                    <a style="margin-bottom: 5px;" class="btn btn-success pull-right"  href="{{ route('show.image') }}">
                                    <i class="fa fa-eye pull-left" style="margin-top: 4px;"></i>Gallery List 
                                    </a>
                   </div>
                  <!-- Add Product Area Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="row">
                              <div class="col-md-6 col-sm-6">
                                 <div class="add-product-form-group">
                                    <h3>Add Image Gallery Information</h3>
                                    <form method="post" action="{{ route('store.galleryimage') }}"enctype="multipart/form-data">
                                    	@csrf
                                       @php 
                                            /*$pro_cat=DB::table('project_category')
                                                ->orderBy('id','DESC')->limit(50)->get();*/
                                                $pro_cat=DB::table('project_category')
                                                ->join('pro_cat','project_category.procat_id','pro_cat.id')
                                                ->select('project_category.*','pro_cat.cat_name')
                                                ->get();

                                        @endphp
                                        @foreach($pro_cat as $row) 
                                          <div class="col-md-6 col-sm-6">
                                            
                                                <input type="hidden" name="user_id[]" value="{{ $row->id }}">
                                                <input type="radio" id="chk_2" name="user_value[{{ $row->id }}]" value="1"required />

                                                <label class="inline control-label" for="chk_2">{{ $row->pro_category_name }}</label>
                                             <span>(Yes)->{{ $row->cat_name }}</span>
                                          </div>
                                          <div class="col-md-6 col-sm-6">
                                               
                                                <input type="radio" id="chk_2" name="user_value[{{ $row->id }}]" value="0" required />
                                          
                                          <label class="inline control-label" for="chk_1">{{ $row->pro_category_name }}</label>
                                             <span>(No)->{{ $row->cat_name }}</span>
                                          </div>
                                       @endforeach
                                      
                                    <div class="row">
                                          <div class="col-md-12 col-sm-12">
                                              <div class="widget_card_body collapse in" id="mail_home">
                                     <div class="mail-editor">
                                      <div>
                                        <label>Description*</label>
                                         <textarea id="summernote" type="text" placeholder="Enter description"name="description" required >{{ old('description') }}</textarea>
                                      </div>
                                     </div>
                                    </div>  
                                          </div>
                                          </div>
                                       {{-- <div class="row">
                                          <div class="col-md-6 col-sm-6">
                                              <div class="form-group form-checkbox">
                                          <input type="checkbox" checked="checked" id="chk_1" name="show_all" value="1" />
                                          <label class="inline control-label" for="chk_1">Show All</label>
                                       </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6">
                                             <div class="form-group form-checkbox">
                                                <input type="checkbox" id="chk_2" name="gas" value="1" />
                                                <label class="inline control-label" for="chk_2">solar street</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-6 col-sm-6">
                                             <div class="form-group form-checkbox">
                                                <input type="checkbox" id="chk_3" name="oil" value="1" />
                                                <label class="inline control-label" for="chk_3">mini grid</label>
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6">
                                             <div class="form-group form-checkbox">
                                                <input type="checkbox" id="chk_4" name="industry" value="1" />
                                                <label class="inline control-label" for="chk_4">Rooftop solar</label>
                                             </div>
                                          </div>
                                       </div>
                                         <div class="row">
                                          <div class="col-md-6 col-sm-6">
                                             <div class="form-group form-checkbox">
                                                <input type="checkbox" id="chk_5" name="eno" value="1" />
                                                <label class="inline control-label" for="chk_5">Solar Ipp</label>
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6">
                                             <div class="form-group form-checkbox">
                                                <input type="checkbox" id="chk_6" name="factory" value="1" />
                                                <label class="inline control-label" for="chk_6">ITES</label>
                                             </div>
                                          </div>
                                       </div> --}}
                                      
                                       
                                      
                                    
                                      
                                       
                                       <div class="row">
                                          <div class="col-md-12">
                                             <p>
                                                <button type="submit" class="btn btn-success" >
                                                <i class="fa fa-check"></i>
                                                Save Info
                                                </button>
                                                <button type="submit" class="btn btn-danger" >
                                                <i class="fa fa-times"></i>
                                                Cancel
                                                </button>
                                             </p>
                                          </div>
                                       </div>
                                    <!--</form> -->
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="add-product-image-upload">
                                    <h3 style="text-align: center;">Gallery Image </h3>
                                    <!--<form> -->
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="product-upload-image">
                                                <img style="height: 155px;" src="{{ asset('public/avater.jpg') }}" id="image" alt="image" />
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="product-upload-action">
                                                <div class="product-upload btn btn-info">
                                                   <p>
                                                      <i class="fa fa-upload"></i>
                                                      Upload Another Image
                                                   </p>
                                                   <input type="file" id="file"  name="gallery_image" onchange="readURL(this);"  accept="image">
                                                </div>
                                                
                                             </div>
                                          </div>
                                          
                                         
                                       
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Add Product Area -->
                   
               </div>
            </div>
             
    
             
         </section>
		<script type="text/javascript">
		  function readURL(input) {
		      if (input.files && input.files[0]) {
		          var reader = new FileReader();
		          reader.onload = function (e) {
		              $('#image')
		                  .attr('src', e.target.result)
		                  .width(155)
		                  .height(155);
		          };
		          reader.readAsDataURL(input.files[0]);
		      }
		   }
		</script>

  @endsection