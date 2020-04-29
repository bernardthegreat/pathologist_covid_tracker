@extends('layouts.main_layout')

@section('content')


 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Analytics</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Analytics</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">

<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Patient Analytics</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('analytics.patient_analytics_get') }}">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Start Date</label>
                  <input type="date" class="form-control" name="start_date"> 
                </div>
               
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>End Date</label>
                  <input type="date" class="form-control" name="end_date"> 
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>

         


    </div>

    <div class="card-footer">
        <div class="form-group">
            <input type="submit" class="form-control btn btn-primary">
        </div>
        </form>
    </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->


<div class="card">
    <div class="card-header">
        

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <a href="{{route ('analytics.patient_analytics_print')}}"> Print
        <i class="fa fa-print"></i></a>
        <table>
        <tr>
        <td> Patient </td>
        <tr>
        @foreach($patient_census as $patient)  
        <tr>
            <td> {{$patient->first_name}} </td>
        </tr>
        @endforeach
        </table>

    </div>

  <!-- /.card-body -->
</div>



</section>
<!-- /.content -->

<script>


</script>

@endsection
