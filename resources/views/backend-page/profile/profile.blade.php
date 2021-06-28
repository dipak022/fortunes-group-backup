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
                                    <h3>Profile </h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="{{ route('home') }}">Deshbord</a></li>
                                       <li>Profile</li>
                                       
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
                              <h3>Profile List</h3>
                              </div>
                              <div class="table-responsive advance-table">
                              <table id="datatables_example_1" class="table display table-bordered">
                                 <thead>
                                    <tr>
                                        
                                       <th>Name</th>
                                       <th>Position</th>
                                       <th>Description</th>
                                       <th>potho</th>
                                       <th>Image One</th>
                                       <th>Image One</th>
                                       <th>Image three</th>
                                       <th>Image four</th>
                                       
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($profil as $row)     
                                  <tr>    
                                       <td>
                                           {{ $row->name}}
                                       </td>
                                       <td>
                                           {{ $row->position}}
                                       </td>
                                       <td>
                                           {!! $row->description!!}
                                       </td>
                                       <td style="text-align: center;">
                                           <img src="{{ asset($row->image) }}" style="height: 50px;width: 50px;" alt="order image"  />
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
                             
                                       
                                       <td class="d-flex">
                                          <a style="margin-top:5px;"href="{{ url('edit/profileimage/'.$row->id) }}" class="product-table-info btn btn-success" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"style="color:white;"></i></a>
                                          <a style="margin-top:5px;" href="{{ url('delete/profileimage/'.$row->id) }}" class="product-table-danger btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" style="color:white;"></i></a>
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
                              <h4 class="modal-title" id="myModalLabel">Add Leadership Profile</h4>
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
                                 <form method="post" action="{{ route('store.storeprofile') }}"enctype="multipart/form-data">
                                  @csrf
                                    <p>
                                      <label for="exampleInputEmail1">Name*</label>
                                        <input type="text" class="picker_1" name="name" placeholder="Name" required="" /> 
                                    </p>
                                    <p>
                                      <label for="exampleInputEmail1">position*</label>
                                        <input type="text" class="picker_1" name="position" placeholder="position" required="" /> 
                                    </p>
                                    <p>
                                    <div class="widget_card_body collapse in" id="mail_home">
                                    <div class="mail-editor">
                                      <div>
                                        <label>Description*</label>
                                         <textarea id="summernote" type="text" placeholder="Enter description"name="description" required >{{ old('description') }}</textarea>
                                      </div>
                                    </div>
                                    </div>
                                    </p>
                                    <p>
                                       <label for="exampleInputEmail1">Profile Image*</label>
                                       <img class="pull-right" style="height: 55px;" src="{{ asset('public/avater.jpg') }}" id="image"/>
                                       <input type="file" class="picker_1" id="file"  name="image" onchange="readURL(this);"  accept="image" />
                                    </p>
                                    <p>
                                       <label for="exampleInputEmail1">Image One*</label>
                                       <img class="pull-right" style="height: 55px;" src="{{ asset('public/avater.jpg') }}" id="image_one"/>
                                       <input type="file" class="picker_1" id="file"  name="image_one" onchange="readURL_one(this);"  accept="image" />
                                    </p>
                                    <p>
                                       <label for="exampleInputEmail1">Image Two*</label>
                                       <img class="pull-right" style="height: 55px;" src="{{ asset('public/avater.jpg') }}" id="image_two"/>
                                       <input type="file" class="picker_1" id="file"  name="image_two" onchange="readURL_two(this);"  accept="image" />
                                    </p>
                                    <p>
                                       <label for="exampleInputEmail1">Image Three*</label>
                                       <img class="pull-right" style="height: 55px;" src="{{ asset('public/avater.jpg') }}" id="image_three"/>
                                       <input type="file" class="picker_1" id="file"  name="image_three" onchange="readURL_three(this);"  accept="image" />
                                    </p>
                                     <p>
                                       <label for="exampleInputEmail1">Image Four*</label>
                                       <img class="pull-right" style="height: 55px;" src="{{ asset('public/avater.jpg') }}" id="image_four"/>
                                       <input type="file" class="picker_1" id="file"  name="image_four" onchange="readURL_four(this);"  accept="image" />
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

       
  