<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

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
        $patients = Patient::all();


        return view('patients/index', compact('patients'));

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
                'hospital_number' => 'required|exists:patients|max:255',
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
            ]);
            $show = Patient::create($validatedData);

    
            return redirect('/patients')->with('success', 'Category is successfully saved');
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



        return view('patients/patient_profile', compact('patient'));
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
    }


    public function patient_info($patient) 
    {
        echo "Searched";

        print_r($patient);
    }
}
