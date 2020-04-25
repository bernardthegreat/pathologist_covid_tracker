<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $fillable = ['name','description'];
    
    public function patient_requests()
    {
        return $this->hasMany('App\PatientRequest', 'department_id');
    }
}
