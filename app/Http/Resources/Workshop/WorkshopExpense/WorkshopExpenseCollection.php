<?php

namespace App\Http\Resources\Workshop\WorkshopExpense;

use Illuminate\Http\Resources\Json\ResourceCollection;

class WorkshopExpenseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($data){
            return new WorkshopExpenseResource($data);
        });
    }
}