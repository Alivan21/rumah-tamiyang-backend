<?php

namespace App\Http\Requests\WasteHouse;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWasteHouseProductionRequest extends FormRequest
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
            'waste_house_lists_id' => 'integer',
            'user_id' => 'integer',
            'date' => 'date',
            'amount' => 'integer',
            'description' => 'nullable|string',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'waste_house_lists_id.integer' => 'Waste House Lists Id must be integer!',
            'user_id.integer' => 'User Id must be integer!',
            'date.date' => 'Date must be date!',
            'amount.integer' => 'Amount must be integer!',
            'description.string' => 'Description must be string!',
        ];
    }
}
