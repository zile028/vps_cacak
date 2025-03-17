<?php

namespace Core;

use DOMDocument;

class Validation
{
    protected $data = [];
    protected $errors = [];
    protected $listErrors = [];
    protected $currentField = null;

    public function __construct($data)
    {
        unset($data["submit"]);
        unset($data["_method"]);
        $this->data = $data;
    }

    public function appendData($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function password($value, $rule = [])
    {
        $password = $value ?? null;
        $errors = [];
        $defaultRule = [
            "min" => 6,
            "max" => 12,
            "uppercase" => 1,
            "lowercase" => 1,
            "number" => 2,
            "string" => 2,
            "special" => 1,
            "nospace" => true,
            "disallow" => []
        ];

        $rules = array_merge($defaultRule, $rule);

        if (strlen($password) < $rules["min"]) {
            $errors[] = "Mora imati minimum {$rules["min"]} karaktera!";
        }
        if (strlen($password) > $rules["max"]) {
            $errors[] = "Mora imati maksimalno {$rules["max"]} karaktera!";
        }

        // Brojanje tipova karaktera
        $uppercaseCount = preg_match_all('/[A-Z]/', $password);
        $lowercaseCount = preg_match_all('/[a-z]/', $password);
        $stringCount = preg_match_all('/[a-z]|[A-Z]/', $password);
        $numberCount = preg_match_all('/[0-9]/', $password);
        $specialCount = preg_match_all('/[\W_]/', $password);

        if ($stringCount < $rules["string"]) {
            $errors[] = "Mora sadržati minimum {$rules["string"]} slova!";
        }

        if ($uppercaseCount < $rules["uppercase"]) {
            $errors[] = "Mora sadržati minimum {$rules["uppercase"]} velika slova!";
        }
        if ($lowercaseCount < $rules["lowercase"]) {
            $errors[] = "Mora sadržati minimum {$rules["lowercase"]} mala slova!";
        }

        if ($numberCount < $rules["number"]) {
            $errors[] = "Mora sadržati minimum {$rules["number"]} broja!";
        }

        if ($specialCount < $rules["special"]) {
            $errors[] = "Mora sadržati minimum {$rules["special"]} specijalnih karaktera!";
        }

        if ($rules['nospace'] && preg_match('/\s/', $password)) {
            $errors[] = "Lozinka ne sme sadržati razmake.";
        }

        foreach ($rules['disallow'] as $forbidden) {
            if (str_contains($password, $forbidden)) {
                $errors[] = "Lozinka ne sme sadržati '{$forbidden}'.";
            }
        }

        // Ako postoje greške, dodaj ih u listErrors
        if (!empty($this->errors)) {
            array_unshift($errors, "Lozinka nije ispravna!");
            $this->listErrors = array_merge($this->listErrors, $errors);
        }
        return empty($errors) ? $value : false;

    }

    public function containe($value, $str)
    {
        $value = self::sanitizeString($value);
        $result = array_filter($str, function ($item) use ($value) {
            return $item == $value;
        });
        return count($result) > 0;
    }

    public static function string($value, $min = 1, $max = INF)
    {
        $value = self::sanitizeString($value);
        return strlen($value) >= $min && strlen($value) <= $max ? $value : false;
    }

    public static function nospace($value, $min = 1, $max = INF)
    {
        $value = self::sanitizeString($value);
        return str_contains($value, ' ') ? false : $value;

    }

    public static function email($value)
    {
        $value = self::sanitizeString($value);
        return preg_match("/.+@+.+\.+./", $value) ? $value : false;

    }

    public static function url($value): bool|string
    {
        $value = self::sanitizeString($value);
        return !filter_var($value, FILTER_VALIDATE_URL) ? false : $value;
    }

    public static function compare($value1, $value2)
    {
        $value1 = self::sanitizeString($value1);
        $value2 = self::sanitizeString($value2);
        return $value1 === $value2 ? $value1 : false;

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

    public static function html($value)
    {
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($value);
        $errors = libxml_get_errors();
        libxml_clear_errors();
        return empty($errors) ? false : $value;

    }

    public function validate($field, $rule, $errorMessage, ...$props)
    {

        if (method_exists($this, $rule)) {
            $result = call_user_func_array([$this, $rule], array_merge([$this->data[$field]], $props));
            if ($result === false) {
                if (!is_null($errorMessage)) {
                    $this->errors[$field][] = $errorMessage;
                    $this->listErrors[] = $errorMessage;
                }
            } else {
                $this->data[$field] = $result;
            }
        }
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    public function getErrors(bool $list = false): array
    {
        return $list ? $this->listErrors : $this->errors;
    }

    public function getListErrors()
    {
        return $this->listErrors;
    }

    public function hasError(): bool
    {
        return !empty($this->errors);
    }
}