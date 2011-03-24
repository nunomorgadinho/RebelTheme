<?php if ($_GET['type'] == 'html5video') { ?>
<div id="video" style="width:100%;overflow:hidden;z-index:0;">
<video id="video_element" height="auto" width="100%" autoplay="autoplay" loop="loop">
	<source src="<?php echo $_GET['background_image']; ?>" type="video/mp4" /><!-- Safari / iOS video    -->
	<source src="<?php echo $_GET['ogg']; ?>" type="video/ogg" /><!-- Firefox / Opera / Chrome10 -->
</video>
</div>
<?php } else { ?>
<img src="<?php echo $_GET['background_image']; ?>" alt="" />
<?php } ?>