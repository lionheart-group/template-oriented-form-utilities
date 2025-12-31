<?php

namespace TofuPlugin\Structure;

/**
 * Database model column class.
 *
 * This class is used to define the configuration for a database model column.
 *
 * @package TofuPlugin\Structure
 */
class DatabaseModelColumn
{
    const COLUMN_STRING = 'string';
    const COLUMN_INT = 'int';
    const COLUMN_FLOAT = 'float';
    const COLUMN_DATETIME = 'datetime';

    /** @var string Column name. */
    public $name;

    /** @var string Column type. */
    public $type;

    /** @var bool Is the column required. */
    public $required;

    /**
     * @param string $name Column name.
     * @param string $type Column type.
     * @param bool $required Is the column required.
     */
    public function __construct(
        string $name,
        string $type,
        bool $required = false
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->required = $required;
    }
}
