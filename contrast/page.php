<?php get_header(); ?>
	<!-- content start -->
		
	<div class="content">
		<div class="sliderMask">
			<div class="sliderContent"> 
	
				<?php 
					if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<h1><?php the_title(); ?></h1>
				
				<?php the_content(__('(Read More &raquo;)')); ?>
				
				<?php endwhile; else: ?>
				<p><?php _e('Nothing found.'); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<!-- content end -->
	
	<?php require_once(TEMPLATEPATH . '/assets/includes/theme-background.php'); ?>

<?php get_footer(); ?>