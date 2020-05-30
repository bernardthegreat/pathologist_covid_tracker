<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable = [
        'hospital_number',
        'first_name',
        'middle_name', 
        'last_name',
        'age',
        'gender',
        'latest_result',
        'latest_disposition'
    ];
    //
    public function patient_requests()
    {
        return $this->hasMany('App\PatientRequest', 'patient_id');
    }

}
