<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HealthFacility;
use App\HealthSubDistrict;
use Validator;

class HealthFacilityController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $health_facilities = HealthFacility::with('healthSubDistrict.district.region')->orderBy('name', 'asc')->get();

        return view('health_facilities.index', compact('health_facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $health_sub_districts = HealthSubDistrict::orderBy('name', 'asc')->pluck('name', 'id');

        return view('health_facilities.create', compact('health_sub_districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:50',
        'level' => 'required|string|max:50',
        'phone' => 'required|string|max:15',
        'health_sub_district' => 'required|integer'
      ]);

      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
      }


      try {

        $health_facility = new HealthFacility();

        $health_facility->name = $request->name;
        $health_facility->level = $request->level;
        $health_facility->phone = $request->phone;
        $health_facility->health_sub_district_id = $request->health_sub_district;
        $health_facility->save();

        return back()->with('success', 'Data Insterted successfully');

      } catch (\Exception $e) {
        return back()->with('error', 'Data Instertion Failed '. $e->getMessage())->withInput();
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
