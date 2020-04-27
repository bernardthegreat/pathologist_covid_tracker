@extends('layouts.main_layout')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Pathologist</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('img/avatar.png')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$users->first_name}} {{$users->middle_name}} {{$users->last_name}}, {{$users->prefix}}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Swab Tests</b> <a class="float-right">1,322</a>
                  </li>
                </ul>

                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#history" data-toggle="tab">History</a></li>
                  <li class="nav-item"><a class="nav-link" href="#edit_info" data-toggle="tab">Edit Information</a></li>
                </ul>
              </div><!-- /.card-header -->
              
			  
			  <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="history">
                   
                        Patient request history
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  
                  
                  <div class="tab-pane" id="edit_info">
                    
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                      </div><br />
                    @endif

                    <form role="form" method="post" action="{{ route('users.update', $users->id ) }}">

                      <div class="card-body">
                        
                        <div class="form-group">
                          @csrf
                          @method('PATCH')
                          <label for="exampleInputEmail1">First Name</label>
                          <input type="text" class="form-control" name="first_name" id="" value="{{$users->first_name}}" placeholder="First Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Middle Name</label>
                          <input type="text" class="form-control" name="middle_name" id="" value="{{$users->middle_name}}" placeholder="Middle Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Last Name</label>
                          <input type="text" class="form-control"  name="last_name"  id="" value="{{$users->last_name}}" placeholder="Last Name">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Prefix</label>
                          <input type="text" class="form-control"  name="prefix"  id="" value="{{$users->prefix}}" placeholder="Prefix">
                        </div>
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
            <!-- /.card -->





            @endsection