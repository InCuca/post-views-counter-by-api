<?php
/**
 * Creates table usaded for the plugin.
 *
 * @package Post_Views_Counter
 */

class Create_Table_Counter {
    
    function __construct(){
        register_activation_hook( __FILE__, 'post_views_counter_create_db' );

        global $wpdb;
        $version = get_option( 'post_views_counter_create_db', '0.0.1' );
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'post_views_counter';

        $sql = "CREATE TABLE $table_name (
            id int(11) NOT NULL AUTO_INCREMENT,
            post_id varchar(50) NOT NULL,
            pageviews int(11) unsigned NOT NULL DEFAULT '0',
            created_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            UNIQUE KEY id (id)
        ) $charset_collate;";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

}