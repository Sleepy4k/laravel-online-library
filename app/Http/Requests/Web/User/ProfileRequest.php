<?php

namespace App\Http\Requests\Web\User;

use App\Rules\GenderRule;
use App\Http\Requests\WebRequest;

class ProfileRequest extends WebRequest
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
            'age' => ['required', 'integer', 'min:1', 'max:150'],
            'email' => ['required', 'email:dns', 'max:255', 'unique:users,email,' . auth()->user()->id],
            'phone' => ['required', 'string', 'max:255', 'unique:users,phone,' . auth()->user()->id],
            'gender' => ['required', 'string', 'max:255', new GenderRule],
            'address' => ['required', 'string'],
        ];
    }
}
