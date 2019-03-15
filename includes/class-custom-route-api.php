<?php
/**
 * Register counter post view.
 *
 * @package Post_Views_Counter
 */
 
class New_Router_Counter {
 
    /**
     * Initializes all of the partial classes.
     */
    public function __construct() {
        add_action( 'rest_api_init', array( $this, 'register_new_visit') );
    }
 
    /**
     * Create function register new visit
     */
    function register_new_visit() {
        register_rest_route( 'views-counter', '/post/', 
            array(
                'methods' => 'GET',
                'callback' => array( $this, 'post_views_counter_api')
            ) 
        );
    
        register_rest_route( 'views-counter', 'post/(?P<number>[a-zA-Z0-9-]+)', 
            array(
                'methods' => 'GET',
                'callback' => array( $this, 'post_views_counter_api_by_id')
            )
        );
    }

    /**
     * Function callaback views-counter/post
     * Return all register in table post_views_counter.
     */
    function post_views_counter_api() {

        global $wpdb;
        $table = $wpdb->prefix . 'post_views_counter';
        $result = $wpdb->get_results("SELECT * FROM ".$table);
                
        wp_reset_postdata();
                
        return rest_ensure_response( $result );
    }
    
    /**
     * Function callaback views-counter/post/post_id
     * Return register in table post_views_counter by id.
     */
    function post_views_counter_api_by_id( $request ) {
    
        $response = urldecode($request->get_param('number')); 
    
        global $wpdb;
        $table = $wpdb->prefix . 'post_views_counter';
        $result = $wpdb->get_results("SELECT * FROM ".$table." WHERE post_id = '".$response."' ");
            
        wp_reset_postdata();
                
        return rest_ensure_response( $result );
    }


}