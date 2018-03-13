<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HealthSubDistrict;
use App\District;
use Validator;

class HealthSubDistrictController extends Controller
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
        $health_sub_districts = HealthSubDistrict::with('district.region')->orderBy('name', 'asc')->get();

        return view('districts.health_sub_districts.index', compact('health_sub_districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::orderBy('name', 'asc')->pluck('name', 'id');
        return view('districts.health_sub_districts.create', compact('districts'));
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
        'population' => 'required|integer',
        'district' => 'required|integer',
      ]);

      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
      }


      try {

        $health_sub_district = new HealthSubDistrict();

        $health_sub_district->name = $request->name;
        $health_sub_district->population = $request->population;
        $health_sub_district->district_id = $request->district;
        $health_sub_district->save();

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
