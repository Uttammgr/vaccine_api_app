<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'user_name',
        'full_name',
        'address',
        'mobile_no',
        'date_of_birth',
        'gender',
        'blood_type',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the vaccines of the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vaccines(){
        return $this->belongsToMany('App\Vaccine')
            ->withPivot('taken_doses')
            ->withTimestamps();
    }

//     public function vaccine(){
//         return $this->hasMany(Vaccine::class);
//     }

    public function userVaccines(){
        return $this->hasMany(UserVaccine::class);
    }

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function hasAnyRoles($roles){

        if ($this->roles()->whereIn('name', $roles)->first()){
            return true;
        }
        return false;
    }

     public function hasRole($role){

        if ($this->roles()->where('name', $role)->first()){
            return true;
        }
        return false;
    }



}
