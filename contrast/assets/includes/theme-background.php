<!-- loading start -->
<div class="loading">
	<img src="<?php bloginfo('template_url'); ?>/assets/images/loading.gif" alt ="Loading" />
</div>
<!-- loading end -->

<!-- background start -->
<div id="background">

	<?php if (is_front_page()) { ?>
			
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
	var v = document.createElement("video"); // Are we dealing with a browser that supports <video>? 
    if ( !v ) { // If no, use Flash
		var flashvars = { flv : '<?php echo $_GET['fallback']; ?>' };
		var params = { wmode: 'transparent' };
		swfobject.embedSWF('http://rebelact.me/wp-content/themes/RebelTheme/contrast/assets/flash/background.swf', 'background', '100%', '100%', '10.0.0', 'expressInstall.swf', flashvars, params);
    } 
	</script>

			
		<?php } elseif (option('home_background') == '4') { ?>
			
			<?php if (option('home_background_google_maps_gradient') == '1') { ?>
			<div class="gradient">
				<div class="left">&nbsp;</div>
				<div class="right">&nbsp;</div>
			</div>
			
			<?php } ?>
			
			<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo option('home_background_google_maps'); ?>"></iframe>
		<?php } elseif (option('home_background') == '6') { 

			$youtube_id = meta(array('id' => $original_page_title, 'meta' => 'post_background_youtube_video')); 
			
			if (isset($_REQUEST['id']) && (!empty($_REQUEST['id']))) {
				$youtube_id = $_REQUEST['id'];
			}
			?>
		
		<iframe width="100%" height="97%" src="http://www.youtube.com/embed/<?php echo $youtube_id; ?>?autoplay=1" frameborder="0" allowfullscreen></iframe>
		
	<?php } 
	} else {  ?>
		
		
		<?php if (meta(array('id' => $post->ID, 'meta' => 'post_background')) == '1') { ?>
			
			<style type="text/css">
				#background { background: <?php echo meta(array('id' => $post->ID, 'meta' => 'post_background_color')); ?>; }
			</style>
			
		<?php } elseif (meta(array('id' => $post->ID, 'meta' => 'post_background')) == '2' || meta(array('id' => $post->ID, 'meta' => 'post_background')) == '0') { ?>
		
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
			if ((BrowserDetect.browser == "Explorer") && (BrowserDetect.version == "8")) {
				var flashvars = { flv : '<?php echo meta(array('id' => $post->ID, 'meta' => 'post_background_html5_video_fallback')); ?>' };
				var params = { wmode: 'transparent' };
				swfobject.embedSWF('<?php bloginfo('template_url'); ?>/assets/flash/background.swf', 'background', '100%', '100%', '9.0.0', 'expressInstall.swf', flashvars, params);
			}
			</script>
		
		<?php } elseif (meta(array('id' => $original_page_title, 'meta' => 'post_background')) == '6') { 

			$youtube_id = meta(array('id' => $original_page_title, 'meta' => 'post_background_youtube_video')); ?>
		
		<iframe width="100%" height="97%" src="http://www.youtube.com/embed/<?php echo $youtube_id; ?>?autoplay=1" frameborder="0" allowfullscreen></iframe>

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


<!-- ESTOU AQUI <?php echo $original_page_title."/"; echo meta(array('id' => $original_page_title, 'meta' => 'post_background')); ?>-->
<!-- <iframe width="100%" height="97%" title="0" src="http://player.vimeo.com/video/36537379"  webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>  -->

</div>
<!-- background end -->