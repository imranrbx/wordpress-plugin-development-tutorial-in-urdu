<?php defined('ABSPATH') || die("Nice Try"); 
	
	$post = wp_remote_retrieve_body(wp_remote_post('https://jsonplaceholder.typicode.com/posts', [
			'body' => [
				'title' => 'This is Dummy Post Title',
				'body' => 'This is Body for the Dummy Post Title',
				'userId' => 10
			],
			'method' => 'POST',
			'content-type' => 'application/json',
		]));
	print_r($post);

	 $posts = wp_remote_retrieve_body(wp_remote_get('https://jsonplaceholder.typicode.com/posts'));
	 
	 $posts = json_decode($posts);
?>
<table class="widefat fixed striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>userId</th>
			<th>Title</th>
			<th>Body</th>
			
		</tr>
	</thead>
	<tbody>
		<?php foreach($posts as $p): ?>
		<tr>
			<td><?php echo $p->id; ?></td>
			<td><?php echo $p->userId; ?></td>
			<td><?php echo $p->title; ?></td>
			<td><?php echo $p->body; ?></td>
			
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php