@extends('layouts.request_dashboard')

@section('content')

 <!-- Content Header (Page header) -->
 <section class="content-header">
      
    </section>




<section class="content">
  <div class="card card collapsed-card">
      <div class="card-header" data-placement="top" rel="tooltip" title="" data-original-title="Click the toggle button to show the Hospital Tracker" >
        <h3 class="card-title" >Hospital Tracker</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-placement="top" rel="tooltip" title="" data-original-title="Toggle to show the Hospital Tracker">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3 class="count">{{$dashboard_patient_request}}</h3>
                  <p>Patient Request</p>
                </div>
                <div class="icon">
                  <i class="fa fa-microscope"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3 class="count">{{$dashboard_completed}}</h3>

                  <p>Completed</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user-check"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3 class="count">{{$dashboard_expired}}</h3>
                  <p>Expired</p>
                  
                </div>
                <div class="icon">
                  <i class="fa fa-user-times"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3 class="count">{{$dashboard_rejected}}</h3>

                  <p>Rejected</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user-slash"></i>
                </div>
              
              </div>
            </div>
            <!-- ./col -->
          </div>

          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-lightblue">
                <div class="inner">
                  <h3 class="count">{{$dashboard_patient}}</h3>

                  <p>Patients</p>
                </div>
                <div class="icon">
                  <i class="fa fa-hospital-user"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-maroon">
                <div class="inner">
                  <h3 class="count">{{$dashboard_positive}}</h3>

                  <p>Positive</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user-plus"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-olive">
                <div class="inner">
                  <h3 class="count">{{$dashboard_negative}}</h3>
                  <p>Negative</p>
                  
                </div>
                <div class="icon">
                  <i class="fa fa-user-minus"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3 class="count">{{$dashboard_pending}}</h3>

                  <p>Pending</p>
                </div>
                <div class="icon">
                  <i class="fa fa-undo"></i>
                </div>
              
              </div>
            </div>
            <!-- ./col -->
          </div>


        </div>
      </div>
    </div>
</section>



