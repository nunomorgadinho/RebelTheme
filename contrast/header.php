<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<?php if (option('seo') == '1') { ?>
	<meta name="author" content="<?php echo option('seo_author'); ?>" />
	<meta name="keywords" content="<?php echo option('seo_keywords'); ?>" />
	<meta name="description" content="<?php echo option('seo_description'); ?>" />
	<meta name="robots" content="<?php echo option('seo_robots') == '1' ? 'all' : 'noindex'; ?>" />
	<?php } ?>
	<?php wp_head(); ?>
	
	<title><?php if (option('seo_title') == '0' || option('seo') == '0') {
		bloginfo('name');
		wp_title(', ', true, 'left');
	} else {
		echo option('seo_title_custom');
	} ?></title>
	
	<style type="text/css" title="style" media="screen">
		@import url('<?php bloginfo('template_url'); ?>/style.css');
		@import url('<?php bloginfo('template_url'); ?>/assets/css/prettyPhoto.css');
	</style>
	
	<!--[if IE 6]>
	<style type="text/css" title="style-IE6" media="screen">
		@import url('<?php bloginfo('template_url'); ?>/assets/css/style-IE6.css');
	</style>
	<![endif]-->
	
	<!--[if IE 7]>
	<style type="text/css" title="style-IE7" media="screen">
		@import url('<?php bloginfo('template_url'); ?>/assets/css/style-IE7.css');
	</style>
	<![endif]-->

	
	<?php if(is_front_page() || strpos($_SERVER['REQUEST_URI'],'category') || strpos($_SERVER['REQUEST_URI'],'portofolio')) { ?>
	<!--[if IE 8]>
	<style type="text/css" title="style-IE7" media="screen">
		@import url('<?php bloginfo('template_url'); ?>/assets/css/style-IE8.css');
	</style>
	<![endif]-->
	<?php } ?>
	
	
	<?php if (option('logo_position') == '1') { ?>
	<style type="text/css">
		.logo {
			top: auto;
			bottom: 60px;
		}
	</style>
	<?php } ?>
	
	<?php if (option('logo') != '') { ?>
	<style type="text/css">
		.logo a {
			background: url('<?php echo option('logo'); ?>') no-repeat;
		}
	</style>
	<?php } ?>
	
	<?php if (option('theme_colors') == '1') { ?>
	<?php require_once(TEMPLATEPATH . '/assets/includes/theme-colors.php'); ?>
	<?php } ?>
	
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery-1.5.1.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery.inputs.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jScrollPane.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/swfobject.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/functions.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/custom-form-elements.js"></script>
	
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo option('favicon'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php wp_head(); ?>
	
</head>

<body <?php body_class($body_class); ?>>

<div class="container"> 
	<!-- header start -->
	<div class="header">
		<!-- logo start -->
		<?php $tag_logo = (is_home() || is_front_page()) ? 'h1' : 'div'; ?>
		<<?php echo $tag_logo; ?> class="logo">
			<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
		</<?php echo $tag_logo; ?>>
		<div class="videologo" style="opacity:0" >
		<img src="<?php bloginfo('template_url'); ?>/assets/images/oculos_rebel_white.png" style="margin-left: 25px; margin-top: 30px;" alt="glasses"></img>
		<img src="<?php bloginfo('template_url'); ?>/assets/images/Rebel-Logo.png" style="margin-left: 8px; margin-top: 30px;" alt="glasses"></img>
		</div>
		<!-- logo end -->
		
		<?php 
					
					$en = false;
					if(ICL_LANGUAGE_CODE== 'en')
						$en=true;
					
					
						
					$source_off = '/assets/images/off.png'; 	
					$source_on = '/assets/images/on.png';
					
					if($en)
					{
						$source_en = $source_on;
						$source_pt = $source_off;
					}
					else
					{	$source_en = $source_off;
						$source_pt = $source_on;		
					}				
				?>
		
		
		<div class="navigation" <?php if (is_page('9')) { echo 'style="opacity:0.1"';} ?>>
		<?php $curr_page = substr("http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'], 0,strpos("http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'], '/?'))?>
	
			<div class="controls">
			
				
			
			<div class="lang">	
				<a class="en" href="<?php echo $curr_page."?lang=en"; ?>">
					<img id="en" width="10" height="10" alt="pt-pt" src="<?php echo bloginfo('template_url').$source_en; ?>" onclick="document.getElementById('en').src='<?php bloginfo('template_url'); ?>/assets/images/on.png'; document.getElementById('pt').src='<?php bloginfo('template_url'); ?>/assets/images/off.png';">
				</a>
				<a class="pt" href="<?php echo $curr_page."?lang=pt-pt"; ?>">
					<img id="pt" width="10" height="10" alt="pt-pt" src="<?php echo bloginfo('template_url').$source_pt; ?>" onclick="document.getElementById('pt').src='<?php bloginfo('template_url'); ?>/assets/images/on.png'; document.getElementById('en').src='<?php bloginfo('template_url'); ?>/assets/images/off.png';">
				</a>
			</div>	
			<script type="text/javascript">
			function playPause() {
			       var myVideo = document.getElementsByTagName('video')[0];
			       if (myVideo.paused)
			           myVideo.play();
			       else
			           myVideo.pause();
			       }

			var muted = false;
			function unmuteMute() {
				var myVideo = document.getElementsByTagName('video')[0];
				if(muted) {
					myVideo.volume = 1;
				    muted = false;
				} else {
					myVideo.volume = 0;
			    	muted = true;
				}
			}
			</script>	
			
			<div class="play">
				<img id="vcontrol" alt="play-stop" src="<?php echo bloginfo('template_url').'/assets/images/pause.png'; ?>" onclick=" playPause();  if(this.src=='<?php bloginfo('template_url'); ?>/assets/images/play.png') document.getElementById('vcontrol').src='<?php bloginfo('template_url'); ?>/assets/images/pause.png'; else document.getElementById('vcontrol').src='<?php bloginfo('template_url'); ?>/assets/images/play.png'; ">
			</div>	
				
			<div class="sound">
				<img id="scontrol" alt="play-stop" src="<?php echo bloginfo('template_url').'/assets/images/sound.png'; ?>" onclick=" unmuteMute(); if(this.src=='<?php bloginfo('template_url'); ?>/assets/images/sound.png'){ document.getElementById('scontrol').src='<?php bloginfo('template_url'); ?>/assets/images/soundOff.png'; } else {document.getElementById('scontrol').src='<?php bloginfo('template_url'); ?>/assets/images/sound.png'; } ">
			</div>	
				
				
			</div>
		
			<!-- menu start -->
			<?php wp_nav_menu(array(
				'container' => '',
				'menu_class' => 'menu',
				'theme_location' => 'menu-header',
				'menu' => '4'
			)); ?>
			<!-- menu end -->
			
			<?php if (option('search') == '1') { ?>
			<div class="search">
				<form action="<?php bloginfo('url'); ?>/" method="get" id="searchform">
					<fieldset>
						<input type="text" value="" title="SEARCH" class="text" name="s" id="s" />
						<input type="submit" value="" class="submit" />
					</fieldset>
				</form>
			</div>
			<?php } ?>
		</div>
	</div>
	<!-- header end -->
