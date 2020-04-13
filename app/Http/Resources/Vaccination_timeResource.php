<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Vaccination_timeResource extends JsonResource
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
        return [
            "id" => $this->id,
            "vaccine_id" => $this->vaccine_id,
            "age_start" => $this->age_start,
            "age_end" => $this->age_end,
            "dose" => $this->dose,
        ];
    }
}
