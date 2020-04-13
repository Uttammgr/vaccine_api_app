<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VaccineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

//        return [
//            'data' =>   $this->collection,
//        ];
        return [
          'id' => $this->id,
          'vaccine_name'=> $this->vaccine_name,
          'vaccine_description'=> $this->vaccine_description,
          'vaccine_side_effect'=> $this->vaccine_side_effect,
          'diseases_description'=> $this->diseases_description,
          'qualified_candidate'=> $this->qualified_candidate,
          'disqualified_candidate'=> $this->disqualified_candidate,
          'precautions'=> $this->precautions,
          'required_doses'=> $this->required_doses,
          'taken_doses'=> $this->taken_doses,
          'age'=> $this->age,
            'vaccine_time' => Vaccination_timeResource::collection($this->vaccination_time)
//          'created_at' =>$this->created_at,
//          'updated_at' =>$this->updated_at,

        ];
    }
}
