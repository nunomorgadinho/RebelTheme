<?php

/**************************************************
	ADMIN MENU
**************************************************/

function admin_menu() {
	
	global
	$theme_options;
	
	if ($_GET['page'] == basename(__FILE__)) {
		if ($_REQUEST['action'] == 'save') {
			foreach ($theme_options as $value) {
				update_option($value['id'], $_REQUEST[$value['id']]);
			}
			
			foreach ($theme_options as $value) {
				if (isset($_REQUEST[$value['id']])) {
					update_option($value['id'], $_REQUEST[$value['id']]);
				} else {
					delete_option($value['id']);
				}
			}
			
			header('Location: admin.php?page=' . basename(__FILE__) . '&saved=true');
			die;
		}
		
		elseif ('reset' == $_REQUEST['action']) {
			foreach ($theme_options as $value) {
				delete_option($value['id']);
			}
			
			header('Location: admin.php?page=' . basename(__FILE__) . '&reset=true');
			die;
		}
	}
	
	if (!empty($theme_options)) {
		add_menu_page(THEMENAME, THEMENAME, 'administrator', basename(__FILE__), 'admin_panel');
	}
}

add_action('admin_menu', 'admin_menu');

/**************************************************
	ADMIN INIT
**************************************************/

function admin_init() {
	
	wp_enqueue_style('farbtastic');
	wp_enqueue_style('thickbox');
	wp_enqueue_style('jquery-ui', THEMECSS_URI . '/jquery-ui-1.8.6.custom.css', false, '1.0', 'all');
	wp_enqueue_style('style', THEMECSS_URI . '/style.css', false, '1.0', 'all');
	
	wp_enqueue_script('farbtastic');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('jquery-cookie', THEMEJS_URI . '/jquery.cookie.js');
	wp_enqueue_script('functions', THEMEJS_URI . '/functions.js');
}

add_action('admin_init', 'admin_init');

/**************************************************
	ADMIN PANEL
**************************************************/

