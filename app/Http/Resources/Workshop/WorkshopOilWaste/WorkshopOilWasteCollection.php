<?php

namespace App\Http\Resources\Workshop\WorkshopOilWaste;

use Illuminate\Http\Resources\Json\ResourceCollection;

class WorkshopOilWasteCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($data){
            return new WorkshopOilWasteResource($data);
        });
    }
}
