<?php

namespace TofuPlugin\Init;

use TofuPlugin\Models\Record;
use TofuPlugin\Models\Session;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Initializer {
    public static function activate() {
        // Activate step

        // Prepare tables
        Migrate::migrate();

        // Schedule garbage collection cron event
        if (!wp_next_scheduled('tofu_garbage_collection')) {
            wp_schedule_event(time(), 'daily', 'tofu_garbage_collection');
        }
    }

    public static function deactivate() {
        // Deactivate step

        // Drop tables
        // Disabled drop table function to prevent data loss
        // Migrate::dropTable(Record::getTableName());
        // Migrate::dropTable(Session::getTableName());
        // Migrate::dropTable(Migrate::getTableName());

        // Clear scheduled garbage collection
        $timestamp = wp_next_scheduled('tofu_garbage_collection');
        if ($timestamp) {
            wp_unschedule_event($timestamp, 'tofu_garbage_collection');
        }
    }

    public static function upgrade() {
        // Upgrade step

        // Prepare tables
        Migrate::migrate();
    }
}
