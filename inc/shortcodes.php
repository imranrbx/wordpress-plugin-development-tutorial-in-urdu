<?php
add_action('init', 'pwspk_init');

function pwspk_init(){
	add_shortcode('test', 'pwspk_my_shortcode');
}
function pwspk_my_shortcode($atts){
	$atts = shortcode_atts(array(
		'message' => 'Hello, World!',
	), $atts, 'test');
	return $atts['message'];
}