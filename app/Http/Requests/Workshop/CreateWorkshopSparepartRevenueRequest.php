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
            'date' => 'required|date',
            'revenue' => 'required|integer',
            'data' => 'required|array',
            'data.*.workshop_spareparts_id' => 'required|integer',
            'data.*.amount' => 'required|integer',
            'data.*.description' => 'nullable|string',
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
            'data.required' => 'Data is required!',
            'data.array' => 'Data must be an array!',
            'data.*.workshop_sparepart_id.required' => 'Workshop sparepart id is required!',
            'data.*.workshop_sparepart_id.integer' => 'Workshop sparepart id must be an integer!',
            'data.*.amount.required' => 'Amount is required!',
            'data.*.amount.integer' => 'Amount must be an integer!',
            'data.*.description.string' => 'Description must be a string!',
        ];
    }
}
