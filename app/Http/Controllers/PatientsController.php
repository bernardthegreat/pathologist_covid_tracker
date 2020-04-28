<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\PatientRequestDisposition;
use App\Department;
use App\User;
use App\PatientRequest;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients = Patient::all()->where('active', 1);

        $dispositions = PatientRequestDisposition::all()->where('active', 1);

        $departments = Department::all()->where('active', 1);

        $users = User::all()->where('active', 1);

        return view('patients/index', compact('patients','dispositions','departments','users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('patients/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $patient_Exists = Patient::where('hospital_number', '=', $request->hospital_number)->first();

        if ($patient_Exists === null) {
            // User Not Found Your Stuffs Goes Here..
         
            $validatedData = $request->validate([
                'hospital_number' => 'required|max:255',
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'middle_name' => 'max:255',
            ]);
            $show = Patient::create($validatedData);
                    
    
            return redirect('/patients')->with('success', 'Patient is successfully saved');
        } else {
            return redirect('/patients/create')->with('error', 'Hospital # already exists');
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $patient = Patient::findOrFail($id);

        $patient_requests = PatientRequest::with([ 
            'departments', 
            'users', 
            'patient_request_dispositions'
        ])->where('patient_id', $id)->get();

        $positive = PatientRequest::where('patient_id','=',$id)->where('final_result','=',1)->count();
        $negative = PatientRequest::where('patient_id','=',$id)->where('final_result','=',0)->count();
        return view('patients/patient_profile', compact('patient', 'patient_requests', 'positive', 'negative'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'middle_name' => 'max:255',
        ]);
        Patient::whereId($id)->update($validatedData);

        return redirect('/patients')->with('success', 'Patient is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect('/patients')->with('success', 'Patient is successfully deleted');
    }

}
