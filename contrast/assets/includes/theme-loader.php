<?php if ($_GET['type'] == 'html5video') { ?>
<video id="video_element" height="auto" width="100%" autoplay="autoplay" loop="loop">
	<source src="<?php echo $_GET['background_image']; ?>" type="video/mp4" /><!-- Safari / iOS video / IE9   -->
	<source src="<?php echo $_GET['ogg']; ?>" type="video/ogg" /><!-- Firefox / Opera / Chrome10 -->

		<script type="text/javascript">
			var flashvars = { flv : '<?php echo $_GET["ogg"]; ?>' };
			var params = { wmode: 'transparent' };
			swfobject.embedSWF('<?php bloginfo('template_url'); ?>/assets/flash/background.swf', 'background', '100%', '100%', '9.0.0', 'expressInstall.swf', flashvars, params);
		</script>
</video>
<?php } else { ?>
<img src="<?php echo $_GET['background_image']; ?>" alt="" />
<?php } ?>