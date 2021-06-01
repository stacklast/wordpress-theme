<?php
/* 
@package sunsettheme
   =============
    ADMIN PAGE
   =============
*/
add_action( 'admin_menu', 'sunset_add_admin_page' );
function sunset_add_admin_page() {
    add_menu_page( 
        __( 'Sunset Theme page', 'sunset' ),
        __( 'Sunset Theme menu', 'sunset' ),
        'manage_options', 
        'custom-sunset', 
        'sunset_theme_create_page', 
        'dashicons-admin-customizer', 
        110 
    );
}
function sunset_theme_create_page() {
    echo '<h1>Sunset  Theme Options</h1>';
}


