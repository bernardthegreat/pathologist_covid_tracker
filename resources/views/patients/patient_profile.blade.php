@extends('layouts.request_dashboard')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Patient Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('img/avatar.png')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$patient->first_name}} {{$patient->middle_name}} {{$patient->last_name}}</h3>

              

                <div class="col-md-12">
                  <div class="info-box bg-danger">
                    <span class="info-box-icon"><i class="fa fa-user-times"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Positive</span>
                      <span class="info-box-number">{{$positive}}</span>

                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                <div class="col-md-12">
                  <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="fa fa-user-check"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Negative</span>
                      <span class="info-box-number">{{$negative}}</span>

                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>


                <div class="col-md-12">
                  <div class="info-box bg-secondary">
                    <span class="info-box-icon"><i class="fa fa-user-minus"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Rejected</span>
                      <span class="info-box-number">{{$not_applicable}}</span>

                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>


                <div class="col-md-12">
                  <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="fa fa-user-minus"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Pending</span>
                      <span class="info-box-number">{{$pending}}</span>

                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

  
                <a href="/patient_requests/create/{{$patient->id}}" class="btn btn-primary btn-block"><b>Create request</b></a>
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#history" data-toggle="tab">History</a></li>
                  <li class="nav-item"><a class="nav-link" href="#edit_info" data-toggle="tab">Edit Information</a></li>
                </ul>
              </div><!-- /.card-header -->
              
			  
			  <div class="card-body">

           


                <div class="tab-content">
                  <div class="active tab-pane" id="history">
                   
                  <table id="example2" class="table table-bordered table-hover table-striped text-center">
                <thead>
                <tr>
                  <th>Specimen  #</th>
                  <th>Requested Date</th>
                  <th>Result</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                 
                 
                  @foreach($patient_requests as $patient_request)   
                <tr>
                <td>
                    {{ $patient_request->specimen_no }}
                  </td>
                  <td>
                    {{ date('m/d/Y h:i:s A', strtotime($patient_request->created_at)) }}
                  </td>
                
                  <td>  
                    @if($patient_request->final_result == '0')
                      PENDING
                    @elseif($patient_request->final_result == '1')
                      POSITIVE
                    @elseif($patient_request->final_result == '2')
                      POSITIVE
                    @elseif($patient_request->final_result == '3')
                      REJECTED
                    @endif
                   
                  </td>
                  <td>
                      <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#modal-lg-{{$patient_request->id}}">
                          <i class="fa fa-user">
                          </i>
                          View
                      </a>



                      <div class="modal fade" id="modal-lg-{{$patient_request->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">{{ $patient_request->patients->first_name }} {{ $patient_request->patients->middle_name }} {{ $patient_request->patients->last_name }} </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                                  <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">



                                    <tr>
                                      <th>Pathologist</th>
                                      <td>
                                      @if(isset($patient_request->user_id)) 
                                        {{ $patient_request->users->first_name }} {{ $patient_request->users->middle_name }} {{ $patient_request->users->last_name }} {{ $patient_request->users->prefix }}
                                      @endif
                                      </td>
                                    
                                    </tr>

                                    <tr>
                                      <th>Disposition</th>
                                      <td>{{ $patient_request->patient_request_dispositions->name }}</td>
                                    </tr>

                                    <tr>
                                      <th>Departments</th>
                                      <td>{{ $patient_request->departments->name }}</td>
                                    </tr>
                                
                                  

                                  </table>

                                </div>

                                  <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->

                            
                    </div>
                    <!-- /.modal -->





                  </td>
                </tr>
                  @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Specimen  #</th>
                  <th>Requested Date</th>
                  <th>Result</th>
                  <th></th>
                </tr>
                </tfoot>
              </table>


                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  
                  
                  <div class="tab-pane" id="edit_info">
                    
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                      </div><br />
                    @endif

                    <form role="form" method="post" action="{{ route('patients.update', $patient->id ) }}">

                      <div class="card-body">
                        
                        <div class="form-group">
                          @csrf
                          @method('PATCH')
                          <label for="first_name">First Name</label>
                          <input type="text" class="form-control" name="first_name" id="first_name" value="{{$patient->first_name}}" placeholder="First Name">
                        </div>
                        <div class="form-group">
                          <label for="middle_name">Middle Name</label>
                          <input type="text" class="form-control" name="middle_name" id="middle_name" value="{{$patient->middle_name}}" placeholder="Middle Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmalast_namel1">Last Name</label>
                          <input type="text" class="form-control"  name="last_name"  id="last_name" value="{{$patient->last_name}}" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                          <label for="age">Age</label>
                          <input type="text" class="form-control"  name="age"  id="age" value="{{$patient->age}}" placeholder="Age">
                        </div>
                        <div class="form-group">
                          <label for="gender">Gender</label>
                          <select name="gender" class="custom-select" id="gender">
                            @if(isset($patient->gender))
                              @if($patient->gender == 'M')
                                <option>Select Gender</option>
                                <option value="M" selected>Male</option>
                                <option value="F">Female</option>
                              @else
                                <option value="M">Select Gender</option>
                                <option value="M">Male</option>
                                <option value="F" selected>Female</option>
                              @endif
                            @else
                                <option>Select Gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            @endif


                          </select>
                        </div>
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
            <!-- /.card -->





            @endsection