<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->full_name,
            'email' => $this->email,
//            'vaccines' => VaccineResource::collection($this->vaccines),
//            'Required vaccines' => UsageResource::collection($this->usages),
            'Required vaccines' => UsageResource::collection($this->whenLoaded('usages')),
//             'required_vaccine' => [
//                 'id' => $this->vaccine_id,
////                 'name' =>$this->collection->first(),
//                 'required_doses'=> $this->required_doses,
//                 'taken_doses'=> $this->taken_doses,
//             ],
        ];

    }


}
