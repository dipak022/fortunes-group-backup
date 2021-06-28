 
 @extends('layouts.backend.top-left-nav')
  @section('details')
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
                                    <h3>business slider edit</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="{{ route('home') }}">Deshbord</a></li>
                                       <li>business slider</li>
                                       <li>edit business slider</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   <div style="margin-top: 5px;">
                    <a style="margin-bottom: 5px;" class="btn btn-success pull-right"  href="{{ route('companyslidder') }}">
                                    <i class="fa fa-eye pull-left" style="margin-top: 4px;"></i>business slider List 
                                    </a>
                   </div>
                  <!-- Form Layout Row Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="form-example">
                              <h3>Update business Slider</h3>
                              <div class="form-wrap label-left form-layout-page">
                                 <form method="post" action="{{ url('update/company/slidder/'.$business_slider->id) }}"enctype="multipart/form-data">
                                 	@csrf
                                   <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-4">
                                             <label class="control-label">Business Name:</label>
                                          </div>
                                          <div class="col-md-12">
                                             
                                                <select class="form-control" name="slider_id">
                                                  @foreach($fortuneCategory as $row)
                                                  <option value="{{ $row->id }}"
                                                 <?php 
                                                    if($row->id == $business_slider->slider_id) {
                                                      echo "selected";
                                                    }
                                                  ?>
                                                  >{{ $row->name }} </option>
                                                  @endforeach
                                                </select> 
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-4">
                                             <label class="control-label">Image</label>
                                          </div>
                                          <div class="col-md-12">
                                              <img class="pull-right" style="height: 55px; width: 55px;" src="{{ asset($business_slider->image) }}" id="image"/>
                                       <input type="file" class="picker_1" id="file"  name="image" onchange="readURL(this);"  accept="image" />
                                       <input type="hidden" name="old_image" value="{{ $business_slider->image }}"/>
                                          </div>
                                       </div>
                                    </div>
                                   
                                    
                                    
                              
                                
                                
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="form-layout-submit">
                                                <button type="submit" class="btn btn-info pull-right" >Update</button>
                                               
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
             
   <script type="text/javascript">
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#image')
                      .attr('src', e.target.result)
                      .width(50)
                      .height(50);
              };
              reader.readAsDataURL(input.files[0]);
          }
       }
    </script>
             
         </section>
         <!-- End Right Side Content -->
         @endsection