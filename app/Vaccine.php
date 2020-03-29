<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    //
protected $guarded = ['$user_id'];
    // protected $fillable = [
    //     'vaccine_name',
    //     'vaccine_description',
    //     'vaccine_side_effect',
    //     'diseases_description',
    //     'qualified_candidate',
    //     'disqualified_candidate',
    //     'precautions',
    //     'required_doses',
    //     'taken_doses',
    //     'age',

    // ];

    public function users(){
        return $this->belongsTo(Users::class,'user_id','id');
    }
}
