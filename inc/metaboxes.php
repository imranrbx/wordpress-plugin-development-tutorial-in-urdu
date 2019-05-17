<?php
defined('ABSPATH') || die("Nice Try");
add_action('admin_init', function(){
	add_meta_box('_mycustommetabox', "My Custom MetaBox", 'pwspk_custom_metabox', ['post', 'page']);
});
function pwspk_custom_metabox($post){
	$_mymetabox = get_post_meta($post->ID, '_mymetabox', true) ? get_post_meta($post->ID, '_mymetabox', true) : '';
	$_myselectbox = get_post_meta($post->ID, '_myselectbox', true) ? get_post_meta($post->ID, '_myselectbox', true) : '';
	?>
	<input type="text" id="" name="_mymetabox" class="" value="<?php echo $_mymetabox; ?>" />
	<br>
	<select name="_selectbox" id="">
		<option value="1" <?php echo $_myselectbox == 1 ? 'selected' : '' ?>>One</option>
		<option value="2" <?php echo $_myselectbox == 2 ? 'selected' : '' ?>>Two</option>
		<option value="3"<?php echo $_myselectbox == 3 ? 'selected' : '' ?>>Three</option>
	</select>
	<?php
}
add_action('save_post', 'pwspk_save_post');

function pwspk_save_post($post_id){
	if(array_key_exists('_mymetabox', $_POST) && array_key_exists('_selectbox', $_POST)){
		update_post_meta($post_id, '_mymetabox', $_POST['_mymetabox']);
		update_post_meta($post_id, '_myselectbox', $_POST['_selectbox']);
	}
}
add_action('the_post', 'pwspk_custom_the_post');
function pwspk_custom_the_post($post){
	if(is_single() || is_home() || is_front_page()):
		$_mymetabox = get_post_meta($post->ID, '_mymetabox', true) ? get_post_meta($post->ID, '_mymetabox', true) : '';
		?>
			<style>
				article#post-<?php echo $post->ID; ?>{
					background-color: <?php echo $_mymetabox; ?>;
					color: #fff;
				}
			</style>
		<?php
	endif;
}








