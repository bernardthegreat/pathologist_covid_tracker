@extends('layouts.request_dashboard')

@section('content')

 <!-- Content Header (Page header) -->
 <section class="content-header">
      
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

     

                  <table id="example1" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                <th>Sample No</th>
                                <th>Requested Date</th>
                                <th>Fullname</th>
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


                                        <table  class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">

                                            <tr> 
                                              <th>Age</th>
                                              <td>{{ $patient_request->patients->age }}</td>
                                            </tr>

                                            <tr> 
                                              <th>Gender</th>
                                              <td>{{ $patient_request->patients->gender }}</td>
                                            </tr>

                                            <tr> 
                                              <th>Control No.</th>
                                              <td>{{ $patient_request->control_no }}</td>
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
                                                @if($patient_request->final_result == 1)
                                                  POSITIVE
                                                @else 
                                                  NEGATIVE
                                                @endif
                                              
                                              </td>
                                            </tr>

                                            <tr> 
                                              <th>Softcopy</th>
                                              <td>
                                                {{ $patient_request->soft_copy }}
                                              
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
                                        
                                          

                                          </table>
                                          

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          <!--<button type="button" class="btn btn-primary">Save changes</button>-->
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
                                <th>Sample No</th>
                                <th>Requested Date</th>
                                <th>Fullname</th>
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
        return confirm("Do you want to release this?");
    });

    $(".expired").on("submit", function(){
        return confirm("Is this patient expired?");
    });


</script>


  <style>

  .pointer {
    cursor: pointer;
  }

  </style>



@endsection