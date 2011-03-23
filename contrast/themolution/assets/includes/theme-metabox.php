<?php

/**************************************************
	METABOX ADD
**************************************************/

function metabox_add() {
	
	global
	$theme_metaboxes;
	
	if (!empty($theme_metaboxes)) {
		foreach ($theme_metaboxes as $meta_box) {
			add_meta_box($meta_box['id'], $meta_box['title'], 'metabox_show', $meta_box['page'], $meta_box['context'], $meta_box['priority'], $meta_box);
		}
	}
}

add_action('admin_menu', 'metabox_add');

/**************************************************
	METABOX SAVE
**************************************************/

function metabox_save($post_id) {
	
	global
	$theme_metaboxes;
	
	foreach ($theme_metaboxes as $meta_box) {
		
		if (!wp_verify_nonce($_POST[THEMEPREFIX . '_nonce'], basename(__FILE__))) {
			return $post_id;
		}
		
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}
		
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		}
		
		elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}
		
		foreach ($meta_box['values'] as $value) {
			$old = get_post_meta($post_id, $value['id'], true);
			$new = $_POST[$value['id']];
			
			if ($new != $old) {
				update_post_meta($post_id, $value['id'], $new);
			}
			
			elseif ($new == '' && $old) {
				delete_post_meta($post_id, $value['id'], $old);
			}
		}
	}
}

add_action('save_post', 'metabox_save');

/**************************************************
	METABOX SHOW
**************************************************/

function metabox_show($post, $metabox) {
	
	global
	$post,
	$theme_metaboxes;
	
	echo '<input type="hidden" name="' . THEMEPREFIX . '_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	echo '<table class="widefat">';
	
	foreach ($metabox['args']['values'] as $value) {
		
		$saved = stripslashes(get_post_meta($post->ID, $value['id'], true));
		
		if ($value['related'] == '') {
			$related = '';
		} else {
			$related = 'class="related ' . $value['related']['id'] . ' options_' . $value['related']['options']. '"';
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
	
	echo '</table>';
}

?>