<section class="content" id="app">


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
                  <div class="card" style="height: 520px;overflow-y: auto;">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#new_request" data-toggle="tab">Pending</a></li>
                        <li class="nav-item"><a class="nav-link" href="#released" data-toggle="tab">Completed</a></li>
                        <li class="nav-item"><a class="nav-link" href="#expired" data-toggle="tab">Expired</a></li>
                        <li class="nav-item"><a class="nav-link" href="#failed" data-toggle="tab">Rejected</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    
              
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="active tab-pane" id="new_request">
                          
                            <table id="pending_table" class="table table-bordered table-striped text-center">
                              <thead>
                              <tr>
                                <th>&nbsp;</th>
                                <th>Requested Date</th>
                                <th>Control #</th>
                                <th>Specimen #
                                <th>Fullname</th>
                                <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              
                                @foreach($patient_requests_pending as $patient_request)   
                              <tr>
                                <td>
                                  @php
                                    if(isset($patient_request->swab_requested_datetime)) {
                                      $date_swab = date('m/d/Y h:i:s A', strtotime($patient_request->swab_requested_datetime));
                                    }

                                    if(isset($patient_request->result_availability_datetime)) {
                                      $result_availability = date('m/d/Y h:i:s A', strtotime($patient_request->result_availability_datetime));
                                    }
                                    

                                    if($patient_request->hcw == 1) {
                                      $hcw_val = 'HCW';
                                    } else {
                                      $hcw_val = 'NON-HCW';
                                    }

                                    if($patient_request->status == 1) {
                                      $request_status = 'AVAILABLE';
                                    } else {
                                      $request_status = 'PENDING';
                                    }

                                    if($patient_request->final_result == 0) {
                                      $final_result = 'PENDING';
                                    } elseif($patient_request->final_result == 1) {
                                      $final_result = 'POSITIVE';
                                    } elseif($patient_request->final_result == 2) {
                                      $final_result = 'NEGATIVE';
                                    } elseif($patient_request->final_result == 3) {
                                      $final_result = 'REJECTED';
                                    }

                                    if($patient_request->soft_copy == 1) {
                                      $soft_copy = 'AVAILABLE';
                                    } else {
                                      $soft_copy = 'NOT YET AVAILABLE';
                                    }
                                    
                                    if(isset($patient_request->released_datetime)) {
                                      $comp_exp_rej_datetime = 'Completed: '.date('m/d/Y h:i:s A', strtotime($patient_request->released_datetime));
                                    } elseif(isset($patient_request->expired_datetime)) {
                                      $comp_exp_rej_datetime = 'Expired: '.date('m/d/Y h:i:s A', strtotime($patient_request->expired_datetime));
                                    } elseif(isset($patient_request->failed_datetime)) {
                                      $comp_exp_rej_datetime = 'Rejected: '.date('m/d/Y h:i:s A', strtotime($patient_request->failed_datetime));
                                    }

                                    if(isset($patient_request->remarks)) {
                                      $remarks = $patient_request->remarks;
                                    }

                                    if(isset($patient_request->user_id)) {
                                      $pathologist = $patient_request->users->first_name.' '.$patient_request->users->middle_name.' '.$patient_request->users->last_name.', '.$patient_request->users->prefix;
                                    }

                                  @endphp

                                  <a class="btn btn-info btn-sm request_info_button" href="#" data-placement="top" rel="tooltip" title="" data-original-title="View Info of {{ $patient_request->patients->first_name }}"
                                   data-toggle="modal" data-target="#modal-request-info"
                                   data-hospital_number="{{$patient_request->patients->hospital_number}}"
                                   data-patient="{{$patient_request->patients->first_name}} {{$patient_request->patients->middle_name}} {{$patient_request->patients->last_name}}"
                                   data-url-patient-info="{{ route('patients.show', $patient_request->patients->id)}} " 
                                   data-patient-age="{{$patient_request->patients->age}}"
                                   data-patient-gender="{{$patient_request->patients->gender}}"
                                   data-url-edit-patient-request="{{ route('patient_requests.edit', $patient_request->id)}} "
                                   data-url-create-patient-request="/patient_requests/create/{{$patient_request->patient_id}}"
                                   data-url-view-patient-request="/patient_requests/show/{{$patient_request->patient_id}}"
                                   data-control-no="{{$patient_request->control_no}}"
                                   data-swab-date="{{ $date_swab ?? '' }}"
                                   data-specimen-no="{{$patient_request->specimen_no}}"
                                   data-hcw="{{$hcw_val}}"
                                   data-status="{{$request_status}}"
                                   data-final_result="{{$final_result}}"
                                   data-soft_copy="{{$soft_copy}}"
                                   data-result_availability="{{$result_availability ?? ''}}"
                                   data-disposition="{{ $patient_request->patient_request_dispositions->name }}"
                                   data-department="{{ $patient_request->departments->name }}"
                                   data-pathologist="{{$pathologist  ?? ''}}"
                                   data-comp_exp_rej_datetime = "{{$comp_exp_rej_datetime ?? ''}}"
                                   data-remarks = "{{$remarks ?? ''}}"
                                   data-save-data-url = "{{ route('patient_requests.save_details', $patient_request->id)}}"
                                  >
                                    <i class="fa fa-search-plus"></i>
                                  </a>
                                </td>
                                <td>
                                  {{ date('m/d/Y h:i:s A', strtotime($patient_request->swab_requested_datetime)) }}
                                </td>
                                <td>
                                  {{ $patient_request->control_no }}
                                </td>
                                <td>
                                  {{ $patient_request->specimen_no }}
                                </td>
                                <td> 
                                  
                                  {{ $patient_request->patients->first_name }} {{ $patient_request->patients->middle_name }} {{ $patient_request->patients->last_name }}
                                


                                
                                </td>
                              

                                <td>
                                  
                                @php
                                    if(isset($patient_request->swab_requested_datetime)) {
                                      $date_swab = date('m/d/Y h:i:s A', strtotime($patient_request->swab_requested_datetime));
                                    }

                                    if(isset($patient_request->result_availability_datetime)) {
                                      $result_availability = date('m/d/Y h:i:s A', strtotime($patient_request->result_availability_datetime));
                                    }
                                    

                                    if($patient_request->hcw == 1) {
                                      $hcw_val = 'HCW';
                                    } else {
                                      $hcw_val = 'NON-HCW';
                                    }

                                    if($patient_request->status == 1) {
                                      $request_status = 'AVAILABLE';
                                    } else {
                                      $request_status = 'PENDING';
                                    }

                                    if($patient_request->final_result == 0) {
                                      $final_result = 'PENDING';
                                    } elseif($patient_request->final_result == 1) {
                                      $final_result = 'POSITIVE';
                                    } elseif($patient_request->final_result == 2) {
                                      $final_result = 'NEGATIVE';
                                    } elseif($patient_request->final_result == 3) {
                                      $final_result = 'REJECTED';
                                    }

                                    if($patient_request->soft_copy == 1) {
                                      $soft_copy = 'AVAILABLE';
                                    } else {
                                      $soft_copy = 'NOT YET AVAILABLE';
                                    }
                                    
                                    if(isset($patient_request->released_datetime)) {
                                      $comp_exp_rej_datetime = 'Completed: '.date('m/d/Y h:i:s A', strtotime($patient_request->released_datetime));
                                    } elseif(isset($patient_request->expired_datetime)) {
                                      $comp_exp_rej_datetime = 'Expired: '.date('m/d/Y h:i:s A', strtotime($patient_request->expired_datetime));
                                    } elseif(isset($patient_request->failed_datetime)) {
                                      $comp_exp_rej_datetime = 'Rejected: '.date('m/d/Y h:i:s A', strtotime($patient_request->failed_datetime));
                                    }

                                    if(isset($patient_request->remarks)) {
                                      $remarks = $patient_request->remarks;
                                    }

                                    if(isset($patient_request->user_id)) {
                                      $pathologist = $patient_request->users->first_name.' '.$patient_request->users->middle_name.' '.$patient_request->users->last_name.', '.$patient_request->users->prefix;
                                    }

                                  @endphp

                                  <div class="btn-group">
                                      <button class="btn btn-success btn-sm completed_button" 
                                        type="button" data-placement="top" rel="tooltip" title="Completed" 
                                        data-original-title="Completed" 
                                        data-toggle="modal" data-target="#completed" 
                                        data-patient-completed="{{ $patient_request->patients->first_name }} "
                                        data-patient-id="{{ $patient_request->patients->id }}"
                                        data-url="{{ route('patient_requests.release', $patient_request->id) }}"

                                        data-hospital_number="{{$patient_request->patients->hospital_number}}"
                                        data-patient="{{$patient_request->patients->first_name}} {{$patient_request->patients->middle_name}} {{$patient_request->patients->last_name}}"
                                        data-url-patient-info="{{ route('patients.show', $patient_request->patients->id)}} " 
                                        data-patient-age="{{$patient_request->patients->age}}"
                                        data-patient-gender="{{$patient_request->patients->gender}}"
                                        data-url-edit-patient-request="{{ route('patient_requests.edit', $patient_request->id)}} "
                                        data-url-create-patient-request="/patient_requests/create/{{$patient_request->patient_id}}"
                                        data-url-view-patient-request="/patient_requests/show/{{$patient_request->patient_id}}"
                                        data-control-no="{{$patient_request->control_no}}"
                                        data-swab-date="{{ $date_swab ?? '' }}"
                                        data-specimen-no="{{$patient_request->specimen_no}}"
                                        data-hcw="{{$hcw_val}}"
                                        data-status="{{$request_status}}"
                                        data-final_result="{{$final_result}}"
                                        data-soft_copy="{{$soft_copy}}"
                                        data-result_availability="{{$result_availability ?? ''}}"
                                        data-disposition="{{ $patient_request->patient_request_dispositions->name }}"
                                        data-department="{{ $patient_request->departments->name }}"
                                        data-pathologist="{{$pathologist  ?? ''}}"
                                        data-comp_exp_rej_datetime = "{{$comp_exp_rej_datetime ?? ''}}"
                                        data-remarks = "{{$remarks ?? ''}}"
                                        data-save-data-url = "{{ route('patient_requests.save_details', $patient_request->id)}}"
                                        
                                      > 
                                        <i class="fa fa-user-check"></i> 
                                      </button>
                                        
                                      <button class="btn btn-danger btn-sm expired_button" 
                                        type="button" data-placement="top" rel="tooltip" title="Expired" 
                                        data-original-title="Expired" data-toggle="modal" data-target="#expired_modal" 
                                        data-url="{{ route('patient_requests.expired', $patient_request->id) }}"
                                        data-patient-expired="{{ $patient_request->patients->first_name }} " 
                                        data-patient-id="{{$patient_request->patients->id}}"

                                        data-hospital_number="{{$patient_request->patients->hospital_number}}"
                                        data-patient="{{$patient_request->patients->first_name}} {{$patient_request->patients->middle_name}} {{$patient_request->patients->last_name}}"
                                        data-url-patient-info="{{ route('patients.show', $patient_request->patients->id)}} " 
                                        data-patient-age="{{$patient_request->patients->age}}"
                                        data-patient-gender="{{$patient_request->patients->gender}}"
                                        data-url-edit-patient-request="{{ route('patient_requests.edit', $patient_request->id)}} "
                                        data-url-create-patient-request="/patient_requests/create/{{$patient_request->patient_id}}"
                                        data-url-view-patient-request="/patient_requests/show/{{$patient_request->patient_id}}"
                                        data-control-no="{{$patient_request->control_no}}"
                                        data-swab-date="{{ $date_swab ?? '' }}"
                                        data-specimen-no="{{$patient_request->specimen_no}}"
                                        data-hcw="{{$hcw_val}}"
                                        data-status="{{$request_status}}"
                                        data-final_result="{{$final_result}}"
                                        data-soft_copy="{{$soft_copy}}"
                                        data-result_availability="{{$result_availability ?? ''}}"
                                        data-disposition="{{ $patient_request->patient_request_dispositions->name }}"
                                        data-department="{{ $patient_request->departments->name }}"
                                        data-pathologist="{{$pathologist  ?? ''}}"
                                        data-comp_exp_rej_datetime = "{{$comp_exp_rej_datetime ?? ''}}"
                                        data-remarks = "{{$remarks ?? ''}}"
                                        data-save-data-url = "{{ route('patient_requests.save_details', $patient_request->id)}}"
                                        
                                      > 
                                        <i class="fa fa-user-times"></i> 
                                      </button>
                                      
                                      <button type="button" class="btn btn-secondary btn-sm rejected_button" 
                                        data-toggle="modal" data-target="#rejected" data-placement="top" 
                                        rel="tooltip" title="Rejected" data-original-title="Rejected" 
                                        data-patient-rejected="Please enter remarks for {{ $patient_request->patients->first_name }}'s Patient Request " 
                                        data-url="{{ route('patient_requests.save_remarks', $patient_request->id) }}"
                                      >
                                        <i class="fa fa-user-slash"></i>
                                      </button>


                                  </div>
                                </td>
                              </tr>

                                @endforeach
                              
                              </tbody>
                              <tfoot>
                              <tr>
                                <th>&nbsp;</th>
                                <th>Requested Date</th>
                                <th>Control #</th>
                                <th>Specimen #
                                <th>Fullname</th>
                                <th></th>
                              </tr>
                              </tfoot>
                            </table>

                            

                        </div>
                  

                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="released">
                          


                        <table id="completed_table" class="table table-bordered table-striped text-center">
                              <thead>
                              <tr>
                                <th>&nbsp;</th>
                                <th>Requested Date</th>
                                <th>Control #</th>
                                <th>Specimen #</th>
                                <th>Fullname</th>
                                <th>Completion Date</th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              
                                @foreach($patient_requests_released as $patient_request)   
                              <tr>
                                <td>
                                  @php
                                    if(isset($patient_request->swab_requested_datetime)) {
                                      $date_swab = date('m/d/Y h:i:s A', strtotime($patient_request->swab_requested_datetime));
                                    }

                                    if(isset($patient_request->result_availability_datetime)) {
                                      $result_availability = date('m/d/Y h:i:s A', strtotime($patient_request->result_availability_datetime));
                                    }
                                    

                                    if($patient_request->hcw == 1) {
                                      $hcw_val = 'HCW';
                                    } else {
                                      $hcw_val = 'NON-HCW';
                                    }

                                    if($patient_request->status == 1) {
                                      $request_status = 'AVAILABLE';
                                    } else {
                                      $request_status = 'PENDING';
                                    }

                                    if($patient_request->final_result == 0) {
                                      $final_result = 'PENDING';
                                    } elseif($patient_request->final_result == 1) {
                                      $final_result = 'POSITIVE';
                                    } elseif($patient_request->final_result == 2) {
                                      $final_result = 'NEGATIVE';
                                    } elseif($patient_request->final_result == 3) {
                                      $final_result = 'REJECTED';
                                    }

                                    if($patient_request->soft_copy == 1) {
                                      $soft_copy = 'AVAILABLE';
                                    } else {
                                      $soft_copy = 'NOT YET AVAILABLE';
                                    }
                                    
                                    if(isset($patient_request->released_datetime)) {
                                      $comp_exp_rej_datetime = 'Completed: '.date('m/d/Y h:i:s A', strtotime($patient_request->released_datetime));
                                    } elseif(isset($patient_request->expired_datetime)) {
                                      $comp_exp_rej_datetime = 'Expired: '.date('m/d/Y h:i:s A', strtotime($patient_request->expired_datetime));
                                    } elseif(isset($patient_request->failed_datetime)) {
                                      $comp_exp_rej_datetime = 'Rejected: '.date('m/d/Y h:i:s A', strtotime($patient_request->failed_datetime));
                                    }

                                    if(isset($patient_request->remarks)) {
                                      $remarks = $patient_request->remarks;
                                    }

                                    if(isset($patient_request->user_id)) {
                                      $pathologist = $patient_request->users->first_name.' '.$patient_request->users->middle_name.' '.$patient_request->users->last_name.', '.$patient_request->users->prefix;
                                    }

                                  @endphp

                                  <a class="btn btn-info btn-sm request_info_button" href="#" data-placement="top" rel="tooltip" title="" data-original-title="View Info of {{ $patient_request->patients->first_name }}"
                                   data-toggle="modal" data-target="#modal-request-info"
                                   data-hospital_number="{{$patient_request->patients->hospital_number}}"
                                   data-patient="{{$patient_request->patients->first_name}} {{$patient_request->patients->middle_name}} {{$patient_request->patients->last_name}}"
                                   data-url-patient-info="{{ route('patients.show', $patient_request->patients->id)}} " 
                                   data-patient-age="{{$patient_request->patients->age}}"
                                   data-patient-gender="{{$patient_request->patients->gender}}"
                                   data-url-edit-patient-request="{{ route('patient_requests.edit', $patient_request->id)}} "
                                   data-url-create-patient-request="/patient_requests/create/{{$patient_request->patient_id}}"
                                   data-url-view-patient-request="/patient_requests/show/{{$patient_request->patient_id}}"
                                   data-control-no="{{$patient_request->control_no}}"
                                   data-swab-date="{{ $date_swab ?? '' }}"
                                   data-specimen-no="{{$patient_request->specimen_no}}"
                                   data-hcw="{{$hcw_val}}"
                                   data-status="{{$request_status}}"
                                   data-final_result="{{$final_result}}"
                                   data-soft_copy="{{$soft_copy}}"
                                   data-result_availability="{{$result_availability ?? ''}}"
                                   data-disposition="{{ $patient_request->patient_request_dispositions->name }}"
                                   data-department="{{ $patient_request->departments->name }}"
                                   data-pathologist="{{$pathologist  ?? ''}}"
                                   data-comp_exp_rej_datetime = "{{$comp_exp_rej_datetime ?? ''}}"
                                   data-remarks = "{{$remarks ?? ''}}"
                                   data-save-data-url = "{{ route('patient_requests.save_details', $patient_request->id)}}"
                                  >
                                    <i class="fa fa-search-plus"></i>
                                  </a>
                                </td>

                                <td>
                                  {{ date('m/d/Y h:i:s A', strtotime($patient_request->swab_requested_datetime)) }}
                                </td>
                                <td>
                                  {{ $patient_request->control_no }}
                                </td>
                                <td>
                                  {{ $patient_request->specimen_no }}
                                </td>
                                <td> 
                                  
                                  {{ $patient_request->patients->first_name }} {{ $patient_request->patients->middle_name }} {{ $patient_request->patients->last_name }}
                                
                                </td>

                                <td>
                                  {{ date('m/d/Y h:i:s A', strtotime($patient_request->released_datetime)) }}
                                </td>
                              
                              </tr>


                                @endforeach
                              
                              </tbody>
                              <tfoot>
                              <tr>
                                <th>&nbsp;</th>
                                <th>Requested Date</th>
                                <th>Control #</th>
                                <th>Specimen #</th>
                                <th>Fullname</th>
                                <th>Completion Date</th>
                              </tr>
                              </tfoot>
                            </table>
        


                            


                            

                          
                        
                        
                        </div>
                        <!-- /.tab-pane -->





                        <div class="tab-pane" id="expired">
                          


                        <table id="expired_table" class="table table-bordered table-striped text-center">
                              <thead>
                              <tr>
                                <th>&nbsp;</th>
                                <th>Requested Date</th>
                                <th>Control #</th>
                                <th>Specimen #</th>
                                <th>Fullname</th>
                                <th>Expired Date</th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              
                                @foreach($patient_requests_expired as $patient_request)   
                              <tr>
                              
                              <td>
                                  @php
                                    if(isset($patient_request->swab_requested_datetime)) {
                                      $date_swab = date('m/d/Y h:i:s A', strtotime($patient_request->swab_requested_datetime));
                                    }

                                    if(isset($patient_request->result_availability_datetime)) {
                                      $result_availability = date('m/d/Y h:i:s A', strtotime($patient_request->result_availability_datetime));
                                    }
                                    

                                    if($patient_request->hcw == 1) {
                                      $hcw_val = 'HCW';
                                    } else {
                                      $hcw_val = 'NON-HCW';
                                    }

                                    if($patient_request->status == 1) {
                                      $request_status = 'AVAILABLE';
                                    } else {
                                      $request_status = 'PENDING';
                                    }

                                    if($patient_request->final_result == 0) {
                                      $final_result = 'PENDING';
                                    } elseif($patient_request->final_result == 1) {
                                      $final_result = 'POSITIVE';
                                    } elseif($patient_request->final_result == 2) {
                                      $final_result = 'NEGATIVE';
                                    } elseif($patient_request->final_result == 3) {
                                      $final_result = 'REJECTED';
                                    }

                                    if($patient_request->soft_copy == 1) {
                                      $soft_copy = 'AVAILABLE';
                                    } else {
                                      $soft_copy = 'NOT YET AVAILABLE';
                                    }
                                    
                                    if(isset($patient_request->released_datetime)) {
                                      $comp_exp_rej_datetime = 'Completed: '.date('m/d/Y h:i:s A', strtotime($patient_request->released_datetime));
                                    } elseif(isset($patient_request->expired_datetime)) {
                                      $comp_exp_rej_datetime = 'Expired: '.date('m/d/Y h:i:s A', strtotime($patient_request->expired_datetime));
                                    } elseif(isset($patient_request->failed_datetime)) {
                                      $comp_exp_rej_datetime = 'Rejected: '.date('m/d/Y h:i:s A', strtotime($patient_request->failed_datetime));
                                    }

                                    if(isset($patient_request->remarks)) {
                                      $remarks = $patient_request->remarks;
                                    }

                                    if(isset($patient_request->user_id)) {
                                      $pathologist = $patient_request->users->first_name.' '.$patient_request->users->middle_name.' '.$patient_request->users->last_name.', '.$patient_request->users->prefix;
                                    }

                                  @endphp

                                  <a class="btn btn-info btn-sm request_info_button" href="#" data-placement="top" rel="tooltip" title="" data-original-title="View Info of {{ $patient_request->patients->first_name }}"
                                   data-toggle="modal" data-target="#modal-request-info"
                                   data-hospital_number="{{$patient_request->patients->hospital_number}}"
                                   data-patient="{{$patient_request->patients->first_name}} {{$patient_request->patients->middle_name}} {{$patient_request->patients->last_name}}"
                                   data-url-patient-info="{{ route('patients.show', $patient_request->patients->id)}} " 
                                   data-patient-age="{{$patient_request->patients->age}}"
                                   data-patient-gender="{{$patient_request->patients->gender}}"
                                   data-url-edit-patient-request="{{ route('patient_requests.edit', $patient_request->id)}} "
                                   data-url-create-patient-request="/patient_requests/create/{{$patient_request->patient_id}}"
                                   data-url-view-patient-request="/patient_requests/show/{{$patient_request->patient_id}}"
                                   data-control-no="{{$patient_request->control_no}}"
                                   data-swab-date="{{ $date_swab ?? '' }}"
                                   data-specimen-no="{{$patient_request->specimen_no}}"
                                   data-hcw="{{$hcw_val}}"
                                   data-status="{{$request_status}}"
                                   data-final_result="{{$final_result}}"
                                   data-soft_copy="{{$soft_copy}}"
                                   data-result_availability="{{$result_availability ?? ''}}"
                                   data-disposition="{{ $patient_request->patient_request_dispositions->name }}"
                                   data-department="{{ $patient_request->departments->name }}"
                                   data-pathologist="{{$pathologist  ?? ''}}"
                                   data-comp_exp_rej_datetime = "{{$comp_exp_rej_datetime ?? ''}}"
                                   data-remarks = "{{$remarks ?? ''}}"
                                   data-save-data-url = "{{ route('patient_requests.save_details', $patient_request->id)}}"
                                  >
                                    <i class="fa fa-search-plus"></i>
                                  </a>
                                </td>

                                <td>
                                  {{ date('m/d/Y h:i:s A', strtotime($patient_request->swab_requested_datetime)) }}
                                </td>
                                <td>
                                  {{ $patient_request->control_no }}
                                </td>
                                <td>
                                  {{ $patient_request->specimen_no }}
                                </td>
                                <td> 
                                  
                                  {{ $patient_request->patients->first_name }} {{ $patient_request->patients->middle_name }} {{ $patient_request->patients->last_name }}
                                
                                </td>

                                <td>
                                  {{ date('m/d/Y h:i:s A', strtotime($patient_request->expired_datetime)) }}
                                </td>
                              
                              </tr>
                              
                                @endforeach
                              
                              </tbody>
                              <tfoot>
                              <tr>
                                <th> &nbsp; </td>
                                <th>Requested Date</th>
                                <th>Control #</th>
                                <th>Specimen #</th>
                                <th>Fullname</th>
                                <th>Expired Date</th>
                              </tr>
                              </tfoot>
                            </table>
        


                            
                        
                        
                        </div>
                        <!-- /.tab-pane -->


                        <div class="tab-pane" id="failed">
                          


                        <table id="rejected_table" class="table table-bordered table-striped text-center">
                              <thead>
                              <tr>
                                <th>&nbsp;</th>
                                <th>Requested Date</th>
                                <th>Control #</th>
                                <th>Specimen #</th>
                                <th>Fullname</th>
                                <th>Rejected Date</th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              
                                @foreach($patient_requests_failed as $patient_request)   
                              <tr>
                                <td>
                                  @php
                                    if(isset($patient_request->swab_requested_datetime)) {
                                      $date_swab = date('m/d/Y h:i:s A', strtotime($patient_request->swab_requested_datetime));
                                    }

                                    if(isset($patient_request->result_availability_datetime)) {
                                      $result_availability = date('m/d/Y h:i:s A', strtotime($patient_request->result_availability_datetime));
                                    }
                                    

                                    if($patient_request->hcw == 1) {
                                      $hcw_val = 'HCW';
                                    } else {
                                      $hcw_val = 'NON-HCW';
                                    }

                                    if($patient_request->status == 1) {
                                      $request_status = 'AVAILABLE';
                                    } else {
                                      $request_status = 'PENDING';
                                    }

                                    if($patient_request->final_result == 0) {
                                      $final_result = 'PENDING';
                                    } elseif($patient_request->final_result == 1) {
                                      $final_result = 'POSITIVE';
                                    } elseif($patient_request->final_result == 2) {
                                      $final_result = 'NEGATIVE';
                                    } elseif($patient_request->final_result == 3) {
                                      $final_result = 'REJECTED';
                                    }

                                    if($patient_request->soft_copy == 1) {
                                      $soft_copy = 'AVAILABLE';
                                    } else {
                                      $soft_copy = 'NOT YET AVAILABLE';
                                    }
                                    
                                    if(isset($patient_request->released_datetime)) {
                                      $comp_exp_rej_datetime = 'Completed: '.date('m/d/Y h:i:s A', strtotime($patient_request->released_datetime));
                                    } elseif(isset($patient_request->expired_datetime)) {
                                      $comp_exp_rej_datetime = 'Expired: '.date('m/d/Y h:i:s A', strtotime($patient_request->expired_datetime));
                                    } elseif(isset($patient_request->failed_datetime)) {
                                      $comp_exp_rej_datetime = 'Rejected: '.date('m/d/Y h:i:s A', strtotime($patient_request->failed_datetime));
                                    }

                                    if(isset($patient_request->remarks)) {
                                      $remarks = $patient_request->remarks;
                                    }

                                    if(isset($patient_request->user_id)) {
                                      $pathologist = $patient_request->users->first_name.' '.$patient_request->users->middle_name.' '.$patient_request->users->last_name.', '.$patient_request->users->prefix;
                                    }

                                  @endphp

                                  <a class="btn btn-info btn-sm request_info_button" href="#" data-placement="top" rel="tooltip" title="" data-original-title="View Info of {{ $patient_request->patients->first_name }}"
                                   data-toggle="modal" data-target="#modal-request-info"
                                   data-hospital_number="{{$patient_request->patients->hospital_number}}"
                                   data-patient="{{$patient_request->patients->first_name}} {{$patient_request->patients->middle_name}} {{$patient_request->patients->last_name}}"
                                   data-url-patient-info="{{ route('patients.show', $patient_request->patients->id)}} " 
                                   data-patient-age="{{$patient_request->patients->age}}"
                                   data-patient-gender="{{$patient_request->patients->gender}}"
                                   data-url-edit-patient-request="{{ route('patient_requests.edit', $patient_request->id)}} "
                                   data-url-create-patient-request="/patient_requests/create/{{$patient_request->patient_id}}"
                                   data-url-view-patient-request="/patient_requests/show/{{$patient_request->patient_id}}"
                                   data-control-no="{{$patient_request->control_no}}"
                                   data-swab-date="{{ $date_swab ?? '' }}"
                                   data-specimen-no="{{$patient_request->specimen_no}}"
                                   data-hcw="{{$hcw_val}}"
                                   data-status="{{$request_status}}"
                                   data-final_result="{{$final_result}}"
                                   data-soft_copy="{{$soft_copy}}"
                                   data-result_availability="{{$result_availability ?? ''}}"
                                   data-disposition="{{ $patient_request->patient_request_dispositions->name }}"
                                   data-department="{{ $patient_request->departments->name }}"
                                   data-pathologist="{{$pathologist  ?? ''}}"
                                   data-comp_exp_rej_datetime = "{{$comp_exp_rej_datetime ?? ''}}"
                                   data-remarks = "{{$remarks ?? ''}}"
                                   data-save-data-url = "{{ route('patient_requests.save_details', $patient_request->id)}}"
                                  >
                                    <i class="fa fa-search-plus"></i>
                                  </a>
                                </td>


                                <td>
                                  {{ date('m/d/Y h:i:s A', strtotime($patient_request->swab_requested_datetime)) }}
                                </td>
                                <td>
                                  {{ $patient_request->control_no }}
                                </td>
                                <td>
                                  {{ $patient_request->specimen_no }}
                                </td>
                                <td> 
                                  
                                  {{ $patient_request->patients->first_name }} {{ $patient_request->patients->middle_name }} {{ $patient_request->patients->last_name }}
                                
                                </td>

                                <td>
                                  {{ date('m/d/Y h:i:s A', strtotime($patient_request->failed_datetime)) }}
                                </td>
                              
                              </tr>
                              
                                @endforeach
                              
                              </tbody>
                              <tfoot>
                              <tr>
                                <th>&nbsp;</th>
                                <th>Requested Date</th>
                                <th>Control #</th>
                                <th>Specimen #</th>
                                <th>Fullname</th>
                                <th>Rejected Date</th>
                              </tr>
                              </tfoot>
                            </table>
        


                            
                        
                        
                        </div>

                        
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

