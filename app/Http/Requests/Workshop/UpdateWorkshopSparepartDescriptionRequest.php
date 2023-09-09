<?php

namespace App\Http\Requests\Workshop;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkshopSparepartDescriptionRequest extends FormRequest
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
            'workshop_sparepart_revenue_id' => 'integer',
            'workshop_sparepart_id' => 'integer',
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
            'workshop_sparepart_revenue_id.integer' => 'Workshop Sparepart Revenue ID must be an integer!',
            'workshop_sparepart_id.integer' => 'Workshop Sparepart ID must be an integer!',
            'amount.integer' => 'Amount must be an integer!',
            'description.string' => 'Description must be a string!',
        ];
    }
}
