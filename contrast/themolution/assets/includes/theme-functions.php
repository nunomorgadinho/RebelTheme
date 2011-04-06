<?php

/**************************************************
	SPACE REPLACER
**************************************************/

function replace($args) {
	
	$result = strtolower(str_replace(' ', '-', $args));
	
	return $result;
}

/**************************************************
	ENVATO API
**************************************************/

function envato($args) {
	
	$set = split(':', $args);
	$url = 'http://marketplace.envato.com/api/edge/'. $args .'.json';
	$contents = file_get_contents($url);
	$data = json_decode($contents, true);
	$result = $data[$set[0]];
	
	return $result;
}

/**************************************************
	LIST CATEGORIES
**************************************************/

function list_categories($args = false) {
	
	$result = array();
	
	$listed = get_categories($args);
	$select = array(
		'value' => '0',
		'label' => 'Please Select'
	);
	
	foreach ($listed as $list ) {
		$result[] = array(
			'value' => $list->cat_ID,
			'label' => $list->cat_name
		);
	}
	
	array_unshift($result,  $select);
	
	return $result;
}

/**************************************************
	LIST POSTS
**************************************************/

function list_posts($args = false) {
	
	global
	$post;
	
	$listed = get_posts($args);
	$select = array(
		'value' => '0',
		'label' => 'Please Select'
	);
	
	foreach ($listed as $list ) {
		$result[] = array(
			'value' => $list->ID,
			'label' => $list->post_title
		);
	}
	
	array_unshift($result,  $select);
	
	return $result;
}

/**************************************************
	LIST PAGES
**************************************************/

function list_pages($args = false) {
	
	$listed = get_pages($args);
	$select = array(
		'value' => '0',
		'label' => 'Please Select'
	);
	
	foreach ($listed as $list ) {
		$result[] = array(
			'value' => $list->ID,
			'label' => $list->post_title
		);
	}
	
	array_unshift($result,  $select);
	
	return $result;
}

/**************************************************
	LIST USER INFO
**************************************************/

function list_info($args) {
	
	global
	$user_email,
	$user_url;
	
	get_currentuserinfo();
	
	switch ($args) {
		case 'email': $result = $user_email; break;
		case 'url': $result = $user_url; break;
	}
	
	return $result;
}

/**************************************************
	GET OPTION
**************************************************/

function option($args) {
	
	$result = stripcslashes(get_option(THEMEPREFIX . '_' . $args));
	
	return $result;
}

/**************************************************
	GET POST META
**************************************************/

function meta($args) {
	
	$result = stripcslashes(get_post_meta($args['id'], '_' . THEMEPREFIX . '_' . $args['meta'], true));
	
	return $result;
}

/**************************************************
	PAGINATION
**************************************************/

function pagination($args = false) {
	
	global
	$paged,
	$wp_query;
	
	$visible = ($args['range'] * 2) + 1;
	$pages = $wp_query->max_num_pages;
	
	if (empty($args['container'])) { $args['container'] = 'ul'; }
	if (empty($args['item'])) { $args['item'] = 'li'; }
	if (empty($args['range'])) { $args['range'] = 2; }
	
	if (empty($paged)) {
		$paged = 1;
	}
	
	if (!$pages) {
		$pages = 1;
	}
	
	if ($pages != 1) {
		echo '<' . $args['container'] . ' class="pagination">';
		
		if ($paged > 2 && $paged > $args['range'] + 1 && $visible < $pages) {
			echo '<' . $args['item'] . ' class="first"><a href="', get_pagenum_link(1), '">&laquo;</a></' . $args['item'] . '>';
		}
		
		if ($paged > 1 && $visible < $pages) {
			echo '<' . $args['item'] . ' class="previous"><a href="', get_pagenum_link($paged - 1), '">&lsaquo;</a></' . $args['item'] . '>';
		}
		
		for ($i = 1; $i <= $pages; $i++) {
			if ($pages != 1 && (!($i >= $paged + $args['range'] + 1 || $i <= $paged - $args['range'] - 1) || $pages <= $visible )) {
				echo ($paged == $i) ? '<' . $args['item'] . ' class="current">' . $i . '</' . $args['item'] . '>' : '<' . $args['item'] . '><a href="' . get_pagenum_link($i) . '">' . $i .'</a></' . $args['item'] . '>';
			}
		}
		
		if ($paged < $pages && $visible < $pages) {
			echo '<' . $args['item'] . ' class="next"><a href="', get_pagenum_link($paged + 1), '">&rsaquo;</a></' . $args['item'] . '>';
		}
		
		if ($paged < $pages - 1 && $paged + $args['range'] - 1 < $pages && $visible < $pages) {
			echo '<' . $args['item'] . ' class="last"><a href="', get_pagenum_link($pages), '">&raquo;</a></' . $args['item'] . '>';
		}
		
		echo '</' . $args['container'] . '>';
	}
}

/**************************************************
	BREADCRUMBS
**************************************************/

