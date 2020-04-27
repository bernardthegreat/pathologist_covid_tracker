<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users = User::all();

        return view('users/index', compact('users'));
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

        $pathologist_exist = User::where([
            ['last_name', '=', $request->last_name],
            ['first_name', '=', $request->first_name],
        ])->first();
        
        if ($pathologist_exist === null) {
            // User Not Found Your Stuffs Goes Here..
         
            $validatedData = $request->validate([
                'first_name' => 'required|max:255',
                'middle_name' => 'max:255',
                'last_name' => 'required|max:255',
                'prefix' => 'max:255',
                'description' => 'max:255'
            ]);
            $show = User::create($validatedData);
           return redirect('/users')->with('success', 'Pathologist is successfully saved');
        } else {
            echo $pathologist_exist;
           return redirect('/users')->with('error', 'Pathologist already exists');
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
        $users = User::findOrFail($id);

        return view('users/edit', compact('users'));

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
            'prefix' => 'required|max:255'
        ]);
        User::whereId($id)->update($validatedData);

        return redirect('/users')->with('success', 'Pathologist is successfully updated');
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
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'Pathologist is successfully deleted');
    }
}
