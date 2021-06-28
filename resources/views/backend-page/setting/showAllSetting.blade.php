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
                                    <h3>Setting List</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="index.html">home</a></li>
                                       <li>setting</li>
                                       <li>setting  list</li>
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
                           <a style="margin-bottom: 5px;" class="btn btn-success pull-right" href="{{ route('setting') }}">
                                    <i class="fa fa-plus"></i>Add New 
                                    </a>
                            <div class="datatables-example-heading">
                              <h3>Setting Datatable</h3>
                              </div>
                              <div class="table-responsive advance-table">
                              <table id="datatables_example_1" class="table display table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Photo</th>
                                       <th>Mobile</th>
                                       <th>Sort Description</th>
                                       <th>Email</th>
                                       <th>Address</th>
                                       <th>CoppyRight</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	@foreach($setting as $row)
                                    <tr>
                                       <td>
                                          <img src="{{ asset($row->logo) }}" alt="order image"  />
                                       </td>
                                       
                                       <td>{{ $row->mobile_number }}</td>
                                       <td>{{ $row->text }}</td>
                                       <td>{{ $row->email }}</td>
                                       <td>{{ $row->address }}</td>
                                       <td>{{ $row->coppyright }}</td>
                                      
                                       <td>
					                    @if($row->time==1)
					                    <span class="label label-success">active</span>
					                    @else
					                   <span class="label label-danger">Inative</span>
					                    @endif
					                  </td>
                                    
                                          <td class="d-flex">
                                          <a style="margin-top:5px;"href="{{ url('edit/setting/'.$row->id) }}" class="product-table-info btn btn-success" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"style="color:white;"></i></a>
                                          <a style="margin-top:5px;" href="{{ url('delete/setting/'.$row->id) }}" class="product-table-danger btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" style="color:white;"></i></a>
                                       
						                    @if($row->time==1)
						                    
                                      <a style="margin-top:5px;" href="{{ url('inactive/product/'.$row->id) }}" class="product-table-danger btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-thumbs-down" style="color:white;"></i></a>
						                    @else
						                     
                                       <a style="margin-top:5px;" href="{{ url('active/product/'.$row->id) }}" class="product-table-success btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-thumbs-up" style="color:white;"></i></a>
						                    @endif
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
  @endsection