<?php

/**************************************************
	SIDEBARS INIT
**************************************************/

function sidebars_init() {
	
	global
	$theme_sidebars;
	
	if (function_exists('register_sidebar') && !empty($theme_sidebars)) {
		foreach ($theme_sidebars as $sidebar) {
			register_sidebar($sidebar);
		}
	}
}

add_action('widgets_init', 'sidebars_init');

/**************************************************
	WIDGETS INCLUDE
**************************************************/

if (!empty($theme_widgets)) {
	foreach ($theme_widgets as $widget) {
		include_once(THEMEWIDGETS . '/widget-' . $widget . '.php');
	}
}

?>