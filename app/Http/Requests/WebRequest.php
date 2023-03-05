<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;

class WebRequest extends Request
{
    /**
     * Custom error response for validation.
     *
     * @return array
     */
    public function failedValidation(Validator $validator)
    {
        $toast = toastr();
        $errors = $validator->errors();

        foreach ($errors->all() as $message) {
            $toast->error($message, 'Validation');
        }

        return $toast;
    }
}
