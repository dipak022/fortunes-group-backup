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
                                    <h3>Edit Setting</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="#">Deshbord</a></li>
                                       <li>All Setting</li>
                                       <li>Edit Settins</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   <div style="margin-top: 5px;">
                    <a style="margin-bottom: 5px;" class="btn btn-success pull-right"  href="{{ route('show.setting') }}">
                                    <i class="fa fa-eye pull-left" style="margin-top: 4px;"></i>Setting List 
                                    </a>
                   </div>
                  <!-- Add Product Area Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="row">
                              <div class="col-md-6 col-sm-6">
                                 <div class="add-product-form-group">
                                    <h3>Update Setting Information</h3>
                                    <form method="post" action="{{ url('update/setting/'.$setting->id) }}" enctype="multipart/form-data">
                                    	@csrf
                                       <div class="row">
                                          <div class="col-md-12">
                                             <p>
                                                <label>Mobile Number:</label>
                                                <input type="text" placeholder="Enter mobie number"  name="mobile_number" value="{{ $setting->mobile_number }}">
                                             </p>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <p>
                                                <label>Frontend Short Descriptions:</label>
                                                <input type="text" placeholder="Frontend Short Descriptions"  name="text" value="{{ $setting->text }}">
                                             </p>
                                          </div>
                                       </div>
                                       
                                       <div class="row">
                                          <div class="col-md-12">
                                             <p>
                                                <label>Email:</label>
                                                <input type="email" placeholder="Enter Email"  name="email" value="{{ $setting->email }}">
                                             </p>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <p>
                                                <label>Address:</label>
                                                <input type="text" placeholder="Enter Address"  name="address" value="{{ $setting->address }}">
                                             </p>
                                          </div>
                                           
                                           <div class="col-md-12">
                                             <p>
                                                <label>Time:</label>
                                                <input type="text" placeholder=" Time shedule" name="shedule" value="{{ $setting->shedule }}">
                                             </p>
                                          </div>
                                            
                                           <div class="col-md-12">
                                             <p>
                                                <label>Coppyright:</label>
                                                <input type="text" placeholder="Enter Welcome Message"  name="coppyright" value="{{ $setting->coppyright }}">
                                             </p>
                                          </div>
                                     
                                       </div>
                                    
                                      
                                       
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
                                   <!--abc </form>-->
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="add-product-image-upload">
                                    <h3 style="text-align: center;">Frontend Icon</h3>
                                    <!--<form> -->
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="product-upload-image">
                                                <img style="height: 155px;" src="{{ asset($setting->logo) }}" id="image" alt="image" />
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
                                                   <input type="file" id="file"  name="logo" onchange="readURL(this);"  accept="image"/>
                                                    <input type="hidden" name="old_image" value="{{ $setting->logo }}"/>
                                                </div>
                                                
                                             </div>
                                          </div>

                                         

                                             <div class="col-md-6">
                                             	<br><br>
                                             <p>
                                                <label>Facebook Link:</label><br>
                                                <input type="text" placeholder="Enter Facebook Link" style="width: 220px;" name="fb_link" value="{{ $setting->fb_link }}">
                                             </p>
                                          </div>
                                            <div class="col-md-6">
                                            	<br><br>
                                             <p>
                                                <label>Twitter Link:</label><br>
                                                <input type="text" placeholder="Enter Twitter Link"style="width: 220px;"  name="tw_link" value="{{ $setting->tw_link }}">
                                             </p>
                                          </div> 
                                          <div class="col-md-6">
                                          	
                                             <p>
                                                <label>Linkedin Link:</label><br>
                                                <input type="text" placeholder="Enter Linkedin Link"style="width: 220px;"  name="lind_link" value="{{ $setting->lind_link }}">
                                             </p>
                                          </div> 
                                          <div class="col-md-6">
                                          	
                                             <p>
                                                <label>Instagram Link:</label><br>
                                                <input type="text" placeholder="Enter Instagram Link"style="width: 220px;"  name="instra_link" value="{{ $setting->instra_link }}">
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