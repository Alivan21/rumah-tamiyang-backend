<?php

namespace App\Http\Requests\Workshop;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkshopExpenseRequest extends FormRequest
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
            'user_id' => 'integer',
            'date' => 'date',
            'expense' => 'integer',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'user_id.integer' => 'User ID must be an integer!',
            'date.date' => 'Date must be a date!',
            'expense.integer' => 'Expense must be an integer!',
        ];
    }
}
