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

     

                  <table id="example1" class="table table-bordered table-striped text-center">
                              <thead>
                              <tr>
                                <th>Sample No</th>
                                <th>Control No</th>
                                <th>Requested Date</th>
                                <th>Fullname</th>
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
                                    {{ $patient_request->control_no }}
                                </td>
                                <td>
                                  {{ date('m/d/Y h:i:s A', strtotime($patient_request->created_at)) }}
                                </td>
                                <td> 
                                  <a class="btn btn-primary btn-sm" href="#" data-placement="top" rel="tooltip" title="" data-original-title="View Info of {{ $patient_request->patients->first_name }}" data-toggle="modal" data-target="#modal-pending-{{$patient_request->id}}">
                                    <i class="fa fa-search-plus"></i>
                                  </a>
                                  {{ $patient_request->patients->first_name }} {{ $patient_request->patients->middle_name }} {{ $patient_request->patients->last_name }}
                                


                                  <div class="modal fade" id="modal-pending-{{$patient_request->id}}">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title"> {{ $patient_request->patients->first_name }} {{ $patient_request->patients->middle_name }} {{ $patient_request->patients->last_name }}</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">


                                        <!-- /.card-header -->
                                        <div class="card-body">
                                          <div id="accordion">
                                            <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                                            <div class="card card-primary">
                                              <div class="card-header">
                                                <h4 class="card-title">
                                                
                                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapsePatient" data-placement="top" rel="tooltip" title="Click to toggle" data-original-title="Click to toggle">
                                       
                                                    Patient Details 
                                                  </a>

                                                  <a class="btn btn-primary btn-sm" data-placement="top" rel="tooltip" title="Go to {{$patient_request->patients->first_name}}'s Profile" data-original-title="Go to {{$patient_request->patients->first_name}}'s Profile" href="{{ route('patients.show', $patient_request->patients->id)}} ">
                                                      <i class="fa fa-user-edit">
                                                      </i>
                                                  </a>

                                                  
                                                </h4>
                                              </div>
                                              <div id="collapsePatient" class="panel-collapse collapse in show">
                                                <div class="card-body">

                                                  <table class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                                    

                                                    <tr> 
                                                      <th>Age</th>
                                                      <td>{{ $patient_request->patients->age }}</td>
                                                    </tr>

                                                    <tr> 
                                                      <th>Gender</th>
                                                      <td>{{ $patient_request->patients->gender }}</td>
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

                                                  <a class="btn btn-info btn-sm" data-placement="top" rel="tooltip" title="Edit Patient Request" data-original-title="Edit Patient Request" href="{{ route('patient_requests.edit', $patient_request->id)}} ">
                                                      <i class="fa fa-user-edit">
                                                      </i>
                                                  </a>

                                                  
                                                </h4>
                                              </div>
                                              <div id="collapseOne" class="panel-collapse collapse in show">
                                                <div class="card-body">
                                                  
                                                    <table class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                                     

                                                      <tr> 
                                                        <th>Control No.</th>
                                                        <td>{{ $patient_request->control_no }}</td>
                                                      </tr>

                                                      <tr> 
                                                        <th>Swab Date</th>
                                                        <td>
                                                          @if(isset($patient_request->swab_requested_datetime))
                                                            {{ date('m/d/Y h:i:s A', strtotime($patient_request->swab_requested_datetime)) }}
                                                          @endif
                                                        </td>
                                                      </tr>


                                                      <tr> 
                                                        <th>Specimen No.</th>
                                                        <td>{{ $patient_request->specimen_no }}</td>
                                                      </tr>

                                                      <tr> 
                                                        <th>HCW</th>
                                                        <td>
                                                          @if($patient_request->hcw == 1)
                                                            HCW
                                                          @else 
                                                            NON-HCW
                                                          @endif
                                                        
                                                        </td>
                                                      </tr>

                                                      <tr> 
                                                        <th>Status</th>
                                                        <td>
                                                          {{ $patient_request->status }}
                                                        
                                                        </td>
                                                      </tr>

                                                      <tr> 
                                                        <th>Final Result</th>
                                                        <td>
                                                          @if($patient_request->final_result == 0)
                                                            PENDING
                                                          @elseif($patient_request->final_result == 1)
                                                            POSITIVE
                                                          @elseif($patient_request->final_result == 2)
                                                            NEGATIVE
                                                          @elseif($patient_request->final_result == 3)
                                                            REJECTED
                                                          @endif
                                                        
                                                        </td>
                                                      </tr>

                                                      <tr> 
                                                        <th>Softcopy</th>
                                                        <td>
                                                          @if($patient_request->soft_copy == 1)
                                                            AVAILABLE
                                                          @else 
                                                            NOT YET AVAILABLE
                                                          @endif
                                                          
                                                        </td>
                                                      </tr>

                                                      

                                                      <tr> 
                                                        <th>Result Availability Date</th>
                                                        <td>
                                                          @if(isset($patient_request->result_availability_datetime))
                                                            {{ date('m/d/Y h:i:s A', strtotime($patient_request->result_availability_datetime)) }}
                                                          @endif
                                                        </td>
                                                      </tr>

                                                      <tr>
                                                        <th>Disposition</th>
                                                        <td>{{ $patient_request->patient_request_dispositions->name }}</td>
                                                      </tr>

                                                      <tr>
                                                        <th>Department</th>
                                                        <td>{{ $patient_request->departments->name }}</td>
                                                      </tr>

                                                      <tr>
                                                        <th>Pathologist</th>
                                                        <td>
                                                          @if($patient_request->user_id)
                                                            {{ $patient_request->users->first_name }} {{ $patient_request->users->middle_name }} {{ $patient_request->users->last_name }}, {{ $patient_request->users->prefix }}
                                                          @endif
                                                        </td>
                                                      </tr>

                                                      <tr> 
                                                        <th>Completion / Expiration / Rejection Date</th>
                                                        <td>
                                                          @if(isset($patient_request->released_datetime))
                                                            Completed: {{ date('m/d/Y h:i:s A', strtotime($patient_request->released_datetime)) }}
                                                          @elseif(isset($patient_request->expired_datetime))
                                                            Expired: {{ date('m/d/Y h:i:s A', strtotime($patient_request->expired_datetime)) }}
                                                          @elseif(isset($patient_request->expired_datetime))
                                                            Rejected: {{ date('m/d/Y h:i:s A', strtotime($patient_request->failed_datetime)) }}
                                                          @endif
                                                        </td>
                                                      </tr>

                                                      @if($patient_request->remarks)
                                                      <tr>
                                                        <th>Remarks</th>
                                                        <td>
                                                          
                                                            {{ $patient_request->remarks }} 

                                                        </td>
                                                      </tr>
                                                      @endif

                                                    </table>                                                  

                                                </div>
                                              </div>
                                            </div>
                                            <div class="card card-success">
                                              <div class="card-header">
                                                <h4 class="card-title">
                                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" data-placement="top" rel="tooltip" title="Click to toggle" data-original-title="Click to toggle">
                                                    Edit Patient Request
                                                  </a>
                                                </h4>
                                              </div>
                                              <div id="collapseThree" class="panel-collapse collapse show">
                                                <div class="card-body">

                                                <form class="confirm_save" action="{{ route('patient_requests.save_details', $patient_request->id)}}" method="post">
                                                @csrf 
                                                <table class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                                  <tr>
                                                    <th> 
                                                        Swab Request Date <br>
                                                        <span style="font-weight:normal; font-style:italic;">
                                                        @if(!is_null($patient_request->swab_requested_datetime))
                                                          Current value: {{ date('m/d/Y h:i:s A', strtotime($patient_request->swab_requested_datetime)) }}
                                                        @endif
                                                        </span>
                                                    </th>
                                                    <td> 
                                                      
                                                      <div class="form-group">
                                                          <input type='date' name="swab_date" class="form-control" />
                                                          <input type='time' name="swab_time" class="form-control" />
                                                      </div>
                                                    
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                    <th> Result Availability Date <br>
                                                        <span style="font-weight:normal; font-style:italic;">
                                                          @if(!is_null($patient_request->result_availability_datetime))
                                                            Current value: {{ date('m/d/Y h:i:s A', strtotime($patient_request->result_availability_datetime)) }}
                                                          @endif
                                                        </span>
                                                    </th>
                                                    <td> 
                                                      
                                                      <div class="form-group">
                                                          <input type='date' name="result_date" class="form-control" />
                                                          <input type='time' name="result_time" class="form-control" />
                                                      </div>

                                                    </td>
                                                  </tr>


                                                  <tr>
                                                    <th>Final Result
                                                     </th>
                                                    <td>
                                                      <div class="form-group">
                                                        <select name="final_result" class="custom-select" id="final_result">
                                                            <option value="0" {{ ( $patient_request->final_result == 0) ? 'selected' : '' }}>PENDING</option>
                                                            <option value="1" {{ ( $patient_request->final_result == 1) ? 'selected' : '' }}>POSITIVE</option>
                                                            <option value="2" {{ ( $patient_request->final_result == 2) ? 'selected' : '' }}>NEGATIVE</option>
                                                            <option value="3" {{ ( $patient_request->final_result == 3) ? 'selected' : '' }}>REJECTED</option>
                                                            
                                                        </select>
                                                      </div>
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                      <th> &nbsp; </th>
                                                      <td> 
                                                        <div class="btn-group">
                                                          <button  class="btn btn-primary" name="save_only" value="save_only" type="submit" data-placement="top" rel="tooltip" title="Save" data-original-title="Save"><i class="fa fa-save"></i></button>
                                                          
                                                          
                                                          @if($patient_request->released_datetime == '' && $patient_request->expired_datetime == '' && $patient_request->failed_datetime == '')
                                                          <button  class="btn btn-success" name="save_and_release" value="save_and_release" type="submit" data-placement="top" rel="tooltip" title="Save and Complete" data-original-title="Save and Complete"><i class="fa fa-user-check"></i></button>
                                                         
                                                          
                                                          </form>
                                                              <form class="expired" action="{{ route('patient_requests.expired', $patient_request->id)}}" method="post">
                                                                @csrf
                                                                <button class="btn btn-danger" type="submit" data-placement="top" rel="tooltip" title="Expired" data-original-title="Expired"><i class="fa fa-user-times"></i></button>
                                                              </form>
                                                            


                                                            <button type="button" class="btn btn-secondary " data-toggle="modal" data-target="#modal-sm-reject-{{$patient_request->id}}" data-placement="top" rel="tooltip" title="Rejected" data-original-title="N/A"><i class="fa fa-user-slash"></i></button>
                                                          </div>
                                                            <div class="modal fade" id="modal-sm-reject-{{$patient_request->id}}">
                                                                  <div class="modal-dialog modal-sm">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <h4 class="modal-title">Rejection Remarks</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                          <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                      </div>
                                                                      <form  action="{{ route('patient_requests.save_remarks', $patient_request->id)}}" method="post">
                                                                        @csrf
                                                                      <div class="modal-body">
                                                                      
                                                                        <div class="form-group">
                                                                          <textarea class="form-control" rows="3" name="remarks" placeholder="Please enter remarks" required></textarea>
                                                                        </div>
                                                                      
                                                                      </div>
                                                                      <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                                        </form>
                                                                      </div>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                  </div>
                                                                  <!-- /.modal-dialog -->
                                                                </div>
                                                                <!-- /.modal -->

                                                          @else 

                                                            @if(!is_null($patient_request->released_datetime))
                                                            <button  class="btn btn-success disabled" type="button" data-placement="top" rel="tooltip" title="Already Released" data-original-title="Save and Complete"><i class="fa fa-user-check"></i></button>
                                                            </form>
                                                                <form class="expired" action="{{ route('patient_requests.expired', $patient_request->id)}}" method="post">
                                                                  @csrf
                                                                  <button class="btn btn-danger disabled" type="button" data-placement="top" rel="tooltip" title="Already Released" data-original-title="Expired"><i class="fa fa-user-times"></i></button>
                                                                </form>
                                                                <button type="button" class="btn btn-secondary disabled" data-placement="top" rel="tooltip" title="Already Released" data-original-title="N/A"><i class="fa fa-user-slash"></i></button>
                                                              </div>
                                                            
                                                            @elseif(!is_null($patient_request->expired_datetime))
                                                            <button  class="btn btn-success disabled" type="button" data-placement="top" rel="tooltip" title="Already Expired" data-original-title="Save and Complete"><i class="fa fa-user-check"></i></button>
                                                            </form>
                                                                <form class="expired" action="{{ route('patient_requests.expired', $patient_request->id)}}" method="post">
                                                                  @csrf
                                                                  <button class="btn btn-danger disabled" type="button" data-placement="top" rel="tooltip" title="Already Expired" data-original-title="Expired"><i class="fa fa-user-times"></i></button>
                                                                </form>
                                                                <button type="button" class="btn btn-secondary disabled" data-placement="top" rel="tooltip" title="Already Expired" data-original-title="N/A"><i class="fa fa-user-slash"></i></button>
                                                              </div>

                                                            @elseif(!is_null($patient_request->failed_datetime))
                                                            <button  class="btn btn-success disabled" type="button" data-placement="top" rel="tooltip" title="Already Rejected" data-original-title="Save and Complete"><i class="fa fa-user-check"></i></button>
                                                            </form>
                                                                <form class="expired" action="{{ route('patient_requests.expired', $patient_request->id)}}" method="post">
                                                                  @csrf
                                                                  <button class="btn btn-danger disabled" type="button" data-placement="top" rel="tooltip" title="Already Rejected" data-original-title="Expired"><i class="fa fa-user-times"></i></button>
                                                                </form>
                                                                <button type="button" class="btn btn-secondary disabled" data-placement="top" rel="tooltip" title="Already Rejected" data-original-title="N/A"><i class="fa fa-user-slash"></i></button>
                                                              </div>
                                                            @endif

                                                          @endif

                                                      
                                                      </td>

                                               
                                                  </tr>

                                                  
                                              

                                                </table>

                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                          

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
                                
                                
                                <td>
                                <div class="btn-group">
                                <a class="btn btn-warning btn-sm" data-placement="top" rel="tooltip" title="Edit Patient Request" data-original-title="Edit Patient Request" href="{{ route('patient_requests.edit', $patient_request->id)}} ">
                                                      <i class="fa fa-user-edit">
                                                      </i>
                                                  </a>
                                  @if($patient_request->released_datetime == '' && $patient_request->expired_datetime == '' && $patient_request->failed_datetime == '')
                                    
                                      <form class="release" action="{{ route('patient_requests.patient_release', $patient_request->id)}}" method="post">
                                        @csrf
                                        <button class="btn btn-success btn-sm" type="submit" data-placement="top" rel="tooltip" title="Complete" data-original-title="Complete"><i class="fa fa-user-check"></i></button>
                                      </form>
                                      <form class="expired" action="{{ route('patient_requests.patient_expired', $patient_request->id)}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit" data-placement="top" rel="tooltip" title="Expired" data-original-title="Expired"><i class="fa fa-user-times"></i></button>
                                      </form>

                                      <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-sm-{{$patient_request->id}}" data-placement="top" rel="tooltip" title="Rejected" data-original-title="N/A"><i class="fa fa-user-slash"></i></button>

                                      <div class="modal fade" id="modal-sm-{{$patient_request->id}}">
                                            <div class="modal-dialog modal-sm">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Rejection Remarks</h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <form  action="{{ route('patient_requests.save_remarks', $patient_request->id)}}" method="post">
                                                  @csrf
                                                <div class="modal-body">
                                                
                                                  <div class="form-group">
                                                    <textarea class="form-control" rows="3" name="remarks" placeholder="Please enter remarks" required></textarea>
                                                  </div>
                                                
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  <button type="submit" class="btn btn-primary">Save</button>
                                                  </form>
                                                </div>
                                              </div>
                                              <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                          </div>
                                          <!-- /.modal -->
                                    
                                
                                  
                                  @else
                                    

                                    <div class="btn-group">
                                      @if(!is_null($patient_request->released_datetime))
                                        <form class="" action="{{ route('patient_requests.release', $patient_request->id)}}" method="post">
                                          @csrf
                                          <button class="btn btn-success btn-sm disabled" type="button" data-placement="top" rel="tooltip" title="Already Completed" data-original-title="Already Completed"><i class="fa fa-user-check"></i></button>
                                        </form>
                                        <form class="" action="{{ route('patient_requests.expired', $patient_request->id)}}" method="post">
                                          @csrf
                                          <button class="btn btn-danger btn-sm disabled" type="button" data-placement="top" rel="tooltip" title="Already Completed" data-original-title="Already Completed"><i class="fa fa-user-times"></i></button>
                                        </form>
                                        <button type="button" class="btn btn-secondary btn-sm disabled"  data-placement="top" rel="tooltip" title="Already Completed" data-original-title="N/A"><i class="fa fa-user-slash"></i></button>

                                      @elseif(!is_null($patient_request->expired_datetime))
                                        <form class="" action="{{ route('patient_requests.release', $patient_request->id)}}" method="post">
                                          @csrf
                                          <button class="btn btn-success btn-sm disabled" type="button" data-placement="top" rel="tooltip" title="Already Expired" data-original-title="Already Expired"><i class="fa fa-user-check"></i></button>
                                        </form>
                                        <form class="" action="{{ route('patient_requests.expired', $patient_request->id)}}" method="post">
                                          @csrf
                                          <button class="btn btn-danger btn-sm disabled" type="button" data-placement="top" rel="tooltip" title="Already Expired" data-original-title="Already Expired"><i class="fa fa-user-times"></i></button>
                                        </form>

                                        <button type="button" class="btn btn-secondary btn-sm disabled"  data-placement="top" rel="tooltip" title="Already Expired" data-original-title="N/A"><i class="fa fa-user-slash"></i></button>
                                      
                                      @elseif(!is_null($patient_request->failed_datetime))

                                        <form class="" action="{{ route('patient_requests.release', $patient_request->id)}}" method="post">
                                          @csrf
                                          <button class="btn btn-success btn-sm disabled" type="button" data-placement="top" rel="tooltip" title="Already Rejected" data-original-title="Already Expired"><i class="fa fa-user-check"></i></button>
                                        </form>
                                        <form class="" action="{{ route('patient_requests.expired', $patient_request->id)}}" method="post">
                                          @csrf
                                          <button class="btn btn-danger btn-sm disabled" type="button" data-placement="top" rel="tooltip" title="Already Rejected" data-original-title="Already Expired"><i class="fa fa-user-times"></i></button>
                                        </form>

                                        <button type="button" class="btn btn-secondary btn-sm disabled"  data-placement="top" rel="tooltip" title="Already Rejected" data-original-title="N/A"><i class="fa fa-user-slash"></i></button>
                                      
                                      
                                      @endif
                                    </div>
                                  
                                    
                                  @endif

                                  </div>
                                </td>
                              
                              </tr>




                              



                                @endforeach
                              
                              </tbody>
                              <tfoot>
                              <tr>
                                <th>Sample No</th>
                                <th>Control No</th>
                                <th>Requested Date</th>
                                <th>Fullname</th>
                                <th></th>
                              </tr>
                              </tfoot>
                            </table>

                            
              

        </div>
</div>



</section>
  <script>

    $(document).ready(function(){
        $('[rel="tooltip"]').tooltip({trigger: "hover"});
    });

    $(".release").on("submit", function(){
          return confirm("Do you want to tag this as completed?");
      });

    $(".expired").on("submit", function(){
        return confirm("Do you want to tag this as expired?");
    });

    $(".confirm_save").on("submit", function(){
        return confirm("Do you want to reject this request save remarks?");
    });


</script>


  <style>

  .pointer {
    cursor: pointer;
  }

  </style>



@endsection