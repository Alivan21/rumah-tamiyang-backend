<?php

namespace App\Http\Resources\Workshop\WorkshopExpense;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Workshop\WorkshopSparepart\WorkshopSparepartsDescriptionCollection;
use App\Models\Workshop\WorkshopExpense;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property WorkshopExpense $resource
 */
class WorkshopExpenseResource extends JsonResource
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
            'expense' => $this->resource->expense,
            'date' => date('Y-m-d', strtotime($this->resource->date)),
            'users' => new UserResource($this->whenLoaded('users')),
            'workshop_expense_description' => new WorkshopExpenseDescriptionCollection($this->whenLoaded('workshopExpenseDescription')),
        ];
    }
}
