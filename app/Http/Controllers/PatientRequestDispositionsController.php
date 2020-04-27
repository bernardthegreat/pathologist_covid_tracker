<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientRequestDisposition;

class PatientRequestDispositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $disposition = PatientRequestDisposition::all();

        return view('dispositions/index', compact('disposition'));
        
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
        $diposition = PatientRequestDisposition::where([
            ['name', '=', $request->name],
           
        ])->first();
        
        if ($diposition === null) {
            // User Not Found Your Stuffs Goes Here..
         
            $validatedData = $request->validate([
                'name' => 'required|max:255',
            ]);

            $show = PatientRequestDisposition::create($validatedData);
           return redirect('/dispositions')->with('success', 'Disposition is successfully saved');
        } else {
           return redirect('/dispositions')->with('error', 'Disposition already exists');
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

        $dispositions = PatientRequestDisposition::findOrFail($id);

        return view('dispositions/edit', compact('dispositions'));
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
        ]);
        PatientRequestDisposition::whereId($id)->update($validatedData);

        return redirect('/dispositions')->with('success', 'Disposition is successfully updated');
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
        $disposition = PatientRequestDisposition::findOrFail($id);
        $disposition->delete();

        return redirect('/dispositions')->with('success', 'Disposition is successfully deleted');
    }
}
