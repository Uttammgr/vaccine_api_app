<?php

namespace App\Http\Controllers\API;

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
        return UsageResource::Collection(Usage::with('users','vaccines')->paginate(10));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//         $user_id = auth::user()->id;
//        $request->request->add(['user_id' => $user_id]);
        $vaccine_usage  = Usage::create($request->all());
        return new UsageResource($vaccine_usage );
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
        return new UsageResource($vaccine_usage );

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
        return new UsageResource($vaccine_usage );
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
        return new UsageResource($vaccine_usage);
    }
}
