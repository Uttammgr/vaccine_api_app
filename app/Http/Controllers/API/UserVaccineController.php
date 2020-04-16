<?php

namespace App\Http\Controllers\API;

use App\Helpers\responseHelpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserVaccineResource;
use App\UserVaccine;
use Illuminate\Http\Request;

class UserVaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $used_vaccines =  UserVaccineResource::Collection(UserVaccine::with('users','vaccines')->paginate(10));
        $respbind  = responseHelpers::createResponse(false, 200, 'Vaccine Usage listed', null, $used_vaccines);
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
        $vaccine_usage  = UserVaccine::create($request->all());
        $respbind  = responseHelpers::createResponse(false, 200, null, 'Success!! new vaccine use added', $vaccine_usage);
        return response()->json($respbind, 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserVaccine  $userVaccine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $vaccine_usage = new  UserVaccineResource(UserVaccine::findorFail($id)->load('users','vaccines'));
         $respbind  = responseHelpers::createResponse(false, 200, 'single vaccine usage listed', null , $vaccine_usage);
         return response()->json($respbind, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserVaccine  $userVaccine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vaccine_usage = UserVaccine::find($id);
        $vaccine_usage->update($request->all());
        $respbind  = responseHelpers::createResponse(false, 200, 'Success!!taken vaccine updated', null, null);
        return response()->json($respbind, 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserVaccine  $userVaccine
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserVaccine $userVaccine)
    {
        $vaccine_usage = UserVaccine::find($id);
        $vaccine_usage->delete();
        $respbind  = responseHelpers::createResponse(false, 200, 'Success!! taken vaccine record deleted', null, null);
        return response()->json($respbind, 200 );
    }
}
