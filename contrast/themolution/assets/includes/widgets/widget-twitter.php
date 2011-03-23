<?php

/**************************************************
	WIDGET TWITTER
**************************************************/

function widget_twitter($args) {
	
	require_once(ABSPATH . WPINC . '/rss.php');
	
	extract($args);
	
	$options = get_option('widget_twitter');
	$url = 'http://twitter.com/statuses/user_timeline/' . $options['account'] . '.rss';
	$rss = fetch_rss($url);
	
	if (!empty($rss->items)) {
		$data = array_slice($rss->items, 0, $options['display']);
		
		foreach ($data as $item) {
			$items = $items . '<li>' . $item['title'] .'</li>';
		}
		
		echo
			$before_widget,
				$before_title . $options['title'] . $after_title,
				'<div class="arrows">',
					'<p class="next"><a href="javascript:;">NEXT</a></p>',
					'<p class="previous"><a href="javascript:;">PREVIOUS</a></p>',
				'</div>',
				
				'<ul>',
					$items,
				'</ul>',
			$after_widget;
	}
}

/**************************************************
	WIDGET CONTROLS
**************************************************/

function widget_control_twitter() {
	
	$options = get_option('widget_twitter');
	
	if (empty($options)) {
		$options = array(
			'title' => 'Twitter',
			'account' => 'themolution',
			'display' => '5'
		);
	}
	
	if ($_POST['submit']) {
		foreach (array_keys($options) as $option) {
			$options[$option] = strip_tags(stripslashes($_POST[$option]));
		}
		
		update_option('widget_twitter', $options);
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
			'<label for="display">' . __('Display :') . '</label>',
			'<input id="display" name="display" type="text" value="'. $options['display'] .'" class="widefat" />',
		'</p>',
		
		'<input type="hidden" id="submit" name="submit" value="submit" />';
}

/**************************************************
	WIDGET INIT
**************************************************/

function widget_init_twitter() {
	
	wp_register_sidebar_widget('twitter', THEMENAME . ' ' . 'Twitter', 'widget_twitter', array('description' => 'List your most recent tweets.'));
	register_widget_control('twitter', 'widget_control_twitter');
}

add_action('init', 'widget_init_twitter');

?>