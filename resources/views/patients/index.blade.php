@extends('layouts.main_layout')

@section('content')


 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Patients</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Patients</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Patients</h3>

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
                  <th>Hospital #</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th ></th>
                  <th ></th>
                </tr>
                </thead>
                <tbody>
                 
                 
                  @foreach($patients as $patient)   
                <tr>
                  <td> {{$patient->hospital_number}} </td>
                  <td> {{$patient->first_name}} </td>
                  <td> {{$patient->middle_name}} </td>
                  <td> {{$patient->last_name}} </td>
                  <td> 
                      <a class="btn btn-primary btn-sm" href="patients/show/{{$patient->id}}">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a>
                  </td>
                  <td>
                    
                      <a class="btn btn-danger btn-sm" href="patients/destroy/{{$patient->id}}">
                          <i class="fas fa-trash">
                          </i>
                          Delete
                      </a> 
                  
                  </td>
                </tr>
                  @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Hospital #</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th ></th>
                  <th ></th>
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