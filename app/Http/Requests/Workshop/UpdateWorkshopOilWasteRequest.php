<?php

namespace App\Http\Requests\Workshop;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkshopOilWasteRequest extends FormRequest
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
            'date' => 'date',
            'oil_collects' => 'integer',
            'oil_wastes' => 'integer',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'user_id.exists' => 'User ID is not exists',
            'oil_wastes.required' => 'Oil Wastes is required',
            'oil_wastes.integer' => 'Oil Wastes must be integer',
            'oil_collects.integer' => 'Oil Collects must be integer',
        ];
    }
}
