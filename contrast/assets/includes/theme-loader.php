<?php if ($_GET['type'] == 'html5video') { ?>
<video id="video_element2" height="auto" width="100%" autoplay="autoplay" loop="loop">
	<source src="<?php echo $_GET['background_image']; ?>" type="video/mp4" /><!-- Chrome / Safari / iOS video / IE9   -->
	<source src="<?php echo $_GET['ogg']; ?>" type="video/ogg" /><!-- Firefox -->

	<!-- Fallback to Flash if HTML5 support is not found -->

</video>
<?php } else { ?>
<img src="<?php echo $_GET['background_image']; ?>" alt="no video found" />
<?php } ?>