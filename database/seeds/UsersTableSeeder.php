<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', 'Admin')->first();
        $userRole  = Role::where('name', 'user')->first();

        $admin = User::create([
            'user_name'     => 'Admin',
            'full_name'     => 'Admin manxe',
            'address'     => 'Admin ko ghar',
            'mobile_no'     => '1234567890',
            'date_of_birth'     => '1992-08-12',
            'gender'     => 'male',
            'blood_type'     => '0 negative',
            'email'    => 'admin@vaccineapp.com',
            'password' => Hash::make('admin')
         ]);

        $user = User::create([
            'user_name'     => 'Uttam',
            'email'    => 'uttammgr@hotmail.com',
            'password' => Hash::make('hello')
         ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);


    }
}
