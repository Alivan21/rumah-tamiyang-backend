<?php

namespace App\Http\Requests\Workshop;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkshopServiceRevenueRequest extends FormRequest
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
            'revenue' => 'required|numeric',
            'date' => 'date',
            'data' => 'required|array',
            'data.*.workshop_service_id' => 'required|integer',
            'data.*.amount' => 'required|numeric',
            'data.*.description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'revenue.required' => 'Revenue is required',
            'revenue.numeric' => 'Revenue must be a number',
            'expense.required' => 'Expense is required',
            'expense.numeric' => 'Expense must be a number',
            'date.date' => 'Date must be a date',
            'data.required' => 'Data is required',
            'data.array' => 'Data must be an array',
            'data.*.workshop_service_id.required' => 'Workshop service id is required',
            'data.*.workshop_service_id.integer' => 'Workshop service id must be an integer',
            'data.*.amount.required' => 'Amount is required',
            'data.*.amount.numeric' => 'Amount must be a number',
            'data.*.description.string' => 'Description must be a string',

        ];
    }
}
