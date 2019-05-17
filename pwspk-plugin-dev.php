<?php
/**
 * Plugin Name: PWSPK Dev Plugin
 * Plugin Uri: https://bestsoftpro.com
 * Author: Imran Qasim
 * Author Uri: http://perfectwebsolutions.info
 * Version: 1.0.0
 * Description: This is a Basic Tutorial Plugin on our Youtube Channel PerfectWebSolutions.
 * Tags: tag1, tag2, perfectwebsolutions
 * Lisence: GPL V2
 */

defined('ABSPATH') || die("You Can't Access this File Directly");
define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));

include PLUGIN_PATH."inc/shortcodes.php";
include PLUGIN_PATH."inc/metaboxes.php";
include PLUGIN_PATH."inc/custom_post_types.php";
include PLUGIN_PATH."inc/ajax.php";

//add_filter('the_title', 'pwspk_the_title');
function pwspk_the_title($title){
	return "<strong>{$title}</strong>";
}
add_action('wp_enqueue_scripts', 'pwspk_wp_enqueue_scripts');
add_action('admin_enqueue_scripts', 'pwspk_admin_enqueue_scripts');
function pwspk_wp_enqueue_scripts(){
	wp_enqueue_script('jquery');
	wp_enqueue_style('pwspk_dev_plugin', PLUGIN_URL."assets/css/style.css");
	wp_enqueue_script('pwspk_dev_script', PLUGIN_URL."assets/js/custom.js", array(), '1.0.0', false);
	wp_localize_script('pwspk_dev_script', 'ajax_object', array(
		'ajaxurl'=> admin_url('admin-ajax.php'), 
		'num1'=>20
		)
	);
}
function pwspk_admin_enqueue_scripts(){
	wp_enqueue_script('pwspk_dev_script', PLUGIN_URL."assets/js/custom.js", array(), '1.0.0', false);
}
add_action('admin_menu', 'pwspk_plugin_menu');
add_action('admin_menu', 'pwspk_process_form_settings');
function pwspk_plugin_menu(){
	add_menu_page( 'PWSPK Options', 'PWSPK Options', 'manage_options', 'pwspk-options', 'pwspk_options_func', $icon_url = '', $position = null);
	add_submenu_page('pwspk-options', 'PWSPK Settings', 'PWSPK Settings', 'manage_options', 'pwspk-settings', 'pwspk_settings_func');
	add_submenu_page('pwspk-options', 'PWSPK Layout', 'PWSPK Layout', 'manage_options', 'pwspk-layout', 'pwspk_layout_func');
	
}
register_activation_hook(__FILE__, function(){
	add_option('pwspk_option_1', '');
});
register_deactivation_hook(__FILE__, function(){
	delete_option('pwspk_option_1');

});
function pwspk_process_form_settings(){
	register_setting('pwspk_option_group', 'pwspk_option_name' );
	if(isset($_POST['action']) && current_user_can('manage_options')){
		update_option('pwspk_option_1', sanitize_text_field($_POST['pwspk_option_1']));
	}
}
function pwspk_options_func(){ ?>
	<div class="wrap">
		<h1>PWSPK Options Menu</h1>
		<?php settings_errors(); ?>
		<form id="ajax_form" action="options.php" method="post">
			<?php settings_fields('pwspk_option_group'); ?>
			<label for="">Setting One: <input type="text" name="pwspk_option_1" value="<?php echo esc_html(get_option('pwspk_option_1')); ?>" /></label>
			<?php submit_button('Save Changes'); ?>
		</form>
		<?php include PLUGIN_PATH."inc/api.php"; ?>
	</div>
<?php
}
function pwspk_settings_func(){
	echo "<h1> PWSPK Settings Menu </h1>";
}

function pwspk_layout_func(){
	echo "<h1> PWSPK Layout Menu </h1>";
}