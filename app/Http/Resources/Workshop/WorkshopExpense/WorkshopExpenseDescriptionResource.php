<?php

namespace App\Http\Resources\Workshop\WorkshopExpense;

use App\Models\Workshop\WorkshopExpenseDescription;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property WorkshopExpenseDescription $resource
 */
class WorkshopExpenseDescriptionResource extends JsonResource
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
            "workshop_expense_lists" => $this->resource->workshopExpenseList->name,
        ];
    }
}
