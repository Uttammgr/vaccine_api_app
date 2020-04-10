<?php

namespace App\Http\Controllers;

use App\Usage;
use App\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccine_usage = Usage::all();
        return view('vaccine_usage.index')->with('usage', $vaccine_usage );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vaccine_list = Vaccine::select('id', 'vaccine_name')->get();
        return view('vaccine_usage.create',compact('vaccine_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth::user()->id;
        $request->request->add(['user_id' => $user_id]);
        Usage::create($request->all());
        return redirect()->route('usage.index')->with('success','usage record added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usage  $usage
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
       $vaccine_usage = Usage::find($id);
       return view('vaccine.details', compact('vaccine_usage'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usage  $usage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaccine_list = Vaccine::select('id', 'vaccine_name')->get();
        $vaccine_usage = Usage::find($id);
        return view('vaccine_usage.edit', compact('vaccine_usage','vaccine_list'));
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
        $vaccine_usage->taken_doses= $request->get('taken_doses');
        $vaccine_usage->remaining_doses = $request->get('remaining_doses');
        $vaccine_usage->save();
        return redirect()->route('usage.index')->with('succes', 'successfully_updated');

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
        return redirect()->route('usage.index')->with('success', 'successfully deleted');
    }
}
