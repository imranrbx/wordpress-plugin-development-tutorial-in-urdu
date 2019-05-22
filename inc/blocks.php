<?php
class pwspkBlocks{
	public function __construct(){
		add_action('init', array($this, 'pwspk_custom_block_01'));
	}
	public function pwspk_custom_block_01(){
		wp_register_script('pwspk-blocks-script', PLUGIN_URL."assets/js/blocks.js", array('wp-blocks','wp-element'));
		wp_register_style('pwspk-admin-style', PLUGIN_URL."assets/css/editor.css");
		wp_register_style('pwspk-front-style', PLUGIN_URL."assets/css/blocks.css");
		$name = "pwspk-plugin-dev/pwspk-block01";
		$args = array(
			'style' => 'pwspk-front-style',
			'editor_style' => 'pwspk-admin-style',
			'editor_script' => 'pwspk-blocks-script'
		);
		register_block_type($name, $args );
	}
} new pwspkBlocks;