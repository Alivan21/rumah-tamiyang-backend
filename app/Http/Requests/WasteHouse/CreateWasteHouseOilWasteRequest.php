<?php

namespace App\Http\Requests\WasteHouse;

use Illuminate\Foundation\Http\FormRequest;

class CreateWasteHouseOilWasteRequest extends FormRequest
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
            'user_id' => 'required|integer|exists:users,id',
            'date' => 'required|date',
            'amount' => 'required|integer',
            'origin' => 'required|string',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'user_id.required' => 'user_id is required!',
            'user_id.integer' => 'user_id must be integer!',
            'user_id.exists' => 'user_id must be exists in users table!',
            'date.required' => 'date is required!',
            'date.date' => 'date must be date!',
            'amount.required' => 'amount is required!',
            'amount.integer' => 'amount must be integer!',
            'origin.required' => 'origin is required!',
            'origin.string' => 'origin must be string!',
        ];
    }
}
