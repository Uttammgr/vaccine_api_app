<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccination_time extends Model
{
    protected $fillable = [
      'vaccine_id',
      'age_start',
      'age_end',
      'dose',
    ];

//    protected $guarded = [];

    public function vaccines(){
        return $this->belongsTo(Vaccine::class, 'vaccine_id');
    }
}
