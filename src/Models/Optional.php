<?php
/**
 * @via Laravel Optional class concept
 */

namespace TofuPlugin\Models;

use ArrayAccess;

class Optional
{
    /** @var mixed */
    protected $value;

    /**
     * @param mixed $value
     * @return Optional
     */
    public static function of($value): Optional
    {
        return new Optional($value);
    }

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        if (is_object($this->value)) {
            return $this->value->{$key} ?? null;
        }

        if (is_array($this->value)) {
            return $this->value[$key] ?? null;
        }

        return null;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function __isset($key): bool
    {
        if (is_object($this->value)) {
            return isset($this->value->{$key});
        }

        if (is_array($this->value)) {
            return isset($this->value[$key]);
        }

        return false;
    }

    /**
     * @param string $method
     * @param array<mixed> $arguments
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        if (is_object($this->value) && method_exists($this->value, $method)) {
            return $this->value->{$method}(...$arguments);
        }

        return null;
    }
}
