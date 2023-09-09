<?php

namespace App\Http\Requests\WasteHouse;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWasteHouseIncomeRequest extends FormRequest
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
            'user_id' => 'integer|exists:users,id',
            'date' => 'date',
            'amount' => 'integer',
            'origin' => 'string',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'user_id.integer' => 'user_id must be integer!',
            'user_id.exists' => 'user_id must be exists in users table!',
            'date.date' => 'date must be date!',
            'amount.integer' => 'amount must be integer!',
            'origin.string' => 'origin must be string!',
        ];
    }
}
