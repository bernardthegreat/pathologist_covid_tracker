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
              <li class="breadcrumb-item active">Dispositions</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">

<!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Dispositions</h3>

                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body" style="display: block;">



            <div class="col-md-12">
                <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#edit_info" data-toggle="tab">Edit Information</a></li>
                    <li class="nav-item"><a class="nav-link" href="#census" data-toggle="tab">Census</a></li>
                    </ul>
                </div><!-- /.card-header -->
                
                
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="edit_info">

                                <form role="form" method="post" action="{{ route('dispositions.update', $dispositions->id ) }}">

                                    <div class="card-body">
                                        
                                        <div class="form-group">
                                            @csrf
                                            @method('PATCH')
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{$dispositions->name}}" placeholder="Name">
                                        </div>
                                        
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>

                            </div>
                        <!-- /.tab-pane -->
                        
                        
                        <div class="tab-pane" id="census">
                            
                            
                            <div>
                            <!-- /.tab-pane -->
                                    Census per Disposition
                            <!-- /.tab-pane -->
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                    
                    
                    



                </div>
            </div>





            @endsection