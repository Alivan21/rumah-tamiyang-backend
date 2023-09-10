<?php

namespace App\Http\Resources\Workshop\WorkshopService;

use App\Models\Workshop\WorkshopServiceDescription;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property WorkshopServiceDescription $resource
 */
class WorkshopServiceRevenueDescriptionResource extends JsonResource
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
            "workshop_service" => $this->resource->workshopService->name,
        ];
    }
}
