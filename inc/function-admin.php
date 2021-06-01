<?php
/* 
@package sunsettheme
   =============
    ADMIN PAGE
   =============
*/
add_action( 'admin_menu', 'sunset_add_admin_page' );
function sunset_add_admin_page() {
    // Generate Admin Page
    add_menu_page( 
        __( 'Sunset Theme Options', 'sunset' ),
        __( 'Sunset Theme Options', 'sunset' ),
        'manage_options', 
        'custom_sunset', 
        'sunset_theme_create_page', 
        'dashicons-admin-customizer', 
        110 
    );
    // Generate Admin Sub Page
    add_submenu_page(
        'custom_sunset',
        'Sunset Theme Options',
        'General',
        'manage_options',
        'custom_sunset',
        'sunset_theme_create_page'

    );
    add_submenu_page(
        'custom_sunset',
        'Sunset CSS Options',
        'Custom CSS',
        'manage_options',
        'custom_sunset_css',
        'sunset_theme_settings_page'
    );
}
function sunset_theme_create_page() {
    require_once get_template_directory()."/inc/templates/sunset-admin.php";
}
function sunset_theme_settings_page() {
    echo '<h1>Sunset  Settings Options</h1>';
}

