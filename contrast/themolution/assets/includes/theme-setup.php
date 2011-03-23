<?php

/**************************************************
	THEME SETUP
**************************************************/

function theme_setup() {
	
	global
	$theme_setups;
	
	if (!empty($theme_setups)) {
		if ($theme_setups['custom_background']) {
			add_custom_background();
		}
		
		if ($theme_setups['editor_style']) {
			add_editor_style();
		}
		
		if ($theme_setups['post_thumbnails']) {
			add_theme_support('post-thumbnails');
		}
		
		if ($theme_setups['automatic_feed_links']) {
			add_theme_support('automatic-feed-links');
		}
	}
}

add_action('after_setup_theme', 'theme_setup');

?>