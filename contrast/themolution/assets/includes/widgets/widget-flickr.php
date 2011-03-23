<?php

/**************************************************
	WIDGET FLICKR
**************************************************/

function widget_flickr($args) {
	
	require_once(ABSPATH . WPINC . '/rss.php');
	
	extract($args);
	
	$options = get_option('widget_flickr');
	$url = 'http://flickr.com/services/feeds/photos_public.gne?id=' . $options['account'] . '&format=rss_200';
	$rss = fetch_rss($url);
	
	if (!empty($rss->items)) {
		$data = array_slice($rss->items, 0, $options['display']);
		
		foreach ($data as $item) {
			preg_match_all('/src=["\']([^"\']+)/si', $item['description'], $src);
			
			$src = str_replace('_m.jpg', '_s.jpg', $src[1][0]);
			$items = $items . '<li><a href="' . $item['link']. '"><img src="' . $src . '" alt="' . $item['title'] . '" /></a></li>';
		}
		
		echo
			$before_widget,
				$before_title . $options['title'] . $after_title,
				'<ul>',
					$items,
				'</ul>',
			$after_widget;
	}
}

/**************************************************
	WIDGET CONTROLS
**************************************************/

function widget_control_flickr() {
	
	$options = get_option('widget_flickr');
	
	if (empty($options)) {
		$options = array(
			'title' => 'Flickr Stream',
			'account' => '50883075%40N05',
			'display' => '9'
		);
	}
	
	if ($_POST['submit']) {
		foreach (array_keys($options) as $option) {
			$options[$option] = strip_tags(stripslashes($_POST[$option]));
		}
		
		update_option('widget_flickr', $options);
	}
	
	echo
		'<p>',
			'<label for="title">' . __('Title :') . '</label>',
			'<input id="title" name="title" type="text" value="'. $options['title'] .'" class="widefat" />',
		'</p>',
		
		'<p>',
			'<label for="account">' . __('Account :') . '</label>',
			'<input id="account" name="account" type="text" value="'. $options['account'] .'" class="widefat" />',
		'</p>',
		
		'<p>',
			'<label for="display">' . __('Show :') . '</label>',
			'<input id="display" name="display" type="text" value="'. $options['display'] .'" class="widefat" />',
		'</p>',
		
		'<input type="hidden" id="submit" name="submit" value="submit" />';
}

/**************************************************
	WIDGET INIT
**************************************************/

function widget_init_flickr() {
	
	wp_register_sidebar_widget('flickr', THEMENAME . ' ' . 'Flickr', 'widget_flickr', array('description' => 'Stream your Flickr gallery'));
	register_widget_control('flickr', 'widget_control_flickr');
}

add_action('init', 'widget_init_flickr');

?>
