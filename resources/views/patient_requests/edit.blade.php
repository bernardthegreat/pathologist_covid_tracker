@extends('layouts.main_layout')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Patient Request</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/patient_requests/show/{{$patient_request[0]->patient_id}}">Go back to {{$patient_request[0]->patients->first_name}}'s Requests </a></li>
              <li class="breadcrumb-item active">Edit Patient Request</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Patient Request of {{$patient_request[0]->patients->first_name}} {{$patient_request[0]->patients->middle_name}} {{$patient_request[0]->patients->last_name}} </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">



            <form method="post" action="{{ route('patient_requests.update', $patient_request[0]->id) }}">
            @csrf
            
            <label class="col-form-label" for="control_no"><i class="fas fa-check"></i> Control Number</label>
            <div class="input-group mb-3">
                
                <input type="text" name="control_no"  id="control_no" class="form-control" autocomplete="off" value="{{$patient_request[0]->control_no}}" >
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-hospital"></span>
                    </div>
                </div>
            </div>

            <label class="col-form-label" for="specimen_no"><i class="fas fa-check"></i> Specimen Number</label>
            <div class="input-group mb-3">
                
                <input type="text" name="specimen_no"  id="specimen_no" class="form-control" autocomplete="off" value="{{$patient_request[0]->specimen_no}}" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-hospital"></span>
                    </div>
                </div>
            </div>

            <label class="col-form-label" for="request_datetime" data-placement="top" rel="tooltip" title="Click the icon on the right side to display the calendar" data-original-title="Click the icon on the right side to display the calendar"><i class="fas fa-check"></i> Requested Date</label>
            <div class="input-group mb-3">
                <div class="input-group date" id="request_datetime" data-target-input="nearest">
                    <input type="text" value="{{date('m/d/Y H:i A', strtotime($patient_request[0]->created_at))}}" class="form-control datetimepicker-input" name="created_datetime" data-target="#request_datetime" data-placement="top" rel="tooltip" title="Click the icon on the right side to display the calendar" data-original-title="Click the icon on the right side to display the calendar" required>
                    <div class="input-group-append" data-target="#swab_datetime" data-toggle="datetimepicker">
                        <div class="input-group-text" data-placement="top" rel="tooltip" title="Click this icon to display the calendar" data-original-title="Click the icon on the right side to display the calendar"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>

            <label class="col-form-label" for="swab_datetime" data-placement="top" rel="tooltip" title="Click the icon on the right side to display the calendar" data-original-title="Click the icon on the right side to display the calendar"><i class="fas fa-check"></i> Swab Date</label>
            <div class="input-group mb-3">
                <div class="input-group date" id="swab_datetime" data-target-input="nearest">
                    <input type="text" value="{{date('m/d/Y H:i A', strtotime($patient_request[0]->swab_requested_datetime))}}" class="form-control datetimepicker-input" name="swab_requested_datetime" data-target="#swab_datetime" data-placement="top" rel="tooltip" title="Click the icon on the right side to display the calendar" data-original-title="Click the icon on the right side to display the calendar" required>
                    <div class="input-group-append" data-target="#swab_datetime" data-toggle="datetimepicker">
                        <div class="input-group-text" data-placement="top" rel="tooltip" title="Click this icon to display the calendar" data-original-title="Click the icon on the right side to display the calendar"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>

            <label class="col-form-label" for="result_availability_datetime" data-placement="top" rel="tooltip" title="Click the icon on the right side to display the calendar" data-original-title="Click the icon on the right side to display the calendar"><i class="fas fa-check"></i> Result Availability Date</label>
            <div class="input-group mb-3">
                <div class="input-group date" id="result_availability_datetime" data-target-input="nearest" autcomplete="off">
                    <input type="text" value="{{ ( $patient_request[0]->result_availability_datetime) ? date('m/d/Y H:i A', strtotime($patient_request[0]->result_availability_datetime)) : '' }}"
                     class="form-control datetimepicker-input" name="result_availability_datetime" data-target="#result_availability_datetime" data-placement="top" rel="tooltip" title="Click the icon on the right side to display the calendar" data-original-title="Click the icon on the right side to display the calendar" required>
                    <div class="input-group-append" data-target="#result_availability_datetime" data-toggle="datetimepicker">
                        <div class="input-group-text" data-placement="top" rel="tooltip" title="Click this icon to display the calendar" data-original-title="Click the icon on the right side to display the calendar"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            
            <label class="col-form-label" for="disposition"><i class="fas fa-check"></i> Disposition</label>
            <div class="input-group mb-3">
                <input type="hidden" name="patient_request_id" class="form-control" value="{{$patient_request[0]->patients->id}}" autocomplete="off">
                
                <select name="disposition_id" class="custom-select" id="dispositions">
                @foreach($dispositions as $disposition)
                    <option value="{{$disposition->id}}">{{$disposition->name}}</option>
                @endforeach
                </select>

            </div>
            
           

            <label class="col-form-label" for="status"><i class="fas fa-check"></i> Status</label>
            <div class="input-group mb-3">
                <select name="status" class="custom-select" id="status">
                    
                    <option value="1" {{ ( $patient_request[0]->hcw == 1) ? 'selected' : '' }}>Pending</option>
                    <option value="0" {{ ( $patient_request[0]->hcw == 0) ? 'selected' : '' }}>Available</option>
                
                </select>
                
            </div>

            
            <label class="col-form-label" for="user_id"><i class="fas fa-check"></i> Pathologist </label>
            <div class="input-group mb-3">
                
                <select name="user_id" class="custom-select" id="dispuser_idsitions">
                    <option>-- Select Pathologist --</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}" {{ ( $patient_request[0]->user_id == $user->id) ? 'selected' : '' }}>{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}, {{$user->prefix}}</option>
                @endforeach
                </select>

            </div>

            <label class="col-form-label" for="department_id"><i class="fas fa-check"></i> Department </label>
            <div class="input-group mb-3">


                <input list="departments" name="department_remarks" class="col-sm-12 custom-select " autocomplete="off" value="{{$patient_request[0]->departments->name}}">
                    <datalist id="departments" style="width: 100px;">
                    @foreach($departments as $department)
                        <option data-value="{{$department->id}} " >{{$department->name}}</option>
                    @endforeach
                </datalist>

            </div>


            


            <label class="col-form-label" for="soft_copy"><i class="fas fa-check"></i> Soft Copy</label>
            <div class="input-group mb-3">
                
                <select name="soft_copy" class="custom-select" id="soft_copy">
                    <option value="0" {{ ( $patient_request[0]->soft_copy == 0) ? 'selected' : '' }}>Not yet available</option>
                    <option value="1" {{ ( $patient_request[0]->soft_copy == 1) ? 'selected' : '' }}>Available</option>
                </select>

            </div>

            <label class="col-form-label" for="hcw"><i class="fas fa-check"></i> Health Care Worker</label>
            <div class="input-group mb-3">
                
                <select name="hcw" class="custom-select" id="hcw">
                
                    <option value="1" {{ ( $patient_request[0]->hcw == 1) ? 'selected' : '' }}>HCW</option>
                    <option value="0" {{ ( $patient_request[0]->hcw == 0) ? 'selected' : '' }}>Non-HCW</option>
                
                </select>
            </div>


            <label class="col-form-label" for="final_result"><i class="fas fa-check"></i> Final Result</label>
            <div class="input-group mb-3">
                <select name="final_result" class="custom-select" id="final_result">
                    <option value="0" {{ ( $patient_request[0]->final_result == 3) ? 'selected' : '' }}>PENDING</option>
                    <option value="1" {{ ( $patient_request[0]->final_result == 1) ? 'selected' : '' }}>POSITIVE</option>
                    <option value="2" {{ ( $patient_request[0]->final_result == 0) ? 'selected' : '' }}>NEGATIVE</option>
                    <option value="3" {{ ( $patient_request[0]->final_result == 2) ? 'selected' : '' }}>REJECTED</option>
                    
                </select>
            </div>

            

            
            



            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>




        </div>

        </div>
       </div>
    </section>

<script>
$(document).ready(function () {
 $('[rel="tooltip"]').tooltip({trigger: "hover"});
});
 </script>

@endsection