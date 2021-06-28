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
                                    <h3>Add Faq Info</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="{{ route('home') }}">Deshbord</a></li>
                                       <li>Faq Manage</li>
                                       <li>Add Faq</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   <div style="margin-top: 5px;">
                    <a style="margin-bottom: 5px;" class="btn btn-success pull-right"  href="{{ route('all.Faq') }}">
                                    <i class="fa fa-eye pull-left" style="margin-top: 4px;"></i>FAQ List 
                                    </a>
                   </div>
                  <!-- Add Product Area Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="row">
                              <div class="col-md-12 col-sm-12">
                                 <div class="add-product-form-group">
                                    <h3>Add Faq Information</h3>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="post" action="{{ route('store.faq') }}"enctype="multipart/form-data">
                                       @csrf
                                       <div class="col-md-12">
                                             <p>
                                                <label>Question*</label>
                                                <input type="text" placeholder="Enter Question "  name="title">
                                             </p>
                                          </div> 
                                          <div class="col-md-12">
                                             <p>
                                              
                                                <div class="widget_card_body collapse in" id="mail_home">
                                               <div class="mail-editor">
                                              <div>
                                                <label>solution*</label>
                                                 <textarea id="summernote" type="text" placeholder="Enter solution"name="description" required >{{ old('description') }}</textarea>
                                              </div>
                                            </div>
                                           </div>
                                             </p>
                                          </div>

                                         
                                     
                                      
                                          <div class="col-md-12 col-sm-12" >
                                            <p>
                                             <label></label>
                                                <button type="submit" class="btn btn-success" >
                                                <i class="fa fa-check mr-auto"></i>
                                                Save Info
                                                </button>
                                               
                                             </p>
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