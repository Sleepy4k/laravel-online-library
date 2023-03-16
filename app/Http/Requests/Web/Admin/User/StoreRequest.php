<?php

namespace App\Http\Requests\Web\Admin\User;

use App\Rules\RoleRule;
use App\Rules\GenderRule;
use App\Http\Requests\WebRequest;

class StoreRequest extends WebRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'min:1', 'max:100'],
            'email' => ['required', 'string', 'email:dns', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:255', 'unique:users,phone'],
            'gender' => ['required', 'string', 'max:255', new GenderRule],
            'address' => ['required', 'string'],
            'grade_id' => ['required', 'integer', 'min:1', 'exists:grades,id'],
            'role' => ['required', 'string', 'max:255', new RoleRule],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed']
        ];
    }
}
