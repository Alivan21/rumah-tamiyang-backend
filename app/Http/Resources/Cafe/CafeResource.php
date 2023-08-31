<?php

namespace App\Http\Resources\Cafe;

use App\Models\CafeRevenue;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property CafeRevenue $resource
 */
class CafeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
