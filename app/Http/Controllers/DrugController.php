<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drug;
use Validator;
use DB;
use App\Http\Requests;
class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $drugs = Drug::all();
        return view('drugs.index', compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drugs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make( $request->all(), [
        // 'drug_code' => 'required|integer',
        'drug_name' => 'required|string|max:100',
        'dosage_form' => 'required|string|max:50',
        'level_of_care' => 'required|string|max:50',
        'strength' => 'required|string|max:50',
        'unit_of_issue' => 'required|string|max:50',
        'package_size' => 'required|integer',
        'cost_per_unit' => 'required|integer',
        ] );

        if ($validator->fails()) {
          # code...
          return redirect('drugs/create')->withErrors($validator)->withInput();
        }

        $drug = new Drug();

        // $drug->id = $request->drug_code;
        $drug->name = $request->drug_name;
        $drug->dosage_form = $request->dosage_form;
        $drug->level_of_care = $request->level_of_care;
        $drug->strength = $request->strength;
        $drug->unit_of_issue = $request->unit_of_issue;
        $drug->cost_per_unit = $request->cost_per_unit;
        $drug->package_size = $request->package_size;

        $drug->save();
        return redirect('drugs/create')->with('success', 'Drug Created successifully');
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
      $drug = Drug::find($id);
      $drug->delete();
      return redirect('/drugs')->with('success', 'Ticket has been deleted!!');
    }
}
