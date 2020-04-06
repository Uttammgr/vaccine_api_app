<?php

namespace App\Http\Controllers\API;

use App\Helpers\responseHelpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsageResource;
use App\Usage;
use Illuminate\Http\Request;

class UsagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $used_vaccines =  UsageResource::Collection(Usage::with('users','vaccines')->paginate(10));
        $respbind  = responseHelpers::createResponse(false, 200, null, $used_vaccines);
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
        $vaccine_usage  = Usage::create($request->all());
        $respbind  = responseHelpers::createResponse(false, 200, 'Success!! new vaccine use added', $vaccine_usage);
        return response()->json($respbind, 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usage  $usage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaccine_usage = Usage::find($id);
        $respbind  = responseHelpers::createResponse(false, 200, null, $vaccine_usage);
        return response()->json($respbind, 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usage  $usage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vaccine_usage = Usage::find($id);
        $vaccine_usage->update($request->all());
        $respbind  = responseHelpers::createResponse(false, 200, 'Success!!taken vaccine updated', null);
        return response()->json($respbind, 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usage  $usage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaccine_usage = Usage::find($id);
        $vaccine_usage->delete();
        $respbind  = responseHelpers::createResponse(false, 200, 'Success!! taken vaccine record deleted', null);
        return response()->json($respbind, 200 );
    }
}
