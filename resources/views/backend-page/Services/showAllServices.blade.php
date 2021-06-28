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
                                    <h3>Service</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="{{ route('home') }}">Deshbord</a></li>
                                       <li>Service</li>
                                       <li>All Service</li>
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
                           <div class="datatables-example-heading">
                              <h3>Service Datatable</h3>
                              </div>
                              <div class="table-responsive advance-table">
                              <table id="datatables_example_1" class="table display table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Photo</th>
                                       <th>Title</th>
                                       <th>Description</th>
                                       <th>vedio or link</th>
                                       <th>day</th>  
                                       
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	@foreach($Services as $row)
                                    <tr>
                                       <td>
                                          <img src="{{ asset($row->image) }}" alt="order image"  />
                                       </td>
                                       <td>{{ $row->title }}</td>
                                       <td>{{ $row->description }}</td>
                                       <td>{{ $row->vedio_or_link }}</td>
                                       <td>{{ $row->day }}</td>
                                       <td>
                                          <a href="{{ url('edit/service/'.$row->id) }}" class="product-table-info" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                          <a href="{{ url('delete/service/'.$row->id) }}" class="product-table-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
						                   
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