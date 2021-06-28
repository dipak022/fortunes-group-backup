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
                                    <h3>Edit Slidder Info</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="{{ route('home') }}">Deshbord</a></li>
                                       <li>Slidder</li>
                                       <li>Edit Slidder</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   <div style="margin-top: 5px;">
                    <a style="margin-bottom: 5px;" class="btn btn-success pull-right"  href="{{ route('show.slidder') }}">
                                    <i class="fa fa-eye pull-left" style="margin-top: 4px;"></i>Slidder List 
                                    </a>
                   </div>
                  <!-- Add Product Area Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="row">
                              <div class="col-md-6 col-sm-6">
                                 <div class="add-product-form-group">
                                    <h3>Edit Slidder Information</h3>
                                    <form method="post" action="{{ url('update/slidder/'.$slidder->id) }}"enctype="multipart/form-data">
                                    	@csrf
                                       <div class="row">
                                          <div class="col-md-12">
                                             <p>
                                                <label>Name:</label>
                                                <input type="text" placeholder="Enter name " required="" value="{{ $slidder->name }}" name="name">
                                             </p>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <p>
                                                <label>Descriptions:</label>
                                                <input type="text" placeholder=" Descriptions with(6-10) word" required="" name="description" value="{{ $slidder->description }}">
                                             </p>
                                          </div>
                                       </div>
                                       
                                       <div class="row">
                                          <div class="col-md-12">
                                             <p>
                                                <label>Short Descriptions:</label>
                                                <input type="text" placeholder="Short Descriptions with(1-5) word" required="" name="short_description" value="{{ $slidder->short_description }}">
                                             </p>
                                          </div>
                                       </div>
                                      {{--  <div class="row">
                                          <div class="col-md-12">
                                             <p>
                                                <label>Button Name:</label>
                                                <input type="text" placeholder="Enter Button Name" required="" name="btn_name" value="{{ $slidder->btn_name }}">
                                             </p>
                                          </div>
                                       </div> --}}
                                    
                                      
                                       
                                       <div class="row">
                                          <div class="col-md-12">
                                             <p>
                                                <button type="submit" class="btn btn-success" >
                                                <i class="fa fa-check"></i>
                                                Update Info
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
                                    <h3 style="text-align: center;">Slidder Image</h3>
                                    <!--<form> -->
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="product-upload-image">
                                                <img style="height: 155px;" src="{{ asset($slidder->slidder_image) }}" id="image" alt="image Upload" />
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
                                                   <input type="file" id="file"  name="slidder_image" onchange="readURL(this);"  accept="image">
                                                   <input type="hidden" name="old_image" value="{{ $slidder->slidder_image }}"/>
                                                </div>
                                                
                                             </div>
                                          </div>

                                         

                                             <div class="col-md-6">
                                             	<br><br>
                                             <p style="margin-left: 80px;">
                                                <label>Slidder Image Number:</label><br>
                                                <input type="text" placeholder="Slidder Image Number" style="width: 320px;" required="" name="slidder_image_number" value="{{ $slidder->slidder_image_number }}">
                                             </p>
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
		                  .width(130)
		                  .height(155);
		          };
		          reader.readAsDataURL(input.files[0]);
		      }
		   }
		</script>

  @endsection