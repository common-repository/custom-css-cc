<?php
/*
Plugin Name: Custom CSS CC
Plugin URI: http://hatul.info
Description:Test.
Author: Hatul
Version: 0.1
Author URI:http://hatul.info
*/
function add_css(){
echo '<style type="text/css">';
echo get_option('cc_custom_css');
echo '</style>';
}
add_action('wp_head','add_css');

function ccss_admin() {
  add_options_page(__('Custom CSS Options','ccss'),__('Custom CSS','ccss'), 'manage_options', 'cc_custom_css', 'ccss_options');
 add_action( 'admin_init', 'register_settings_cc' ); 	
}
// register settings
function register_settings_cc(){
  register_setting('ccss_settings','cc_custom_css');
}
function ccss_options() {
  #admin page
	?><div class="wrap">
	<h2><?php _e('Custom CSS options','ccss')?></h2>
	<form method="post" action="options.php">
	 <?php settings_fields( 'ccss_settings' ); ?>
	<p><?php _e('Enter custom CSS:','ccss'); ?></p>
	<textarea name="cc_custom_css" id="cc_custom_css" dir="ltr" cols="100" rows="10"><?php echo get_option('cc_custom_css');?></textarea>
	<p class="submit">
    	<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
   	</p>
	</form>
	</div><?php 
}
add_action('admin_menu', 'ccss_admin');
load_plugin_textdomain('ccss', false, dirname( plugin_basename( __FILE__ ) ) );
?>