<?php

/**************************************************
	Name : Themolution Framework
	URI : http://themolution.com
	Author : Themolution
	Version: 1.0.0
**************************************************/

$theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
$theme_cache = wp_upload_dir();

define('THEMENAME',		$theme_data['Title']);
define('THEMEPREFIX',	strtolower(substr(THEMENAME, 0, 2)));
define('THEMEAUTHOR',	$theme_data['Author']);
define('THEMEVERSION',	$theme_data['Version']);
define('THEMECACHE',	$theme_cache['basedir'] . '/cache');

/**************************************************
	FOLDERS
**************************************************/

define('THEMOLUTION',	TEMPLATEPATH . '/themolution');
define('THEMEASSETS',	TEMPLATEPATH . '/themolution/assets');
define('THEMECSS',		TEMPLATEPATH . '/themolution/assets/css');
define('THEMEJS',		TEMPLATEPATH . '/themolution/assets/js');
define('THEMEINCLUDES',	TEMPLATEPATH . '/themolution/assets/includes');
define('THEMEWIDGETS',	TEMPLATEPATH . '/themolution/assets/includes/widgets');
define('THEMESCRIPTS',	TEMPLATEPATH . '/themolution/assets/includes/scripts');

/**************************************************
	FOLDER URI
**************************************************/

define('THEMOLUTION_URI',	get_bloginfo('template_directory') . '/themolution');
define('THEMEASSETS_URI',	get_bloginfo('template_directory') . '/themolution/assets');
define('THEMECSS_URI',		get_bloginfo('template_directory') . '/themolution/assets/css');
define('THEMEJS_URI',		get_bloginfo('template_directory') . '/themolution/assets/js');
define('THEMEINCLUDES_URI',	get_bloginfo('template_directory') . '/themolution/assets/includes');
define('THEMEWIDGETS_URI',	get_bloginfo('template_directory') . '/themolution/assets/includes/widgets');
define('THEMESCRIPTS_URI',	get_bloginfo('template_directory') . '/themolution/assets/includes/scripts');

/**************************************************
	INCLUDES
**************************************************/

include_once(THEMEINCLUDES . '/theme-functions.php');
include_once(THEMEINCLUDES . '/theme-options.php');
include_once(THEMEINCLUDES . '/theme-setup.php');
include_once(THEMEINCLUDES . '/theme-filter.php');
include_once(THEMEINCLUDES . '/theme-walker.php');
include_once(THEMEINCLUDES . '/theme-post.php');
include_once(THEMEINCLUDES . '/theme-metabox.php');
include_once(THEMEINCLUDES . '/theme-menu.php');
include_once(THEMEINCLUDES . '/theme-widget.php');
include_once(THEMEINCLUDES . '/theme-admin.php');
include_once(THEMEINCLUDES . '/theme-dashboard.php');
include_once(THEMEINCLUDES . '/theme-notice.php');

?>