<?php
/**
 * Register new route api wordpress.
 *
 * @package Post_Views_Counter
 */
 
class Register_New_Counter {
 
    /**
     * Initializes all of the partial classes.
     */
    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'new_register_route') );
    }
 
    /**
     * Create new route api wordpress
     */
    public function new_register_route() {
        
        if ( is_singular() ) { 
            
            global $wpdb;
            $table = $wpdb->prefix . 'post_views_counter';
            $result = $wpdb->get_results("SELECT * FROM ".$table." WHERE post_id = '".get_the_ID()."' ");
    
            if (empty($result)) {
                $sql = "INSERT INTO ".$table." (`post_id`, `pageviews`, `created_at`) VALUES ('".get_the_ID()."', 1, now())";
            } else {
                $countPagesViews = 0;
                $countPagesViews = $result[0]->pageviews + 1;
                $sql = "UPDATE ".$table." SET `pageviews` = ".$countPagesViews." WHERE `post_id` = '".get_the_ID()."' ";
            }
    
            $wpdb->query($sql);
            
       
        }
    }
}