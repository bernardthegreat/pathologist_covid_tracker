@extends('layouts.main_layout')

@section('content')

 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Register Patient</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Register Patient</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
<div class="card">
    <div class="card-body register-card-body">
  

        @if(session()->get('error'))
  

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session()->get('error') }} 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br />


        @endif

        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}  
          </div><br />
        @endif

        
      <form method="post" action="{{ route('patients.store') }}">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="hospital_number" class="form-control" placeholder="Hospital #">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="text" name="first_name" class="form-control" placeholder="First Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" name="middle_name" class="form-control" placeholder="Middle Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" name="last_name" class="form-control" placeholder="Last Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</section>

  @endsection