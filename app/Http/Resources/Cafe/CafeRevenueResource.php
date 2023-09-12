<?php

namespace App\Http\Resources\Cafe;

use App\Models\CafeRevenue;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property CafeRevenue $resource
 */
class CafeRevenueResource extends JsonResource
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
            'date' => $this->resource->date,
            'user_id' => $this->resource->user_id,
            'purchase' => $this->resource->purchase,
            'sale' => $this->resource->sale,
            'profit' => $this->resource->profit,
        ];
    }
}
