<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientRequest extends Model
{
    //
    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patient_id');
    }
}
