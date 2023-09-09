<?php

namespace App\Http\Requests\Workshop;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkshopSparepartRevenueRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'date' => 'required|date',
            'revenue' => 'required|integer',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'user_id.required' => 'User ID is required!',
            'user_id.integer' => 'User ID must be an integer!',
            'date.required' => 'Date is required!',
            'date.date' => 'Date must be a date!',
            'revenue.required' => 'Revenue is required!',
            'revenue.integer' => 'Revenue must be an integer!',
        ];
    }
}
