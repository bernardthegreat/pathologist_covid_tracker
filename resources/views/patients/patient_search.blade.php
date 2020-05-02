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
                <span class="info-box-number">
                    Gender: {{$patient_info->age}}
                    <br>
                    Age: {{$patient_info->age}}
                    
                    <br>
                </span>

                <a href="show/{{$patient_info->id}}" class="btn btn-sm bg-teal" data-placement="top" rel="tooltip" title="View {{$patient_info->first_name}}'s Info">
                  <i class="fas fa-user"></i>
                </a>
                <a href="/patient_requests/show/{{$patient_info->id}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" rel="tooltip" title="View all request of {{$patient_info->first_name}}">
                  <i class="fas fa-search"></i>
                </a>
                <a href="/patient_requests/create/{{$patient_info->id}}" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" rel="tooltip" title="Create Request for {{$patient_info->first_name}}">
                  <i class="fas fa-document"></i> Create request
                </a>


              </div>
              <!-- /.info-box-content -->
            </div>

    </div>


  




@endforeach
</div>


</section>

<script>

$(document).ready(function(){
          $('[rel="tooltip"]').tooltip({trigger: "hover"});
      });

</script>
    
       
    
@endsection