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
                                    <h3>Job info</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="{{ route('home') }}">Deshbord</a></li>
                                       <li>Job info</li>
                                       
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
                                  
                               <div class="datatables-example-heading">
                              <h3>Job Info Datatable</h3>
                              </div>
                              <div class="table-responsive advance-table">
                              <table id="datatables_example_1" class="table display table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Name </th>
                                       <th>email </th>
                                       <th>phone </th>
                                       <th>view </th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($jobinfo as $row)     
                                  <tr>    
                                        <td style="text-align: center;">
                                           {{$row->name}}
                                       </td>
                                       <td style="text-align: center;">
                                           {{$row->email}}
                                       </td>
                                       <td style="text-align: center;">
                                           {{$row->phone}}
                                       </td>

                                       <td style="text-align: center;">
                                          <a href="{{ url('/'.$row->id) }}" class="page-table-success" data-toggle="tooltip" title="view"><i class="fa fa-edit"></i></a>
                                       </td>
                             
                                       <td style="text-align: center;">
                                          <a href="{{ url('delete/job/'.$row->id) }}" class="page-table-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
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