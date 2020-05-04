@extends('layouts.main_layout')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Patient Request</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Create Patient Request</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create Patient Requests for {{$patient->first_name}} {{$patient->middle_name}} {{$patient->last_name}} </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">



            <form method="post" action="{{ route('patient_requests.store') }}">
            @csrf
            
            <label class="col-form-label" for="specimen_no"><i class="fas fa-check"></i> Specimen Number</label>
            <div class="input-group mb-3">
                
                <input type="text" name="specimen_no"  id="specimen_no" class="form-control" autocomplete="off" value="{{$specimen_number}}" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-hospital"></span>
                    </div>
                </div>
            </div>

            <label class="col-form-label" for="control_no"><i class="fas fa-check"></i> Control Number</label>
            <div class="input-group mb-3">
                
                <input type="text" name="control_no"  id="control_no" class="form-control" autocomplete="off" >
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-hospital"></span>
                    </div>
                </div>
            </div>
            
            <label class="col-form-label" for="disposition"><i class="fas fa-check"></i> Disposition</label>
            <div class="input-group mb-3">
                <input type="hidden" name="patient_id" class="form-control" value="{{$patient->id}}" autocomplete="off">
                
                <select name="disposition_id" class="custom-select" id="dispositions">
                @foreach($dispositions as $disposition)
                    <option value="{{$disposition->id}}">{{$disposition->name}}</option>
                @endforeach
                </select>

            </div>
            

            <label class="col-form-label" for="department_id"><i class="fas fa-check"></i> Department </label>
            <div class="input-group mb-3">


                <input list="departments" name="department_remarks" class="col-sm-12 custom-select " autocomplete="off">
                    <datalist id="departments" style="width: 100px;">
                    @foreach($departments as $department)
                        <option data-value="{{$department->id}}" style="width: 100px;">{{$department->name}}</option>
                    @endforeach
                </datalist>

            </div>


            <label class="col-form-label" for="hcw"><i class="fas fa-check"></i> Health Care Worker</label>
            <div class="input-group mb-3">
                
                <select name="hcw" class="custom-select" id="hcw">
                
                    <option value="1">HCW</option>
                    <option value="0">Non-HCW</option>
                
                </select>
            </div>


            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>




        </div>

        </div>
       </div>
    </section>





@endsection