<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Patient;
use App\PatientRequest;
use App\PatientRequestDisposition;
use App\Department;
use App\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $patient_requests = PatientRequest::take(100)->with([
            'patients', 
            'departments', 
            'users', 
            'patient_request_dispositions'
        ])->get();

        $patients = Patient::where('active','=','1')->count();
        $requests = PatientRequest::where('status','=','1')->count();
        $inpatients = PatientRequest::where('disposition_id','=','1')->count();
        $discharged = PatientRequest::where('disposition_id','=','2')->count();   
        $expired = PatientRequest::where('disposition_id','=','3')->count();        

        return view('dashboard', compact(
            'patient_requests', 'patients', 
            'requests', 'inpatients', 'discharged',
            'expired'
        ));
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


    public function search_patient(Request $request){



        if(isset($request->patient_info)) {


            $data = Patient::where('last_name', 'LIKE', $request->patient_info.'%')
                    ->orWhere('hospital_number', 'LIKE', $request->patient_info.'%')
                    ->orWhere('first_name', 'LIKE', $request->patient_info.'%')
                    ->get();
                    

            if (count($data)>0) {

                $dispositions = PatientRequestDisposition::all()->where('active', 1);

                $departments = Department::all()->where('active', 1);

                $users = User::all()->where('active', 1);

              
                return view('patients.patient_search',[
                    'result' => $data, 
                    'dispositions' => $dispositions,
                    'departments' => $departments,
                    'users' => $users,
                   
                ])->with('success', 'Patient found!');
            }
            else {
                return view('patients.create')->with('error', 'Patient not found');
            } 
        } else {
            return redirect('patients/create')->with('error', 'Patient Info not found');
        } 
    }


}
