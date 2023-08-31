<?php

namespace App\Http\Requests\Cafe;

use Illuminate\Foundation\Http\FormRequest;

class CreateCafeRevenueRequest extends FormRequest
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
            'expense' => 'required|numeric',
            'date' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'revenue.required' => 'Revenue is required',
            'revenue.numeric' => 'Revenue must be a number',
            'expense.required' => 'Expense is required',
            'expense.numeric' => 'Expense must be a number',
            'date.required' => 'Date is required',
            'date.date' => 'Date must be a date'
        ];
    }
}
