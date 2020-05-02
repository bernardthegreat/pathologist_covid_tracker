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

        <div class="container-fluid">
        

        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-orange elevation-1"><i class="fa fa-user-plus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Cases</span>
                <span id="totalCases" class="info-box-number count"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-shield-virus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Today's Cases</span>
                <span id="todayCases" class="info-box-number count"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-maroon elevation-1"><i class="fa fa-virus-slash"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Today's Death</span>
                <span id="todayDeaths" class="info-box-number count"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-purple elevation-1"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Tested</span>
                <span id="totaltests" class="info-box-number count"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>












              <div class="col-md-12">
                  <div class="card" style="height: 520px;overflow-y: auto;">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#new_request" data-toggle="tab">Pending</a></li>
                        <li class="nav-item"><a class="nav-link" href="#released" data-toggle="tab">Completed</a></li>
                        <li class="nav-item"><a class="nav-link" href="#expired" data-toggle="tab">Expired</a></li>
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
                                <th>Pathologist</th>
                                <th></th>
                                <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              
                                @foreach($patient_requests_pending as $patient_request)   
                              <tr>
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


                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">

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
                                <td> 
                                  {{ $patient_request->users->first_name }} {{ $patient_request->users->middle_name }} {{ $patient_request->users->last_name }} {{ $patient_request->users->prefix }}
                                </td>
                              

                                <td>
                                   
                                    <form class="release" action="{{ route('patient_requests.release', $patient_request->id)}}" method="post">
                                      @csrf
                                      
                                      
                                        <button class="btn btn-success btn-sm" type="submit"> <i class="fa fa-check">
                                        </i> Complete</button>
                                    </form>

                                    
                                </td>
                                <td>

                                <form class="expired" action="{{ route('patient_requests.expired', $patient_request->id)}}" method="post">
                                      @csrf
                                      
                                      
                                        <button class="btn btn-danger btn-sm" type="submit"> <i class="fa fa-times">
                                        </i> Expired</button>
                                    </form>

                                  </td>
                              </tr>




                              



                                @endforeach
                              
                              </tbody>
                              <tfoot>
                              <tr>
                                <th>Requested Date</th>
                                <th>Fullname</th>
                                <th>Pathologist</th>
                                <th></th>
                                <th></th>
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
                                <th>Completion Date</th>
                                <th>Fullname</th>
                                <th>Pathologist</th>
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
                                  <a class="btn btn-primary btn-sm" href="#" data-placement="top" rel="tooltip" title="" data-original-title="View Info of {{ $patient_request->patients->first_name }}" data-toggle="modal" data-target="#modal-released-{{$patient_request->id}}">
                                    <i class="fa fa-search-plus"></i>
                                  </a>
                                  {{ $patient_request->patients->first_name }} {{ $patient_request->patients->middle_name }} {{ $patient_request->patients->last_name }}
                                

                                  <div class="modal fade" id="modal-released-{{$patient_request->id}}">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title"> {{ $patient_request->patients->first_name }} {{ $patient_request->patients->middle_name }} {{ $patient_request->patients->last_name }}</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">


                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">

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
                                <td> 
                                {{ $patient_request->users->first_name }} {{ $patient_request->users->middle_name }} {{ $patient_request->users->last_name }} {{ $patient_request->users->prefix }}
                                </td>
                              </tr>


                                @endforeach
                              
                              </tbody>
                              <tfoot>
                              <tr>
                                <th>Requested Date</th>
                                <th>Released Date</th>
                                <th>Fullname</th>
                                <th>Pathologist</th>
                              </tr>
                              </tfoot>
                            </table>
        


                            


                            

                          
                        
                        
                        </div>
                        <!-- /.tab-pane -->





                        <div class="tab-pane" id="expired">
                          


                        <table id="example4" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                <th>Requested Date</th>
                                <th>Expired Date</th>
                                <th>Fullname</th>
                                <th>Pathologist</th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              
                                @foreach($patient_requests_expired as $patient_request)   
                              <tr>
                                <td>
                                  {{ date('m/d/Y h:i:s A', strtotime($patient_request->created_at)) }}
                                </td>
                                <td>
                                  {{ date('m/d/Y h:i:s A', strtotime($patient_request->expired_datetime)) }}
                                </td>
                                <td> 
                                  <a class="btn btn-primary btn-sm" href="#" data-placement="top" rel="tooltip" title="" data-original-title="View Info of {{ $patient_request->patients->first_name }}" data-toggle="modal" data-target="#modal-expired-{{$patient_request->id}}">
                                    <i class="fa fa-search-plus"></i>
                                  </a>
                                  {{ $patient_request->patients->first_name }} {{ $patient_request->patients->middle_name }} {{ $patient_request->patients->last_name }}
                                
                                  
                                  
                                  <div class="modal fade" id="modal-expired-{{$patient_request->id}}">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title"> {{ $patient_request->patients->first_name }} {{ $patient_request->patients->middle_name }} {{ $patient_request->patients->last_name }}</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">


                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">

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
                                <td> 
                                {{ $patient_request->users->first_name }} {{ $patient_request->users->middle_name }} {{ $patient_request->users->last_name }} {{ $patient_request->users->prefix }}
                                </td>
                              </tr>
                              
                                @endforeach
                              
                              </tbody>
                              <tfoot>
                              <tr>
                                <th>Requested Date</th>
                                <th>Expired Date</th>
                                <th>Fullname</th>
                                <th>Pathologist</th>
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




    

$( document ).ready(function() {
 function fetchdata(){
 var api_url = 'https://coronavirus-19-api.herokuapp.com/countries/philippines'


   $.ajax({
       url: api_url,
       contentType: "application/json",
       dataType: 'json',
       success: function(result){
           
           totalCases = result.cases;
           activeCases = result.active;
           recovered = result.recovered;
           deaths	= result.deaths;
           
           
           critical = result.critical;
           todayCases = result.todayCases;
           todayDeaths = result.todayDeaths;
           totaltests = result.totalTests;
           
           
           $("#totalCases").html(totalCases);
           $("#activeCases").html(activeCases);
           $("#recovered").html(recovered);
           $("#deaths").html(deaths);
           
           
           $("#critical").html(critical);
           $("#todayCases").html(todayCases);
           $("#todayDeaths").html(todayDeaths);
           $("#totaltests").html(totaltests);
           
           
           $('.count').each(function () {
               $(this).prop('Counter',0).animate({
                   Counter: $(this).html()
               }, {
                   duration: 4000,
                   easing: 'swing',
                   step: function (now) {
                       $(this).text(Math.ceil(now));
                   }
               });
           });
           
           
           
           
          
       }
   });
}
 

    setInterval(fetchdata,3000);
 
});

  </script>

  <style>

  .pointer {
    cursor: pointer;
  }

  </style>



@endsection