function breadcrumbs($args = false) {
	
	global
	$post,
	$author,
	$wp_query;
	
	if (empty($args['container'])) { $args['container'] = 'ul'; }
	if (empty($args['item'])) { $args['item'] = 'li'; }
	
	if (!is_home() && !is_front_page() || is_paged()) {
		echo
			'<' . $args['container'] . ' class="breadcrumbs">',
				'<' . $args['item'] . ' class="first"><a href="', get_bloginfo('url'), '">Home</a></' . $args['item'] . '>';
		
		if (is_category()) {
			$category = $wp_query->get_queried_object();
			$current = $category->term_id;
			$current = get_category($current);
			$categories = get_category($current->parent);
			
			if ($current->parent != 0) {
				$parents = explode(' &raquo; ', get_category_parents($categories, TRUE, ' &raquo; '));
				
				foreach ($parents as $parent) {
					if (!empty($parent)) {
						echo '<' . $args['item'] . '>' . $parent . '</' . $args['item'] . '>';
					}
				}
			}
			
			echo '<' . $args['item'] . '>', single_cat_title(), '</' . $args['item'] . '>';
		}
		
		elseif (is_year()) {
			echo '<' . $args['item'] . '>', get_the_time('Y'), '</' . $args['item'] . '>';
		}
		
		elseif (is_month()) {
			echo
				'<' . $args['item'] . '><a href="', get_year_link(get_the_time('Y')), '">', get_the_time('Y'), '</a></' . $args['item'] . '>',
				'<' . $args['item'] . '>', get_the_time('F'), '</' . $args['item'] . '>';
		}
		
		elseif (is_day()) {
			echo
				'<' . $args['item'] . '><a href="', get_year_link(get_the_time('Y')), '">', get_the_time('Y'), '</a></' . $args['item'] . '>',
				'<' . $args['item'] . '><a href="', get_month_link(get_the_time('Y'), get_the_time('m')), '">', get_the_time('F'), '</a></' . $args['item'] . '>',
				'<' . $args['item'] . '>', get_the_time('d'), '</' . $args['item'] . '>';
		}
		
		elseif (is_single() && !is_attachment()) {
			$categories = get_the_category();
			$categories = $categories[0];
			$parents = explode(' &raquo; ', get_category_parents($categories, TRUE, ' &raquo; '));
			
			foreach ($parents as $parent) {
				if (!empty($parent)) {
					echo '<' . $args['item'] . '>' . $parent . '</' . $args['item'] . '>';
				}
			}
			
			echo '<' . $args['item'] . '>', the_title(), '</' . $args['item'] . '>';
		}
		
		elseif (is_page() && !$post->post_parent) {
			echo '<' . $args['item'] . '>', the_title() , '</' . $args['item'] . '>';
		}
		
		elseif (is_page() && $post->post_parent) {
			$parent  = $post->post_parent;
			$pages = array();
			
			while ($parent) {
				$page = get_page($parent);
				$pages[] = '<' . $args['item'] . '><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></' . $args['item'] . '>';
				$parent = $page->post_parent;
			}
			
			$pages = array_reverse($pages);
			
			foreach ($pages as $page) {
				echo $page;
			}
			
			echo '<' . $args['item'] . '>', the_title(), '</' . $args['item'] . '>';
		}
		
		elseif (is_search()) {
			echo '<' . $args['item'] . '>', get_search_query(), '</' . $args['item'] . '>';
		}
		
		elseif (is_tag()) {
			echo '<' . $args['item'] . '>', single_tag_title(), '</' . $args['item'] . '>';
		}
		
		elseif (is_author()) {
			echo '<' . $args['item'] . '>', get_userdata($author), '</' . $args['item'] . '>';
		}
		
		elseif (is_404()) {
			echo '<' . $args['item'] . '>' . 'ERROR 404' . '</' . $args['item'] . '>';
		}
		
		echo '</' . $args['container'] . '>';
	}
}

/**************************************************
	IMAGE RESIZE
**************************************************/

function image($args) {
	global
	$blog_id;
	
	$file = THEMESCRIPTS_URI . '/timthumb.php';
	
	preg_match_all('/src=["\']([^"\']+)/si', $args['image'], $src);
	preg_match_all('/alt=["\']([^"\']+)/si', $args['image'], $alt);
	
	$src = $src[1][0];
	$alt = $alt[1][0];
	
	if (empty($src)) {
		$src = $args['image'];
	}
	
	if (!empty($args['width']) && !empty($args['height'])) {
		
		if (!empty($blog_id) && $blog_id > 0) {
			$parts = explode('/files/', $src);
			
			if (!empty($parts[1])) {
				$src = '/blogs.dir/' . $blog_id . '/files/' . $parts[1];
			}
		}

		$src = $file . '?dir=' . THEMECACHE . '&amp;src=' . $src . '&amp;w=' . $args['width'] . '&amp;h=' . $args['height'] . '&amp;zc=1';
	}
	
	if ($args['tag'] !== false) {
		$result = '<img src="' . $src .'" alt="' . $alt . '" />';
	} else {
		$result = $src;
	}
	
	return $result;
}

?>