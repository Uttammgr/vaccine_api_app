<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    protected $fillable= [
      'user_id',
      'vaccine_id',
      'taken_doses',
      'remaining_doses'
    ];

    protected $hidden = [
         'created_at', 'updated_at',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vaccines(){
        return $this->belongsTo(Vaccine::class, 'vaccine_id');
    }
}
