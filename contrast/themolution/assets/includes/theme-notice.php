<?php

/**************************************************
	THEME CACHE NOTICE
**************************************************/

function theme_cache_notice() {
	
	if (!is_writable(THEMECACHE) && is_admin()) {
		echo
			'<div class="error">',
				'<p>In order for <b>' . THEMENAME . '</b> to function properly, please make sure you set <b>' . THEMECACHE . '</b> folder to be rewritable</p>',
			'</div>';
	}
}

add_action('admin_notices', 'theme_cache_notice');

/**************************************************
	THEME UPDATE NOTICE
**************************************************/

function theme_update_notice() {
	
	global
	$theme_feeds;
	
	if (!empty($theme_feeds) && is_admin()) {
		include_once( ABSPATH . WPINC . '/feed.php' );
		
		$feed = fetch_feed($theme_feeds);
		
		if (!is_wp_error($feed)) {
			$max = $feed->get_item_quantity(1);
			$items = $feed->get_items();
			$feed->enable_cache(0);
		}
		
		if ($max > 0) {
			foreach ($items as $item) {
				if ($item->get_title() == THEMENAME && $item->get_description() > THEMEVERSION) {
					echo
						'<div class="update-nag">',
							'Version <b>' . $item->get_description() . '</b> for <b>' . THEMENAME . '</b> is available! <a href="' . $item->get_link() .'">Click here to download the update</a>',
						'</div>';
				}
			}
		}
	}
}

add_action( 'admin_notices', 'theme_update_notice');

?>