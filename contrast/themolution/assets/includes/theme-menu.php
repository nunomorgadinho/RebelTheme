<?php

/**************************************************
	MENUS INIT
**************************************************/

function menus_init() {
	
	global
	$theme_menus;
	
	if (function_exists('register_nav_menus') && !empty($theme_menus)) {
		register_nav_menus($theme_menus);
	}
}

add_action('init', 'menus_init');

?>