<?php

namespace App\Http\Requests\Workshop;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkshopExpenseDescriptionRequest extends FormRequest
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
            'workshop_expenses_id' => 'required|exists:workshop_expenses,id',
            'workshop_expenses_lists_id' => 'required|exists:workshop_expenses_lists,id',
            'description' => 'required|string',
            'amount' => 'required|integer',
            'date' => 'required|date',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'workshop_expenses_id.required' => 'Workshop Expenses ID is required',
            'workshop_expenses_id.exists' => 'Workshop Expenses ID is not exists',
            'workshop_expenses_lists_id.required' => 'Workshop Expenses Lists ID is required',
            'workshop_expenses_lists_id.exists' => 'Workshop Expenses Lists ID is not exists',
            'description.required' => 'Description is required',
            'amount.required' => 'Amount is required',
            'date.required' => 'Date is required',
        ];
    }
}
