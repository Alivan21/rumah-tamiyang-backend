<?php

namespace App\Http\Resources\Workshop\WorkshopSparepart;

use App\Models\Workshop\WorkshopSparepartsDescription;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property WorkshopSparepartsDescription $resource
 */
class WorkshopSparepartsDescriptionResource extends JsonResource
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
            "id" => $this->resource->id,
            'amount' => $this->resource->amount,
            "description" => $this->resource->description ?? null,
            "workshop_spareparts" => $this->resource->workshopSpareparts->name,
        ];
    }
}
