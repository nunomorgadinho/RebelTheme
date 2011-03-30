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
		<<?php echo $tag_logo; ?> class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></<?php echo $tag_logo; ?>>
		<div class="videologo" style="opacity:0" >
		<img src="<?php bloginfo('template_url'); ?>/assets/images/oculos_rebel_white.png" style="margin-left: 25px; margin-top: 30px;" alt="glasses"></img>
		<img src="<?php bloginfo('template_url'); ?>/assets/images/Rebel-Logo.png" style="margin-left: 8px; margin-top: 30px;" alt="glasses"></img>
		</div>
		<!-- logo end -->
		
		<div class="navigation" style="opacity:0.1">
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
