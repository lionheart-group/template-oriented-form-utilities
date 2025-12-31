<?php

namespace TofuPlugin\Models;

use TofuPlugin\Base\DatabaseModels as AbstractModels;
use TofuPlugin\Logger;
use TofuPlugin\Structure\DatabaseModelColumn;

class Session extends AbstractModels {
    const TABLE_SUFFIX = 'tofu_sessions';

    protected static function columns(): array
    {
        return [
            new DatabaseModelColumn('form_id', DatabaseModelColumn::COLUMN_STRING, true),
            new DatabaseModelColumn('session_key', DatabaseModelColumn::COLUMN_STRING, true),
            new DatabaseModelColumn('session_value', DatabaseModelColumn::COLUMN_STRING, true),
            new DatabaseModelColumn('expiration', DatabaseModelColumn::COLUMN_DATETIME, true),
        ];
    }

    /**
     * Get session value by form ID and session key
     *
     * @param string $form_id
     * @param string $session_key
     * @return ?string
     */
    public static function get(string $form_id, string $session_key): ?string
    {
        global $wpdb;
        $table = static::getTableName();

        $query = $wpdb->prepare(
            "SELECT session_value FROM {$table} WHERE form_id = %s AND session_key = %s AND expiration > %s",
            $form_id,
            $session_key,
            \current_time('mysql')
        );
        $row = $wpdb->get_var($query);

        return $row;
    }

    /**
     * Check if a session exists by form ID and session key
     *
     * @param string $form_id
     * @param string $session_key
     * @return bool
     */
    public static function exists(string $form_id, string $session_key): bool
    {
        global $wpdb;
        $table = static::getTableName();

        $query = $wpdb->prepare(
            "SELECT COUNT(*) FROM {$table} WHERE form_id = %s AND session_key = %s",
            $form_id,
            $session_key
        );
        $count = $wpdb->get_var($query);

        return $count > 0;
    }

    /**
     * Clear expired sessions
     *
     * @return void
     */
    public static function clearExpired(): void
    {
        global $wpdb;
        $table = static::getTableName();

        $wpdb->query(
            $wpdb->prepare(
                "DELETE FROM {$table} WHERE expiration <= %s",
                \current_time('mysql')
            )
        );
    }
}
