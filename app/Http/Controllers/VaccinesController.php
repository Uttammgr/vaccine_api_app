<?php

namespace App\Http\Controllers;

use App\Vaccine;
use Illuminate\Http\Request;

class VaccinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $vaccines = Vaccine::all();
           return view('vaccine.index')->with('vaccines', $vaccines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('vaccine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        Vaccine::create($request->all());
        return redirect()->route('vaccine.index')->with('success', 'vaccine added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaccines = Vaccine::find($id);
        return view('vaccine.details', compact('vaccines'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaccines = Vaccine::find($id);
        return view('vaccine.edit', compact('vaccines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $vaccines = Vaccine::find($id);
         $vaccines->vaccine_name = $request->get('vaccine_name');
         $vaccines->vaccine_description = $request->get('vaccine_description');
         $vaccines->vaccine_side_effect = $request->get('vaccine_side_effect');
         $vaccines->diseases_description = $request->get('diseases_description');
         $vaccines->qualified_candidate = $request->get('qualified_candidate');
         $vaccines->disqualified_candidate = $request->get('disqualified_candidate');
         $vaccines->precautions = $request->get('precautions');
         $vaccines->required_doses =$request->get('required_doses');
         $vaccines->taken_doses = $request->get('taken_doses');
         $vaccines->age = $request->get('age');
         $vaccines->save();
         return redirect()->route('vaccine.index')->with('success','successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaccines = Vaccine::find($id);
        $vaccines->delete();
        return redirect()->route('vaccine.index')->with('success', 'successfully deleted');

    }
}
