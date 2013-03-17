<?php

/**************************************************
	DASHBOARD THEMES
**************************************************/

function dashboard_themes() {
	
	global
	$theme_dashboards;
	
	$i = 0;
	
	foreach ($theme_dashboards as $dashboard) {
		if ($dashboard['id'] == __FUNCTION__) {
			echo
				'<div class="featured">';
					foreach (envato($dashboard['options']['set']) as $item) {
						$i++;
						
						if($i <= $dashboard['options']['show']) {
							echo '<a href="' . $item['url'] . '?ref=' . $item['user'] .'" target="_blank"><img src="' . $item['thumbnail'] . '" alt="' . $item['item'] . '" /></a>';
						}
					}
			echo
				'</div>';
		}
	}
}

/**************************************************
	DASHBOARD TWITTER
**************************************************/

function dashboard_twitter() {
	
	global
	$theme_dashboards;
	
	foreach ($theme_dashboards as $dashboard) {
		if ($dashboard['id'] == __FUNCTION__) {
			echo
				'<div class="rss-widget">',
					'<ul id="twitter_update_list"></ul>',
				'</div>',
				
				'<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>',
				'<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'. $dashboard['options']['user'] .'.json?callback=twitterCallback2&amp;count='. $dashboard['options']['show'] .'"></script>';
		}
	}
}

/**************************************************
	DASHBOARD SETUP
**************************************************/

function dashboard_setup() {
	
	global
	$theme_dashboards,
	$wp_meta_boxes;
	
	if (!empty($theme_dashboards)) {
		foreach ($theme_dashboards as $item) {
			$dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
			$dashboard_backup = array(
				$item['id'] => $dashboard[$item['id']]
			);
			
			unset($dashboard[$item['id']]);
			
			$sorted = array_merge($dashboard_backup, $dashboard);
			$wp_meta_boxes['dashboard']['normal']['core'] = $sorted;
			
			wp_add_dashboard_widget($item['id'], $item['name'], $item['id']);
		}
	}
}

//	add_action('wp_dashboard_setup', 'dashboard_setup');

?>