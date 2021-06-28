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
                                    <h3>Edit Image Gallery Info</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="#">Deshbord</a></li>
                                       <li>All Gallery</li>
                                       <li>Edit Image Gallery</li>
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
                                    <h3>Edit Image Gallery Information</h3>
                                    <form method="post" action="{{ url('update/gallery/'.$gallery->id) }}"enctype="multipart/form-data">
                                    	@csrf
                                       <div class="row">
                                         @php 
                                            $pro_cat=DB::table('project_category')
                                                ->orderBy('id','DESC')->limit(50)->get();

                                        @endphp
                                       
                                          <div class="col-md-6 col-sm-6 py-10">
                                                <input type="radio" id="chk_2" required="" name="user_value" value="1" 
                                                 <?php if($gallery->user_value==1) {
                                                   echo "checked";
                                                } ?> 
                                                />
                                                @foreach($project_category as $row)
                                                @if($row->id == $gallery->user_id)
                                                <label class="inline control-label" for="chk_1">{{ $row->pro_category_name }}
                                                  {{--  <?php 
                                                    if($row->id == $gallery->id) {
                                                      echo "Dipak";
                                                    }
                                                  ?> --}}
                                                <span>(Yes)</span>
                                                </label>
                                                @endif
                                                @endforeach
                                              
                                              
                                               
                                                <input style="margin-left:30px;"type="radio" required="" id="chk_3" name="user_value" value="0" <?php if($gallery->user_value==0) {
                                                   echo "checked";
                                                } ?> 
                                                />
                                                @foreach($project_category as $row)
                                                 @if($row->id == $gallery->user_id)
                                                  <label class="inline control-label" for="chk_1">{{ $row->pro_category_name }}
                                                      <span>(No)</span>
                                                   </label>
                                                 @endif
                                                @endforeach
                                                

                                                {{-- <label class="inline control-label" for="chk_2">{{ $row->pro_category_name }}</label> --}}
                                             
                                          </div>
                                          <div class="col-md-6 col-sm-6">
                                               
                                          
                                          </div>
                                       
                                       </div>
                                           <div class="row">
                                          <div class="col-md-12 col-sm-12">
                                              <div class="widget_card_body collapse in" id="mail_home">
                                     <div class="mail-editor">
                                      <div>
                                        <label>Description*</label>
                                         <textarea id="summernote" type="text" placeholder="Enter description"name="description" required >{!! $gallery->description !!}</textarea>
                                      </div>
                                     </div>
                                    </div>  
                                          </div>
                                          </div>
                                       

                                       
                                       <div class="row" style="margin-top: 140px;">
                                          <div class="col-md-12">
                                             <p>
                                                <button type="submit" class="btn btn-success" >
                                                <i class="fa fa-check"></i>
                                                Update Info
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
                                                <img style="height: 155px;" src="{{ asset($gallery->gallery_image) }}" id="image" alt="image" />
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
                                                   <input type="hidden" name="old_image" value="{{ $gallery->gallery_image }}"/>
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