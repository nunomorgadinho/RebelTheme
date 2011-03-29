<?php
/*
Template Name: Social
*/
?>
<?php get_header(); ?>
	<!-- content start -->
		
	<div class="content_wide ">
		
			
			<div class="left" style="">
			
				<img src="<?php bloginfo('template_url');?>/assets/images/youtube.png" style="padding-top:5%;" />
			
				<?php echo widgets_on_template(1);?>
			</div>
					
			<div class="middle" style="text-align:justify;">	
			
				<img src="<?php bloginfo('template_url');?>/assets/images/facebook.png" style="padding-top:5%; padding-left:45px;"/>
	
		
				<?php echo widgets_on_template(2);?>
			</div>	
	
		
	
			<div class="right" >	
	
				<img src="<?php bloginfo('template_url');?>/assets/images/vimeo.png" style="padding-top:5%;" />
	
				<?php echo widgets_on_template(3);?>
			</div>	
		
		
	</div>
	<!-- content end -->
	
	<?php require_once(TEMPLATEPATH . '/assets/includes/theme-background.php'); ?>

<?php get_footer(); ?>
