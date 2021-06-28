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
                                    <h3>Edit Category Image Info</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="#">home</a></li>
                                       <li>Category image</li>
                                       <li>edit Category info</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                  <div style="margin-top: 5px;">
                    <a style="margin-bottom: 5px;" class="btn btn-success pull-right"  href="{{ route('category.image') }}">
                                    <i class="fa fa-eye pull-left" style="margin-top: 4px;"></i>company Image List 
                                    </a>
                   </div>
                  <!-- Add Product Area Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="row" style="text-align: center;">
                              <div class="col-md-12 col-sm-12">
                                 <div class="add-product-form-group">
                                    <h3>Category Image Information</h3>
                                    <form method="post" action="{{ url('update/fortuneimage/'.$categoryImages->id) }}"enctype="multipart/form-data">
                                       @csrf
                                        <div class="row">
                                       <div class="col-md-12">
                                          
                                      <label for="exampleInputEmail1">Category Title</label>
                                      @php
                                        $Select_cat=DB::table('fortuneCategory')->get();
                                      @endphp
                                      <select name="fortune_cat_id" class="form-control">
                                        
                                        @foreach($fortuneCategory as $row)
                                        <option value="{{ $row->id }}"
                                           <?php 
                                                    if($row->id == $categoryImages->fortune_cat_id) {
                                                      echo "selected";
                                                    }
                                                  ?>
                                          >{{ $row->name }}</option>
                                        @endforeach
                                      </select>
                                       {{-- <input type="text" class="picker_1" name="name" placeholder="Name" required="" /> --}}
                                    
                                       </div>
                                       
                                       
                                        <div class="col-md-12">
                                          
                                      <label for="exampleInputEmail1">Website Link</label>
                                      <br>
                                        <input type="text" class="picker_1 form-control" name="webside_link" placeholder="Website Link"value="{{$categoryImages->webside_link}}"/> 
                                    
                                       </div>
                                       
                                        <div class="col-md-12">
                                          
                                      <label for="exampleInputEmail1">Facebook Link</label>
                                        <input type="text" class="picker_1 form-control" name="facebook_link" placeholder="Facebook Link"value="{{$categoryImages->facebook_link}}"/>
                                    
                                       </div>
                                       <div class="col-md-12">
                                          
                                      <label for="exampleInputEmail1">Priority Link</label>
                                        <input type="text" class="picker_1 form-control" name="priority" placeholder="Priority"value="{{$categoryImages->priority}}"/>
                                    
                                       </div>

                                           <div class="col-md-12 col-sm-12">
                                 <div class="add-product-image-upload">
                                    
                                    <!--<form> -->
                                       <div class="row" style="margin-top: 20px;">
                                          <div class="col-md-6">
                                             <div class="product-upload-image">
                                                <img style="height: 100px;" src="{{ asset($categoryImages->image_one) }}" id="image" alt="image" />
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="product-upload-image">
                                               <img style="height: 100px;" src="{{ asset($categoryImages->image_two) }}" id="image1" alt="image" />
                                            </div>
                                         </div>
                                       {{--   --}}
                                       </div>
                                       <div class="row py-10">
                                          <div class="col-md-6">
                                             <div class="product-upload-action">
                                                <div class="product-upload btn btn-info">
                                                   <p>
                                                      <i class="fa fa-upload"></i>
                                                      Upload  Image
                                                   </p>
                                                   <input type="file" id="file"  name="image_one" onchange="readURL(this);"  accept="image">
                                                   <input type="hidden" name="old_image" value="{{ $categoryImages->image_one }}"/>
                                                </div> 

                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="product-upload-action">
                                               <div class="product-upload btn btn-info">
                                                  <p>
                                                     <i class="fa fa-upload"></i>
                                                     Upload  Image
                                                  </p>
                                                  <input type="file" id="file"  name="image_two" onchange="readURLone(this);"  accept="image">
                                                  <input type="hidden" name="old_image_one" value="{{ $categoryImages->image_two }}"/>
                                               </div>
                                            </div>
                                         </div>
                                       {{--    --}}
                                       </div>
                                    
                                 </div>
                              </div>
                              <div class="col-md-12 col-sm-12"style="margin-top:5px;">
                                <div class="add-product-image-upload">
                                  
                                   <!--<form> -->
                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="product-upload-image">
                                               <img style="height: 100px;" src="{{ asset($categoryImages->image_three) }}" id="image2" alt="image" />
                                            </div>
                                         </div> 
                                         <div class="col-md-6">
                                            <div class="product-upload-image">
                                               <img style="height: 100px;" src="{{ asset($categoryImages->image_four) }}" id="image3" alt="image" />
                                            </div>
                                         </div>

                                         
                                       
                                      </div>
                                      <div class="row py-10">
                                        <div class="col-md-6">
                                            <div class="product-upload-action">
                                               <div class="product-upload btn btn-info">
                                                  <p>
                                                     <i class="fa fa-upload"></i>
                                                     Upload  Image
                                                  </p>
                                                  <input type="file" id="file"  name="image_three" onchange="readURLtwo(this);"  accept="image">
                                                  <input type="hidden" name="old_image_two" value="{{ $categoryImages->image_three }}"/>
                                               </div>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                            <div class="product-upload-action">
                                               <div class="product-upload btn btn-info">
                                                  <p>
                                                     <i class="fa fa-upload"></i>
                                                     Upload  Image
                                                  </p>
                                                  <input type="file" id="file"  name="image_four" onchange="readURLthree(this);"  accept="image">
                                                  <input type="hidden" name="old_image_three" value="{{ $categoryImages->image_four }}"/>
                                               </div> 

                                            </div>
                                         </div>
                                    
                                       
                                      </div>
                                      </div>
                                      </div>

                                    </div>
                                       <div class="row" style="text-align:center;">
                                          <div class="col-md-12" style="margin-top:20px;">
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


