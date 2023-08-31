<?php

namespace App\Http\Requests;

use App\Commons\Traits\ApiResponse;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

abstract class apiRequest extends FormRequest
{
use ApiResponse;
    abstract public function rules();

    protected function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            return $this->apiError($validator->errors(), 'Validation Error.', 422);
        }

        parent::failedValidation($validator);
    }

    protected function failedAuthorization()
    {
        throw new AuthorizationException($this->apiError( '','You are not authorized.'));
    }

}
