<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\PatientRequest;
class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departments = Department::all();

        return view('departments/index', compact('departments'));
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

        //
        $department_exist = Department::where('name', '=', $request->name)->first();

        if ($department_exist === null) {
            // User Not Found Your Stuffs Goes Here..
         
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'description' => 'max:255'
            ]);
            $show = Department::create($validatedData);

            return redirect('/departments')->with('success', 'Department is successfully saved');
        } else {
            return redirect('/departments')->with('error', 'Department already exists');
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

        $departments = Department::findOrFail($id);
            
        $patient_request_per_dept = PatientRequest::where('department_id','=',$id)
        ->count();

        return view('departments/edit', compact('departments', 'patient_request_per_dept'));
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
            'name' => 'required|max:255',
            'description' => 'max:255',
        ]);
        Department::whereId($id)->update($validatedData);

        return redirect('/departments')->with('success', 'Department is successfully updated');
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

        $department = Department::findOrFail($id);
        $department->delete();

        return redirect('/departments')->with('success', 'Department is successfully deleted');
    }
}
