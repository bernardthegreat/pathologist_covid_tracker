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
      
        $dashboard_patient_request = PatientRequest::count();
        $dashboard_completed = PatientRequest::whereRaw('released_datetime IS NOT NULL')->count();
        $dashboard_expired = PatientRequest::whereRaw('expired_datetime IS NOT NULL')->count();
        $dashboard_rejected = PatientRequest::where('final_result','=',3)->whereRaw('failed_datetime IS NOT NULL')->count();
        $dashboard_patient =  Patient::count();
        $dashboard_positive = Patient::where('latest_result','=',1)->count();
        $dashboard_negative = Patient::where('latest_result','=',2)->count();
        $dashboard_pending = PatientRequest::where('final_result','=',0)->count();
        
       
        $patient_requests_pending = PatientRequest::with([
            'patients', 
            'departments', 
            'users', 
            'patient_request_dispositions'
        ])
        ->whereNull('released_datetime')
        ->whereNull('expired_datetime')
        ->whereNull('failed_datetime')
        ->whereRaw('disposition_id <> 3')
        ->where(function($query) {
            $query->whereRaw('DATE(created_at) >= CURDATE()  - 7')
                
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

        $patient_requests_failed = PatientRequest::with([
            'patients', 
            'departments', 
            'users', 
            'patient_request_dispositions'
        ])
        ->whereRaw('remarks IS NOT NULL')
        ->whereRaw('Date(failed_datetime) = CURDATE()')
        ->get();

        $dispositions = PatientRequestDisposition::all()->where('active', 1);

        $departments = Department::all()->where('active', 1);

        $users = User::all()->where('active', 1);
        
        return view('patient_requests/dashboard_requests', compact(
            'patient_requests_pending', 
            'patient_requests_released',
            'patient_requests_expired',
            'patient_requests_failed',
            'dispositions',
            'departments',
            'users',
            'dashboard_patient_request',
            'dashboard_completed',
            'dashboard_expired',
            'dashboard_rejected',
            'dashboard_patient',
            'dashboard_positive',
            'dashboard_negative',
            'dashboard_pending'
        ));

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
            'expired_datetime'=>'max:255',
            'specimen_no'=>'required|max:255',
            'control_no'=>'required|max:255',
            
            
            
        ]);
        

        

        $department_exist = Department::where('name', '=', $request->department_remarks)->first();

        if ($department_exist === null) {
            $department_id = DB::table('departments')->insertGetId(
                [ 
                    'name' => $request->department_remarks,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );

        } else {
            $department_id = Department::where('name', '=', $request->department_remarks)->first();//$department_id = Department::find($request->department_remarks, ['name']);
            
            if(isset($department_id['id'])) {
                $department_id = $department_id['id'];
            }
        
        }
        
       
        

        
        $show = PatientRequest::create($validatedData + [
            'requested_date' => date('Y-m-d '),
            'requested_time' => date('H:i:s'),
            'department_id' => $department_id,
            'final_result' => 0,
            'swab_requested_datetime'=> date('Y-m-d H:i:s', strtotime($request->swab_requested_datetime))
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
        $patient = Patient::findOrFail($id);
        
        $dispositions = PatientRequestDisposition::all()->where('active', 1);
        $users = User::all()->where('active', 1);
        
        $tests = PatientRequest::where('patient_id','=',$id)->count();
        $positive = PatientRequest::where('patient_id','=',$id)->where('final_result','=',1)->count();
        $negative = PatientRequest::where('patient_id','=',$id)->where('final_result','=',2)->count();
        $completed = PatientRequest::where('patient_id','=',$id)->whereRaw('released_datetime IS NOT NULL')->count();
        

        $patient_requests = PatientRequest::with([
            'patients', 
            'departments', 
            'users', 
            'patient_request_dispositions'
        ])
        ->where('patient_id', $id)->get();

        return view('patient_requests/show', compact(
            'patient_requests',
            'users',
            'tests',
            'positive',
            'negative',
            'completed'
        ));
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
        
        $patient_request = PatientRequest::with([
            'patients', 
            'departments',
            'users',
            'patient_request_dispositions'
            
        ])
        ->where('id', '=', $id)->get();
        
        
        $dispositions = PatientRequestDisposition::all()->where('active', 1);

        $departments = Department::all()->where('active', 1);

        $users = User::all()->where('active', 1);
     

        return view('patient_requests/edit', compact(
            'dispositions',
            'departments',
            'users',
            'patient_request'));
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
            'specimen_no' => 'required|max:255',
            'control_no' => 'required|max:255',
            'disposition_id' => 'required|max:255',
            'status' => 'max:255',
            'user_id' => 'max:255',
            'department_id' => 'max:255',
            'soft_copy' => 'max:255',
            'hcw' => 'max:255',
            'final_result' => 'max:255'
            
        ]);
        PatientRequest::whereId($id)->update($validatedData + [
            'swab_requested_datetime' => date('Y-m-d H:i:s', strtotime($request->swab_requested_datetime)),
            'result_availability_datetime' => date('Y-m-d H:i:s', strtotime($request->result_availability_datetime)),
            'created_at'  => date('Y-m-d H:i:s', strtotime($request->created_datetime))
        ]);

        return redirect()->back()->with('success', 'Request is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function release(Request $request, $id)
    {
        if(isset($request->result_availability_datetime))
        {
            $result_availability_datetime = date('Y-m-d H:i:s', strtotime($request->result_availability_datetime));
            $soft_copy = 1;
        } else {
            $result_availability_datetime = NULL;
            $soft_copy = 0;
        }

        PatientRequest::where('id', $id)->update(array(
            'released_datetime' => date('Y-m-d H:i:s'),
            'user_id' => $request->user_id,
            'final_result' => $request->final_result,
            'result_availability_datetime' => $result_availability_datetime,
            'soft_copy' => $soft_copy
        ));

        Patient::where('id', $request->patient_id)->update(array(
            'latest_result' => $request->final_result
        ));

        

        return redirect()->back()->with('success', 'Patient transferred to the completed tab');
    }


    public function expired(Request $request, $id)
    {
        if(isset($request->result_availability_datetime))
        {
            $result_availability_datetime = date('Y-m-d H:i:s', strtotime($request->result_availability_datetime));
            $soft_copy = 1;
        } else {
            $result_availability_datetime = NULL;
            $soft_copy = 0;
        }

        PatientRequest::where('id', $id)->update(array(
            'expired_datetime' => date('Y-m-d H:i:s'),
            'disposition_id' => 3,
            'user_id' => $request->user_id,
            'final_result' => $request->final_result,
            'result_availability_datetime' => $result_availability_datetime,
            'soft_copy' => $soft_copy
        ));

        Patient::where('id', $request->patient_id)->update(array(
            'latest_result' => $request->final_result
        ));


        return redirect()->back()->with('error', 'Patient transferred to the expired tab');
    }

    public function save_remarks(Request $request, $id)
    {

        PatientRequest::where('id', $id)->update(array(
            'updated_at' => date('Y-m-d H:i:s'),
            'remarks' => $request->remarks,
            'failed_datetime' => date('Y-m-d H:i:s'),
            'final_result' => 3
        ));
        return redirect()->back()->with('warning', 'Patient transferred to the rejected tab');
    }

    

    
}
