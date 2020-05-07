@extends('layouts.request_dashboard')

@section('content')

 <!-- Content Header (Page header) -->
 <section class="content-header">
      
    </section>

<section class="content">


<div class="card">
        <div class="card-header">
          <h3 class="card-title">Patient Requests of {{ $patient_requests[0]->patients->first_name }} {{ $patient_requests[0]->patients->middle_name }} {{ $patient_requests[0]->patients->last_name }}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">

     

                  <table id="pending_table" class="table table-bordered table-striped text-center">
                              <thead>
                              <tr>
                                <th>&nbsp;</th>
                                <th>Sample No</th>
                                <th>Control No</th>
                                <th>Requested Date</th>
                                <th>Fullname</th>
                                <th>Result</th>
                                <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              
                                @foreach($patient_requests as $patient_request)   
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

                                  <a class="btn btn-primary btn-sm request_info_button" href="#" data-placement="top" rel="tooltip" title="" data-original-title="View Info of {{ $patient_request->patients->first_name }}"
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
                                    {{ $patient_request->specimen_no }}
                                </td>
                                <td>
                                    {{ $patient_request->control_no }}
                                </td>
                                <td>
                                  {{ date('m/d/Y h:i:s A', strtotime($patient_request->created_at)) }}
                                </td>
                                <td> 
                                  
                                  {{ $patient_request->patients->first_name }} {{ $patient_request->patients->middle_name }} {{ $patient_request->patients->last_name }}
                                
                                </td>

                                <td>
                                    @if(isset($patient_request->final_result))
                                      @if($patient_request->final_result == 0)
                                          PENDING
                                      @elseif($patient_request->final_result == 1)
                                          POSITIVE
                                      @elseif($patient_request->final_result == 2)
                                          NEGATIVE
                                      @elseif($patient_request->final_result == 3)
                                          REJECTED
                                      @endif
                                    @endif
                                </td>
                                
                                <td>
                                  <div class="btn-group">
                                    <a class="btn btn-warning btn-sm" 
                                    data-placement="top" rel="tooltip" 
                                    title="Edit Patient Request of {{$patient_request->patients->first_name}}" 
                                    data-original-title="Edit Patient Request of {{$patient_request->patients->first_name}}" 
                                    href="{{ route('patient_requests.edit', $patient_request->id)}} "
                                    >
                                      <i class="fa fa-user-edit"></i>
                                    </a>

                                  @if($patient_request->released_datetime == '' && $patient_request->expired_datetime == '' && $patient_request->failed_datetime == '')
                                      <button class="btn btn-success btn-sm completed_button" 
                                        type="button" data-placement="top" rel="tooltip" title="Completed" 
                                        data-original-title="Completed" 
                                        data-toggle="modal" data-target="#completed" 
                                        data-patient-completed="{{ $patient_request->patients->first_name }} "
                                        data-url="{{ route('patient_requests.release', $patient_request->id) }}"
                                      > 
                                        <i class="fa fa-user-check"></i> 
                                      </button>
                                        
                                      <button class="btn btn-danger btn-sm expired_button" 
                                        type="button" data-placement="top" rel="tooltip" title="Expired" 
                                        data-original-title="Expired" data-toggle="modal" data-target="#expired_modal" 
                                        data-url="{{ route('patient_requests.expired', $patient_request->id) }}"
                                        data-patient-expired="{{ $patient_request->patients->first_name }} " 
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

                                  @else
                                    @if(!is_null($patient_request->released_datetime))

                                      <button class="btn btn-success btn-sm disabled" 
                                        type="button" data-placement="top" rel="tooltip" 
                                        title="Already Completed on {{ date('m/d/Y h:i:s A', strtotime($patient_request->released_datetime)) }}" 
                                        data-original-title="Already Completed on {{ date('m/d/Y h:i:s A', strtotime($patient_request->released_datetime)) }}"> 
                                        <i class="fa fa-user-check"></i> 
                                      </button>
                                        
                                      <button class="btn btn-danger btn-sm expired_button disabled" 
                                        type="button" data-placement="top" rel="tooltip"
                                        title="Already Completed on {{ date('m/d/Y h:i:s A', strtotime($patient_request->released_datetime)) }}" 
                                        data-original-title="Already Completed on {{ date('m/d/Y h:i:s A', strtotime($patient_request->released_datetime)) }}" 
                                      > 
                                        <i class="fa fa-user-times"></i> 
                                      </button>
                                      
                                      <button type="button" class="btn btn-secondary btn-sm disabled" 
                                        data-placement="top" rel="tooltip" 
                                        title="Already Completed on {{ date('m/d/Y h:i:s A', strtotime($patient_request->released_datetime)) }}" 
                                        data-original-title="Already Completed on {{ date('m/d/Y h:i:s A', strtotime($patient_request->released_datetime)) }}" 
                                      >
                                        <i class="fa fa-user-slash"></i>
                                      </button>
                                    @elseif(!is_null($patient_request->expired_datetime))
                                      <button class="btn btn-success btn-sm disabled" 
                                        type="button" data-placement="top" rel="tooltip" 
                                        title="Already Expired on {{ date('m/d/Y h:i:s A', strtotime($patient_request->expired_datetime)) }}" 
                                        data-original-title="Already Expired on {{ date('m/d/Y h:i:s A', strtotime($patient_request->expired_datetime)) }}"> 
                                        <i class="fa fa-user-check"></i> 
                                      </button>
                                        
                                      <button class="btn btn-danger btn-sm disabled" 
                                        type="button" data-placement="top" rel="tooltip"
                                        title="Already Expired on {{ date('m/d/Y h:i:s A', strtotime($patient_request->expired_datetime)) }}" 
                                        data-original-title="Already Expired on {{ date('m/d/Y h:i:s A', strtotime($patient_request->expired_datetime)) }}" 
                                      > 
                                        <i class="fa fa-user-times"></i> 
                                      </button>
                                      
                                      <button type="button" class="btn btn-secondary btn-sm disabled" 
                                        data-placement="top" rel="tooltip" 
                                        title="Already Expired on {{ date('m/d/Y h:i:s A', strtotime($patient_request->expired_datetime)) }}" 
                                        data-original-title="Already Expired on {{ date('m/d/Y h:i:s A', strtotime($patient_request->expired_datetime)) }}" 
                                      >
                                        <i class="fa fa-user-slash"></i>
                                      </button>
                                    @elseif(!is_null($patient_request->failed_datetime))
                                      
                                      <button class="btn btn-success btn-sm disabled" 
                                        type="button" data-placement="top" rel="tooltip" 
                                        title="Already Rejected on {{ date('m/d/Y h:i:s A', strtotime($patient_request->failed_datetime)) }}" 
                                        data-original-title="Already Rejected on {{ date('m/d/Y h:i:s A', strtotime($patient_request->failed_datetime)) }}"> 
                                        <i class="fa fa-user-check"></i> 
                                      </button>
                                        
                                      <button class="btn btn-danger btn-sm disabled" 
                                        type="button" data-placement="top" rel="tooltip"
                                        title="Already Rejected on {{ date('m/d/Y h:i:s A', strtotime($patient_request->failed_datetime)) }}" 
                                        data-original-title="Already Rejected on {{ date('m/d/Y h:i:s A', strtotime($patient_request->failed_datetime)) }}" 
                                      > 
                                        <i class="fa fa-user-times"></i> 
                                      </button>
                                      
                                      <button type="button" class="btn btn-secondary btn-sm disabled" 
                                        data-placement="top" rel="tooltip" 
                                        title="Already Rejected on {{ date('m/d/Y h:i:s A', strtotime($patient_request->failed_datetime)) }}" 
                                        data-original-title="Already Rejected on {{ date('m/d/Y h:i:s A', strtotime($patient_request->failed_datetime)) }}" 
                                      >
                                        <i class="fa fa-user-slash"></i>
                                      </button>

                                    @endif
                                  @endif

                                  </div>
                                    
                                </td>
                              
                              </tr>




                              



                                @endforeach
                              
                              </tbody>
                              <tfoot>
                              <tr>
                                <th>&nbsp;</th>
                                <th>Sample No</th>
                                <th>Control No</th>
                                <th>Requested Date</th>
                                <th>Fullname</th>
                                <th>Result</th>
                                <th></th>
                              </tr>
                              </tfoot>
                            </table>

                            
              

        </div>
