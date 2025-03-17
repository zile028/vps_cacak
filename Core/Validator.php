<?php

namespace Core;
class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $value = self::sanitizeString($value);
        return strlen($value) >= $min && strlen($value) <= $max ? $value : false;
    }

    public static function email($value)
    {
        $value = self::sanitizeString($value);
        return preg_match("/.+@+.+\.+./", $value) ? $value : false;

    }

    public static function compareValue($value1, $value2)
    {
        $value1 = self::sanitizeString($value1);
        $value2 = self::sanitizeString($value2);
        return $value1 === $value2;

    }

    public static function sanitizeString($value): string
    {
        return strip_tags(trim($value));
    }

    public static function number($value, int $min, $max = INF)
    {
        $value = (float)self::sanitizeString($value);
        return $value >= $min && $value <= $max;
    }

}