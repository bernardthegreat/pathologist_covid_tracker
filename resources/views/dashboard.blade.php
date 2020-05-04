@extends('layouts.main_layout')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">PH Covid19 Live Tracker</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
<section class="content" id="app">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-orange elevation-1"><i class="fa fa-user-plus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Cases</span>
                <span id="cases" class="info-box-number count"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-viruses"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Active Cases</span>
                <span id="active" class="info-box-number count"></span>
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
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-hand-holding-heart "></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Recoveries</span>
                <span id="recovered" class="info-box-number count">

                </span>
                
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-gray-dark elevation-1"><i class="fa fa-hand-holding-medical"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Deaths</span>
                <span id="deaths" class="info-box-number count">
                  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-heartbeat"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Critical</span>
                <span id="critical" class="info-box-number count">
                    
                </span>
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
                <span id="todayDeaths" class="info-box-number count">

                </span>
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
                <span id="totalTests" class="info-box-number count"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->



     


      </div>
</section>


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark">Hospital Tracker </h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>




    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $patients }}</h3>

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
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $requests }}</h3>

                <p>Patient Requests</p>
              </div>
              <div class="icon">
                <i class="fa fa-book-medical"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $discharged }}</h3>
                <p>Discharged</p>
                
              </div>
              <div class="icon">
                <i class="fa fa-briefcase-medical"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $expired }}</h3>

                <p>Expired</p>
              </div>
              <div class="icon">
                <i class="fa fa-skull-crossbones"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
  </section>




 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Other Information</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">

              <div class="card">
            <div class="card-header">
              <h3 class="card-title">Recent Patient Requests</h3>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">




            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date Requested</th>
                  <th>Fullname</th>
                  <th>Pathologist</th>
                  <th >Departments</th>
                  <th >Disposition</th>
                </tr>
                </thead>
                <tbody>
                 
                 
                  @foreach($patient_requests as $patient_request)   
                <tr>
                  <td>
                    {{ date('m/d/Y h:i:s A', strtotime($patient_request->created_at)) }}
                  </td>
                  <td> 
                    {{ $patient_request->patients->first_name }} {{ $patient_request->patients->middle_name }} {{ $patient_request->patients->last_name }}
                   </td>
                  <td>  
                  @if(isset($patient_request->user_id))
                    {{ $patient_request->users->first_name }} {{ $patient_request->users->middle_name }} {{ $patient_request->users->last_name }}, {{ $patient_request->users->prefix }}
                  @endif
                  </td>
                  <td> 
                     {{ $patient_request->departments->name }}
                  </td>
                  <td>
                    {{ $patient_request->patient_request_dispositions->name }}
                  
                  </td>
                </tr>
                  @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Date Requested</th>
                  <th>Fullname</th>
                  <th>Pathologist</th>
                  <th >Departments</th>
                  <th >Disposition</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->


  


<script type="text/javascript">


$( document ).ready(function() {
 


const url = "https://coronavirus-19-api.herokuapp.com/countries/philippines";

const vm = new Vue({
        el: '#app',
        data: {
          results: []
        },
        mounted() {


          this.interval = setInterval(() => {
		        axios.get(url).then(response => { 
		        this.results = response.data;
            
            console.log(this.results);

            cases = this.results.cases;
            active = this.results.active;
            recovered = this.results.recovered;
            deaths = this.results.deaths;
            critical = this.results.critical;
            todayCases = this.results.todayCases;
            todayDeaths = this.results.todayDeaths;
            totalTests = this.results.totalTests;

            $('#cases').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: cases 
                }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });


            $('#active').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: active 
                }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });

            $('#recovered').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: recovered 
                }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });

            $('#deaths').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: deaths 
                }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });

            $('#critical').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: critical 
                }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });

            $('#todayCases').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: todayCases 
                }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });

            $('#todayDeaths').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: todayDeaths 
                }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });

            $('#totalTests').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: totalTests 
                }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
		        /* do something */
		    	});
		    }, 3000 );

          	
        }

      });




      const new_url = "https://coronavirus-ph-api.herokuapp.com/total";

      const vm_new = new Vue({
              el: '#app',
              data: {
                covid_results: []
              },
              mounted() {


                  this.interval = setInterval(() => {
                  axios.get(new_url).then(response => { 
                  this.covid_results = response.data;
                  
                  console.log(this.covid_results);

                  recoveries_today = this.covid_results.data.recoveries_today;
                  admitted = this.covid_results.data.admitted;
                  fatality_rate = this.covid_results.data.fatality_rate;
                  recovery_rate = this.covid_results.data.recovery_rate;

                  

                  $('#recoveries_today').each(function () {
                      $(this).prop('Counter',0).animate({
                          Counter: recoveries_today 
                      }, {
                          duration: 4000,
                          easing: 'swing',
                          step: function (now) {
                              $(this).text(Math.ceil(now));
                          }
                      });
                  });


                  $('#admitted').each(function () {
                      $(this).prop('Counter',0).animate({
                          Counter: admitted 
                      }, {
                          duration: 4000,
                          easing: 'swing',
                          step: function (now) {
                              $(this).text(Math.ceil(now));
                          }
                      });
                  });

                  $('#fatality_rate').each(function () {
                      $(this).prop('Counter',0).animate({
                          Counter: fatality_rate 
                      }, {
                          duration: 4000,
                          easing: 'swing',
                          step: function (now) {
                              $(this).text(Math.ceil(now));
                          }
                      });
                  });

                  $('#recovery_rate').each(function () {
                      $(this).prop('Counter',0).animate({
                          Counter: recovery_rate 
                      }, {
                          duration: 4000,
                          easing: 'swing',
                          step: function (now) {
                              $(this).text(Math.ceil(now));
                          }
                      });
                  });
                  /* do something */
                });
              }, 3000 );

                  
              }

      });
 




 
});



</script>

@endsection