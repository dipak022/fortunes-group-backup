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
                                    <h3>Add Team Info</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="{{ route('home') }}">Deshbord</a></li>
                                       <li>Team Manage</li>
                                       <li>Add Team</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   <div style="margin-top: 5px;">
                    <a style="margin-bottom: 5px;" class="btn btn-success pull-right"  href="{{ route('all.Team') }}">
                                    <i class="fa fa-eye pull-left" style="margin-top: 4px;"></i>Team List 
                                    </a>
                   </div>
                  <!-- Add Product Area Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="row">
                              <div class="col-md-6 col-sm-6">
                                 <div class="add-product-form-group">
                                    <h3>Add Team Information</h3>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="post" action="{{ route('store.team') }}"enctype="multipart/form-data">
                                    	@csrf
                                       <div class="col-md-12">
                                             <p>
                                                <label>Name*</label>
                                                <input type="text" placeholder="Enter Name " name="name">
                                             </p>
                                          </div> 
                                          <div class="col-md-12">
                                             <p>
                                                <label>position*</label>
                                                <input type="text" placeholder="Enter position" name="position">
                                             </p>
                                          </div>
                                          <div class="col-md-12">
                                             <p>
                                                <label>priority*</label>
                                                <input type="number" placeholder="Enter priority" name="priority">
                                             </p>
                                          </div>
                                          <div class="col-md-12">
                                             <p>
                                                
                                                <div class="widget_card_body collapse in" id="mail_home">
                                              <div class="mail-editor">
                                               <div>
                                                 <label>Description*</label>
                                                  <textarea id="summernote" type="text" placeholder="Enter short_description"name="short_description" required >{{ old('short_description') }}</textarea>
                                               </div>
                                              </div>
                                             </div>
                                             </p>
                                          </div>

                                        
                                       <div class="col-md-12">
                                            <p>
                                                <button type="submit" class="btn btn-success" >
                                                <i class="fa fa-check mr-auto"></i>
                                                Save Info
                                                </button>
                                               
                                             </p>
                                          </div>           
                                      
                                    <!--</form> -->
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="add-product-image-upload">
                                    <h3 style="text-align: center;">Team Member Avater *</h3>
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
                                                      Upload Image
                                                   </p>
                                                   <input type="file" id="file"  name="image" onchange="readURL(this);"  accept="image">
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
		                  .width(130)
		                  .height(155);
		          };
		          reader.readAsDataURL(input.files[0]);
		      }
		   }
		</script>
   

  @endsection