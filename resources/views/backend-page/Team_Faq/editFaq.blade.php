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
                                    <h3>Edit Faq Info</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="{{ route('home') }}">Deshbord</a></li>
                                       <li>Faq Manage</li>
                                       <li>Edit Faq</li>
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
                                    <!-- Form Layout Row Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="form-example">
                              <h3>Edit Faq Information</h3>
                              <div class="form-wrap top-label-exapmple form-layout-page">
                                 <form method="post" action="{{ url('update/faq/'.$faq->id) }}">
                                       @csrf
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label class="control-label">Question:</label>
                                             <input type="text" placeholder="Enter title" class="form-control" name="title" value="{{ $faq->title }}" >
                                          </div>
                                       </div>
                                      
                                    </div>
                                    
                                    
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             
                                              <div class="widget_card_body collapse in" id="mail_home">
                                               <div class="mail-editor">
                                              <div>
                                                <label>solution</label>
                                                 <textarea id="summernote" type="text" placeholder="Enter solution"name="description" required >{!! $faq->description !!}</textarea>
                                              </div>
                                            </div>
                                           </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-md-12">
                                                   <div class="form-layout-submit">
                                                      <button type="submit" class="btn btn-info" >Submit</button>
                                                      <button type="reset" class="btn btn-danger">reset</button>
                                                   </div>
                                                </div>
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
                  <!-- End Form Layout Row -->
                   
               </div>
            </div>
             
    
             
         </section>

  @endsection