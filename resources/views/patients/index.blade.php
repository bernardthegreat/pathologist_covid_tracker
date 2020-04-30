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
              <li class="breadcrumb-item"><a href="/">Home</a></li>
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
          

 

          <table id="example4" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Hospital #</th>
                  <th>Fullname</th>
                  <th ></th>
                  <th ></th>
                </tr>
                </thead>
                <tbody>
                 
                 
                  @foreach($patients as $patient)   
                <tr>
                  <td> {{$patient->hospital_number}} </td>
                  <td>  
                  <a class="btn btn-primary btn-sm" href="/patient_requests/create/{{$patient->id}}" data-placement="top" rel="tooltip" title="Create Request">
                    <i class="fa fa-plus-circle"></i>
                  </a>
                  {{$patient->first_name}} {{$patient->middle_name}} {{$patient->last_name}} </td>
                  


                      

                  <td> 
                      <a class="btn btn-primary btn-sm" href="patients/show/{{$patient->id}}">
                          <i class="fa fa-user">
                          </i>
                          View
                      </a>
                  </td>
                  <td>
                    
                     <form class="delete" action="{{ route('patients.destroy', $patient->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        
                          <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash">
                          </i> Delete</button>
                      </form>
                  
                  </td>
                </tr>
                  @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Hospital #</th>
                  <th>Full Name</th>
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

    <script>

      $(document).ready(function(){
          $('[rel="tooltip"]').tooltip({trigger: "hover"});
      });

      $(".delete").on("submit", function(){
          return confirm("Do you want to delete this?");
      });

    </script>
  


@endsection