<div class="modal fade" id="modal-request-info">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="col-12 modal-title text-center" id="header_modal_patient"><i class="fa fa-hospital-user"> </i> </h4>
      
      </div>
      <div class="modal-body">
            
      <div id="accordion">
              <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
              <div class="card card-info">
                <div class="card-header">
                  <h4 class="card-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsePatient" data-placement="top" rel="tooltip" title="Click to toggle" data-original-title="Click to toggle">
          
                      Patient Details 
                    </a>

                    <a class="btn btn-info btn-sm patient_info_btn" data-placement="top" rel="tooltip" title="Go to Patients Profile" 
                        href="">
                        <i class="fa fa-user-edit">
                        </i>
                    </a>
                  </h4>
                </div>

                <div id="collapsePatient" class="panel-collapse collapse in show">
                  <div class="card-body">

                    <table class="table table-bordered table-striped table-hover dataTable dtr-inline text-center" role="grid" aria-describedby="example2_info">
                      <tr> 
                        <th width="50%">Hospital #</th>
                        <td width="50%" id="info_patient_id"></td>
                      </tr>
                      <tr> 
                        <th width="50%">Age</th>
                        <td width="50%" id="info_patient_age"></td>
                      </tr>

                      <tr> 
                        <th>Gender</th>
                        <td id="info_patient_gender"></td>
                      </tr>
                    </table>


                  </div>
                </div>
              </div>


              <div class="card card-info">
                <div class="card-header">
                  <h4 class="card-title">
                  
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" data-placement="top" rel="tooltip" title="Click to toggle" data-original-title="Click to toggle">
                      Patient Request Details 
                    </a>

                    <a class="btn btn-info btn-sm edit-patient-request" data-placement="top" rel="tooltip" 
                    title="Edit Patient Request" data-original-title="Edit Patient Request" 
                    href="">
                        <i class="fa fa-user-edit">
                        </i>
                    </a>

                    <a class="btn btn-info btn-sm create-patient-request" data-placement="top" rel="tooltip" 
                    title="Create New Patient Request" data-original-title="Create New Patient Request" 
                    href="">
                        <i class="fa fa-user-plus">
                        </i>
                    </a>

                    <a class="btn btn-info btn-sm view-patient-request" data-placement="top" rel="tooltip" 
                    title="View All Patient Request" data-original-title="View All Patient Request" 
                    href="">
                        <i class="fa fa-users">
                        </i>
                    </a>

                    
                  </h4>
                </div>

                
                <div id="collapseOne" class="panel-collapse collapse in show">
                  <div class="card-body">
                    
                      <table class="table table-bordered table-striped table-hover dataTable dtr-inline text-center" role="grid" aria-describedby="example2_info">
                        <tr> 
                          <th width="50%">Control No.</th>
                          <td width="50%" id="info_control_number"></td>
                        </tr>

                        <tr> 
                          <th>Swab Date</th>
                          <td id="info_swab_date">
                            
                          </td>
                        </tr>


                        <tr> 
                          <th>Specimen No.</th>
                          <td id="info_specimen_no"></td>
                        </tr>

                        <tr> 
                          <th>HCW</th>
                          <td id="info_hcw">
                           
                          </td>
                        </tr>

                        <tr> 
                          <th>Status</th>
                          <td id="info_status"> 
                            
                          
                          </td>
                        </tr>

                        <tr> 
                          <th>Final Result</th>
                          <td id="info_final_result">
                            
                          </td>
                        </tr>

                        <tr> 
                          <th>Softcopy</th>
                          <td id="info_soft_copy">
                           
                            
                          </td>
                        </tr>
                        <tr> 
                          <th>Result Availability Date</th>
                          <td id="info_result_availability_date">
                           
                          </td>
                        </tr>

                        <tr>
                          <th>Disposition</th>
                          <td id="info_disposition">
                          
                          </td>
                        </tr>

                        <tr>
                          <th>Department</th>
                          <td id="info_department">
                          
                          </td>
                        </tr>

                        <tr>
                          <th>Pathologist</th>
                          <td id="info_pathologist">
                           
                          </td>
                        </tr>

                        <tr> 
                          <th>Completion / Expiration / Rejected Date</th>
                          <td id="info_comp_exp_rej_date">
                           
                          </td>
                        </tr>

                       
                        <tr>
                          <th>Remarks</th>
                          <td id="info_remarks"> 
                              
                          </td>
                        </tr>
                     

                      </table>                                                  

                  </div>
                </div>
              </div>
            </div>
        

      </div>
      <div class="modal-footer justify-content">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
  <!-- /.modal -->





