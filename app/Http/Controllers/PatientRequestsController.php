<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientRequest;
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
        
        return view('patient_requests/index', compact('patient_requests_pending', 'patient_requests_released'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


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
            'expired_datetime'=>'max:255'
            
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
}
