<!-- loading start -->
<div class="loading">
	<img src="<?php bloginfo('template_url'); ?>/assets/images/loading.gif" alt ="Loading" />
</div>
<!-- loading end -->

<!-- background start -->
<div id="background">
	<?php if (is_home()) { ?>
	
			<?php error_log( 'estou aqui 2 ' + meta(array('id' => $post->ID, 'meta' => 'post_background_html5_video')) ); ?>
			
		<?php if (option('home_background') == '1') { ?>
			
			<style type="text/css">
				#background { background: <?php echo option('home_background_color'); ?>; }
			</style>
			
		<?php } elseif (option('home_background') == '2') { ?>
			
			<img src="<?php echo option('home_background_image'); ?>" alt="" />
			
			<?php if (option('home_background_image_pattern') == '1') { ?>
			<div class="pattern">&nbsp;</div>
			<?php } ?>
			
		<?php } elseif (option('home_background') == '3') { ?>
			
			<script type="text/javascript">
				var flashvars = { flv : '<?php echo option('home_background_flash_video'); ?>' };
				var params = { wmode: 'transparent' };
				swfobject.embedSWF('<?php bloginfo('template_url'); ?>/assets/flash/background.swf', 'background', '100%', '100%', '9.0.0', 'expressInstall.swf', flashvars, params);
			</script>
			
		<?php } elseif (option('home_background') == '5') { ?>
			
			<script type="text/javascript">
			/*	var flashvars = { flv : '<?php echo option('home_background_flash_video'); ?>' };
				var params = { wmode: 'transparent' };
				swfobject.embedSWF('<?php bloginfo('template_url'); ?>/assets/flash/background.swf', 'background', '100%', '100%', '9.0.0', 'expressInstall.swf', flashvars, params);
			*/
			</script>
			<video id="video_element" height="100%" width="100%" autoplay="autoplay" loop="loop" src="<?php echo meta(array('id' => $post->ID, 'meta' => 'post_background_html5_video')); ?>">
    </video>
			
		<?php } elseif (option('home_background') == '4') { ?>
			
			<?php if (option('home_background_google_maps_gradient') == '1') { ?>
			<div class="gradient">
				<div class="left">&nbsp;</div>
				<div class="right">&nbsp;</div>
			</div>
			
			<?php } ?>
			
			<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo option('home_background_google_maps'); ?>"></iframe>
		<?php } ?>
		
	<?php } else { ?>
		
		<?php error_log( 'estou aqui ' + meta(array('id' => $post->ID, 'meta' => 'post_background_html5_video')) ); ?>
		
		<?php if (meta(array('id' => $post->ID, 'meta' => 'post_background')) == '1') { ?>
			
			<style type="text/css">
				#background { background: <?php echo meta(array('id' => $post->ID, 'meta' => 'post_background_color')); ?>; }
			</style>
			
		<?php } elseif (meta(array('id' => $post->ID, 'meta' => 'post_background')) == '2') { ?>
			
			<img src="<?php echo meta(array('id' => $post->ID, 'meta' => 'post_background_image')); ?>" alt="" />
			
			<?php if (meta(array('id' => $post->ID, 'meta' => 'post_background_image_pattern')) == '1') { ?>
			<div class="pattern">&nbsp;</div>
			<?php } ?>
			
		<?php } elseif (meta(array('id' => $post->ID, 'meta' => 'post_background')) == '3') { ?>
			
			<script type="text/javascript">
				var flashvars = { flv : '<?php echo meta(array('id' => $post->ID, 'meta' => 'post_background_flash_video')); ?>' };
				var params = { wmode: 'transparent' };
				swfobject.embedSWF('<?php bloginfo('template_url'); ?>/assets/flash/background.swf', 'background', '100%', '100%', '9.0.0', 'expressInstall.swf', flashvars, params);
			</script>
		
		<?php } elseif (meta(array('id' => $post->ID, 'meta' => 'post_background')) == '5') { ?>
			
			<script type="text/javascript">
				/*var flashvars = { flv : '<?php echo meta(array('id' => $post->ID, 'meta' => 'post_background_html5_video')); ?>' };
				var params = { wmode: 'transparent' };
				swfobject.embedSWF('<?php bloginfo('template_url'); ?>/assets/flash/background.swf', 'background', '100%', '100%', '9.0.0', 'expressInstall.swf', flashvars, params);
			*/
			</script>
			<video id="video_element" height="100%" width="100%" autoplay="autoplay" loop="loop" src="<?php echo meta(array('id' => $post->ID, 'meta' => 'post_background_html5_video')); ?>">
    </video>
		
		<?php } elseif (meta(array('id' => $post->ID, 'meta' => 'post_background')) == '4') { ?>
			
			<?php if (meta(array('id' => $post->ID, 'meta' => 'post_background_google_maps_gradient')) == '1') { ?>
			<div class="gradient">
				<div class="left">&nbsp;</div>
				<div class="right">&nbsp;</div>
			</div>
			<?php } ?>
			
			<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo meta(array('id' => $post->ID, 'meta' => 'post_background_google_maps')); ?>"></iframe>
		<?php } ?>
	<?php } ?>
</div>
<!-- background end -->