</div>




<div class="modal fade" id="modal-request-info">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="col-12 modal-title text-center" id="header_modal_patient"><i class="fa fa-hospital-user"> </i> </h4>
        
      </div>
      <div class="modal-body">
    
        <div class="card-body">
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
                        <td width="50%" id="patient_id"></td>
                      </tr>
                      <tr> 
                        <th width="50%">Age</th>
                        <td width="50%" id="patient_age"></td>
                      </tr>

                      <tr> 
                        <th>Gender</th>
                        <td id="patient_gender"></td>
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


                    
                  </h4>
                </div>

                
                <div id="collapseOne" class="panel-collapse collapse in show">
                  <div class="card-body">
                    
                      <table class="table table-bordered table-striped table-hover dataTable dtr-inline text-center" role="grid" aria-describedby="example2_info">
                        <tr> 
                          <th width="50%">Control No.</th>
                          <td width="50%" id="control_number"></td>
                        </tr>

                        <tr> 
                          <th>Swab Date</th>
                          <td id="swab_date">
                            
                          </td>
                        </tr>


                        <tr> 
                          <th>Specimen No.</th>
                          <td id="specimen_no"></td>
                        </tr>

                        <tr> 
                          <th>HCW</th>
                          <td id="hcw">
                           
                          </td>
                        </tr>

                        <tr> 
                          <th>Status</th>
                          <td id="status"> 
                            
                          
                          </td>
                        </tr>

                        <tr> 
                          <th>Final Result</th>
                          <td id="final_result">
                            
                          </td>
                        </tr>

                        <tr> 
                          <th>Softcopy</th>
                          <td id="soft_copy">
                           
                            
                          </td>
                        </tr>
                        <tr> 
                          <th>Result Availability Date</th>
                          <td id="result_availability_date">
                           
                          </td>
                        </tr>

                        <tr>
                          <th>Disposition</th>
                          <td id="disposition">
                          
                          </td>
                        </tr>

                        <tr>
                          <th>Department</th>
                          <td id="department">
                          
                          </td>
                        </tr>

                        <tr>
                          <th>Pathologist</th>
                          <td id="pathologist">
                           
                          </td>
                        </tr>

                        <tr> 
                          <th>Completion / Expiration / Rejected Date</th>
                          <td id="comp_exp_rej_date">
                           
                          </td>
                        </tr>

                       
                        <tr>
                          <th>Remarks</th>
                          <td id="remarks"> 
                              
                          </td>
                        </tr>
                     

                      </table>                                                  

                  </div>
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