function admin_panel() {
	
	global
	$theme_options;
	
	if ($_REQUEST['saved']) {
		echo
			'<div id="message" class="updated fade">',
				'<p><strong>' . THEMENAME . ' settings saved.</strong></p>',
			'</div>';
	}
	
	if ($_REQUEST['reset']) {
		echo
			'<div id="message" class="updated fade">',
				'<p><strong>' . THEMENAME . ' settings reset.</strong></p>',
			'</div>';
	}
	
	echo
		'<div class="wrap">',
			'<h2>' . THEMENAME . ' Options</h2>',
			
			'<form method="post">',
				'<div id="tabs">';
				
	foreach ($theme_options as $value) {
		
		$saved = stripslashes(get_option($value['id']));
		
		if ($value['related'] == '') {
			$related = '';
		} else {
			$related = 'class="related ' . $value['related']['id'] . ' options_' . $value['related']['options']. '"';
		}
		
		if ($value['type'] == 'tabs-start') {
			echo '<ul>';
		}
		
		if ($value['type'] == 'tabs-end') {
			echo '</ul>';
		}
		
		if ($value['type'] == 'tab') {
			echo '<li class="tab-' . $value['id'] . '"><a href="#content-' . $value['id'] . '">' . $value['name'] . '</a></li>';
		}
		
		if ($value['type'] == 'content-start') {
			echo
				'<div id="content-' . $value['id'] . '">',
					'<table class="widefat">',
						'<tbody>';
		}
		
		if ($value['type'] == 'content-end') {
			echo
						'</tbody>',
						
						'<tfoot>',
							'<tr>',
								'<th colspan="2">',
									'<p class="submit">',
										'<input type="hidden" name="action" value="save" />',
										'<input type="submit" value="Save changes" />',
									'</p>',
								'</th>',
							'</tr>',
						'</tfoot>',
					'</table>',
				'</div>';
		}
		
		if ($value['type'] == 'header') {
			echo
				'<tr '. $related . '>',
					'<th class="header" colspan="2" >',
						'<h3 class="header-' . $value['id'] .' ui-widget-header ui-corner-all">' . $value['name'] .'</h3>',
					'</th>',
				'</tr>';
		}
		
		if ($value['type'] == 'text') {
			echo
				'<tr '. $related . '>',
					'<th><label for="' . $value['id'] . '">' . $value['name'] . '</label></th>',
					'<td>',
						$value['desc'],
					'</td>',
				'</tr>';
		}
		
		if ($value['type'] == 'input') {
			echo
				'<tr '. $related . '>',
					'<th><label for="' . $value['id'] . '">' . $value['name'] . '</label></th>',
					'<td>',
						$value['desc'],
						'<p><input type="text" name="' . $value['id'] . '" id="' . $value['id'] . '" value="' , $saved ? $saved : $value['std'] , '" /></p>',
					'</td>',
				'</tr>';
		}
		
		if ($value['type'] == 'input-color') {
			echo
				'<tr '. $related . '>',
					'<th><label for="' . $value['id'] . '">' . $value['name'] . '</label></th>',
					'<td>',
						$value['desc'],
						'<p>',
							'<input type="text" name="' . $value['id'] . '" id="' . $value['id'] . '" value="' , $saved ? $saved : $value['std'] , '" /> ',
							'<input type="button" name="' . $value['id'] . '" value="Select" class="button pick ' . $value['id'] .'" />',
						'</p>',
						'<div class="picker ' . $value['id'] . '"></div>',
					'</td>',
				'</tr>';
		}
		
		if ($value['type'] == 'input-upload') {
			echo
				'<tr '. $related . '>',
					'<th><label for="' . $value['id'] . '">' . $value['name'] . '</label></th>',
					'<td>',
						$value['desc'],
						'<p>',
							'<input type="text" name="' . $value['id'] . '" id="' . $value['id'] . '" value="' , $saved ? $saved : $value['std'] , '" /> ',
							'<input type="button" name="' . $value['id'] . '" value="Upload" class="button upload" />',
						'</p>',
					'</td>',
				'</tr>';
		}
		
		if ($value['type'] == 'textarea') {
			echo
				'<tr '. $related . '>',
					'<th><label for="' . $value['id'] . '">' . $value['name'] . '</label></th>',
					'<td>',
						$value['desc'],
						'<p><textarea name="' . $value['id'] . '" cols="" rows="">', $saved ? $saved : $value['std'] , '</textarea></p>',
					'</td>',
				'</tr>';
		}
		
		if ($value['type'] == 'checkbox') {
			echo
				'<tr '. $related . '>',
					'<th><label for="' . $value['id'] . '">' . $value['name'] . '</label></th>',
					'<td>',
						$value['desc'],
						'<p>';
							foreach ($value['options'] as $option) {
								echo '<input type="checkbox" name="' . $value['id'] . '" value="' . $option['value'] . '" ';
								
								if ($saved === $option['value']) {
									echo 'checked="checked"';
								}
								
								elseif ($saved == '' && $value['std'] == $option['value']) { 
									echo 'checked="checked"';
								}
								
								echo ' /> ' . $option['label'] . '<br />';
							}
			echo
						'</p>',
					'</td>',
				'</tr>';
		}
		
		if ($value['type'] == 'radio') {
			echo
				'<tr '. $related . '>',
					'<th><label for="' . $value['id'] . '">' . $value['name'] . '</label></th>',
					'<td>',
						$value['desc'],
						'<p>';
							foreach ($value['options'] as $option) {
								echo '<input type="radio" name="' . $value['id'] . '" value="' . $option['value'] . '" ';
								
								if ($saved === $option['value']) {
									echo 'checked="checked"';
								}
								
								elseif ($saved == '' && $value['std'] == $option['value']) { 
									echo 'checked="checked"';
								}
								
								echo ' /> ' . $option['label'] . '<br />';
							}
			echo
						'</p>',
					'</td>',
				'</tr>';
		}
		
		if ($value['type'] == 'select') {
			echo
				'<tr '. $related . '>',
					'<th><label for="' . $value['id'] . '">' . $value['name'] . '</label></th>',
					'<td>',
						$value['desc'],
						'<p>',
							'<select name="' . $value['id'] . '" id="' . $value['id'] . '">';
								foreach ($value['options'] as $option) {
									echo '<option value="' . $option['value'] . '" ';
									
									if ($saved == $option['value']) {
										echo 'selected="selected"';
									}
									
									elseif ($saved == '' && $value['std'] == $option['value']) { 
										echo 'selected="selected"';
									}
									
									echo ' >' . $option['label'] . '</option>';
								}
			echo
							'</select>',
						'</p>',
					'</td>',
				'</tr>';
		}
	}
	
	echo
				'</div>',
			'</form>',
			
			'<form method="post">',
				'<p class="submit">',
					'<input name="reset" type="submit" value="Reset" />',
					'<input type="hidden" name="action" value="reset" />',
				'</p>',
			'</form>',
		'</div>';
}

?>