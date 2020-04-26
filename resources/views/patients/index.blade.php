@extends('layouts.main_layout')

@section('content')


 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Patients</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Patients</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Patients</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          

 

          <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Hospital #</th>
                  <th>Fullname</th>
                  <th ></th>
                  <th ></th>
                </tr>
                </thead>
                <tbody>
                 
                 
                  @foreach($patients as $patient)   
                <tr>
                  <td> {{$patient->hospital_number}} </td>
                  <td>  
                  <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#modal-default_{{$patient->id}}" data-placement="top" rel="tooltip" title="Create Request">
                    <i class="fa fa-plus-circle"></i>
                  </a>
                  {{$patient->first_name}} {{$patient->middle_name}} {{$patient->last_name}} </td>
                  


                      <div class="modal fade" id="modal-default_{{$patient->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create Request</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    

                                <form method="post" action="{{ route('patient_requests.store') }}">
                                    @csrf
                                    <label class="col-form-label" for="disposition"><i class="fas fa-check"></i> Disposition</label>
                                    <div class="input-group mb-3">
                                        <input type="hidden" name="patient_id" class="form-control" value="{{$patient->id}}" autocomplete="off">
                                        
                                        <select name="disposition_id" class="custom-select" id="dispositions">
                                          @foreach($dispositions as $disposition)
                                              <option value="{{$disposition->id}}">{{$disposition->name}}</option>
                                          @endforeach
                                        </select>

                                    </div>
                                      
                                    <label class="col-form-label" for="hcw"><i class="fas fa-check"></i> Health Care Worker</label>
                                    <div class="input-group mb-3">
                                        
                                        <select name="hcw" class="custom-select" id="hcw">
                                          
                                              <option value="1">HCW</option>
                                              <option value="0">Non-HCW</option>
                                        
                                        </select>
                                    </div>


                                    <label class="col-form-label" for="status"><i class="fas fa-check"></i> Status</label>
                                    <div class="input-group mb-3">
                                       
                                        <input type="text" name="status"  id="status" class="form-control" autocomplete="off">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-hospital"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <label class="col-form-label" for="final_result"><i class="fas fa-check"></i> Final Result</label>
                                    <div class="input-group mb-3">
                                       
                                        <input type="text" name="final_result" id="final_result" class="form-control" autocomplete="off">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-hospital"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <label class="col-form-label" for="soft_copy"><i class="fas fa-check"></i> Soft Copy</label>
                                    <div class="input-group mb-3">
                                       
                                        <input type="text" name="soft_copy" id="soft_copy" class="form-control" autocomplete="off">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-hospital"></span>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <label class="col-form-label" for="user_id"><i class="fas fa-check"></i> Pathologist </label>
                                    <div class="input-group mb-3">
                                        
                                        <select name="user_id" class="custom-select" id="dispositions">
                                          @foreach($users as $user)
                                              <option value="{{$user->id}}">{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}, {{$user->prefix}}</option>
                                          @endforeach
                                        </select>

                                    </div>

                                    <label class="col-form-label" for="department_id"><i class="fas fa-check"></i> Department </label>
                                    <div class="input-group mb-3">

                                        <select name="department_id" class="custom-select" id="department_id">
                                          @foreach($departments as $department)
                                              <option value="{{$department->id}}">{{$department->name}}</option>
                                          @endforeach
                                        
                                        </select>

                                    </div>



                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->

                            
                    </div>
                    <!-- /.modal -->

                  <td> 
                      <a class="btn btn-primary btn-sm" href="patients/show/{{$patient->id}}">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a>
                  </td>
                  <td>
                    
                      <a class="btn btn-danger btn-sm" href="patients/destroy/{{$patient->id}}">
                          <i class="fas fa-trash">
                          </i>
                          Delete
                      </a> 
                  
                  </td>
                </tr>
                  @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Hospital #</th>
                  <th>Full Name</th>
                  <th ></th>
                  <th ></th>
                </tr>
                </tfoot>
              </table>

            

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

    <script>

      $(document).ready(function(){
          $('[rel="tooltip"]').tooltip({trigger: "hover"});
      });

    </script>
  


@endsection


