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
                                    <h3>Add Job Info</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="index.html">home</a></li>
                                       <li>Frontend</li>
                                       <li>Add Slidder</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   <div style="margin-top: 5px;">
                    <a style="margin-bottom: 5px;" class="btn btn-success pull-right"  href="{{ route('all.news') }}">
                                    <i class="fa fa-eye pull-left" style="margin-top: 4px;"></i>News List 
                                    </a>
                   </div>
                  <!-- Add Product Area Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="row">
                              <div class="col-md-12 col-sm-6">
                                 <div class="add-product-form-group">
                                    <h3>Job Information</h3>
                                    <form method="post" action="{{ route('store.news') }}"enctype="multipart/form-data">
                                       @csrf
                                        <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label class="control-label">title*</label>
                                             <input type="text" placeholder="Enter title" class="form-control" name="title" >
                                          </div>
                                       </div>
                                      
                                    </div>
                                     <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
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
                                      
                                    </div>
                                    <br>
                                    <div class="row">
                                       <div class="col-md-12">
                                       
                                          <label class="control-label" for="dob">Duties & Responsibilities*</label>
                                          <input class="form-control" id="dob" type="text" name="Responsibilities"data-role="tagsinput" placeholder="Responsibilities list">
                                             
                                       </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                       <div class="col-md-12">
                                       
                                          <label class="control-label" for="dob">Required Knowledge & Skills*</label>
                                          <input class="form-control" id="dob" type="text" name="skills"data-role="tagsinput" placeholder="skills list">
                                             
                                       </div>
                                    </div>
                                      
                                       <br>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <p>
                                                <button type="submit" class="btn btn-success" >
                                                <i class="fa fa-check"></i>
                                                Save Info
                                                </button>
                                                <button type="reset" class="btn btn-danger" >
                                                <i class="fa fa-times"></i>
                                                reset
                                                </button>
                                             </p>
                                          </div>
                                       </div>
                                    <!--</form> -->
                                 </div>
                              </div>
                              {{-- <div class="col-md-6 col-sm-6">
                                 <div class="add-product-image-upload">
                                    <h3 style="text-align: center;">Gallery Image </h3> --}}
                                    <!--<form> -->
                                       {{-- <div class="row">
                                          <div class="col-md-12">
                                             <div class="product-upload-image">
                                                <img style="height: 155px;" src="#" id="image" alt="image" />
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
                                                </div>
                                                
                                             </div>
                                          </div>  
                                       
                                       </div> --}}
                                    </form>
                                {{--  </div>
                              </div> --}}
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

      {{--  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> --}}
</script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>
  @endsection