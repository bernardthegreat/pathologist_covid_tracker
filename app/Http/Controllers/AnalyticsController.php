<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use App\Patient;
class AnalyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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

    public function print()
    {
       // This  $data array will be passed to our PDF blade
       $data = [
          'title' => 'First PDF for Medium',
          'heading' => 'Hello from 99Points.info',
          ];
        
        $pdf = PDF::loadView('analytics/print', $data);  
        return $pdf->stream('medium.pdf');
    }

    public function patient_analytics() 
    {
        $patient_census = DB::select(DB::raw(
            "SELECT 
                prd.name as disposition_name, COUNT(*) as total
            FROM
                patients p
                    JOIN
                patient_requests pr ON pr.patient_id = p.id
                    JOIN
                patient_request_dispositions prd ON prd.id = pr.disposition_id
            GROUP BY disposition_id;"
                        ));

        return view('analytics/patient_analytics', compact(
            'patient_census',));
    }

    
    public function patient_analytics_print(Request $request)
    {
        //
        $patient_census = Patient::whereRaw(
            'Date(created_at) = CURDATE()'
        )->get();

        $data = [
            'title' => 'First PDF for Medium',
            'heading' => 'Hello from 99Points.info',
            ];
        
        
        $pdf = PDF::loadView('analytics/print', compact('patient_census') );  
       return $pdf->stream('patients.pdf');

    }




    public function disposition_analytics() 
    {
        $disposition = DB::select(DB::raw(
            "SELECT 
                prd.name as disposition_name, COUNT(*) as total
            FROM
                patients p
                    JOIN
                patient_requests pr ON pr.patient_id = p.id
                    JOIN
                patient_request_dispositions prd ON prd.id = pr.disposition_id
            GROUP BY disposition_id;"
                        ));

        return view('analytics/disposition_analytics', compact(
            'disposition',));
    }


    public function disposition_analytics_print() 
    {
        $disposition = DB::select(DB::raw(
            "SELECT 
                prd.name as disposition_name, COUNT(*) as total
            FROM
                patients p
                    JOIN
                patient_requests pr ON pr.patient_id = p.id
                    JOIN
                patient_request_dispositions prd ON prd.id = pr.disposition_id
            GROUP BY disposition_id;"
                        ));
        $total = 0;
        foreach($disposition as $total_sum) {
            $total += $total_sum->total;
        }
       
       
       $pdf = PDF::loadView('analytics/disposition_analytics_print', compact('disposition','total') );  
       $pdf->setPaper('LETTER', 'landscape'); 
       return $pdf->stream('dispositions.pdf');
    }




    public function department_analytics() 
    {
        $department = DB::select(DB::raw(
            "SELECT 
                d.name as department_name, COUNT(*) as total
            FROM
                patients p
                    JOIN
                patient_requests pr ON pr.patient_id = p.id
                    JOIN
                departments d ON d.id = pr.department_id
            GROUP BY pr.department_id;"
                        ));

        return view('analytics/department_analytics', compact(
            'department',));
    }


    public function department_analytics_print() 
    {
        $department = DB::select(DB::raw(
            "SELECT 
                d.name as department_name, COUNT(*) as total
            FROM
                patients p
                    JOIN
                patient_requests pr ON pr.patient_id = p.id
                    JOIN
                departments d ON d.id = pr.department_id
            GROUP BY pr.department_id;"
                        ));

        $total = 0;
        foreach($department as $total_sum) {
            $total += $total_sum->total;
        }
       
       
       $pdf = PDF::loadView('analytics/department_analytics_print', compact('department','total') );  
       $pdf->setPaper('LETTER', 'landscape'); 
       return $pdf->stream('departments.pdf');
    }

}
