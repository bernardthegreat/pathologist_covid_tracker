<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientRequestDisposition extends Model
{
    //

    protected $attributes = [
        'name' => 'Disposition',
    ];

    public function patient_requests()
    {
        return $this->hasMany('App\PatientRequest', 'department_id');
    }
}
