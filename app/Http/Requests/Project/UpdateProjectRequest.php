<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title' => 'string',
            'description' => 'string',
            'status' => ['string',
                Rule::in('open', 'closed')
                ],
            'registration_date' => 'date',
        ];
    }


    public function messages()
    {
        return [
            'user_id.integer' => 'User id harus berupa angka',
            'title.string' => 'Judul harus berupa string',
            'description.string' => 'Deskripsi harus berupa string',
            'status.string' => 'Status harus berupa string',
            'registration_date.date' => 'Tanggal registrasi harus berupa tanggal',
        ];
    }
}
