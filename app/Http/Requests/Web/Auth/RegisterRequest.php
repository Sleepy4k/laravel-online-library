<?php

namespace App\Http\Requests\Web\Auth;

use App\Rules\GenderRule;
use App\Http\Requests\WebRequest;

class RegisterRequest extends WebRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'min:1', 'max:150'],
            'email' => ['required', 'string', 'email:dns', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:255', 'unique:users,phone'],
            'gender' => ['required', 'string', 'max:255', new GenderRule],
            'address' => ['required', 'string'],
            'grade_id' => ['required', 'integer', 'min:1', 'exists:grades,id'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed']
        ];
    }
}
