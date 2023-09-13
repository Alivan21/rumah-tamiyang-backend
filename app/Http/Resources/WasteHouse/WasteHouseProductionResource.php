<?php

namespace App\Http\Resources\WasteHouse;

use App\Models\WasteHouse\WasteHouseProduction;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property WasteHouseProduction $resource
 */
class WasteHouseProductionResource extends JsonResource
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
            'date' => date('Y-m-d', strtotime($this->resource->date)),
            'amount' => $this->resource->income,
            'wasteHouseList' => $this->resource->wasteHouseList->name ?? null,
        ];
    }
}
