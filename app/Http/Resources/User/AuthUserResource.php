<?php

namespace App\Http\Resources\User;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property User $resource
 */
class AuthUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $permissions = [];
        foreach ($this->resource->roles as $role) {
            $permission = $role->permissions->pluck('name')->toArray();
            foreach ($permission as $perm) {
                array_push($permissions, $perm);
            }
        }

        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'identifier' => $this->resource->identifier,
            'email' => $this->resource->email,
            'phone' => $this->resource->phone,
            'image_profile' => $this->resource->image_profile,
            'roles' => $this->resource->roles->pluck('name'),
            'permissions' => $permissions,
        ];

    }
}
