<?php

/**************************************************
	THEME SETUPS
**************************************************/

$theme_setups = array(
	
	'custom_background' => true,
	'editor_style' => false,
	'post_thumbnails' => true,
	'automatic_feed_links' => false
);

/**************************************************
	THEME FILTERS
**************************************************/

$theme_filters = array(
	
	'excerpt_length' => 10,
	'excerpt_more' => '...'
);

/**************************************************
	THEME MENUS
**************************************************/

$theme_menus = array(
	
	'menu-header' => 'Header Menu'
);

/**************************************************
	THEME METABOXES
**************************************************/

$theme_metaboxes = array(
	
	//PAGE
	
	array(
		'id' => 'page',
		'title' => 'Page Options',
		'page' => 'page',
		'context' => 'normal',
		'priority' => 'high',
		'values' => array(
			array(
				'type' => 'radio',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background',
				'name' => 'Background',
				'desc' => '<p>Set the <b>background</b> type of the post.</p>',
				'options' => array(
					array(
						'value' => '0',
						'label' => 'None'
					),
					array(
						'value' => '1',
						'label' => 'Color'
					),
					array(
						'value' => '2',
						'label' => 'Image'
					),
					array(
						'value' => '3',
						'label' => 'Flash Video'
					),
					array(
						'value' => '4',
						'label' => 'Google Maps'
					),
					array(
						'value' => '5',
						'label' => 'HTML5 Video'
					)
				),
				'std' => '0'
			),
			array(
				'type' => 'input-color',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background_color',
				'name' => 'Color',
				'desc' => '<p>Enter the <b>color</b> of the post <b>background</b>.</p>',
				'std' => '#',
				'related' => array(
					'id' => '_' . THEMEPREFIX . '_' . 'post_background',
					'options' => '1'
				)
			),
			array(
				'type' => 'input-upload',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background_image',
				'name' => 'Image',
				'desc' => '<p>Enter the file path of the post <b>background image</b>.</p>',
				'related' => array(
					'id' => '_' . THEMEPREFIX . '_' . 'post_background',
					'options' => '2'
				)
			),
			array(
				'type' => 'radio',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background_image_pattern',
				'name' => 'Pattern',
				'desc' => '<p>Set the <b>visibility</b> of the <b>pattern</b> on <b>image</b>.</p>',
				'options' => array(
					array(
						'value' => '0',
						'label' => 'Hide'
					),
					array(
						'value' => '1',
						'label' => 'Show'
					)
				),
				'std' => '0',
				'related' => array(
					'id' => '_' . THEMEPREFIX . '_' . 'post_background',
					'options' => '2'
				)
			),
			array(
				'type' => 'input-upload',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background_flash_video',
				'name' => 'Flash Video',
				'desc' => '<p>Enter the file path of the post <b>background flash video</b> (flv).</p>',
				'related' => array(
					'id' => '_' . THEMEPREFIX . '_' . 'post_background',
					'options' => '3'
				)
			),
			array(
				'type' => 'input-upload',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background_html5_video',
				'name' => 'HTML5 Video',
				'desc' => '<p>Enter the file path of the post <b>background HTML5 video</b> (mp4).</p>',
				'related' => array(
					'id' => '_' . THEMEPREFIX . '_' . 'post_background',
					'options' => '5'
				)
			),
			array(
				'type' => 'textarea',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background_google_maps',
				'name' => 'Google Maps',
				'desc' => '<p>Enter the <b>source</b> of the post <b>Google Maps background</b>.</p>',
				'related' => array(
					'id' => '_' . THEMEPREFIX . '_' . 'post_background',
					'options' => '4'
				)
			),
			array(
				'type' => 'radio',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background_google_maps_gradient',
				'name' => 'Gradient Effect',
				'desc' => '<p>Set the <b>visibility</b> of the <b>gradient effect</b> on <b>Google Maps</b>.</p>',
				'options' => array(
					array(
						'value' => '0',
						'label' => 'Hide'
					),
					array(
						'value' => '1',
						'label' => 'Show'
					)
				),
				'std' => '0',
				'related' => array(
					'id' => '_' . THEMEPREFIX . '_' . 'post_background',
					'options' => '4'
				)
			)
		)
	),
	
	//POST
	
	array(
		'id' => 'post',
		'title' => 'Post Options',
		'page' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'values' => array(
			array(
				'type' => 'radio',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background',
				'name' => 'Background',
				'desc' => '<p>Set the <b>background</b> type of the post.</p>',
				'options' => array(
					array(
						'value' => '0',
						'label' => 'None'
					),
					array(
						'value' => '1',
						'label' => 'Color'
					),
					array(
						'value' => '2',
						'label' => 'Image'
					),
					array(
						'value' => '3',
						'label' => 'Flash Video'
					),
					array(
						'value' => '4',
						'label' => 'Google Maps'
					),
					array(
						'value' => '5',
						'label' => 'HTML5 Video'
					)
				),
				'std' => '0'
			),
			array(
				'type' => 'input-color',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background_color',
				'name' => 'Color',
				'desc' => '<p>Enter the <b>color</b> of the post <b>background</b>.</p>',
				'std' => '#',
				'related' => array(
					'id' => '_' . THEMEPREFIX . '_' . 'post_background',
					'options' => '1'
				)
			),
			array(
				'type' => 'input-upload',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background_image',
				'name' => 'Image',
				'desc' => '<p>Enter the file path of the post <b>background image</b>.</p>',
				'related' => array(
					'id' => '_' . THEMEPREFIX . '_' . 'post_background',
					'options' => '2'
				)
			),
			array(
				'type' => 'radio',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background_image_pattern',
				'name' => 'Pattern',
				'desc' => '<p>Set the <b>visibility</b> of the <b>pattern</b> on <b>image</b>.</p>',
				'options' => array(
					array(
						'value' => '0',
						'label' => 'Hide'
					),
					array(
						'value' => '1',
						'label' => 'Show'
					)
				),
				'std' => '0',
				'related' => array(
					'id' => '_' . THEMEPREFIX . '_' . 'post_background',
					'options' => '2'
				)
			),
			array(
				'type' => 'input-upload',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background_flash_video',
				'name' => 'Flash Video',
				'desc' => '<p>Enter the file path of the post <b>background flash video</b> (flv).</p>',
				'related' => array(
					'id' => '_' . THEMEPREFIX . '_' . 'post_background',
					'options' => '3'
				)
			),
			array(
				'type' => 'input-upload',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background_html5_video_mp4',
				'name' => 'HTML5 Video',
				'desc' => '<p>Enter the file path of the post <b>background HTML5 video</b> (mp4).</p>',
				'related' => array(
					'id' => '_' . THEMEPREFIX . '_' . 'post_background',
					'options' => '5'
				)
			),
			array(
				'type' => 'input-upload',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background_html5_video_ogg',
				'name' => 'HTML5 Video',
				'desc' => '<p>Enter the file path of the post <b>background HTML5 video</b> (ogg).</p>',
				'related' => array(
					'id' => '_' . THEMEPREFIX . '_' . 'post_background',
					'options' => '5'
				)
			),
			array(
				'type' => 'input-upload',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background_html5_video_fallback',
				'name' => 'HTML5 Video Fallback',
				'desc' => '<p>Enter the file path of the post <b>background HTML5 video</b> (flv).</p>',
				'related' => array(
					'id' => '_' . THEMEPREFIX . '_' . 'post_background',
					'options' => '5'
				)
			),
			array(
				'type' => 'textarea',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background_google_maps',
				'name' => 'Google Maps',
				'desc' => '<p>Enter the <b>source</b> of the post <b>Google Maps background</b>.</p>',
				'related' => array(
					'id' => '_' . THEMEPREFIX . '_' . 'post_background',
					'options' => '4'
				)
			),
			array(
				'type' => 'radio',
				'id' => '_' . THEMEPREFIX . '_' . 'post_background_google_maps_gradient',
				'name' => 'Gradient Effect',
				'desc' => '<p>Set the <b>visibility</b> of the <b>gradient effect</b> on <b>Google Maps</b>.</p>',
				'options' => array(
					array(
						'value' => '0',
						'label' => 'Hide'
					),
					array(
						'value' => '1',
						'label' => 'Show'
					)
				),
				'std' => '0',
				'related' => array(
					'id' => '_' . THEMEPREFIX . '_' . 'post_background',
					'options' => '4'
				)
			)
		)
	)
);

