<?php

namespace App\Http\Controllers;

use App\UserVaccine;
use App\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserVaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccine_usage = UserVaccine::all();
        return view('vaccine_usage.index')->with('userVaccines', $vaccine_usage);
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
        UserVaccine::create($request->all());
        return redirect()->route('usage.index')->with('success','usage record added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserVaccine  $userVaccine
     * @return \Illuminate\Http\Response
     */
    public function show(UserVaccine $userVaccine)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserVaccine  $userVaccine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaccine_list = Vaccine::select('id', 'vaccine_name')->get();
        $vaccine_usage = UserVaccine::find($id);
        return view('vaccine_usage.edit', compact('vaccine_usage','vaccine_list'));
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
        $vaccine_usage->taken_doses= $request->get('taken_doses');
//        dd($vaccine_usage);
//        $vaccine_usage->remaining_doses = $request->get('remaining_doses');
        $vaccine_usage->save();
        return redirect()->route('usage.index')->with('succes', 'successfully_updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserVaccine  $userVaccine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaccine_usage = UserVaccine::find($id);
        $vaccine_usage->delete();
        return redirect()->route('usage.index')->with('success', 'successfully deleted');
    }
}
