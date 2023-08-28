<?php

namespace App\Http\Resources\Project;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use JsonSerializable;

class ProjectCollection extends ResourceCollection
{
    public $collects = ProjectResource::class;
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($data) {
            return new ProjectResource($data);
        });
    }
}
