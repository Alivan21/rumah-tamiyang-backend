<?php

namespace App\Http\Requests\Workshop;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkshopExpenseDescriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'workshop_expenses_id' => 'exists:workshop_expenses,id',
            'workshop_expenses_lists_id' => 'exists:workshop_expenses_lists,id',
            'description' => 'string',
            'amount' => 'integer',
            'date' => 'date',
        ];
    }
}
