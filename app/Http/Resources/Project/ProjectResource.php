<?php

namespace App\Http\Resources\Project;
use App\Http\Resources\User\UserResource;
use App\Models\Project;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/**
 * @property Project $resource
 */
class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'status' => $this->resource->status,
            'registration_date' => $this->resource->registration_date->format('Y-m-d'),
            'user' => new UserResource($this->whenLoaded('user'))
        ];
    }
}
