<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    //
//protected $guarded = ['$user_id'];
     protected $fillable = [
         'vaccine_name',
         'vaccine_description',
         'vaccine_side_effect',
         'diseases_description',
         'qualified_candidate',
         'disqualified_candidate',
         'precautions',
         'required_doses',
         'taken_doses',
         'age',

     ];

    public function vaccination_time(){
        return $this->hasMany(Vaccination_time::class);
    }

    public function users(){
        return $this->belongsToMany('App\Users')->withTimestamps()->withPivot('required_doses');
    }


}
