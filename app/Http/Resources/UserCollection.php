<?php

namespace App\Http\Resources;

use App\Usage;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
//        return UserResource::collection($this->collection);

//        $vaccines = [];
//
//        foreach($this->collection as $vaccine) {
//
//             array_push($vaccines, [
//                 'name' => $vaccine->vaccine_id,
////                 'price' => $product->price
//             ]);
//
//        }
        return [
            'Required vaccines' => Usage::all()->vaccines_id,
        ];
//
//        return $vaccines;
    }
}
