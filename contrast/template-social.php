<?php
/*
Template Name: Social
*/
?>
<?php get_header(); ?>
	<!-- content start -->
		
	<div class="content_wide ">
		<div class="sliderMask">
			<div class="sliderContent">
			
			<div class="left" style="">
			
				<img src="<?php bloginfo('template_url');?>/assets/images/youtube.png" style="margin-left:50px;"/>
				
				<?php echo widgets_on_template(1);?>
			</div>
					
			<div class="middle" >	
			
				<img src="<?php bloginfo('template_url');?>/assets/images/facebook.png" style="margin-left:-40px;"/>
	
		
				<?php echo widgets_on_template(2);?>
			</div>	
	
		
	
			
	</div>
	</div>
	</div>
	<!-- content end -->
	
	<?php require_once(TEMPLATEPATH . '/assets/includes/theme-background.php'); ?>

<?php get_footer(); ?>
