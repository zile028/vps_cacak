<?php

namespace Core\Middleware;

class Middleware
{
    public const MAP = [
        "guest" => Guest::class,
        "auth" => Authenticated::class,
        "admin" => Admin::class,
        "moderator" => Moderator::class
    ];

    public static function getRoles(): array
    {
        return array_keys(static::MAP);
    }

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }
        $middleware = static::MAP[$key] ?? false;

        if (!$middleware) throw new \Exception("No matching middleware found for key $key.");

        (new $middleware)->handle();
    }
}