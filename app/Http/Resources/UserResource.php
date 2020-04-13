<?php

namespace App\Http\Resources;

use App\Vaccine;
use Illuminate\Http\Resources\Json\JsonResource;
use function GuzzleHttp\Promise\all;

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
//            'vaccines' => VaccineResource::collection(Vaccine::all()),
            'Required vaccines' => UserVaccineResource::collection($this->userVaccines),
//            'Required vaccines' => UsageResource::collection($this->whenLoaded('usages'), Vaccine::all()),
//             'required_vaccine' => [
//                 UsageResource::collection($this->whenLoaded('usages'), Vaccine::all()),


//                 'id' => $this->vaccine_id,
//                 'name' =>$this->collection->first(),
//                 'required_doses'=> $this->required_doses,
//                 'taken_doses'=> $this->taken_doses,
//             ],
        ];

    }


}

