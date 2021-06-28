 
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
                                    <h3>Update Subcategory</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="index.html">home</a></li>
                                       <li>categories</li>
                                       <li>Update Subcategory</li>
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
                              <h3>Update Subategory</h3>
                              <div class="form-wrap label-left form-layout-page">
                                 <form method="post" action="{{ url('update/subcategory/'.$subcat->id) }}"enctype="multipart/form-data">
                                 	@csrf
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-4">
                                             <label class="control-label">Subcategory Name:</label>
                                          </div>
                                          <div class="col-md-12">
                                             <input type="text" value="{{ $subcat->subcategory_name}}" name="subcetagory_name" placeholder="Subcategory Name" class="form-control" required="" >
                                          </div>
                                       </div>
                                    </div>

                                     <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-4">
                                             <label class="control-label">Category Name:</label>
                                          </div>
                                          <div class="col-md-12">
                                             
                                                <select class="form-control" name="category_id">
                                                  @foreach($category as $row)
                                                  <option value="{{ $row->id }}"
                                                 <?php 
                                                    if($row->id == $subcat->category_id) {
                                                      echo "selected";
                                                    }
                                                  ?>
                                                  >{{ $row->category_name }} </option>
                                                  @endforeach
                                                </select> 
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-4">
                                             <label class="control-label">Link:</label>
                                          </div>
                                          <div class="col-md-12">
                                             <input type="text" value="{{ $subcat->link}}" name="link" placeholder="Link" class="form-control" required="">
                                          </div>
                                       </div>
                                    </div>

                                    <div class="col-md-12">
                                        <img class="pull-right" style="height: 55px; width: 55px;" src="{{ asset($subcat->image) }}" id="image"/>
                                         <input type="file" class="picker_1" id="file"  name="image" onchange="readURL(this);"  accept="image" />
                                         <input type="hidden" name="old_image" value="{{ $subcat->image }}"/>
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
@endsection