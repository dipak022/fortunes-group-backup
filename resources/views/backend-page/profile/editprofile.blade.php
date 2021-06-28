@extends('layouts.backend.top-left-nav')
  @section('details')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
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
                                    <h3>Edit Profile Info</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="{{ route('home') }}">home</a></li>
                                       <li>profile</li>
                                       <li>edit Profile</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   <div style="margin-top: 5px;">
                    <a style="margin-bottom: 5px;" class="btn btn-success pull-right"  href="{{ route('addprofile') }}">
                                    <i class="fa fa-eye pull-left" style="margin-top: 4px;"></i>company overview List 
                                    </a>
                   </div>
                  <!-- Add Product Area Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="row">
                              <div class="col-md-6 col-sm-6">
                                 <div class="add-product-form-group">
                                    <h3>Profile Information</h3>
                                    <form method="post" action="{{ url('update/profile/'.$profile->id) }}"enctype="multipart/form-data">
                                       @csrf
                                        <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label class="control-label">name:</label>
                                             <input type="text" placeholder="Enter title" class="form-control" name="name" value="{{ $profile->name }}">
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label class="control-label">position:</label>
                                             <input type="text" placeholder="Enter position" class="form-control" name="position" value="{{ $profile->position }}">
                                          </div>
                                       </div>

                                    </div>
                                     <div class="row">
                                       <div class="col-md-12">
                                            <div class="widget_card_body collapse in" id="mail_home">
                                    <div class="mail-editor">
                                      <div>
                                        <label>Description</label>
                                         <textarea id="summernote" type="text" placeholder="Enter description"name="description" required >{!! $profile->description !!}</textarea>
                                      </div>
                                    </div>
                                    </div>
                                       </div>

                                    </div>
                                   
                                       <div class="row">
                                          <div class="col-md-12" style="margin-top:20px;">
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
                                    <h3 style="text-align: center;">Profile Avater </h3>
                                    <!--<form> -->
                                       <div class="row">
                                          <div class="col-md-4">
                                             <div class="product-upload-image">
                                                <img style="height: 100px;" src="{{ asset($profile->image) }}" id="image" alt="image" />
                                             </div>
                                          </div>
                                          <div class="col-md-4">
                                            <div class="product-upload-image">
                                               <img style="height: 100px;" src="{{ asset($profile->image_one) }}" id="image1" alt="image" />
                                            </div>
                                         </div>
                                         <div class="col-md-4">
                                            <div class="product-upload-image">
                                               <img style="height: 100px;" src="{{ asset($profile->image_two) }}" id="image2" alt="image" />
                                            </div>
                                         </div>
                                       </div>
                                       <div class="row py-10">
                                          <div class="col-md-4">
                                             <div class="product-upload-action">
                                                <div class="product-upload btn btn-info">
                                                   <p>
                                                      <i class="fa fa-upload"></i>
                                                      Upload  Image
                                                   </p>
                                                   <input type="file" id="file"  name="image" onchange="readURL(this);"  accept="image">
                                                   <input type="hidden" name="old_image" value="{{ $profile->image }}"/>
                                                </div> 

                                             </div>
                                          </div>
                                          <div class="col-md-4">
                                            <div class="product-upload-action">
                                               <div class="product-upload btn btn-info">
                                                  <p>
                                                     <i class="fa fa-upload"></i>
                                                     Upload  Image
                                                  </p>
                                                  <input type="file" id="file"  name="image_one" onchange="readURLone(this);"  accept="image">
                                                  <input type="hidden" name="old_image_one" value="{{ $profile->image_one }}"/>
                                               </div>
                                            </div>
                                         </div>
                                         <div class="col-md-4">
                                            <div class="product-upload-action">
                                               <div class="product-upload btn btn-info">
                                                  <p>
                                                     <i class="fa fa-upload"></i>
                                                     Upload  Image
                                                  </p>
                                                  <input type="file" id="file"  name="image_two" onchange="readURLtwo(this);"  accept="image">
                                                  <input type="hidden" name="old_image_two" value="{{ $profile->image_two }}"/>
                                               </div>
                                            </div>
                                         </div>
                                       </div>
                                    
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6"style="margin-top:5px;">
                                <div class="add-product-image-upload">
                                  
                                   <!--<form> -->
                                      <div class="row">
                                         <div class="col-md-4">
                                            <div class="product-upload-image">
                                               <img style="height: 100px;" src="{{ asset($profile->image_three) }}" id="image3" alt="image" />
                                            </div>
                                         </div>
                                         <div class="col-md-4">
                                           <div class="product-upload-image">
                                              <img style="height: 100px;" src="{{ asset($profile->image_four) }}" id="image4" alt="image" />
                                           </div>
                                        </div>
                                       
                                      </div>
                                      <div class="row py-10">
                                         <div class="col-md-4">
                                            <div class="product-upload-action">
                                               <div class="product-upload btn btn-info">
                                                  <p>
                                                     <i class="fa fa-upload"></i>
                                                     Upload  Image
                                                  </p>
                                                  <input type="file" id="file"  name="image_three" onchange="readURLthree(this);"  accept="image">
                                                  <input type="hidden" name="old_image_three" value="{{ $profile->image_three }}"/>
                                               </div> 

                                            </div>
                                         </div>
                                         <div class="col-md-4">
                                           <div class="product-upload-action">
                                              <div class="product-upload btn btn-info">
                                                 <p>
                                                    <i class="fa fa-upload"></i>
                                                    Upload  Image
                                                 </p>
                                                 <input type="file" id="file"  name="image_four" onchange="readURLfour(this);"  accept="image">
                                                 <input type="hidden" name="old_image_four" value="{{ $profile->image_four }}"/>
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

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>

         </section>
      <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
         }
      </script>
      
      <script type="text/javascript">
        function readURLone(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image1')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
         }
      </script>
      <script type="text/javascript">
        function readURLtwo(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image2')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
         }
      </script>
      <script type="text/javascript">
        function readURLthree(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image3')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
         }
      </script>
      <script type="text/javascript">
        function readURLfour(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image4')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
         }
      </script>
      

  @endsection
