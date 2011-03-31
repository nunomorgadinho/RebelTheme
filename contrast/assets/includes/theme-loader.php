<?php if ($_GET['type'] == 'html5video') { ?>
<video id="video_element" height="auto" width="100%" autoplay="autoplay" loop="loop">
	<source src="<?php echo $_GET['background_image']; ?>" type="video/mp4" /><!-- Safari / iOS video / IE9   -->
	<source src="<?php echo $_GET['ogg']; ?>" type="video/ogg" /><!-- Firefox / Opera / Chrome10 -->
	<embed src="http://blip.tv/play/gcMVgcmBAgA%2Em4v" type="application/x-shockwave-flash" width="1024" height="798" allowscriptaccess="always" allowfullscreen="true"></embed>
</video>
<?php } else { ?>
<img src="<?php echo $_GET['background_image']; ?>" alt="" />
<?php } ?>