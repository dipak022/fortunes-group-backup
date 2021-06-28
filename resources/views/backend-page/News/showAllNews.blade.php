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
                                    <h3>Job List</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="index.html">home</a></li>
                                       <li>Job</li>
                                       <li>Job  list</li>
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
                           <a style="margin-bottom: 5px;" class="btn btn-success pull-right" href="{{ route('news') }}">
                                    <i class="fa fa-plus"></i>Add New 
                                    </a>
                           <div class="datatables-example-heading">
                              <h3>Job List</h3>
                              </div>
                              <div class="table-responsive advance-table">
                              <table id="datatables_example_1" class="table display table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Title</th>
                                       <th>Description</th>
                                       <th>Responsibilities</th>
                                       <th>skills</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	@foreach($news as $row)
                                    <tr>
                                       <td>{{ $row->title }}</td>
                                       <td>{!! $row->description !!}</td>
                                       <td>{{ $row->Responsibilities }}</td>
                                       <td>{{ $row->skills }}</td>
                                       
                                        <td class="d-flex">
                                          <a style="margin-top:5px;"href="{{ url('edit/news/'.$row->id) }}" class="product-table-info btn btn-success" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"style="color:white;"></i></a>
                                          <a style="margin-top:5px;" href="{{ url('delete/news/'.$row->id) }}" class="product-table-danger btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" style="color:white;"></i></a>
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
