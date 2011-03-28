<?php if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
	
	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php return; } ?>
	
<?php if ( have_comments() ) : ?> 
		
	<?php global $wp_query; $carray =$wp_query->comments; $n_comments = count($carray); ?>	
		
	<h3 id="comments"><?php echo $n_comments.' '; _e('Comments'); ?></h3>
	
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	
	<ol class="commentlist">
		<?php wp_list_comments('avatar_size=64'); ?>
	</ol>
	
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
	<?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>
	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
	
<div id="respond">
	<!--<h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>-->
	
	<div class="cancel-comment-reply">
		<small><?php cancel_comment_reply_link(); ?></small>
	</div>
	
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>
	
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if ( is_user_logged_in() ) : ?>
		<p><label for="username"><small><?php _e('Logged in'); ?></small></label>
		<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php" id="username"><?php echo $user_identity; ?></a> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
		
		<?php else : ?>
		<p><label for="author"><small><?php _e('Name');  //if ($req) echo "(required)"; ?></small></label>
		<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></p>
		<p><label for="email"><small><?php _e('Mail'); //if ($req) echo "(required)"; ?></small></label>
		<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></p>
		<p><label for="url"><small>Website</small></label>
		<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" /></p>
		<?php endif; ?>
		
		<p class="comment-textarea"><label for="comment"><small><?php _e('Comment'); ?></small></label>
		<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
		<input name="submit" type="submit" id="submit" tabindex="5" value="" /></p>
		<?php comment_id_fields(); ?>
		<?php do_action('comment_form', $post->ID); ?>
	</form>
	
	<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>