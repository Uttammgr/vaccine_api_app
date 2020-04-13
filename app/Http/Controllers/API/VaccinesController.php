<?php

namespace App\Http\Controllers\API;

use App\Helpers\responseHelpers;
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
        $vaccine_list = VaccineResource::collection(Vaccine::with('vaccination_time')->paginate(10));
        $respbind  = responseHelpers::createResponse(false, 200, null, $vaccine_list);
        return response()->json($respbind, 200);

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
          $respbind  = responseHelpers::createResponse(false, 200, 'Success!! new vaccine added', $vaccine);
         return response()->json($respbind, 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaccine = new VaccineResource(Vaccine::findorFail($id)->load('vaccination_time'));
        $respbind  = responseHelpers::createResponse(false, 200, null, $vaccine);
        return response()->json($respbind, 200);
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
        $respbind  = responseHelpers::createResponse(false, 200, 'Success!! vaccine updated', null);
        return response()->json($respbind, 200 );
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
         $respbind  = responseHelpers::createResponse(false, 200, 'Success!! vaccine record deleted', null);
        return response()->json($respbind, 200 );
    }
}
