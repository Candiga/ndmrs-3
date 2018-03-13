<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use Validator;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::with('districts','healthSubDistricts.healthFacilities')->orderBy('name', 'asc')->get();

        return view('regions.index', compact('regions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('regions.create');
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
        'name' => 'required|string|unique:regions,name|max:50'
      ]);

      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
      }


      try {

        $region = new Region();

        $region->name = $request->name;
        $region->save();

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
      $region = Region::find($id);

      return view('regions.edit', compact('region', 'id'));
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



      try {
        $this->Validate($request,[
          'name'=>'required'
        ]);
        $region = Region::find($id);
        $region->name = $request->name;
        $region->save();
        return redirect()->back()->with('success', 'Data updated successfully');

      } catch (\Exception $e) {
        return redirect()->back();

      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $region = Region::find($id);
      $region->delete();
      return redirect('/regions')->with('success', 'Ticket has been deleted!!');
    }
}
