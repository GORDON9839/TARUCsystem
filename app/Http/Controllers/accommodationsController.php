<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\accommodation;

class accommodationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
//
        return view('accommodation_create');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accommodation_create');

    }


    public function store(Request $request)
    {
        $accom = new accommodation();
        $accom->accommodation_name = $request->get('accommodation_name');
        $accom->accommodation_address = $request->get('accommodation_address');
        $accom->fees = $request->get('fees');
        $accom->campus_id = $request->get('campus_id');
        $accom->timestamps=false;
        $accom->save();
        return redirect('accommodations')->with('success','Information has been added');
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
