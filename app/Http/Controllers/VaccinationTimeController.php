<?php

namespace App\Http\Controllers;

use App\Vaccination_time;
use App\Vaccine;
use Illuminate\Http\Request;

class VaccinationTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dose_times =  Vaccination_time::all();
        return view('vaccine_time_dose.index',compact('dose_times') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $list_vaccines = Vaccine::select('id', 'vaccine_name')->get();
         return view('vaccine_time_dose.create', compact('list_vaccines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Vaccination_time::create($request->all());
//        dd($request);
        return redirect()->route('vaccine_time.index')->with('success', 'Vaccine marker added ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vaccination_time  $vaccination_time
     * @return \Illuminate\Http\Response
     */
    public function show(Vaccination_time $vaccination_time)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vaccination_time  $vaccination_time
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list_vaccines = Vaccine::select('id', 'vaccine_name')->get();
        $dose_times =  Vaccination_time::find($id);
        return view('vaccine_time_dose.edit', compact('dose_times', 'list_vaccines'));
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
         $dose_times =  Vaccination_time::find($id);
         $dose_times->age_start =$request->get('age_start');
         $dose_times->age_end =$request->get('age_end');
         $dose_times->dose =$request->get('dose');
         $dose_times->save();
         return redirect()->route('vaccine_time.index')->with('success', 'succesfully updated the dose markers');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vaccination_time  $vaccination_time
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dose_times =  Vaccination_time::find($id);
        $dose_times->delete();
        return redirect()->route('vaccine_time.index')->with('success', 'successfully vaccine time markers deleted');

    }
}
