<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable = ['hospital_number','first_name','middle_name', 'last_name'];
    //
    public function post()
    {
        return $this->hasMany('App\PatientRequest', 'patient_id');
    }
}
