<?php

namespace App\Rules;

use App\Enums\GenderEnum;
use Illuminate\Contracts\Validation\Rule;

class GenderRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array(strtolower($value), GenderEnum::get('lower'));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('rule.gender.message');
    }
}