/**************************************************
	THEME OPTIONS
**************************************************/

$theme_options = array(
	
/*	array(
		'type' => 'array_type',
		'id' => THEMEPREFIX . 'array_id',
		'name' => 'Array Name',
		'desc' => '<p>Array Description</p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'Option 1'
			),
			array(
				'value' => '1',
				'label' => 'Option 2'
			),
			array(
				'value' => '2',
				'label' => 'Option 3'
			)
		),
		'std' => '0',
		'related' => array(
			'id' => THEMEPREFIX . 'array_id',
			'options' => '1'
		)
	),*/
	
	//TABS
	
	array(
		'type' => 'tabs-start'
	),
	array(
		'type' => 'tab',
		'id' => 'general',
		'name' => 'General',
	),
	array(
		'type' => 'tab',
		'id' => 'header',
		'name' => 'Header',
	),
	array(
		'type' => 'tab',
		'id' => 'footer',
		'name' => 'Footer',
	),
	array(
		'type' => 'tab',
		'id' => 'homepage',
		'name' => 'Homepage',
	),
	array(
		'type' => 'tab',
		'id' => 'portfolio',
		'name' => 'Portfolio',
	),
	array(
		'type' => 'tab',
		'id' => 'blog',
		'name' => 'Blog',
	),
	array(
		'type' => 'tabs-end'
	),
	
	//CONTENT - GENERAL
	
	array(
		'type' => 'content-start',
		'id' => 'general'
	),
	array(
		'type' => 'header',
		'id' => 'interface-options',
		'name' => 'Interface Options',
	),
	
	array(
		'type' => 'text',
		'id' => THEMEPREFIX . '_' . 'theme_background',
		'name' => 'Theme Background',
		'desc' => '<p>Set the <b>background</b> image or color by using the build in editor.</p><p><a href="themes.php?page=custom-background" alt="" />Click to set the background</a></p>'
	),
	array(
		'type' => 'radio',
		'id' => THEMEPREFIX . '_' . 'theme_colors',
		'name' => 'Theme Colors',
		'desc' => '<p>Set the theme <b>colors</b> type option.</p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'Default'
			),
			array(
				'value' => '1',
				'label' => 'Custom'
			)
		),
		'std' => '0'
	),
	array(
		'type' => 'input-color',
		'id' => THEMEPREFIX . '_' . 'theme_color_1',
		'name' => 'Theme Color (1)',
		'desc' => '<p>Enter the theme <b>color (1)</b>.</p>',
		'std' => '#',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'theme_colors',
			'options' => '1'
		)
	),
	array(
		'type' => 'input-color',
		'id' => THEMEPREFIX . '_' . 'theme_color_2',
		'name' => 'Theme Color (2)',
		'desc' => '<p>Enter the theme <b>color (2)</b>.</p>',
		'std' => '#',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'theme_colors',
			'options' => '1'
		)
	),
	array(
		'type' => 'header',
		'id' => 'seo-options',
		'name' => 'SEO Options',
	),
	array(
		'type' => 'radio',
		'id' => THEMEPREFIX . '_' . 'seo',
		'name' => 'SEO',
		'desc' => '<p>Set the <b>Search Engine Optimization</b> option. If the SEO option is <b>"Enabled"</b>, you can set the author, keywords, description, robots, title and google analytics tracking code.</b></p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'Disabled'
			),
			array(
				'value' => '1',
				'label' => 'Enabled'
			)
		),
		'std' => '0'
	),
	array(
		'type' => 'input',
		'id' => THEMEPREFIX . '_' . 'seo_author',
		'name' => 'Author',
		'desc' => '<p>Enter the <b>author</b> meta tag. (Example: <b>' . THEMEAUTHOR .'</b>)</p>',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'seo',
			'options' => '1'
		)
	),
	array(
		'type' => 'input',
		'id' => THEMEPREFIX . '_' . 'seo_keywords',
		'name' => 'Keywords',
		'desc' => '<p>Enter the <b>keywords</b> meta tag. Use <b>comma</b> between the keywords. (Example: <b>one, two, three</b>)</p>',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'seo',
			'options' => '1'
		)
	),
	array(
		'type' => 'input',
		'id' => THEMEPREFIX . '_' . 'seo_description',
		'name' => 'Description',
		'desc' => '<p>Enter the <b>description</b> meta tag.</p>',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'seo',
			'options' => '1'
		)
	),
	array(
		'type' => 'radio',
		'id' => THEMEPREFIX . '_' . 'seo_robots',
		'name' => 'Robots',
		'desc' => '<p>Set the <b>robots</b> meta tag. If the robots option is <b>"Disabled"</b>, search engines <b>won\'t</b> index your site anymore.</p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'Disabled'
			),
			array(
				'value' => '1',
				'label' => 'Enabled'
			)
		),
		'std' => '0',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'seo',
			'options' => '1'
		)
	),
	array(
		'type' => 'radio',
		'id' => THEMEPREFIX . '_' . 'seo_title',
		'name' => 'Title',
		'desc' => '<p>Set the <b>title</b> of your site. If the title option is set as <b>"Default"</b>, the site title will be generated <b>automatically</b> for every page.</p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'Default'
			),
			array(
				'value' => '1',
				'label' => 'Custom'
			)
		),
		'std' => '0',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'seo',
			'options' => '1'
		)
	),
	array(
		'type' => 'input',
		'id' => THEMEPREFIX . '_' . 'seo_title_custom',
		'name' => 'Custom Title',
		'desc' => '<p>Enter the site <b>title</b>. (Example: <b>' . THEMENAME . '</b>)</p>',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'seo_title',
			'options' => '1'
		)
	),
	array(
		'type' => 'radio',
		'id' => THEMEPREFIX . '_' . 'seo_google_analytics',
		'name' => 'Google Analytics',
		'desc' => '<p>Set the <b>Google Analytics</b> tracking option. <a href="http://www.google.com/analytics/" target="_blank">Click here</a> to learn more about <b>Google Analytics</b>.</p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'Disabled'
			),
			array(
				'value' => '1',
				'label' => 'Enabled'
			)
		),
		'std' => '0',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'seo',
			'options' => '1'
		)
	),
	array(
		'type' => 'textarea',
		'id' => THEMEPREFIX . '_' . 'seo_tracking_code',
		'name' => 'Tracking Code',
		'desc' => '<p>Enter the Google Analytics <b>Tracking Code</b>.</p>',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'seo_google_analytics',
			'options' => '1'
		)
	),
	array(
		'type' => 'content-end'
	),
	
	//CONTENT - HEADER
	
	array(
		'type' => 'content-start',
		'id' => 'header'
	),
	array(
		'type' => 'select',
		'id' => THEMEPREFIX . '_' . 'logo_position',
		'name' => 'Logo Position',
		'desc' => '<p>Select the <b>position</b> of the <b>logo</b>.</p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'Left Top'
			),
			array(
				'value' => '1',
				'label' => 'Left Bottom'
			)
		),
		'std' => '0'
	),
	array(
		'type' => 'input-upload',
		'id' => THEMEPREFIX . '_' . 'logo',
		'name' => 'Logo',
		'desc' => '<p>Enter the file path of your <b>330 x 80</b> pixels sized, <b>PNG</b> image type <b>logo</b>.</p>'
	),
	array(
		'type' => 'input-upload',
		'id' => THEMEPREFIX . '_' . 'favicon',
		'name' => 'Favicon',
		'desc' => '<p>Enter the file path of your <b>16 x 16</b> pixels sized <b>favicon</b> image.</p>'
	),
	array(
		'type' => 'header',
		'id' => 'menu-options',
		'name' => 'Menu Options'
	),
	array(
		'type' => 'radio',
		'id' => THEMEPREFIX . '_' . 'search',
		'name' => 'Search',
		'desc' => '<p>Set the <b>visibility</b> of the <b>search</b> button.</p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'Hide'
			),
			array(
				'value' => '1',
				'label' => 'Show'
			)
		),
		'std' => '0'
	),
	array(
		'type' => 'content-end'
	),
	
	//CONTENT - FOOTER
	
	array(
		'type' => 'content-start',
		'id' => 'footer'
	),
	array(
		'type' => 'radio',
		'id' => THEMEPREFIX . '_' . 'copyright',
		'name' => 'Copyright',
		'desc' => '<p>Set the footer <b>copyright</b> text type option. If the copyright option is set as <b>"Default"</b>, the copyright text will be generated <b>automatically</b>.</p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'Default'
			),
			array(
				'value' => '1',
				'label' => 'Custom'
			)
		),
		'std' => '0'
	),
	array(
		'type' => 'input',
		'id' => THEMEPREFIX . '_' . 'copyright_text',
		'name' => 'Custom Copyright',
		'desc' => '<p>Enter the <b>custom copyright</b> text, which will be shown at the site <b>footer</b>.</p>',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'copyright',
			'options' => '1'
		)
	),
	array(
		'type' => 'header',
		'id' => 'social-network-options',
		'name' => 'Social Network Options',
	),
	array(
		'type' => 'radio',
		'id' => THEMEPREFIX . '_' . 'contact_social',
		'name' => 'Social Network Icons',
		'desc' => '<p>Set the <b>visibility</b> of the <b>social network icons</b>.</p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'Hide'
			),
			array(
				'value' => '1',
				'label' => 'Show'
			)
		),
		'std' => '0',
	),
	array(
		'type' => 'radio',
		'id' => THEMEPREFIX . '_' . 'contact_social_rss',
		'name' => 'RSS Feed',
		'desc' => '<p>Set the <b>visibility</b> of the <b>RSS</b> feed icon.</p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'Hide'
			),
			array(
				'value' => '1',
				'label' => 'Show'
			)
		),
		'std' => '0',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'contact_social',
			'options' => '1'
		)
	),
	array(
		'type' => 'radio',
		'id' => THEMEPREFIX . '_' . 'contact_social_facebook',
		'name' => 'Facebook',
		'desc' => '<p>Set the <b>visibility</b> of the <b>Facebook</b> icon.</p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'Hide'
			),
			array(
				'value' => '1',
				'label' => 'Show'
			)
		),
		'std' => '0',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'contact_social',
			'options' => '1'
		)
	),
	array(
		'type' => 'input',
		'id' => THEMEPREFIX . '_' . 'contact_social_facebook_text',
		'name' => 'Link',
		'desc' => '<p>Enter the <b>link</b> of your <b>facebook</b> profile page.</p>',
		'std' => 'http://www.facebook.com/',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'contact_social_facebook',
			'options' => '1'
		)
	),
	array(
		'type' => 'radio',
		'id' => THEMEPREFIX . '_' . 'contact_social_twitter',
		'name' => 'Twitter',
		'desc' => '<p>Set the <b>visibility</b> of the <b>Twitter</b> icon.</p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'Hide'
			),
			array(
				'value' => '1',
				'label' => 'Show'
			)
		),
		'std' => '0',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'contact_social',
			'options' => '1'
		)
	),
	array(
		'type' => 'input',
		'id' => THEMEPREFIX . '_' . 'contact_social_twitter_text',
		'name' => 'Link',
		'desc' => '<p>Enter the <b>link</b> of your <b>twitter</b> profile page.</p>',
		'std' => 'http://www.twitter.com/',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'contact_social_twitter',
			'options' => '1'
		)
	),
	array(
		'type' => 'radio',
		'id' => THEMEPREFIX . '_' . 'contact_social_friendfeed',
		'name' => 'FriendFeed',
		'desc' => '<p>Set the <b>visibility</b> of the <b>FriendFeed</b> icon.</p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'Hide'
			),
			array(
				'value' => '1',
				'label' => 'Show'
			)
		),
		'std' => '0',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'contact_social',
			'options' => '1'
		)
	),
	array(
		'type' => 'input',
		'id' => THEMEPREFIX . '_' . 'contact_social_friendfeed_text',
		'name' => 'Link',
		'desc' => '<p>Enter the <b>link</b> of your <b>friendfeed</b> profile page.</p>',
		'std' => 'http://www.friendfeed.com/',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'contact_social_friendfeed',
			'options' => '1'
		)
	),
	array(
		'type' => 'radio',
		'id' => THEMEPREFIX . '_' . 'contact_social_flickr',
		'name' => 'Flickr',
		'desc' => '<p>Set the <b>visibility</b> of the <b>Flickr</b> icon.</p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'Hide'
			),
			array(
				'value' => '1',
				'label' => 'Show'
			)
		),
		'std' => '0',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'contact_social',
			'options' => '1'
		)
	),
	array(
		'type' => 'input',
		'id' => THEMEPREFIX . '_' . 'contact_social_flickr_text',
		'name' => 'Link',
		'desc' => '<p>Enter the <b>link</b> of your <b>flickr</b> gallery page.</p>',
		'std' => 'http://www.flickr.com/',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'contact_social_flickr',
			'options' => '1'
		)
	),

	array(
		'type' => 'content-end'
	),
	
	//CONTENT - HOMEPAGE
	
	array(
		'type' => 'content-start',
		'id' => 'homepage'
	),
	array(
		'type' => 'radio',
		'id' => THEMEPREFIX . '_' . 'home_background',
		'name' => 'Background',
		'desc' => '<p>Set the <b>background</b> type of the homepage.</p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'None'
			),
			array(
				'value' => '1',
				'label' => 'Color'
			),
			array(
				'value' => '2',
				'label' => 'Image'
			),
			array(
				'value' => '3',
				'label' => 'Flash Video'
			),
			array(
				'value' => '4',
				'label' => 'Google Maps'
			),
		),
		'std' => '0'
	),
	array(
		'type' => 'input-color',
		'id' => THEMEPREFIX . '_' . 'home_background_color',
		'name' => 'Color',
		'desc' => '<p>Enter the <b>color</b> of the homepage <b>background</b>.</p>',
		'std' => '#',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'home_background',
			'options' => '1'
		)
	),
	array(
		'type' => 'input-upload',
		'id' => THEMEPREFIX . '_' . 'home_background_image',
		'name' => 'Image',
		'desc' => '<p>Enter the file path of the homepage <b>background image</b>.</p>',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'home_background',
			'options' => '2'
		)
	),
	array(
		'type' => 'radio',
		'id' => THEMEPREFIX . '_' . 'home_background_image_pattern',
		'name' => 'Pattern',
		'desc' => '<p>Set the <b>visibility</b> of the <b>pattern</b> on <b>image</b>.</p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'Hide'
			),
			array(
				'value' => '1',
				'label' => 'Show'
			)
		),
		'std' => '0',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'home_background',
			'options' => '2'
		)
	),
	array(
		'type' => 'input-upload',
		'id' => THEMEPREFIX . '_' . 'home_background_flash_video',
		'name' => 'Flash Video',
		'desc' => '<p>Enter the file path of the homepage <b>background flash video</b> (flv).</p>',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'home_background',
			'options' => '3'
		)
	),
	array(
		'type' => 'textarea',
		'id' => THEMEPREFIX . '_' . 'home_background_google_maps',
		'name' => 'Google Maps',
		'desc' => '<p>Enter the <b>source</b> of the homepage <b>Google Maps background</b>.</p>',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'home_background',
			'options' => '4'
		)
	),
	array(
		'type' => 'radio',
		'id' => THEMEPREFIX . '_' . 'home_background_google_maps_gradient',
		'name' => 'Gradient Effect',
		'desc' => '<p>Set the <b>visibility</b> of the <b>gradient effect</b> on <b>Google Maps</b>.</p>',
		'options' => array(
			array(
				'value' => '0',
				'label' => 'Hide'
			),
			array(
				'value' => '1',
				'label' => 'Show'
			)
		),
		'std' => '0',
		'related' => array(
			'id' => THEMEPREFIX . '_' . 'home_background',
			'options' => '4'
		)
	),
	array(
		'type' => 'content-end'
	),
	
	//CONTENT - PORTFOLIO
	
	array(
		'type' => 'content-start',
		'id' => 'portfolio'
	),
	array(
		'type' => 'select',
		'id' => THEMEPREFIX . '_' . 'portfolio_category',
		'name' => 'Category',
		'desc' => '<p>Select the <b>portfolio</b> category.</p>',
		'options' => list_categories(array('hide_empty' => '0')),
		'std' => '0',
	),
	array(
		'type' => 'content-end'
	),
	
	//CONTENT - BLOG
	
	array(
		'type' => 'content-start',
		'id' => 'blog'
	),
	array(
		'type' => 'select',
		'id' => 'blog_category',
		'name' => 'Blog Category',
		'desc' => '<p>Select the <b>blog</b> category.</p>',
		'options' => list_categories(array('hide_empty' => '0')),
		'std' => '0',
	),
	array(
		'type' => 'content-end'
	)
	
	
	
);

/**************************************************
	DASHBOARD WIDGETS
**************************************************/

$theme_dashboards = array(
	
	array(
		'id' => 'dashboard_themes',
		'name' => 'Latest Themes',
		'options' => array(
			'show' => '5',
			'set' => 'new-files-from-user:Themolution,themeforest'
		)
	),
	array(
		'id' => 'dashboard_twitter',
		'name' => 'Twitter Updates',
		'options' => array(
			'show' => '5',
			'user' => 'themolution'
		)
	)
);

/**************************************************
	THEME UPDATE
**************************************************/

$theme_feeds = 'http://demo.themolution.com/wp-content/themes/demo/theme-notice.xml';

?>