<?php

namespace App\Enums;

class RoleEnum extends Enum
{
    /**
     * Enums list value, Remember always set this to lowercase.
     *
     * @return array<string, mixed>
     */
    public static function value()
    {
        return config()->get('role.seeder.list');
    }
}
