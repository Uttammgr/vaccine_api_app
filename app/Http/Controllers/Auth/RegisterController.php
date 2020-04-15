<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use App\Providers\RouteServiceProvider;
use App\Role;
use App\Usage;
use App\User;
use App\Vaccine;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/usage/create';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'user_name'     => ['required', 'string', 'unique:users'],
            'full_name'     => ['required', 'string', 'max:255'],
            'address'       => ['required', 'string'],
            'mobile_no'     => ['required', 'string'],
            'date_of_birth' => ['required'],
            'gender'        => ['required', 'string'],
            'blood_type'    => ['required', 'string'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd($data);
        DB::beginTransaction();
        try {
             $userReqData = request()->all();
             $userReqData['password'] = Hash::make($data['password']);
             $user = User::create($userReqData);

             $role = Role::all();
             $user->roles()->attach($role);

             $required_vaccines = Vaccine::all();
             $user->vaccines()->attach($required_vaccines);
//             $user->vaccines()->attach($required_vaccines, ['required_doses' => Vaccine::all()->pluck('required_doses')->flatten()]);
            DB::commit();
        } catch (\Exception $e){
            DB::rollBack();
            throw $e;
        }
        return $user;
    }
}
