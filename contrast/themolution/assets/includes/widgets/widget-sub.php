<?php

/**************************************************
	WIDGET SUB CATEGORIES & PAGES
**************************************************/

function widget_sub($args) {
	
	global
	$cat,
	$post;
	
	extract($args);
	
	$options = get_option('widget_sub');
	
	if (is_category()) {
		$category = get_category($cat);
		
		if (get_category_children($category->cat_ID) != '') { 
			echo
				$before_widget,
					$before_title . $options['title_category'] . $after_title,
					'<ul class="clearfix">',
						wp_list_categories('child_of='.$category->cat_ID.'&title_li=&depth=1&hide_empty=0'),
					'</ul>',
				$after_widget;
		}
	}
	
	if (is_page()) {
		$page = wp_list_pages('&child_of='.$post->ID.'&echo=0');
		
		if ($page) {
			echo
				$before_widget,
					$before_title . $options['title_page'] . $after_title,
					'<ul class="clearfix">',
						wp_list_pages('child_of='.$post->ID.'&title_li=&depth=1'),
					'</ul>',
				$after_widget;
		}
	}
}

/**************************************************
	WIDGET CONTROLS
**************************************************/

function widget_control_sub() {
	
	$options = get_option('widget_sub');
	
	if (empty($options)) {
		$options = array(
			'title_category' => 'Categories',
			'title_page' => 'Pages',
		);
	}
	
	if ($_POST['submit']) {
		foreach (array_keys($options) as $option) {
			$options[$option] = strip_tags(stripslashes($_POST[$option]));
		}
		
		update_option('widget_sub', $options);
	}
	
	echo
		'<p>',
			'<label for="title_category">' . __('Categories Title :') . '</label>',
			'<input id="title_category" name="title_category" type="text" value="'. $options['title_category'] .'" class="widefat" />',
		'</p>',
		
		'<p>',
			'<label for="title_page">' . __('Pages Title :') . '</label>',
			'<input id="title_page" name="title_page" type="text" value="'. $options['title_page'] .'" class="widefat" />',
		'</p>',
		
		'<input type="hidden" id="submit" name="submit" value="submit" />';
}

/**************************************************
	WIDGET INIT
**************************************************/

function widget_init_sub() {
	
	wp_register_sidebar_widget('sub', THEMENAME . ' ' . 'Sub', 'widget_sub', array('description' => 'A list of subcategories and subpages'));
	register_widget_control('sub', 'widget_control_sub');
}

add_action('init', 'widget_init_sub');

?>
