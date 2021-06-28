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
                                    <h3>Category Image</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="{{ route('home') }}">Deshbord</a></li>
                                       <li>Category image</li>
                                       <li>Category Image</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   
                  <!-- Product Table Row Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="table-responsive">
                                  <a style="margin-bottom: 5px;" class="btn btn-success pull-right" data-toggle="modal" data-target="#notesmodal" href="#">
                                    <i class="fa fa-plus"></i>Add New 
                                    </a>
                               <div class="datatables-example-heading">
                              <h3>Category Image Datatable</h3>
                              </div>
                              <div class="table-responsive advance-table">
                              <table id="datatables_example_1" class="table display table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Business name</th>
                                       <th>Image One</th>
                                       <th>Image Two</th>
                                       <th>Image Three</th>
                                       <th>Image Four</th>
                                       <th>Website Link</th>
                                       <th>Facebook Link</th>
                                       <th>Priority</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($bus_name as $row)     
                                  <tr>  
                                       <td style="text-align: center;">
                                         {{ $row->name }}
                                       </td>    
                                       <td style="text-align: center;">
                                           <img src="{{ asset($row->image_one) }}" style="height: 50px;width: 50px;" alt="order image"  />
                                       </td>
                                       <td style="text-align: center;">
                                           <img src="{{ asset($row->image_two) }}" style="height: 50px;width: 50px;" alt="order image"  />
                                       </td>
                                       <td style="text-align: center;">
                                           <img src="{{ asset($row->image_three) }}" style="height: 50px;width: 50px;" alt="order image"  />
                                       </td>
                                       <td style="text-align: center;">
                                           <img src="{{ asset($row->image_four) }}" style="height: 50px;width: 50px;" alt="order image"  />
                                       </td>
                                        <td>{{$row->webside_link}}</td>
                                        <td>{{$row->facebook_link}}</td>
                                        <td>{{$row->priority}}</td>
                                       
                             
                                      
                                        <td class="d-flex">
                                          <a style="margin-top:5px;"href="{{ url('edit/fortuneimage/'.$row->id) }}" class="product-table-info btn btn-success" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"style="color:white;"></i></a>
                                          <a style="margin-top:5px;" href="{{ url('delete/fortuneimage/'.$row->id) }}" class="product-table-danger btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" style="color:white;"></i></a>
                                       </td>
                                       
                                    </tr>
                                   @endforeach
                                    
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Product Table Row End -->
                   
               </div>
            </div>
             
           
             
         </section>
 
  <!-- Start Modal -->
                  <div class="modal fade" id="notesmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Add New Category</h4>
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
                                 <form method="post" action="{{ route('store.fortuneimages') }}"enctype="multipart/form-data">
                                  @csrf
                                    <p>
                                      <label for="exampleInputEmail1">Category Title</label>
                                      @php
                                        $Select_cat=DB::table('fortuneCategory')->get();
                                      @endphp
                                      <select name="fortune_cat_id" class="form-control">
                                        
                                        @foreach($Select_cat as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                      </select>
                                       {{-- <input type="text" class="picker_1" name="name" placeholder="Name" required="" /> --}}
                                    </p>
                                    <p>
                                       <label for="exampleInputEmail1">Image One</label>
                                       <img class="pull-right" style="height: 55px;" src="{{ asset('public/avater.jpg') }}" id="image_one"/>
                                       <input type="file" class="picker_1" id="file"  name="image_one" onchange="readURL_one(this);"  accept="image" />
                                    </p>
                                    <p>
                                       <label for="exampleInputEmail1">Image Two</label>
                                       <img class="pull-right" style="height: 55px;" src="{{ asset('public/avater.jpg') }}" id="image_two"/>
                                       <input type="file" class="picker_1" id="file"  name="image_two" onchange="readURL_two(this);"  accept="image" />
                                    </p>
                                    <p>
                                       <label for="exampleInputEmail1">Image Three</label>
                                       <img class="pull-right" style="height: 55px;" src="{{ asset('public/avater.jpg') }}" id="image_three"/>
                                       <input type="file" class="picker_1" id="file"  name="image_three" onchange="readURL_three(this);"  accept="image" />
                                    </p>
                                     <p>
                                       <label for="exampleInputEmail1">Image Four</label>
                                       <img class="pull-right" style="height: 55px;" src="{{ asset('public/avater.jpg') }}" id="image_four"/>
                                       <input type="file" class="picker_1" id="file"  name="image_four" onchange="readURL_four(this);"  accept="image" />
                                    </p>
                                     <p>
                                      <label for="exampleInputEmail1">Website Link</label>
                                      
                                        <input type="text" class="picker_1" name="webside_link" placeholder="Website Link"  />
                                    </p> 
                                     <p>
                                      <label for="exampleInputEmail1">Facebook Link</label>
                                      
                                        <input type="text" class="picker_1" name="facebook_link" placeholder="Facebook Link"  />
                                    </p>  
                                   <p>
                                      <label for="exampleInputEmail1">Priority </label>
                                      
                                        <input type="text" class="picker_1" name="priority" placeholder="Priority Link"  />
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
      function readURL_one(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#image_one')
                      .attr('src', e.target.result)
                      .width(50)
                      .height(50);
              };
              reader.readAsDataURL(input.files[0]);
          }
       }
    </script>
    <script type="text/javascript">
      function readURL_two(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#image_two')
                      .attr('src', e.target.result)
                      .width(50)
                      .height(50);
              };
              reader.readAsDataURL(input.files[0]);
          }
       }
    </script>
    <script type="text/javascript">
      function readURL_three(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#image_three')
                      .attr('src', e.target.result)
                      .width(50)
                      .height(50);
              };
              reader.readAsDataURL(input.files[0]);
          }
       }
    </script>
     <script type="text/javascript">
      function readURL_four(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#image_four')
                      .attr('src', e.target.result)
                      .width(50)
                      .height(50);
              };
              reader.readAsDataURL(input.files[0]);
          }
       }
    </script>
@endsection

       
  