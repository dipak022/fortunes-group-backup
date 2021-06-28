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
                                    <h3>tvc & av add</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="#">Dashbord</a></li>
                                       <li>tvc & av add</li>
                                       <li>tvc & av List</li>
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
                              <h3>tvc & av List</h3>
                              </div>
                              <div class="table-responsive advance-table">
                              <table id="datatables_example_1" class="table display table-bordered">
                                 <thead>
                                    <tr>
                                       
                                       <th style="text-align: center;">Vedio Link</th>
                                      
                                       <th style="text-align: center;">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	@foreach($tvc_av as $row)
                                    <tr>
                                       <td style="text-align: center;">{{ $row->vedio_link }}</td>
                                       <td class="d-flex">
                                          <a style="margin-top:5px;"href="{{ url('edit/tvc/'.$row->id) }}" class="product-table-info btn btn-success" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"style="color:white;"></i></a>
                                          <a style="margin-top:5px;" href="{{ url('delete/tvc/'.$row->id) }}" class="product-table-danger btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" style="color:white;"></i></a>
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
                              <h4 class="modal-title" id="myModalLabel">Add New Tvc and Av</h4>
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
                                 <form method="post" action="{{ route('store.tvc_av') }}">
                                 	@csrf
                                    <p>
                                    	 <label for="exampleInputEmail1">Vedio Link</label>
                                       <input type="text" class="picker_1" name="vedio_link" placeholder="Vedio Link"  />
                                    </p>
                                    
                                   
                                    
                                 
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="submit" class="btn btn-success">Save </button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
                           </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <!-- End Modal -->
@endsection

       
  