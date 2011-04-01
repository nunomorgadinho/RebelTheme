<?php if ($_GET['type'] == 'html5video') { ?>
<video id="video_element2" height="auto" width="100%" autoplay="autoplay" loop="loop">
	<source src="<?php echo $_GET['background_image']; ?>" type="video/mp4" /><!-- Chrome / Safari / iOS video / IE9   -->
	<source src="<?php echo $_GET['ogg']; ?>" type="video/ogg" /><!-- Firefox -->

	<!-- Fallback to Flash if HTML5 support is not found -->
	<embed src="http://blip.tv/play/gcMVgcmBAgA%2Em4v" type="application/x-shockwave-flash" width="100%" height="auto" allowscriptaccess="always" allowfullscreen="true"></embed> 
</video>
<?php } else { ?>
<img src="<?php echo $_GET['background_image']; ?>" alt="no video found" />
<?php } ?>