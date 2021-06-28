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
                                    <h3>Add About Info</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="#">dashbord</a></li>
                                       <li>About maintain</li>
                                       <li>Add About</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                    <div style="margin-top: 5px;">
                    <a style="margin-bottom: 5px;" class="btn btn-success pull-right"  href="{{ route('all.about') }}">
                                    <i class="fa fa-eye pull-left" style="margin-top: 4px;"></i>About List 
                                    </a>
                   </div>
                  <!-- Add Product Area Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="row">
                              <div class="col-md-12 col-sm-6">
                                 <div class="add-product-form-group">
                                    <h3>Add About Information</h3>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="post" action="{{ route('store.about') }}"enctype="multipart/form-data">
                                       @csrf
                                        <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label class="control-label">title*</label>
                                             <input type="text" placeholder="Enter title" class="form-control" name="shortdescription" value="{{ old('shortdescription') }}">
                                          </div>
                                       </div>
                                      </div>
                                      <div class="row">
                                      <div class="col-md-12">
                                            <div class="form-group">
                                               <label class="control-label">About Category Title*</label>
                                               <input type="text" placeholder="Enter title" class="form-control" name="title" value="{{ old('title') }}">
                                            </div>
                                      </div>
                                      </div>
                                    
                                     <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>
                                               

                                                <div class="widget_card_body collapse in" id="mail_home">
                                               <div class="mail-editor">
                                                <div>
                                                  <label>Description*</label>
                                                   <textarea id="summernote" type="text" placeholder="Enter description"name="description" required >{{ old('description') }}</textarea>
                                                </div>
                                               </div>
                                              </div>
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                    {{--  <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label class="control-label">About Category Num:</label>
                                             <input type="text" placeholder="Enter title" class="form-control" name="number" value="{{ old('number') }}">
                                          </div>
                                       </div>
                                    </div> --}}
                                     
                                    {{--  <div class="row">
                                    <div class="col-md-12">
                                          <div class="form-group">
                                             <p>
                                                <label>Category Description:</label>
                                                
                                                <textarea type="text" placeholder="Enter description"  name="title_description">{{ old('title_description') }}</textarea>
                                             </p>
                                          </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                          <div class="form-group">
                                             <p>
                                                <label>Achievements Description:</label>
                                                
                                                <textarea type="text" placeholder="Enter description"  name="achievements_details">{{ old('achievements_details') }}</textarea>
                                             </p>
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
                            </form>          
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
                        .width(130)
                        .height(155);
                };
                reader.readAsDataURL(input.files[0]);
            }
         }
      </script>
        <script type="text/javascript">
        function readURLTwo(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image1')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(155);
                };
                reader.readAsDataURL(input.files[0]);
            }
         }
      </script>
        <script type="text/javascript">
        function readURLThree(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image2')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(155);
                };
                reader.readAsDataURL(input.files[0]);
            }
         }
      </script>
         
   @endsection