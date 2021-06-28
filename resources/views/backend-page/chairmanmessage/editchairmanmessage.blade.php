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
                                    <h3>edit chairman Info</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="#">dashbord</a></li>
                                       <li>chairman maintain</li>
                                       <li>edit chairman</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   <div style="margin-top: 5px;">
                    <a style="margin-bottom: 5px;" class="btn btn-success pull-right"  href="{{ route('chairmanmessageshow') }}">
                                    <i class="fa fa-eye pull-left" style="margin-top: 4px;"></i>Chairman Message List 
                                    </a>
                   </div>
                  <!-- Add Product Area Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="row">
                              <div class="col-md-6 col-sm-6">
                                 <div class="add-product-form-group">
                                    <h3>edit chairman message</h3>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="post" action="{{ url('update/chairmaninfo/'.$chairmaninfo->id) }}"enctype="multipart/form-data">
                                       @csrf
                                        <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label class="control-label">title:</label>
                                             <input type="text" placeholder="Enter title" class="form-control" name="position" value="{{ $chairmaninfo->position }}">
                                          </div>
                                       </div>
                                      </div>
          
                                    
                                   
                                   <div class="widget_card_body collapse in" id="mail_home">
                                    <div class="mail-editor">
                                      <div>
                                        <label>Description</label>
                                         <textarea id="summernote" type="text" placeholder="Enter description"name="description" required >{{ $chairmaninfo->description }}</textarea>
                                      </div>
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
                                    <!--</form> -->
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="add-product-image-upload">
                                    <h3 style="text-align: center;">Edit chairma Avater </h3>
                                    <!--<form> -->
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="product-upload-image">
                                                <img style="height: 155px; width:150px;" src="{{ asset($chairmaninfo->image) }}" src="#" id="image" alt="image" />
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
                                                   <input type="file" id="file"  name="image" onchange="readURLOne(this);"  accept="image">
                                                   <input type="hidden" name="old_image" value="{{ $chairmaninfo->image }}"/>
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
        function readURLOne(input) {
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