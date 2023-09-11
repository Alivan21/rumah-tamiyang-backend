<?php

namespace App\Http\Resources\WasteHouse;

use App\Models\WasteHouse\WasteHouseEnergyBox;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property WasteHouseEnergyBox $resource
 */
class WasteHouseEnergyBoxResource extends JsonResource
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
            'amount' => $this->resource->amount,
            'date' => date('Y-m-d', strtotime($this->resource->date)),
            'description' => $this->resource->description ?? null,
        ];
    }
}
