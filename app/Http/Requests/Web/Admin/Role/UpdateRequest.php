<?php

namespace App\Http\Requests\Web\Admin\Role;

use App\Rules\GuardNameRule;
use App\Http\Requests\WebRequest;

class UpdateRequest extends WebRequest
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
            'name' => ['required', 'string', 'max:255', 'unique:roles,name,' . $this->route('role')],
            'guard_name' => ['required', 'string', 'max:255', new GuardNameRule],
        ];
    }
}
