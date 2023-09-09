<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email|email|max:255',
            'identifier' => 'required|unique:users,identifier|string|max:255',
            'password' => 'required|string|min:8|max:255',
            'role_id' => 'required|integer|exists:roles,id',
            'phone' => 'string|max:255',
            'image_profile' => 'string|max:255',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'name.string' => 'Name must be string!',
            'name.max' => 'Name max length is 255!',
            'email.required' => 'Email is required!',
            'email.unique' => 'Email is unique!',
            'email.email' => 'Email must be email!',
            'email.max' => 'Email max length is 255!',
            'identifier.required' => 'Identifier is required!',
            'identifier.unique' => 'Identifier is unique!',
            'identifier.string' => 'Identifier must be string!',
            'identifier.max' => 'Identifier max length is 255!',
            'password.required' => 'Password is required!',
            'password.string' => 'Password must be string!',
            'password.min' => 'Password min length is 8!',
            'password.max' => 'Password max length is 255!',
            'role_id.required' => 'Role is required!',
            'role_id.integer' => 'Role must be integer!',
            'role_id.exists' => 'Role must be exists!',
            'phone.string' => 'Phone must be string!',
            'phone.max' => 'Phone max length is 255!',
            'image_profile.string' => 'Image profile must be string!',
            'image_profile.max' => 'Image profile max length is 255!',
        ];
    }
}
