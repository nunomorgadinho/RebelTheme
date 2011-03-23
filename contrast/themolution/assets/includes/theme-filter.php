<?php

/**************************************************
	EXCERPT LENGHT FILTER
**************************************************/

function new_excerpt_length() {
	
	global
	$theme_filters;
	
	if (!empty($theme_filters['excerpt_length'])) {
		$result = $theme_filters['excerpt_length'];
	}
	
	return $result;
}

add_filter('excerpt_length', 'new_excerpt_length');

/**************************************************
	EXCERPT MORE FILTER
**************************************************/

function new_excerpt_more($excerpt) {
	
	global
	$theme_filters;
	
	if (!empty($theme_filters['excerpt_more'])) {
		$result = str_replace('[...]', $theme_filters['excerpt_more'], $excerpt);
	}
	
	return $result;
}

add_filter('wp_trim_excerpt', 'new_excerpt_more');

?>