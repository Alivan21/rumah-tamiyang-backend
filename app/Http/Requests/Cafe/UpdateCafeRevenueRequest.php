<?php

namespace App\Http\Requests\Cafe;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCafeRevenueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'revenue' => 'nullable|numeric',
            'expense' => 'nullable|numeric',
            'date' => 'nullable|date'
        ];
    }

    public function messages(): array
    {
        return [
            'revenue.numeric' => 'Revenue must be a number',
            'expense.numeric' => 'Expense must be a number',
            'date.date' => 'Date must be a date'
        ];
    }

}
