<?php

namespace App\Http\Controllers\API;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class mAuthController extends Controller
{
    public $successStatus = ["success", 200];

    //for registering user
    public function register(Request $request){
        $validate =  Validator::make($request->all(), [

            'user_name' => 'required|unique:users',
            'full_name' => 'required',
            'address' => 'required',
            'mobile_no' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'blood_type' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required ',
            'conf_password' => 'required | same:password',
        ]);

        if ($validate->fails()){
             return response()->json(['error'=>$validate->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = Hash::make($request->pasword);
        $user = User::create($input);
//        $access_token = $user->createToken('authToken')->accessToken;

//        return response()->json([ 'status' => $this->successStatus, 'User' => $user, 'access_token'=> $access_token]);
        return response()->json([ 'status' => $this->successStatus, 'User' => $user]);
    }


    //for logging users
    public function login(Request $request){

        $validateLogin = $request->validate( [
            'email' => 'required',
            'password' => 'required ',
        ]);

         if(!auth()->attempt($validateLogin)) {
            return response()->json(['error'=>'authentication failed, Unauthorised'], 401);
        }

//        $access_token = auth()->user()->createToken('authToken')->accessToken;
//        return response()->json([ 'status' => $this->successStatus, 'User' =>  auth()->user(), 'access_token'=> $access_token] );
        return response()->json([ 'status' => $this->successStatus, 'User' =>  auth()->user()] );
    }


  //gets all registered users
    public function all_users(){

        $users = User::all();
        return response()->json($users);
    }

    //get single registered user
    public function show($id){
         $user = User::findOrFail($id);
        return response()->json($user);

    }

    //update user
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return response()->json($user);
    }

    //delete user
    public function destroy($id){

        $user = User::find($id);
        $user->delete();
        return ['response'=>'success',"msg"=>"successfully deleted"];

    }
}
