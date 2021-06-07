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

    // activate custom settings
    add_action('admin_init', 'sunset_custom_settings');
}

function sunset_custom_settings() {
    
    register_setting( 'sunset-settings-group', 'first_name', 'sanitize_text_field');
    register_setting( 'sunset-settings-group', 'last_name', 'sanitize_text_field');
    register_setting( 'sunset-settings-group', 'twitter_handler', 'sunset_sanitize_twitter_handler');
    register_setting( 'sunset-settings-group', 'facebook_handler', 'sanitize_text_field');
    register_setting( 'sunset-settings-group', 'googlep_handler', 'sanitize_text_field');

    add_settings_section( 'sunset-sidebar-options', 'Sidebar Options', 'sunset_sidebar_options', 'custom_sunset' );
    add_settings_field( 'sidebar-name', 'Full Name', 'sunset_sidebar_name', 'custom_sunset', 'sunset-sidebar-options' );
    add_settings_field( 'sidebar-twitter', 'Twitter Handler', 'sunset_sidebar_twitter', 'custom_sunset', 'sunset-sidebar-options' );
    add_settings_field( 'sidebar-facebook', 'Facebook Handler', 'sunset_sidebar_facebook', 'custom_sunset', 'sunset-sidebar-options' );
    add_settings_field( 'sidebar-googlep', 'Google+ Handler', 'sunset_sidebar_googlep', 'custom_sunset', 'sunset-sidebar-options' );
}

function sunset_sidebar_options(){
    echo 'Customize your sidebar information';
}

function sunset_sidebar_name(){
    $firstName = esc_attr( get_option( 'first_name' ) ) ;
    $lastName = esc_attr( get_option( 'last_name' ) ) ;
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" />';
    echo '<input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}

/*
    SANITIZATIONS
*/
function sunset_sanitize_twitter_handler( $input ){
    $output = sanitize_text_field( $input );
    $output = str_replace('@', '', $output);
    return $output; 
}

function sunset_theme_create_page() {
    require_once get_template_directory()."/inc/templates/sunset-admin.php";
}

function sunset_sidebar_twitter(){
    $twittter = esc_attr( get_option( 'twitter_handler' ) ) ;
    echo '<input type="text" name="twitter_handler" value="'.$twittter.'" placeholder="Twitter Handler" />
    <p class="description" id="tagline-description">Put input without @.</p>';
}
function sunset_sidebar_facebook(){
    $twittter = esc_attr( get_option( 'facebook_handler' ) ) ;
    echo '<input type="text" name="facebook_handler" value="'.$twittter.'" placeholder="Facebook Handler" />';
}
function sunset_sidebar_googlep(){
    $twittter = esc_attr( get_option( 'googlep_handler' ) ) ;
    echo '<input type="text" name="googlep_handler" value="'.$twittter.'" placeholder="Google+ Handler" />';
}

function sunset_theme_settings_page() {
    echo '<h1>Sunset  Settings Options</h1>';
}

