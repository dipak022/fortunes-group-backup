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
                                    <h3>Edit Service Info</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="{{ route('home') }}">Deshbord</a></li>
                                       <li>Service</li>
                                       <li>Edit Service</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   
                  <!-- Add Product Area Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="row">
                              <div class="col-md-6 col-sm-6">
                                 <div class="add-product-form-group">
                                    <h3>Edit Service Information</h3>
                                    <form method="post" action="{{ url('update/services/'.$services->id) }}"enctype="multipart/form-data">
                                       @csrf
                                        <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label class="control-label">title:</label>
                                             <input type="text" placeholder="Enter title" class="form-control" name="title" value="{{ $services->title }}">
                                          </div>
                                       </div>
                                      
                                    </div>
                                     <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label class="control-label">description:</label>
                                             <input type="text" placeholder="Enter description" class="form-control" name="description" value="{{ $services->description }}">
                                          </div>
                                       </div>
                                      
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                             <label class="control-label">sub title:</label>
                                             <input type="text" placeholder="Enter description" class="form-control" name="sub_title" value="{{ $services->sub_title }}">
                                          </div>
                                       </div>
                                      
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                             <label class="control-label">vedio or link:</label>
                                             <input type="text" placeholder="Enter description" class="form-control" name="vedio_or_link"value="{{ $services->vedio_or_link }}">
                                          </div>
                                       </div>
                                      
                                    </div>
                                       <div class="row">

                                          <div class="col-md-6 col-sm-6">

                                           <div class="form-group">
                                             <label class="control-label">day:</label>
                                             <input type="text" placeholder="Enter description" class="form-control" name="day" value="{{ $services->day }}">
                                          </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6">
                                             <div class="form-group">
                                             <label class="control-label">hour:</label>
                                             <input type="text" placeholder="Enter description" class="form-control" name="hour"value="{{ $services->hour }}">
                                             </div>
                                          </div>
                                       </div>

                                        <div class="row">

                                          <div class="col-md-6 col-sm-6">

                                           <div class="form-group">
                                             <label class="control-label">minits:</label>
                                             <input type="text" placeholder="Enter description" class="form-control" name="minits"value="{{ $services->minits }}">
                                          </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6">
                                             <div class="form-group">
                                             <label class="control-label">second:</label>
                                             <input type="text" placeholder="Enter description" class="form-control" name="second"value="{{ $services->second }}">
                                             </div>
                                          </div>
                                       </div>
                                      

                                       
                                       <div class="row"style="margin-top: 20px;">
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
                                    <h3 style="text-align: center;">Edit Service Image </h3>
                                    <!--<form> -->
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="product-upload-image">
                                                <img style="height: 155px;" src="{{ asset($services->image) }}" id="image" alt="image" />
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
                                                   <input type="file" id="file"  name="image" onchange="readURL(this);"  accept="image">
                                                   <input type="hidden" name="old_image" value="{{ $services->image }}"/>
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