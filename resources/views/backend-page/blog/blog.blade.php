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
                                    <h3>blog</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="{{ route('home') }}">Deshbord</a></li>
                                       <li>blog</li>
                                       <li>blog</li>
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
                                  <a style="margin-bottom: 5px;" class="btn btn-success pull-right" data-toggle="modal" data-target="#notesmodal" href="#">
                                    <i class="fa fa-plus"></i>Add New 
                                    </a>
                            <div class="datatables-example-heading">
                              <h3>blog List</h3>
                           </div>
                           <div class="table-responsive advance-table">
                              <table id="datatables_example_1" class="table display table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Image</th>
                                       <th>Title</th>
                                       <th>Description</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($blog as $row)
                                    <tr>
                                       <td >
                                           <img src="{{ asset($row->image) }}" style="height: 50px;width: 50px;" alt="order image"  />
                                       </td>
                                       <td >{{ $row->title }}</td><td >{!!$row->description !!}</td>
                                        <td class="d-flex">
                                          <a style="margin-top:5px;"href="{{ url('edit/blog/'.$row->id) }}" class="product-table-info btn btn-success" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"style="color:white;"></i></a>
                                          <a style="margin-top:5px;" href="{{ url('delete/blog/'.$row->id) }}" class="product-table-danger btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" style="color:white;"></i></a>
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
                              <h4 class="modal-title" id="myModalLabel">Add New blog</h4>
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
                                 <form method="post" action="{{ route('store.blog') }}"enctype="multipart/form-data">
                                 	@csrf
                                    <p>
                                    	 <label for="exampleInputEmail1"> Image *</label>
                                       <img class="pull-right" style="height: 55px;" src="{{ asset('public/avater.jpg') }}" id="image"/>
                                       <input type="file" class="picker_1" id="file"  name="image" onchange="readURL(this);"  accept="image" />
                                    </p>

                                     <p>
                                        <label for="exampleInputEmail1"> Title *</label>
                                       <input type="text" class="picker_1" name="title" placeholder="Name" required="" />
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

       
  