<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HealthFacility;
use App\Staff;
use Validator;

class StaffController extends Controller
{
    public function __construct(){

      $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $staffs = Staff::with('healthFacility')->get();
      return view('staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $healthFacilities = HealthFacility::pluck('name','id');
      return view('staff.create', compact('healthFacilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validation = Validator::make($request->all(), [
        'name' => 'required|string|max:50',
        'phone' => 'required|string|max:15',
        'email' => 'required|email|max:100',
        'address' => 'required|string|max:100',
        'gender' => 'required|string|max:100',
        'health_facility' => 'required|integer'

      ]);
      if ($validation->fails()) {
          return back()->withErrors($validation)->withInput();
      }

      try {
        $password = rand(10000,99999);

        $staff = new Staff();
        $staff->name = $request->name;
        $staff->gender = $request->gender;
        $staff->address = $request->address;
        $staff->email = $request->email;
        $staff->health_facility_id = $request->health_facility;
        $staff->phone = $request->phone;
        $staff->password =  bcrypt($password);
        $staff->save();
        return back()->with('success','new staff created successfully, password is '.$password);

      } catch (\Exception $e) {
        return back()->with('error','data Instertion Failed '.$e->getMessage())->withInput();
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