<!-- Buttons -->


<form action="" method="post" id="completed_form">
  @csrf 
  @method('POST')
  <div class="modal fade " id="completed" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class='col-12 modal-title text-center'> Complete Patient Request of <span id="completed_header_modal_patient"> </span> </h3>
          
        </div>
        <div class="modal-body text-center">
        
 
        <div class="card-body">
          <div id="accordion">
              <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
              <div class="card card-success">
                <div class="card-header">
                  <h4 class="card-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsePatient" data-placement="top" rel="tooltip" title="Click to toggle" data-original-title="Click to toggle">
          
                      Patient Details 
                    </a>

                    <a class="btn btn-success btn-sm patient_info_btn" data-placement="top" rel="tooltip" title="Go to Patients Profile" 
                        href="">
                        <i class="fa fa-user-edit">
                        </i>
                    </a>
                  </h4>
                </div>

                <div id="collapsePatient" class="panel-collapse collapse in">
                  <div class="card-body">

                    <table class="table table-bordered table-striped table-hover dataTable dtr-inline text-center" role="grid" aria-describedby="example2_info">
                      <tr> 
                        <th width="50%">Hospital #</th>
                        <td width="50%" id="completed_hospital_number"></td>
                      </tr>
                      <tr> 
                        <th width="50%">Age</th>
                        <td width="50%" id="completed_patient_age"></td>
                      </tr>

                      <tr> 
                        <th>Gender</th>
                        <td id="completed_patient_gender"></td>
                      </tr>
                    </table>


                  </div>
                </div>
              </div>


              <div class="card card-success">
                <div class="card-header">
                  <h4 class="card-title">
                  
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" data-placement="top" rel="tooltip" title="Click to toggle" data-original-title="Click to toggle">
                      Patient Request Details 
                    </a>

                    <a class="btn btn-success btn-sm edit-patient-request" data-placement="top" rel="tooltip" 
                    title="Edit Patient Request" data-original-title="Edit Patient Request" 
                    href="">
                        <i class="fa fa-user-edit">
                        </i>
                    </a>

                    <a class="btn btn-success btn-sm create-patient-request" data-placement="top" rel="tooltip" 
                    title="Create New Patient Request" data-original-title="Create New Patient Request" 
                    href="">
                        <i class="fa fa-user-plus">
                        </i>
                    </a>

                    <a class="btn btn-success btn-sm view-patient-request" data-placement="top" rel="tooltip" 
                    title="View All Patient Request" data-original-title="View All Patient Request" 
                    href="">
                        <i class="fa fa-users">
                        </i>
                    </a>

                    
                  </h4>
                </div>

                
                <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="card-body">
                    
                      <table class="table table-bordered table-striped table-hover dataTable dtr-inline text-center" role="grid" aria-describedby="example2_info">
                        <tr> 
                          <th width="50%">Control No.</th>
                          <td width="50%" id="completed_control_number"></td>
                        </tr>

                        <tr> 
                          <th>Swab Date</th>
                          <td id="completed_swab_date">
                            
                          </td>
                        </tr>


                        <tr> 
                          <th>Specimen No.</th>
                          <td id="completed_specimen_no"></td>
                        </tr>

                        <tr> 
                          <th>HCW</th>
                          <td id="completed_hcw">
                           
                          </td>
                        </tr>

                        <tr> 
                          <th>Status</th>
                          <td id="completed_status"> 
                            
                          
                          </td>
                        </tr>

                        <tr> 
                          <th>Final Result</th>
                          <td id="completed_final_result">
                            
                          </td>
                        </tr>

                        <tr> 
                          <th>Softcopy</th>
                          <td id="completed_soft_copy">
                           
                            
                          </td>
                        </tr>
                        <tr> 
                          <th>Result Availability Date</th>
                          <td id="completed_result_availability_date">
                           
                          </td>
                        </tr>

                        <tr>
                          <th>Disposition</th>
                          <td id="completed_disposition">
                          
                          </td>
                        </tr>

                        <tr>
                          <th>Department</th>
                          <td id="completed_department">
                          
                          </td>
                        </tr>

                        <tr>
                          <th>Pathologist</th>
                          <td id="completed_pathologist">
                           
                          </td>
                        </tr>

                        <tr> 
                          <th>Completion / Expiration / Rejected Date</th>
                          <td id="completed_comp_exp_rej_date">
                           
                          </td>
                        </tr>

                       
                        <tr>
                          <th>Remarks</th>
                          <td id="completed_remarks"> 
                              
                          </td>
                        </tr>
                     

                      </table>                                                  

                  </div>
                </div>
              </div>


              
                <div class="card card-success">
                  <div class="card-header">
                    <h4 class="card-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#completed_accordion" data-placement="top" rel="tooltip" title="Click to toggle" data-original-title="Click to toggle">
            
                        For Completion 
                      </a>
                    </h4>
                  </div>

                  <div id="completed_accordion" class="panel-collapse collapse in show">
                    <div class="card-body">

                      <input type="hidden" value="" name="patient_id" id="completed_patient_id_val">
                      <div class="form-group">
                        <label for="patho_id">Pathologist</label>
                        <select name="user_id" class="custom-select text-center" id="patho_id_completed">
                            @foreach($users as $user)
                                <option value="{{$user->id}}" >{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}, {{$user->prefix}}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                      <label for="final_result">Result</label>
                        <select name="final_result" class="custom-select" id="final_result">
                            <option value="1">POSITIVE</option>
                            <option value="2">NEGATIVE</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                      <label for="soft_copy">Result Availability</label>
                        <select name="soft_copy" class="custom-select" id="completed_availability">
                            <option value="0">NOT AVAILABLE</option>
                            <option value="1">AVAILABLE</option>
                        </select>
                      </div>

                      <div id="completed_result_available">
                        <label for="result_availability_datetime">Result Availability Date</label>
                        <div class="form-group">
                          <div class="input-group date" id="result_availability_date2" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" autocomplete="off" name="result_availability_datetime" data-target="#result_availability_date2" data-placement="top" rel="tooltip" title="Click the icon on the right side to display the calendar" data-original-title="Click the icon on the right side to display the calendar">
                              <div class="input-group-append" data-target="#result_availability_date2" data-toggle="datetimepicker">
                                  <div class="input-group-text" data-placement="top" rel="tooltip" title="Click this icon to display the calendar" data-original-title="Click the icon on the right side to display the calendar"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>


          </div>
          
        </div>


          
            
                  

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Complete</button>
        </div>
      </div>
    </div>
  </div>
