<?php

namespace App\Enums;

class GuardNameEnum extends Enum
{
    /**
     * Enums list value, Remember always set this to lowercase.
     *
     * @return array<string, mixed>
     */
    public static function value()
    {
        return config()->get('guard.name');
    }
}
