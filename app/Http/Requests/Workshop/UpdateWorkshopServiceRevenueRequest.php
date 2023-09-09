<?php

namespace App\Http\Requests\Workshop;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkshopServiceRevenueRequest extends FormRequest
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
            'revenue' => 'numeric',
            'expense' => 'numeric',
            'date' => 'date'
        ];
    }

    public function messages()
    {
        return [
            'revenue.numeric' => 'Revenue must be a number',
            'expense.numeric' => 'Expense must be a number',
            'date.date' => 'Date must be a date'
        ];
    }
}