</form>



<form action="" method="post" id="expired_form">
@csrf 
@method('POST')
  <div class="modal fade" id="expired_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class='col-12 modal-title text-center'> Expire Patient Request of <span id="expired_header_modal_patient"> </span> </h3>
         
        </div>
        <div class="modal-body text-center">
            

            
          <div id="accordion">
              <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
              <div class="card card-danger">
                <div class="card-header">
                  <h4 class="card-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsePatient" data-placement="top" rel="tooltip" title="Click to toggle" data-original-title="Click to toggle">
          
                      Patient Details 
                    </a>

                    <a class="btn btn-danger btn-sm patient_info_btn" data-placement="top" rel="tooltip" title="Go to Patients Profile" 
                        href="">
                        <i class="fa fa-user-edit">
                        </i>
                    </a>
                  </h4>
                </div>

                <div id="collapsePatient" class="panel-collapse collapse in">
                  <div class="card-body">

                    <table class="table table-bordered table-striped table-hover dataTable dtr-inline text-center" role="grid" aria-describedby="example2_info">
                      <tr> 
                        <th width="50%">Hospital #</th>
                        <td width="50%" id="expired_hospital_number"></td>
                      </tr>
                      <tr> 
                        <th width="50%">Age</th>
                        <td width="50%" id="expired_patient_age"></td>
                      </tr>

                      <tr> 
                        <th>Gender</th>
                        <td id="expired_patient_gender"></td>
                      </tr>
                    </table>


                  </div>
                </div>
              </div>


              <div class="card card-danger">
                <div class="card-header">
                  <h4 class="card-title">
                  
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" data-placement="top" rel="tooltip" title="Click to toggle" data-original-title="Click to toggle">
                      Patient Request Details 
                    </a>

                    <a class="btn btn-danger btn-sm edit-patient-request" data-placement="top" rel="tooltip" 
                    title="Edit Patient Request" data-original-title="Edit Patient Request" 
                    href="">
                        <i class="fa fa-user-edit">
                        </i>
                    </a>

                    <a class="btn btn-danger btn-sm create-patient-request" data-placement="top" rel="tooltip" 
                    title="Create New Patient Request" data-original-title="Create New Patient Request" 
                    href="">
                        <i class="fa fa-user-plus">
                        </i>
                    </a>

                    <a class="btn btn-danger btn-sm view-patient-request" data-placement="top" rel="tooltip" 
                    title="View All Patient Request" data-original-title="View All Patient Request" 
                    href="">
                        <i class="fa fa-users">
                        </i>
                    </a>

                    
                  </h4>
                </div>

                
                <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="card-body">
                    
                      <table class="table table-bordered table-striped table-hover dataTable dtr-inline text-center" role="grid" aria-describedby="example2_info">
                        <tr> 
                          <th width="50%">Control No.</th>
                          <td width="50%" id="expired_control_number"></td>
                        </tr>

                        <tr> 
                          <th>Swab Date</th>
                          <td id="expired_swab_date">
                            
                          </td>
                        </tr>


                        <tr> 
                          <th>Specimen No.</th>
                          <td id="expired_specimen_no"></td>
                        </tr>

                        <tr> 
                          <th>HCW</th>
                          <td id="expired_hcw">
                           
                          </td>
                        </tr>

                        <tr> 
                          <th>Status</th>
                          <td id="expired_status"> 
                            
                          
                          </td>
                        </tr>

                        <tr> 
                          <th>Final Result</th>
                          <td id="expired_final_result">
                            
                          </td>
                        </tr>

                        <tr> 
                          <th>Softcopy</th>
                          <td id="expired_soft_copy">
                           
                            
                          </td>
                        </tr>
                        <tr> 
                          <th>Result Availability Date</th>
                          <td id="expired_result_availability_date">
                           
                          </td>
                        </tr>

                        <tr>
                          <th>Disposition</th>
                          <td id="expired_disposition">
                          
                          </td>
                        </tr>

                        <tr>
                          <th>Department</th>
                          <td id="expired_department">
                          
                          </td>
                        </tr>

                        <tr>
                          <th>Pathologist</th>
                          <td id="expired_pathologist">
                           
                          </td>
                        </tr>

                        <tr> 
                          <th>Completion / Expiration / Rejected Date</th>
                          <td id="expired_comp_exp_rej_date">
                           
                          </td>
                        </tr>

                       
                        <tr>
                          <th>Remarks</th>
                          <td id="expired_remarks"> 
                              
                          </td>
                        </tr>
                     

                      </table>                                                  

                  </div>
                </div>
              </div>


                <div class="card card-danger">
                  <div class="card-header">
                    <h4 class="card-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#completed_accordion" data-placement="top" rel="tooltip" title="Click to toggle" data-original-title="Click to toggle">
            
                        For Expiration 
                      </a>
                    </h4>
                  </div>

                  <div id="completed_accordion" class="panel-collapse collapse in show">
                    <div class="card-body">

                          
                        <input type="hidden" value="" name="patient_id" id="expired_patient_id_val">
                        <div class="form-group">
                          <label for="patho_id">Pathologist</label>
                          <select name="user_id" class="custom-select text-center" id="patho_id">
                              @foreach($users as $user)
                                  <option value="{{$user->id}}" >{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}, {{$user->prefix}}</option>
                              @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                        <label for="final_result_id">Result</label>
                          <select name="final_result" class="custom-select" id="final_result_id">
                              <option value="1">POSITIVE</option>
                              <option value="2">NEGATIVE</option>
                          </select>
                        </div>
                        
                        <div class="form-group">
                          <label for="soft_copy">Result Availability</label>
                          <select name="soft_copy" class="custom-select" id="expired_availability">
                              <option value="0">NOT AVAILABLE</option>
                              <option value="1">AVAILABLE</option>
                          </select>
                        </div>

                        <div id="expired_result_available">
                          <label for="result_availability_datetime">Result Availability Date</label>
                          <div class="form-group">
                            <div class="input-group date" id="result_availability_date1" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" autocomplete="off" name="result_availability_datetime" data-target="#result_availability_date1" data-placement="top" rel="tooltip" title="Click the icon on the right side to display the calendar" data-original-title="Click the icon on the right side to display the calendar">
                                <div class="input-group-append" data-target="#result_availability_date1" data-toggle="datetimepicker">
                                    <div class="input-group-text" data-placement="top" rel="tooltip" title="Click this icon to display the calendar" data-original-title="Click the icon on the right side to display the calendar"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div id="expired_datetime">
                          <label for="expiration_datetime_field">Expiration Date</label>
                          <div class="form-group">
                            <div class="input-group date" id="expiration_datetime" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" autocomplete="off" name="expiration_datetime" data-target="#expiration_datetime" data-placement="top" rel="tooltip" title="Click the icon on the right side to display the calendar" data-original-title="Click the icon on the right side to display the calendar">
                                <div class="input-group-append" data-target="#expiration_datetime" data-toggle="datetimepicker">
                                    <div class="input-group-text" data-placement="top" rel="tooltip" title="Click this icon to display the calendar" data-original-title="Click the icon on the right side to display the calendar"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Expired</button>
        </div>
      </div>
    </div>
  </div>
