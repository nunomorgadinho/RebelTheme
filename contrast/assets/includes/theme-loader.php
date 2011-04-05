<?php if ($_GET['type'] == 'html5video') { ?>
<video id="video_element2" height="480" width="840" autoplay="autoplay" loop="loop">
	<source src="<?php echo $_GET['background_image']; ?>" type="video/mp4" /><!-- Chrome / Safari / iOS video / IE9   -->
	<source src="<?php echo $_GET['ogg']; ?>" type="video/ogg" /><!-- Firefox -->
  
	<script type="text/javascript">
	var v = document.createElement("video"); // Are we dealing with a browser that supports <video>? 
    if ( !v ) { // If no, use Flash
		var flashvars = { flv : '<?php echo $_GET['fallback']; ?>' };
		var params = { wmode: 'transparent' };
		swfobject.embedSWF('http://rebelact.me/wp-content/themes/RebelTheme/contrast/assets/flash/background.swf', 'background', '100%', '100%', '10.0.0', 'expressInstall.swf', flashvars, params);
    }
	</script>
</video>
<?php } else { ?>
<img src="<?php echo $_GET['background_image']; ?>" alt="no video found" />
<?php } ?>