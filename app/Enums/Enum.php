<?php

namespace App\Enums;

class Enum
{
    /**
     * Enums list value, Remember always set this to lowercase.
     *
     * @return array<string, mixed>
     */
    public static function value()
    {
        return [];
    }

    /**
     * Get enum value from each value and transform it to spesific value.
     *
     * @param string $type
     * @return array<string, mixed>
     */
    public static function get(string $type = 'upper')
    {
        $new_values = [];
        $values = static::value();

        foreach ($values as $value) {
            if ($type == 'upper') {
                $new_values[] = strtoupper($value);
            } elseif ($type == 'lower') {
                $new_values[] = strtolower($value);
            }
        }

        return $new_values;
    }
}
