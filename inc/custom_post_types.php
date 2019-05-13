<?php
add_action('init', 'pwspk_news_post');
function pwspk_news_post(){
	register_post_type('news', array(
		'label' => "Global News",
		'labels' => array(

		),
		'public' => true,
		'description' => 'Test Custom Post Type for news',
		'supports' => ['title', 'editor', 'comments', 'custom-fields', 'thumbnail'],
	));
}
add_filter("template_include", 'pwspk_news_template');
function pwspk_news_template($template){
	global $post;
	if(is_single() AND $post->post_type == 'news'){
		$template = PLUGIN_PATH . 'templates/pwspk_news.php';
	}
	return $template;
}
