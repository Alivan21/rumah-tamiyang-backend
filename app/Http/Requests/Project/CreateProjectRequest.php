<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth('api')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => ['required|string',
                Rule::in('open', 'closed')
                ],
            'registration_date' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul tidak boleh kosong',
            'title.string' => 'Judul harus berupa string',
            'description.required' => 'Deskripsi tidak boleh kosong',
            'description.string' => 'Deskripsi harus berupa string',
            'status.required' => 'Status tidak boleh kosong',
            'status.string' => 'Status harus berupa string',
            'registration_date.required' => 'Tanggal registrasi tidak boleh kosong',
            'registration_date.date' => 'Tanggal registrasi harus berupa tanggal',
        ];
    }
}