</form>



<form action="" method="post" id="rejected_form">
@csrf 
@method('POST')
<div class="modal fade" id="rejected" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog  modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class='col-12 modal-title text-center'> Rejection Remarks </h3>
          
        </div>
        
        <div class="modal-body">
        
          <div class="form-group">
            <textarea class="form-control" rows="3" name="remarks" id="rejected_textarea" placeholder="" required></textarea>
          </div>
        
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-secondary">Reject</button>
          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  </form>



<!-- End of Buttons -->



</section>

<script>


$(document).ready(function () {

    $('[rel="tooltip"]').tooltip({trigger: "hover"});

    $('#completed_result_available').hide(); 
    $('#expired_result_available').hide(); 
    

    $('.completed_button').click(function () {
        var url = $(this).attr('data-url');
        var patient_id = $(this).attr('data-patient-id');
        var completed_patient = $(this).attr('data-patient-completed');
        $("#patient_completed_name").html(completed_patient);
        $("#completed_patient_id_val").attr("value", patient_id);
        $("#completed_form").attr("action", url);

       
        $('#completed_availability').change(function(){

            if($('#completed_availability').val() == '1') {
                $('#completed_result_available').show(); 
            } else {
                $('#completed_result_available').hide(); 
            } 
        }); 


        var hospital_number = $(this).attr('data-hospital_number');
        var patient = $(this).attr('data-patient');
        var patient_info = $(this).attr('data-url-patient-info');
        var patient_age = $(this).attr('data-patient-age');
        var patient_gender = $(this).attr('data-patient-gender');
        var url_edit_patient_request = $(this).attr('data-url-edit-patient-request');
        var url_create_patient_request = $(this).attr('data-url-create-patient-request');
        var url_view_patient_request = $(this).attr('data-url-view-patient-request');
        var control_number = $(this).attr('data-control-no');
        var swab_date = $(this).attr('data-swab-date');
        var specimen_no = $(this).attr('data-specimen-no');
        var hcw = $(this).attr('data-hcw');
        var status = $(this).attr('data-status');
        var final_result = $(this).attr('data-final_result');
        var soft_copy = $(this).attr('data-soft_copy');
        var result_availability = $(this).attr('data-result_availability');
        var disposition = $(this).attr('data-disposition');
        var department = $(this).attr('data-department');
        var pathologist = $(this).attr('data-pathologist');
        var comp_exp_rej_datetime = $(this).attr('data-comp_exp_rej_datetime');
        var remarks = $(this).attr('data-remarks');
        var save_details_url = $(this).attr('data-save-data-url');

        
        $("#completed_hospital_number").html(hospital_number);
        $("#completed_header_modal_patient").html(patient);
        $(".patient_info_btn").attr("href", patient_info);
        $("#completed_patient_age").html(patient_age);
        $("#completed_patient_gender").html(patient_gender);
        $(".edit-patient-request").attr("href", url_edit_patient_request);
        $(".create-patient-request").attr("href", url_create_patient_request);
        $(".view-patient-request").attr("href", url_view_patient_request);
        $("#completed_control_number").html(control_number);
        $("#completed_swab_date").html(swab_date);
        $("#completed_specimen_no").html(specimen_no);
        $("#completed_hcw").html(hcw);
        $("#completed_status").html(status);
        $("#completed_final_result").html(final_result);
        $("#completed_soft_copy").html(soft_copy);
        $("#completed_result_availability_date").html(result_availability);
        $("#completed_department").html(department);
        $("#completed_disposition").html(disposition);
        $("#completed_pathologist").html(pathologist);
        $("#completed_comp_exp_rej_date").html(comp_exp_rej_datetime);
        $("#completed_remarks").html(remarks);
        
    });

    $('.expired_button').click(function () {
        var url = $(this).attr('data-url');
        var expired_patient = $(this).attr('data-patient-expired');
        var patient_id = $(this).attr('data-patient-id');
        $("#patient_expired_name").html(expired_patient);
        $("#expired_patient_id_val").attr("value", patient_id);
        console.log(expired_patient);
        $("#expired_form").attr("action", url);

        $('#expired_availability').change(function(){

            if($('#expired_availability').val() == '1') {
                $('#expired_result_available').show(); 
            } else {
                $('#expired_result_available').hide(); 
            } 
        });


        var hospital_number = $(this).attr('data-hospital_number');
        var patient = $(this).attr('data-patient');
        var patient_info = $(this).attr('data-url-patient-info');
        var patient_age = $(this).attr('data-patient-age');
        var patient_gender = $(this).attr('data-patient-gender');
        var url_edit_patient_request = $(this).attr('data-url-edit-patient-request');
        var url_create_patient_request = $(this).attr('data-url-create-patient-request');
        var url_view_patient_request = $(this).attr('data-url-view-patient-request');
        var control_number = $(this).attr('data-control-no');
        var swab_date = $(this).attr('data-swab-date');
        var specimen_no = $(this).attr('data-specimen-no');
        var hcw = $(this).attr('data-hcw');
        var status = $(this).attr('data-status');
        var final_result = $(this).attr('data-final_result');
        var soft_copy = $(this).attr('data-soft_copy');
        var result_availability = $(this).attr('data-result_availability');
        var disposition = $(this).attr('data-disposition');
        var department = $(this).attr('data-department');
        var pathologist = $(this).attr('data-pathologist');
        var comp_exp_rej_datetime = $(this).attr('data-comp_exp_rej_datetime');
        var remarks = $(this).attr('data-remarks');
        var save_details_url = $(this).attr('data-save-data-url');

        
        $("#expired_hospital_number").html(hospital_number);
        $("#expired_header_modal_patient").html(patient);
        $(".patient_info_btn").attr("href", patient_info);
        $("#expired_patient_age").html(patient_age);
        $("#expired_patient_gender").html(patient_gender);
        $(".edit-patient-request").attr("href", url_edit_patient_request);
        $(".create-patient-request").attr("href", url_create_patient_request);
        $(".view-patient-request").attr("href", url_view_patient_request);
        $("#expired_control_number").html(control_number);
        $("#expired_swab_date").html(swab_date);
        $("#expired_specimen_no").html(specimen_no);
        $("#expired_hcw").html(hcw);
        $("#expired_status").html(status);
        $("#expired_final_result").html(final_result);
        $("#expired_soft_copy").html(soft_copy);
        $("#expired_result_availability_date").html(result_availability);
        $("#expired_department").html(department);
        $("#expired_disposition").html(disposition);
        $("#expired_pathologist").html(pathologist);
        $("#expired_comp_exp_rej_date").html(comp_exp_rej_datetime);
        $("#expired_remarks").html(remarks); 
    });

    $('.rejected_button').click(function () {
        var url = $(this).attr('data-url');
        var rejected_patient = $(this).attr('data-patient-rejected');
        $("#rejected_textarea").attr("placeholder", rejected_patient);
        $("#rejected_form").attr("action", url);

    });


    $('.request_info_button').click(function () {
        var patient_id = $(this).attr('data-hospital_number');
        var patient = $(this).attr('data-patient');
        var patient_info = $(this).attr('data-url-patient-info');
        var patient_age = $(this).attr('data-patient-age');
        var patient_gender = $(this).attr('data-patient-gender');
        var url_edit_patient_request = $(this).attr('data-url-edit-patient-request');
        var url_create_patient_request = $(this).attr('data-url-create-patient-request');
        var url_view_patient_request = $(this).attr('data-url-view-patient-request');
        var control_number = $(this).attr('data-control-no');
        var swab_date = $(this).attr('data-swab-date');
        var specimen_no = $(this).attr('data-specimen-no');
        var hcw = $(this).attr('data-hcw');
        var status = $(this).attr('data-status');
        var final_result = $(this).attr('data-final_result');
        var soft_copy = $(this).attr('data-soft_copy');
        var result_availability = $(this).attr('data-result_availability');
        var disposition = $(this).attr('data-disposition');
        var department = $(this).attr('data-department');
        var pathologist = $(this).attr('data-pathologist');
        var comp_exp_rej_datetime = $(this).attr('data-comp_exp_rej_datetime');
        var remarks = $(this).attr('data-remarks');
        var save_details_url = $(this).attr('data-save-data-url');

        
        $("#info_patient_id").html(patient_id);
        $("#info_header_modal_patient").html(patient);
        $(".patient_info_btn").attr("href", patient_info);
        $("#header_modal_patient").html(patient);
        $("#info_patient_age").html(patient_age);
        $("#info_patient_gender").html(patient_gender);
        $(".edit-patient-request").attr("href", url_edit_patient_request);
        $(".create-patient-request").attr("href", url_create_patient_request);
        $(".view-patient-request").attr("href", url_view_patient_request);
        $("#info_control_number").html(control_number);
        $("#info_swab_date").html(swab_date);
        $("#info_specimen_no").html(specimen_no);
        $("#info_hcw").html(hcw);
        $("#info_status").html(status);
        $("#info_final_result").html(final_result);
        $("#info_soft_copy").html(soft_copy);
        $("#info_result_availability_date").html(result_availability);
        $("#info_department").html(department);
        $("#info_disposition").html(disposition);
        $("#info_pathologist").html(pathologist);
        $("#info_comp_exp_rej_date").html(comp_exp_rej_datetime);
        $("#info_remarks").html(remarks);
        

    });


    
});

    </script>



@endsection