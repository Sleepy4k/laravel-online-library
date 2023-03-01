<?php

namespace App\Rules;

use App\Enums\LanguageEnum;
use Illuminate\Contracts\Validation\Rule;

class LanguageRule implements Rule
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
        return in_array(strtolower($value), LanguageEnum::get('lower'));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('rule.language.message');
    }
}
