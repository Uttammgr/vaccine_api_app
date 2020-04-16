<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserVaccineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//         return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->vaccine_name,
            'taken_doses' => $this->pivot->taken_doses,
            'required_doses' => $this->required_doses
        ];
    }
}
