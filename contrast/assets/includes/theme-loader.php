<?php if ($_GET['type'] == 'html5video') { ?>
<video id="video_element" height="auto" width="100%" autoplay="autoplay" loop="loop">
	<source src="<?php echo $_GET['background_image']; ?>" type="video/mp4" /><!-- Safari / iOS video    -->
	<source src="<?php echo $_GET['ogg']; ?>" type="video/ogg" /><!-- Firefox / Opera / Chrome10 -->
</video>
<?php } else { ?>
<img src="<?php echo $_GET['background_image']; ?>" alt="" />
<?php } ?>