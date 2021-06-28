 
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
                                    <h3>Tvc Updated</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="index.html">home</a></li>
                                       <li>Tvc</li>
                                       <li>Tvc Edit</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   <div style="margin-top: 5px;">
                    <a style="margin-bottom: 5px;" class="btn btn-success pull-right"  href="{{ route('tvc_av') }}">
                                    <i class="fa fa-eye pull-left" style="margin-top: 4px;"></i> tvc List 
                                    </a>
                   </div>
                  <!-- Form Layout Row Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="form-example">
                              <h3>Update tvc</h3>
                              <div class="form-wrap label-left form-layout-page">
                                 <form method="post" action="{{ url('update/tvc/'.$tvc_av->id) }}">
                                 	@csrf
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-4">
                                             <label class="control-label">Vedio Link</label>
                                          </div>
                                          <div class="col-md-12">
                                             <input type="text" value="{{ $tvc_av->vedio_link}}" name="vedio_link" placeholder="Vedio Link" class="form-control">
                                          </div>
                                       </div>
                                      
                                    </div>
                              
                                
                                
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="form-layout-submit">
                                                <button type="submit" class="btn btn-info pull-right" >Submit</button>
                                                <button type="reset" class="btn btn-danger pull-right">reset</button>
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
             
   
             
         </section>
         <!-- End Right Side Content -->
         @endsection