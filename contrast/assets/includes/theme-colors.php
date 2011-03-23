<?php

$theme_color_1 = option('theme_color_1');
$theme_color_2 = option('theme_color_2');

if ($theme_color_1 != '' && $theme_color_2 !='') { ?>

<style type="text/css">
	.theme_color_1 {
		color: <?php echo $theme_color_1; ?> !important;
		background: <?php echo $theme_color_2; ?> !important;
	}
	
	.theme_color_2 {
		color: <?php echo $theme_color_2; ?> !important;
		background: <?php echo $theme_color_1; ?> !important;
	}
	
	.navigation ul.menu li a {
		color: <?php echo $theme_color_1; ?>;
		background: <?php echo $theme_color_2; ?>;
	}
	.navigation ul.menu li a:hover {
		color: <?php echo $theme_color_2; ?>;
		background: <?php echo $theme_color_1; ?>;
	}
	.navigation ul.menu li ul {
		border-color: <?php echo $theme_color_2; ?>;
	}
	.navigation ul.menu li ul li a {
		color: <?php echo $theme_color_2; ?>;
		background: <?php echo $theme_color_1; ?>;
	}
	.navigation ul.menu li ul li a:hover {
		color: <?php echo $theme_color_1; ?>;
		background: <?php echo $theme_color_2; ?>;
	}
	.content h1,
	.content h2,
	.content h3 {
		color: <?php echo $theme_color_1; ?>;
		background: <?php echo $theme_color_2; ?>;
	}
	.content h3.details {
		color: <?php echo $theme_color_2; ?>;
		background: <?php echo $theme_color_1; ?>;
	}
	.content h3.details span.cats a {
		color: <?php echo $theme_color_2; ?>;
	}
	
	.jScrollPaneTrack .jScrollPaneDrag {
		background: <?php echo $theme_color_2; ?>;
	}
	.nav.blog .navMask ul.navContent li a {
		color: <?php echo $theme_color_1; ?>;
		background: <?php echo $theme_color_2; ?>;
	}
	.nav.blog .navMask ul.navContent li a:hover {
		color: <?php echo $theme_color_2; ?>;
		background: <?php echo $theme_color_1; ?>;
	}
	.nav.blog .navMask ul.navContent li a span.date {
		color: <?php echo $theme_color_1; ?>;
	}
	.nav.blog .navMask ul.navContent li a:hover span.date {
		color: <?php echo $theme_color_2; ?>;
	}
	.nav.blog .navMask ul.navContent li.paging a {
		color: <?php echo $theme_color_2; ?>;
		background: <?php echo $theme_color_1; ?>;
	}
	.nav.portfolio .navMask ul.navContent li {
		color: <?php echo $theme_color_1; ?>;
		background: <?php echo $theme_color_2; ?>;
	}
	.nav.portfolio .navMask ul.navContent li:hover {
		color: <?php echo $theme_color_2; ?>;
		background: <?php echo $theme_color_1; ?>;
	}
	.nav.portfolio .navMask ul.navContent li p.more a {
		color: <?php echo $theme_color_1; ?>;
	}
	.nav.portfolio .navMask ul.navContent li:hover p.more a {
		color: <?php echo $theme_color_2; ?>;
	}
	.nav.portfolio .navMask ul.navContent li.paging a {
		color: <?php echo $theme_color_2; ?>;
		background: <?php echo $theme_color_1; ?>;
	}
	.nav.portfolio .navMask ul.navContent li p.details {
		color: <?php echo $theme_color_1; ?>;
	}
	.nav.portfolio .navMask ul.navContent li:hover p.details {
		color: <?php echo $theme_color_2; ?>;
	}
	.nav.portfolio .navMask ul.navContent li p.details a {
		color: <?php echo $theme_color_1; ?>;
	}
	.nav.portfolio .navMask ul.navContent li p.details a:hover {
		color: <?php echo $theme_color_2; ?>;
	}
	.footer .icons ul.list li a {
		background: <?php echo $theme_color_1; ?>;
	}
	.footer .copyright {
		color: <?php echo $theme_color_1; ?>;
	}
	.footer .copyright a {
		color: <?php echo $theme_color_1; ?>;
	}
</style>

<?php } ?>