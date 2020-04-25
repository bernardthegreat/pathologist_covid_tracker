@extends('layouts.main_layout')

@section('content')


    <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
          @foreach($result as $patient_info)   
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                    Hospital #: {{$patient_info->hospital_number}}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
                      <h4>{{$patient_info->first_name}} {{$patient_info->middle_name}} {{$patient_info->last_name}}</h4>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-hospital"></i></span> Department:</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Status #: POSNEG</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="show/{{$patient_info->id}}" class="btn btn-sm bg-teal">
                      <i class="fas fa-user"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-document"></i> Create request
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
    </div>

    
       
    
@endsection