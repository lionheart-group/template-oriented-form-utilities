<?php

namespace TofuPlugin\Base;

use Monolog\Logger as MonologLogger;

abstract class Migration
{
    /**
     * Get the SQL statement for the migration
     *
     * @return string
     */
    abstract public function sql(): string;

    /**
     * Whether to execute the SQL via $wpdb->query() instead of dbDelta().
     * Override and return true for ALTER TABLE or other non-CREATE statements.
     *
     * When returning true, the sql() method MUST return a properly prepared
     * statement (i.e. built with $wpdb->prepare()) to prevent SQL injection.
     *
     * @return bool
     */
    public function useRawQuery(): bool
    {
        return false;
    }
}
