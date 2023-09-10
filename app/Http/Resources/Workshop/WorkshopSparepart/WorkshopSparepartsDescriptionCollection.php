<?php

namespace App\Http\Resources\Workshop\WorkshopSparepart;

use Illuminate\Http\Resources\Json\ResourceCollection;

class WorkshopSparepartsDescriptionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($data) {
                return new WorkshopSparepartsDescriptionResource($data);
            }
        );
    }
}
