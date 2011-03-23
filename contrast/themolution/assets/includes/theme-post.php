<?php

/**************************************************
	POSTS INIT
**************************************************/

function posts_init() {
	
	global
	$theme_posts;
	
	if (!empty($theme_posts)) {
		foreach ($theme_posts as $post) {
			register_post_type(replace($post['label']), $post);
			
			if (!empty($post['categories'])) {
				register_taxonomy(replace($post['categories']['label']), replace($post['label']), $post['categories']);
			}
		}
	}
}

add_action('init', 'posts_init');

?>