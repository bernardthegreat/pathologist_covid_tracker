@extends('layouts.main_layout')

@section('content')

 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            

          </div>
          <div class="col-sm-9">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Patient Requests</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">

<div class="card">
        <div class="card-header">
          <h3 class="card-title">Patient Requests</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">


              <div class="col-md-12">
                  <div class="card">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#new_request" data-toggle="tab">Pendings</a></li>
                        <li class="nav-item"><a class="nav-link" href="#released" data-toggle="tab">Result Availability</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    
              
              <div class="card-body">
                      <div class="tab-content">
                        <div class="active tab-pane" id="new_request">
                          
                            <table id="example1" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                <th>Requested Date</th>
                                <th>Fullname</th>
                                <th>Action</th>
                                <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              
                                @foreach($patient_requests_pending as $patient_request)   
                              <tr>
                                <td>
                                  {{ date('m/d/Y h:i:s A', strtotime($patient_request->created_at)) }}
                                </td>
                                <td> 
                                  {{ $patient_request->patients->first_name }} {{ $patient_request->patients->middle_name }} {{ $patient_request->patients->last_name }}
                                </td>
                                <td>
                                    View  
                                </td>

                                <td>
                                    Release  
                                </td>
                              </tr>
                                @endforeach
                              
                              </tbody>
                              <tfoot>
                              <tr>
                                <th>Requested Date</th>
                                <th>Fullname</th>
                                <th>Action</th>
                                <th>Action</th>
                              </tr>
                              </tfoot>
                            </table>



                        </div>
                  

                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="released">
                          


                        <table id="example3" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                <th>Requested Date</th>
                                <th>Released Date</th>
                                <th>Fullname</th>
                                <th> Actions </th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              
                                @foreach($patient_requests_released as $patient_request)   
                              <tr>
                                <td>
                                  {{ date('m/d/Y h:i:s A', strtotime($patient_request->created_at)) }}
                                </td>
                                <td>
                                  {{ date('m/d/Y h:i:s A', strtotime($patient_request->released_datetime)) }}
                                </td>
                                <td> 
                                  {{ $patient_request->patients->first_name }} {{ $patient_request->patients->middle_name }} {{ $patient_request->patients->last_name }}
                                </td>
                                <td>
                                  View
                                
                                </td>
                              </tr>
                                @endforeach
                              
                              </tbody>
                              <tfoot>
                              <tr>
                                <th>Requested Date</th>
                                <th>Released Date</th>
                                <th>Fullname</th>
                                <th> Actions </th>
                              </tr>
                              </tfoot>
                            </table>
        


                          
                        </div>
                        <!-- /.tab-pane -->

                        
                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                  </div>
                  <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->  

        </div>
</div>


@endsection