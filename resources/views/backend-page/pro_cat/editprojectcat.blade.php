 
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
                                    <h3>project category Updated</h3>
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
                   <div style="margin-top: 5px;">
                    <a style="margin-bottom: 5px;" class="btn btn-success pull-right"  href="{{ route('projects') }}">
                                    <i class="fa fa-eye pull-left" style="margin-top: 4px;"></i> Project List 
                                    </a>
                   </div>
                  <!-- Form Layout Row Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="form-example">
                              <h3>Update project category</h3>
                              <div class="form-wrap label-left form-layout-page">
                                 <form method="post" action="{{ url('update/pro/categorys/'.$editprocategory->id) }}">
                                 	@csrf

                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-4">
                                             <label class="control-label">Bisiness Name:</label>
                                          </div>
                                          <div class="col-md-12">
                                             
                                                <select class="form-control" name="companies_id">
                                                  @foreach($category as $row)
                                                  <option value="{{ $row->id }}"
                                                 <?php 
                                                    if($row->id == $editprocategory->companies_id) {
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
                                             <label class="control-label">Category Name:</label>
                                          </div>
                                          <div class="col-md-12">
                                             <input type="text" value="{{ $editprocategory->cat_name}}" name="cat_name" placeholder="Category Name" class="form-control">
                                          </div>
                                       </div>
                                      
                                    </div>
                                    
                                     <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-4">
                                             <label class="control-label">Priority:</label>
                                          </div>
                                          <div class="col-md-12">
                                             <input type="text" value="{{ $editprocategory->priority}}" name="priority" placeholder="priority" class="form-control">
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
             
   
             
         </section>
         <!-- End Right Side Content -->
         @endsection