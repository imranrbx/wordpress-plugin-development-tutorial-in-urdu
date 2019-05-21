<?php
class pwspkBlocks{
	public function __construct(){
		add_action('init', array($this, 'pwspk_custom_block_01'));
	}
	public function pwspk_custom_block_01(){
		wp_register_script('pwspk-blocks-script', PLUGIN_URL."/assets/js/blocks.js", array('wp-blocks','wp-element'));
		$name = "pwspk-plugin-dev/pwspk-block01";
		$args = array('editor_script' => 'pwspk-blocks-script');
		register_block_type($name, $args );
	}
} new pwspkBlocks;