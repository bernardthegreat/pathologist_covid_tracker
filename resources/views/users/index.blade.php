@extends('layouts.main_layout')

@section('content')


 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1>
            <button type="button" class="btn btn-block btn-primary btn-flat"  data-toggle="modal" data-target="#modal-default">
            
            <i class="fa fa-plus"> </i> &nbsp;&nbsp;&nbsp;Add Pathologist</button>
               
            </h1>


            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Pathologist</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            

                        <form method="post" action="{{ route('users.store') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name" autocomplete="off">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-stethoscope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" name="middle_name" class="form-control" placeholder="Middle Name" autocomplete="off">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-stethoscope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name" autocomplete="off">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-stethoscope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" name="prefix" class="form-control" placeholder="Prefix" autocomplete="off">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-stethoscope"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

          </div>
          <div class="col-sm-9">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Pathologists</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
<!-- Default box -->
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Pathologists</h3>

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
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Prefix</th>
                        <th ></th>
                        <th ></th>
                    </tr>
                </thead>
                <tbody>
                 
                 
                  @foreach($users as $pathologist)   
                <tr>
                  <td> {{$pathologist->first_name}} </td>
                  <td> {{$pathologist->middle_name}} </td>
                  <td> {{$pathologist->last_name}} </td>
                  <td> {{$pathologist->prefix}} </td>
                  <td> 
                      <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $pathologist->id)}} ">
                          <i class="fa fa-user">
                          </i>
                          View
                      </a>
                  </td>
                  <td>
                      <form class="delete" action="{{ route('users.destroy', $pathologist->id)}}" method="post">
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
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Prefix</th>
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
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this?");
    });
</script>

@endsection