<?php

namespace App\Http\Controllers\API;

use App\Vaccine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VaccineResource;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $vaccines = Vaccine::all();
        // return response()->json($vaccines);

        return VaccineResource::collection(auth()->user()->vaccines()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // $vaccine = new Vaccine();
        // $vaccine->vaccine_name = $request->vaccine_name;
        // $vaccine->vaccine_description = $request->vaccine_description;
        // $vaccine->vaccine_side_effect = $request->vaccine_side_effect;
        // $vaccine->diseases_description = $request->diseases_description;
        // $vaccine->qualified_candidate = $request->qualified_candidate;
        // $vaccine->disqualified_candidate = $request->disqualified_candidate;
        // $vaccine->precautions = $request->precautions;
        // $vaccine->required_doses =$request->required_doses;
        // $vaccine->taken_doses = $request->taken_doses;
        // $vaccine->age = $request->age;
        // $vaccine->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaccine = Vaccine::find($id);
        return response()->json($vaccine);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaccine $vaccine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaccine $vaccine)
    {
        //
    }
}
