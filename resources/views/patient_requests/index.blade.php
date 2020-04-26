@extends('layouts.main_layout')

@section('content')

 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            

          </div>
          <div class="col-sm-9">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Patient Requests</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
<!-- Default box -->
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
                    {{ $patient_request->patients->first_name }} {{ $patient_request->patients->middle_name }} {{ $patient_request->patients->last_name }}
                   </td>
                  <td>  
                    {{ $patient_request->users->first_name }} {{ $patient_request->users->middle_name }} {{ $patient_request->users->last_name }}, {{ $patient_request->users->prefix }}
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

    </section>
    <!-- /.content -->

@endsection