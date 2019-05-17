<?php
defined('ABSPATH') || die("Nice Try");
add_action('wp_ajax_my_ajax_action', 'pwspk_ajax_action');
add_action('wp_ajax_my_front_ajax_action', 'pwspk_my_front_ajax_action');
add_action('wp_ajax_nopriv_my_front_ajax_action', 'pwspk_my_front_ajax_action');

function pwspk_ajax_action(){
	if(isset($_POST['action']) && isset($_POST['option1'])){
		update_option('pwspk_option_1', sanitize_text_field($_POST['option1']));
		echo "Field Successfully Updated.";
	}else{
		echo "Error Updating Field";
	}
	wp_die();
}

function pwspk_my_front_ajax_action(){
	if(isset($_POST['action']) && isset($_POST['value'])){
		
		echo absint($_POST['value']) + 10;
	}else{
		echo "Error getting Field";
	}
	wp_die();
}