@extends('layouts.main_layout')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Search</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Patient Search</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
<div class="row">
@foreach($result as $patient_info)  

    <div class="col-lg-4" >

            <div class="info-box mb-3 bg-info">
            <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-warning">
                        {{$patient_info->hospital_number}}
                        </div>
                      </div>
              <div class="info-box-content">
                <span class="info-box-text"><h4>{{$patient_info->first_name}} {{$patient_info->middle_name}} {{$patient_info->last_name}}</h4></span>
                <span class="info-box-number">163,921</span>

                <a href="show/{{$patient_info->id}}" class="btn btn-sm bg-teal">
                  <i class="fas fa-user"></i>
                </a>
                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-lg-{{$patient_info->id}}">
                  <i class="fas fa-document"></i> Create request
                </a>


              </div>
              <!-- /.info-box-content -->
            </div>



		
    </div>


    <div class="modal fade" id="modal-lg-{{$patient_info->id}}">
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
                      <input type="hidden" name="patient_id" class="form-control" value="{{$patient_info->id}}" autocomplete="off">
                      
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
                      <select name="final_result" class="custom-select" id="hcw">
                            <option value="1">POSITIVE</option>
                            <option value="0">NEGATIVE</option>
                      </select>
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




@endforeach
</div>


</section>

    
       
    
@endsection