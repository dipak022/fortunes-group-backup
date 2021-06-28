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
                                    <h3>Sub Category</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="#">Dashbord</a></li>
                                       <li>Categories</li>
                                       <li>sub Category</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                  <!-- Pages Table Row Start -->
                  <div class="row">
                     <div class="col-md-12">

                        <div class="page-box">
                           <div class="table-responsive">
                         
                              <a style="margin-bottom: 5px;" class="btn btn-success pull-right" data-toggle="modal" data-target="#notesmodal" href="#">
                                    <i class="fa fa-plus"></i>Add New 
                                    </a>
                                 <div class="datatables-example-heading">
                                  <h3>Sub Category Datatable</h3>
                                  </div>
                                  <div class="table-responsive advance-table">
                                  <table id="datatables_example_1" class="table display table-bordered">   
                                 <thead>
                                    <tr>
                                       <th style="text-align: center;">No</th>
                                       <th style="text-align: center;">SubCategory Name</th>
                                       <th style="text-align: center;">Category Name</th>
                                       <th style="text-align: center;">Link</th>
                                       <th style="text-align: center;">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody >
                                    @foreach($subcategorys as $row)
                                    <tr>
                                       
                                       <td style="text-align: center;">{{ $row->id }}</td>
                                       <td style="text-align: center;">{{ $row->subcategory_name }}</td>
                                       <td style="text-align: center;">{{ $row->category_name }}</td>
                                       <td style="text-align: center;">{{ $row->link }}</td>
                                       <td style="text-align: center;">
                                         
                                          <a href="{{ url('edit/subcategory/'.$row->id) }}" class="page-table-info" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                          <a href="{{ url('delete/subcategory/'.$row->id) }}" class="page-table-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                       </td>
                                    </tr>
                                   @endforeach
                                
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Pages Table Row -->
                   
               </div>
            </div>
             
         
        

         </section>
 
  <!-- Start Modal -->
                  <div class="modal fade" id="notesmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Add New SubCategory</h4>
                           </div>
                           <div class="modal-body">
                              <div class="notes_sector">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                 <form method="post" action="{{ route('store.subcategory') }}"enctype="multipart/form-data">
                                    @csrf
                                    <p>
                                        <label for="exampleInputEmail1">SubCetagory Name</label>
                                       <input type="text"  class="picker_1" name="subcategory_name" placeholder="Category Name" />
                                    </p>

                                    <p>
                                        <label for="exampleInputEmail1">SubCetagory</label>
                                       
                                         <select class="form-control" name="category_id">
                                          <option>Select Category</option>
                                         @foreach($category as $row)
                                         <option value="{{ $row->id }}"> {{ $row->category_name }} </option>
                                         @endforeach
                                       </select> 
                                    </p>
                                    <p>
                                        <label for="link">Link</label>
                                       <input type="text" class="picker_1" name="link" placeholder="Link" />
                                    </p>
                                    <p>
                                       <label for="exampleInputEmail1"> Icon </label>
                                       <img class="pull-right" style="height: 55px;" src="#" id="image"/>
                                       <input type="file" class="picker_1" id="file"  name="image" required="" onchange="readURL(this);"  accept="image" />
                                    </p>

                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="submit" class="btn btn-success">Save </button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                           </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <!-- End Modal -->
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

       
  