<?php

namespace App\Http\Resources\Workshop\WorkshopOilWaste;

use App\Models\Workshop\WorkshopOilWaste;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property WorkshopOilWaste $resource
 */
class WorkshopOilWasteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'user_id' => $this->resource->user_id,
            'date' => date('Y-m-d', strtotime($this->resource->date)),
            'oil_collects' => $this->resource->oil_collects,
            'oil_out' => $this->resource->oil_out,
        ];
    }
}
