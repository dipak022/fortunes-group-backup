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
                                    <h3>Team</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="{{ route('home') }}">Deshbord</a></li>
                                       <li>Team Manage</li>
                                       <li>All Team</li>
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
                           <a style="margin-bottom: 5px;" class="btn btn-success pull-right" href="{{ route('Team_Faq') }}">
                                    <i class="fa fa-plus"></i>Add New 
                                    </a>
                           <div class="datatables-example-heading">
                              <h3>Team Datatable</h3>
                              </div>
                              <div class="table-responsive advance-table">
                              <table id="datatables_example_1" class="table display table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Photo</th>
                                       <th>Name</th>
                                       <th>position</th>
                                       <th>priority</th>
                                       <th>description</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	@foreach($team as $row)
                                    <tr>
                                       <td>
                                          <img src="{{ asset($row->image) }}" alt="order image"  />
                                       </td>
                                       
                                       <td>{{ $row->name }}</td>
                                       <td>{{ $row->position }}</td>
                                       <td>{{ $row->priority }}</td>
                                       <td>{!! $row->short_description !!}</td>
                                      
                                       <td class="d-flex">
                                          <a style="margin-top:5px;"href="{{ url('edit/team/'.$row->id) }}" class="product-table-info btn btn-success" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"style="color:white;"></i></a>
                                          <a style="margin-top:5px;" href="{{ url('delete/team/'.$row->id) }}" class="product-table-danger btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" style="color:white;"></i></a>
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