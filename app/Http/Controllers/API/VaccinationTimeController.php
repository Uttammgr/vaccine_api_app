<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Vaccination_timeResource;
use App\Vaccination_time;
use Illuminate\Http\Request;
use App\Helpers\responseHelpers;

class VaccinationTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacc_dose_time = Vaccination_timeResource::Collection(Vaccination_time::with('vaccines')->paginate(10));
        $responseBinding = responseHelpers::createResponse(false, 200,'vaccine time and age listed successful', null ,$vacc_dose_time);
        return response()->json($responseBinding, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vacc_dose_time = Vaccination_time::create($request->all());
        $responseBinding = responseHelpers::createResponse(false, 200,'success!! time and doses has been added to vaccine', null ,$vacc_dose_time);
        return response()->json($responseBinding, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vaccination_time  $vaccination_time
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacc_dose_time = Vaccination_time::find($id);
        if (is_null($vacc_dose_time)){
             $responseBinding = responseHelpers::createResponse(true, 404, null, 'vaccine time and dose not found' ,null);
             return response()->json($responseBinding, 200);
        }
        $responseBinding = responseHelpers::createResponse(false, 200, 'single Vaccine time age retrieved, successfully',null ,$vacc_dose_time);
        return response()->json($responseBinding, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vaccination_time  $vaccination_time
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $Vacc_dose_time =  Vaccination_time::find($id);
         $Vacc_dose_time->update($request->all());
         $responseBinding = responseHelpers::createResponse(false, 200,'success!! time and dose update done ',null ,$Vacc_dose_time);
         return response()->json($responseBinding, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vaccination_time  $vaccination_time
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacc_dose_time = Vaccination_time::find($id);
        $vacc_dose_time->delete();
        $responseBinding = responseHelpers::createResponse(false, 200, null,'success!! time and dose record deleted' ,null );
        return response()->json($responseBinding, 200);
    }
}
