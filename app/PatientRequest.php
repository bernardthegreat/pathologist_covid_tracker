<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientRequest extends Model
{
    //

    protected $fillable = [
        'patient_id',
        'disposition_id',
        'hcw', 
        'status',
        'final_result',
        'soft_copy',
        'user_id',
        'department_id',
        'expired_datetime',
        'requested_date',
        'requested_time'
    ];
   


    public function patients()
    {
        return $this->belongsTo('App\Patient', 'patient_id');
    }
    
    public function departments()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function patient_request_dispositions()
    {
        return $this->belongsTo('App\PatientRequestDisposition', 'disposition_id');
    }
}
