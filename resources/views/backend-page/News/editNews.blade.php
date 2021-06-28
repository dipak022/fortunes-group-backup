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
                                    <h3>Edit job Info</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="index.html">home</a></li>
                                       <li>edit job</li>
                                       <li>Edit Job</li>
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
                                    <h3>job Information</h3>
                                    <form method="post" action="{{ url('update/news/'.$news->id) }}"enctype="multipart/form-data">
                                       @csrf
                                        <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label class="control-label">title</label>
                                             <input type="text" placeholder="Enter title" class="form-control" name="title" value="{{ $news->title }}">
                                          </div>
                                       </div>

                                    </div>
                                     <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                            
                                              <div class="widget_card_body collapse in" id="mail_home">
                                             <div class="mail-editor">
                                              <div>
                                                <label>Description</label>
                                                 <textarea id="summernote" type="text" placeholder="Enter description"name="description" required >{!! $news->description !!}</textarea>
                                              </div>
                                             </div>
                                            </div>
                                          </div>
                                       </div>

                                    </div>
                                     <div class="row">
                                       <div class="col-md-12" style="margin-top: 10px;">
                                      
                                          <label class="control-label" for="dob">Duties & Responsibilities</label>
                                          <input class="form-control" id="dob" type="text" name="Responsibilities"data-role="tagsinput" placeholder="Responsibilities list" value="{{ $news->Responsibilities  }}">
                                             
                                       </div>
                                    </div>
                                   <div class="row">
                                       <div class="col-md-12"style="margin-top: 20px;">
                                       
                                          <label class="control-label" for="dob">Required Knowledge & Skills</label>
                                          <input class="form-control" id="dob" type="text" name="skills"data-role="tagsinput" placeholder="skills list" value="{{ $news->skills  }}">
                                             
                                       </div>
                                    </div>

                                       <div class="row">
                                          <div class="col-md-12"style="margin-top: 20px;">
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
                                 
                            </form>
                                 
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
                        .width(130)
                        .height(155);
                };
                reader.readAsDataURL(input.files[0]);
            }
         }
      </script>

  @endsection
