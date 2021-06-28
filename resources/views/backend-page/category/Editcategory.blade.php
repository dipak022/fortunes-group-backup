 
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
                                    <h3>category Updated</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="index.html">home</a></li>
                                       <li>categories</li>
                                       <li>category</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   
                  <!-- Form Layout Row Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="form-example">
                              <h3>Update Category</h3>
                              <div class="form-wrap label-left form-layout-page">
                                 <form method="post" action="{{ url('update/category/'.$cat->id) }}">
                                 	@csrf
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-4">
                                             <label class="control-label">Category Name:</label>
                                          </div>
                                          <div class="col-md-12">
                                             <input type="text" value="{{ $cat->category_name}}" name="category_name" placeholder="Category Name" class="form-control" required="">
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-4">
                                             <label class="control-label">Link:</label>
                                          </div>
                                          <div class="col-md-12">
                                             <input type="text" value="{{ $cat->link}}" name="link" placeholder="Link" class="form-control" required="">
                                          </div>
                                       </div>
                                    </div>
                              
                                
                                
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="form-layout-submit">
                                                <button type="submit" class="btn btn-info pull-right" >Submit</button>
                                                <button type="submit" class="btn btn-danger pull-right">cancel</button>
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