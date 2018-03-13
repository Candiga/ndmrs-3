<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Region;
use Validator;

class DistrictController extends Controller
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
        $districts = District::all();
        //District::with('region','healthFacilities','HSD')->get();
        return view('districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::with('region', 'healthFacilities', 'healthSubDistricts')->orderBy('name', 'asc')->pluck('name', 'id');
        return view('districts.create', compact('regions'));
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
        'name' => 'required|string|unique:districts,name|max:50',
        'region' => 'required|integer',
      ]);

      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
      }


      try {

        $district = new District();

        $district->name = $request->name;
        $district->region_id = $request->region;
        $district->save();

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
      $district = District::find($id);
      $district->delete();
      return redirect('/districts')->with('success', 'Ticket has been deleted!!');
    }
}
