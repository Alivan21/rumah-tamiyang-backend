<?php

namespace App\Http\Resources\WasteHouse;

use App\Models\WasteHouse\WasteHouseWasteOil;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property WasteHouseWasteOil $resource
 */
class WasteOilResource extends JsonResource
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
            'amount' => $this->resource->amount,
            'origin' => $this->resource->origin,
        ];
    }
}