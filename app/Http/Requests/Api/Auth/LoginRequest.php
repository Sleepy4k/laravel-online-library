<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\ApiRequest;

class LoginRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email:dns', 'max:255', 'exists:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:255']
        ];
    }
}
