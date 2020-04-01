<?php

namespace App\Http\Controllers\API;

use App\Vaccine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VaccineResource;

class VaccinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return VaccineResource::collection(Vaccine::all());
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
         $vaccine = Vaccine::create($request->all());
         return new VaccineResource($vaccine);
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
         return new VaccineResource($vaccine);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $vaccine = Vaccine::find($id);
         $vaccine->update($request->all());
         return new VaccineResource($vaccine);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $vaccine = Vaccine::find($id);
         $vaccine->delete();
         return new VaccineResource($vaccine);
    }
}
