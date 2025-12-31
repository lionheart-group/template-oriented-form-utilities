<?php

namespace TofuPlugin\Structure;

/**
 * Field value structure with dynamic property access.
 *
 * @property-read string $field The field name.
 * @property-read mixed $value The field value.
 */
class FieldValue
{
    /** @var array<string, mixed> */
    protected $data = [];

    /**
     * @param string $field
     * @param mixed $value
     */
    public function __construct(string $field, $value)
    {
        $this->data['field'] = $field;
        $this->data['value'] = $value;
    }

    /**
     * @param mixed $newValue
     * @return void
     */
    public function updateValue($newValue): void
    {
        $this->data['value'] = $newValue;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->data[$name];
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset($name): bool
    {
        return isset($this->data[$name]);
    }
}
