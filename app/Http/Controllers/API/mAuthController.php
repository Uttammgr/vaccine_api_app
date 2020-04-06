<?php

namespace App\Http\Controllers\API;

use App\Helpers\responseHelpers;
use App\Http\Resources\UserResource;
use App\Role;
use App\User;
use Validator;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class mAuthController extends Controller
{

    public function index()
    {
        $userListing = UserResource::Collection(User::with( 'usages')->paginate(10));
        $respbind  = responseHelpers::createResponse(false, 200, null, $userListing);
        return response()->json($respbind, 200);
    }

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
        $input['password'] = Hash::make($request->password);
        $user = User::create($input);
        $role = Role::select('id')->where('name', 'user')->first();
        $user->roles()->attach($role);
        $access_token = $user->createToken('authToken')->accessToken;

        if ($access_token){
             $respbind  = responseHelpers::createResponse(false, 201, 'Success!! User registered', ['User' => $user, 'access_token'=> $access_token]);
             return response()->json($respbind, 200 );
        }else{
             $respbind  = responseHelpers::createResponse(true, 400, 'Failed!! User not registered', null);
             return response()->json($respbind, 400);
        }
    }

    public function login(Request $request){

        $validateLogin = $request->validate( [
            'email' => 'required',
            'password' => 'required ',
        ]);

         if(!auth()->attempt($validateLogin)) {
            return response()->json(['error'=>'authentication failed, Unauthorised'], 401);
        }

        $access_token = auth()->user()->createToken('authToken')->accessToken;

          if ($access_token){
             $respbind  = responseHelpers::createResponse(false, 200, 'Login Successful !!', ['User' => auth()->user(), 'access_token'=> $access_token]);
             return response()->json($respbind, 200 );
        }else{
              $respbind  = responseHelpers::createResponse(false, 401, 'Login failed !!', null);
             return response()->json($respbind, 401 );
          }

    }

    //get single registered user
    public function show($id){
         $user = User::findOrFail($id);
         $respbind  = responseHelpers::createResponse(false, 200, null , $user);
         return response()->json($respbind, 200);


    }

    //update user
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        $respbind = responseHelpers::createResponse(false, 200, 'Success!! User updated', null);
        return response()->json($respbind, 200);

    }

    //delete user
    public function destroy($id){

        $user = User::find($id);
        $user->delete();
        $respbind  = responseHelpers::createResponse(false, 200, 'Success!! User deleted', null);
        return response()->json($respbind, 200 );

    }
}
