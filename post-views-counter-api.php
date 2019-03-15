<?php
/**
 * 
 * The plugin bootstrap file
 * 
 * Plugin Name: Post Views Counter
 * Plugin URI:  https://www.incuca.net/
 * Description: Show posts views count in WordPress API
 * Version:  0.0.1
 * Author: InCuca
 * Author URI: https://incuca.net/
 * 
 * @package Post_Views_Counter
 * 
 */

if ( !defined( 'WPINC' ) ) {
    die;
}

/**
 * Includes class for project.
 */
foreach ( glob( plugin_dir_path( __FILE__ ) . 'includes/*.php' ) as $file ) {
    include_once $file;
}

/**
 * Start project ;D
 */
add_action( 'plugins_loaded', 'post_views_counter' );
function post_views_counter() {

    $createTable = new Create_Table_Counter();
    $registerNewVisit = new Register_New_Counter();
    $newEndPointt = new New_Router_Counter();

}