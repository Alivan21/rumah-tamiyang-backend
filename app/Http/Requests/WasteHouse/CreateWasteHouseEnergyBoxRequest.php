<?php

namespace App\Http\Requests\WasteHouse;

use Illuminate\Foundation\Http\FormRequest;

class CreateWasteHouseEnergyBoxRequest extends FormRequest
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
            'date' => 'required|date',
            'amount' => 'required|integer',
            'description' => 'nullable|string',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'user_id.required' => 'User Id is required!',
            'user_id.integer' => 'User Id must be integer!',
            'date.required' => 'Date is required!',
            'date.date' => 'Date must be date!',
            'amount.required' => 'Amount is required!',
            'amount.integer' => 'Amount must be integer!',
            'description.string' => 'Description must be string!',
        ];
    }
}
