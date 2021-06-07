<h1>Sunset  Theme Options</h1>
<?php settings_errors(); ?>
<?php 
 $firstName = esc_attr( get_option( 'first_name' ) ) ;
 $lastName = esc_attr( get_option( 'last_name' ) ) ;
 $fullName = $firstName . ' ' . $lastName;
 $description = esc_attr( get_option( 'user_description' ) ) ;
 $twittter = esc_attr( get_option( 'twitter_handler' ) ) ;
 $facebook = esc_attr( get_option( 'facebook_handler' ) ) ;
 $googlep = esc_attr( get_option( 'googlep_handler' ) ) ;
?>
<div class="sunset-sidebar-preview">
    <div class="sunset-sidebar">
        <h1 class="sunset-username"><?php print $fullName; ?></h1>
        <h2 class="sunset-description"><?php print $description; ?></h2>
        <div class="icon-wrapper">

        </div>
    </div>
</div>
<form method="post" action="options.php" class="sunset-general-form">
    <?php settings_fields('sunset-settings-group'); ?>
    <?php do_settings_sections( 'custom_sunset' ); ?>
    <?php submit_button(); ?>
</form>