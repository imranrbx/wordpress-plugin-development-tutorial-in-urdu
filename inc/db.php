<?php 
defined('ABSPATH') || die('Nice Try');

register_activation_hook(PLUGIN_FILE, function(){
	global $wpdb;
	$prefix = $wpdb->prefix;
	$collate = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE `{$prefix}likesdislikes` (
  			`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  			`user_id` int(11) DEFAULT NULL,
  			`post_id` int(11) DEFAULT NULL,
  			`like` int(11) DEFAULT NULL,
  			`dislike` int(11) DEFAULT NULL,
  			`date_added` timestamp NULL DEFAULT NULL,
  			PRIMARY KEY (`id`)
		) {$collate};";
require_once(ABSPATH.'wp-admin/includes/upgrade.php');
dbDelta($sql);
});
register_activation_hook(PLUGIN_FILE, function(){
	global $wpdb;
	$prefix = $wpdb->prefix;
	$table = $prefix."likesdislikes";
	$data = array(
		'user_id' => 1,
		'post_id' => 1,
		'like' => 1,
		'dislike' => 0,
		'date_added' => current_time('mysql'),
	);
	$wpdb->insert($table, $data);
});

register_deactivation_hook(PLUGIN_FILE, function(){
		global $wpdb;
	$prefix = $wpdb->prefix;
	$table = $prefix."likesdislikes";
	$sql = "TRUNCATE TABLE `{$table}`;";
	$wpdb->query($sql);
});



