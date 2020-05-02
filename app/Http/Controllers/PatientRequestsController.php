<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientRequest;
use App\Patient;
use App\Department;
use App\User;
use App\PatientRequestDisposition;
use DB;

class PatientRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$patient_requests = PatientRequest::with('patients')->get();

        
       
        $patient_requests_pending = PatientRequest::with([
            'patients', 
            'departments', 
            'users', 
            'patient_request_dispositions'
        ])
        ->whereNull('released_datetime')
        ->whereNull('expired_datetime')
        ->whereRaw('disposition_id <> 3')
        ->where(function($query) {
            $yesterday = date("Y-m-d", strtotime( '-1 days' ) );
            $query->whereRaw('Date(created_at) = CURDATE() or Date(created_at) = CURDATE()-1')
                
                ->get();  
        })->get();

        $patient_requests_released = PatientRequest::with([
            'patients', 
            'departments', 
            'users', 
            'patient_request_dispositions'
        ])
        ->whereNotNull('released_datetime')
        ->whereRaw('Date(released_datetime) = CURDATE()')
        ->get();

        $patient_requests_expired = PatientRequest::with([
            'patients', 
            'departments', 
            'users', 
            'patient_request_dispositions'
        ])
        ->whereRaw('disposition_id = 3')
        ->whereRaw('Date(expired_datetime) = CURDATE()')
        ->get();
        
        return view('patient_requests/dashboard_requests', compact(
            'patient_requests_pending', 
            'patient_requests_released',
            'patient_requests_expired'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $patient = Patient::findOrFail($id);

        $specimen_number = PatientRequest::where('patient_id','=',$id)->count()+1;        
        
        $dispositions = PatientRequestDisposition::all()->where('active', 1);

        $departments = Department::all()->where('active', 1);

        $users = User::all()->where('active', 1);

        return view('patient_requests/create',[
            'dispositions' => $dispositions,
            'departments' => $departments,
            'users' => $users,
            'specimen_number' => $specimen_number,
            'patient' => $patient
        ]);

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

        $validatedData = $request->validate([
            'disposition_id' => 'required',
            'hcw' => 'required',
            'patient_id' => 'required',
            'status' => 'max:255',
            'final_result' => 'max:255',
            'soft_copy' => 'max:255',
            'user_id' => 'required',
            'department_id' => 'required',
            'expired_datetime'=>'max:255',
            'specimen_no'=>'required|max:255'
            
        ]);
        

        $show = PatientRequest::create($validatedData + [
            'requested_date' => date('Y-m-d '),
            'requested_time' => date('H:m:s')
        ]);

        return redirect('/patient_requests')->with('success', 'Patient request is successfully saved');
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
    }


    public function release($id)
    {

        PatientRequest::where('id', $id)->update(array('released_datetime' => date('Y-m-d H:m:s')));
        return redirect('/patient_requests')->with('success', 'Patient released');
    }


    public function expired($id)
    {

        PatientRequest::where('id', $id)->update(array(
            'expired_datetime' => date('Y-m-d H:m:s'),
            'disposition_id' => 3,
        ));
        return redirect('/patient_requests')->with('error', 'Patient expired');
    }
}
