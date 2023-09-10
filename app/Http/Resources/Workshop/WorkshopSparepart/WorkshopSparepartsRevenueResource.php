<?php

namespace App\Http\Resources\Workshop\WorkshopSparepart;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Workshop\WorkshopService\WorkshopServiceRevenueDescriptionCollection;
use App\Models\Workshop\WorkshopSparepartsRevenue;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property WorkshopSparepartsRevenue $resource
 */
class WorkshopSparepartsRevenueResource extends JsonResource
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
            'revenue' => $this->resource->revenue,
            'date' => date('Y-m-d', strtotime($this->resource->date)),
            'users' => new UserResource($this->whenLoaded('users')),
            'workshop_spareparts_description' => new WorkshopSparepartsDescriptionCollection($this->whenLoaded('workshopSparepartsDescriptions')),
        ];
    }
}
