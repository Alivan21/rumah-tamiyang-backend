<?php

namespace App\Http\Resources\WasteHouse;

use App\Models\WasteHouse\WasteHouseIncome;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property WasteHouseIncome $resource
 */
class WasteHouseIncomeResource extends JsonResource
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
            'amount' => $this->resource->amount,
            'description' => $this->resource->description ?? null,
        ];
    }
}
