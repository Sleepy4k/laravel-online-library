<?php

namespace App\Http\Requests\Web\Admin\Publisher;

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
            'name' => ['required', 'string', 'max:255', 'unique:publishers,name,' . $this->route('publisher')],
        ];
    }
}
