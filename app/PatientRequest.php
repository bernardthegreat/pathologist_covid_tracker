<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientRequest extends Model
{
    //
    public function patients()
    {
        return $this->belongsTo('App\Patient', 'patient_id');
    }

    public function departments()
    {
        return $this->belongsTo('App\Patient', 'department_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Patient', 'user_id');
    }

    public function patient_request_dispositions()
    {
        return $this->belongsTo('App\Patient', 'disposition_id');
    }
}
