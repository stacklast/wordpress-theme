<?php
/* 
@package sunsettheme
   =============
    ADMIN ENQUEUE FUNCTIONS
   =============
*/

function sunset_load_admin_script( $hook ){

    if(  'toplevel_page_custom_sunset' != $hook ){
        return;
    }
    wp_register_style( 'sunset_admin', get_template_directory_uri() . '/css/sunset.admin.css', array(), '1.0.0', 'all' );
    
    wp_enqueue_style( 'sunset_admin' );
}

add_action( 'admin_enqueue_scripts', 'sunset_load_admin_script' );