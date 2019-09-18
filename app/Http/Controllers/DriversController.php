<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers =  Driver::orderBy('id', 'asc')->paginate(10);
        return view('drivers.index')->with('drivers', $drivers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation Rules
        $this->validate($request, [
            'firstname' => 'required',
            'surname' => 'required',
            'username' => 'required|unique:driver',
            'contact' => 'required',
            'status' => 'required',
            'password' => 'required|min:6',
            'confirmpassword' => 'same:password',
        ]);

        //Create Driver
        $driver = new Driver;
        $driver->firstname = $request->input('firstname');
        $driver->surname = $request->input('surname');
        $driver->username = $request->input('username');
        $driver->contact = $request->input('contact');
        $driver->status = $request->input('status');
        $driver->regDate = Carbon::now();
        $driver->password = Hash::make($request->input('password'));
        $driver->save();

        return redirect('/drivers')->with('success', 'New Driver Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::find($id);
        return view('drivers.show')->with('driver', $driver);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::find($id);
        return view('drivers.edit')->with('driver', $driver);
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
        //Validation Rules
        $this->validate($request, [
            'firstname' => 'required',
            'surname' => 'required',
            'username' => 'required',
            'contact' => 'required',
            'status' => 'required',
        ]);

        //Create Driver
        $driver = Driver::find($id);
        $driver->firstname = $request->input('firstname');
        $driver->surname = $request->input('surname');
        $driver->username = $request->input('username');
        $driver->contact = $request->input('contact');
        $driver->status = $request->input('status');
        $driver->save();

        return redirect('/drivers')->with('success', 'Driver Details Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);
        $driver->delete();

        return redirect('/drivers')->with('success', 'Driver Has Been Removed');
    }
}
