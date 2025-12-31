<?php

namespace TofuPlugin\Structure;

class ValidationError
{
    /** @var string */
    public $field;

    /** @var string */
    public $message;

    /**
     * @param string $field
     * @param string $message
     */
    public function __construct(string $field, string $message)
    {
        $this->field = $field;
        $this->message = $message;
    }

    public function __toString(): string
    {
        return $this->message;
    }
}