<form action="" method="post" id="expired_form">
@csrf 
@method('POST')
  <div class="modal fade" id="expired_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class='col-12 modal-title text-center'> Expire </h3>
         
        </div>
        <div class="modal-body text-center">
          Are you sure you want to expire Patient Request of  
          <span id="patient_expired_name">
          
          </span> ?

          <br>
          <br>
            <div class="form-group">
              <label for="patho_id">Pathologist</label>
              <select name="user_id" class="custom-select text-center" id="patho_id">
                  @foreach($users as $user)
                      <option value="{{$user->id}}" >{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}, {{$user->prefix}}</option>
                  @endforeach
              </select>
            </div>

            <div class="form-group">
            <label for="final_result">Final Result</label>
              <select name="final_result" class="custom-select" id="final_result">
                  <option value="1">POSITIVE</option>
                  <option value="2">NEGATIVE</option>
              </select>
            </div>
            
            <label for="result_availability_datetime">Result Availability Date</label>
            <div class="form-group">
                <input type='date' name="result_date" class="form-control" id="result_availability_datetime" required />
                <input type='time' name="result_time" class="form-control" required />
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

<form action="" method="post" id="completed_form">
  @csrf 
  @method('POST')
  <div class="modal fade " id="completed" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class='col-12 modal-title text-center'> Complete </h3>
          
        </div>
        <div class="modal-body text-center">
          Are you sure you want to complete Patient Request of  
          <span id="patient_completed_name">
          
          </span> ?
          <br>
          <br>
            <div class="form-group">
              <label for="patho_id">Pathologist</label>
              <select name="user_id" class="custom-select text-center" id="patho_id">
                  @foreach($users as $user)
                      <option value="{{$user->id}}" >{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}, {{$user->prefix}}</option>
                  @endforeach
              </select>
            </div>

            <div class="form-group">
            <label for="final_result">Final Result</label>
              <select name="final_result" class="custom-select" id="final_result">
                  <option value="1">POSITIVE</option>
                  <option value="2">NEGATIVE</option>
              </select>
            </div>
            
            <label for="result_availability_datetime">Result Availability Date</label>
            <div class="form-group">
                <input type='date' name="result_date" class="form-control" id="result_availability_datetime" required />
                <input type='time' name="result_time" class="form-control" required />
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

  $('.completed_button').click(function () {
      var url = $(this).attr('data-url');
      var completed_patient = $(this).attr('data-patient-completed');
      $("#patient_completed_name").html(completed_patient);
      $("#completed_form").attr("action", url);
  });

  $('.expired_button').click(function () {
      var url = $(this).attr('data-url');
      var expired_patient = $(this).attr('data-patient-expired');
      $("#patient_expired_name").html(expired_patient);
      console.log(expired_patient);
      $("#expired_form").attr("action", url);
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

      
      $("#patient_id").html(patient_id);
      $("#header_modal_patient").html(patient);
      $(".patient_info_btn").attr("href", patient_info);
      $("#header_modal_patient").html(patient);
      $("#patient_age").html(patient_age);
      $("#patient_gender").html(patient_gender);
      $(".edit-patient-request").attr("href", url_edit_patient_request);
      $(".create-patient-request").attr("href", url_create_patient_request);
      $(".view-patient-request").attr("href", url_view_patient_request);
      $("#control_number").html(control_number);
      $("#swab_date").html(swab_date);
      $("#specimen_no").html(specimen_no);
      $("#hcw").html(hcw);
      $("#status").html(status);
      $("#final_result").html(final_result);
      $("#soft_copy").html(soft_copy);
      $("#result_availability_date").html(result_availability);
      $("#department").html(department);
      $("#disposition").html(disposition);
      $("#pathologist").html(pathologist);
      $("#comp_exp_rej_date").html(comp_exp_rej_datetime);
      $("#remarks").html(remarks);
      $("#save_details").attr("href", save_details_url);
      

  });
});



</script>



@endsection