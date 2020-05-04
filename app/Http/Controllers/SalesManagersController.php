<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class SalesManagersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesmanagers =  SalesManager::orderBy('id', 'asc')->paginate(10);
        return view('salesmanagers.index')->with('salesmanagers', $salesmanagers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salesmanagers.create');
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
            'username' => 'required|unique:salesmanager',
            'contact' => 'required',
            'status' => 'required',
            'password' => 'required|min:6',
            'confirmpassword' => 'same:password',
        ]);

        //Create Sales Manager
        $salesmanager = new SalesManager;
        $salesmanager->firstname = $request->input('firstname');
        $salesmanager->surname = $request->input('surname');
        $salesmanager->username = $request->input('username');
        $salesmanager->contact = $request->input('contact');
        $salesmanager->status = $request->input('status');
        $salesmanager->regDate = Carbon::now();
        $salesmanager->password = Hash::make($request->input('password'));
        $salesmanager->save();

        return redirect('/salesmanagers')->with('success', 'New Sales Manager Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salesmanager = SalesManager::find($id);
        return view('salesmanagers.show')->with('salesmanager', $salesmanager);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salesmanager = SalesManager::find($id);
        return view('salesmanagers.edit')->with('salesmanager', $salesmanager);
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

        //Create Sales Manager
        $salesmanager = SalesManager::find($id);
        $salesmanager->firstname = $request->input('firstname');
        $salesmanager->surname = $request->input('surname');
        $salesmanager->username = $request->input('username');
        $salesmanager->contact = $request->input('contact');
        $salesmanager->status = $request->input('status');
        $salesmanager->save();

        return redirect('/salesmanagers')->with('success', 'Sales Manager Details Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salesmanager = SalesManager::find($id);
        $salesmanager->delete();

        return redirect('/salesmanagers')->with('success', 'Sales Managers Has Been Removed');
    }
}
