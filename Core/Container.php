<?php

namespace Core;

use Exception;


class Container
{

    protected array $bindings = [];

    public function bind($key, $binder): void
    {
        $this->bindings[$key] = $binder;
    }

    /**
     * @throws Exception
     */
    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception("No matching bindings for key " . $key);
        }
        $resolver = $this->bindings[$key];
        return $resolver();
    }

}