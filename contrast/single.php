<?php get_header(); ?>

	<!-- content start -->
	<div class="content">
	<div class="content-image">
		<div class="sliderMask">
			<div class="sliderContent">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
				
				<h3 class="details">
					<span class="cats">POSTED IN <?php the_category(', ') ?><?php the_tags(' | TAGS :<br /> ', ', ', '<br />'); ?></span> 
					<span class="date"><?php echo get_the_date(); ?></span>
				</h3>
				
				<?php the_content(__('(Read More &raquo;)')); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages :</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			
				<?php comments_template(); ?>
				
				<?php endwhile; else: ?>
				<p><?php _e('Nothing found.'); ?></p>
				<?php endif; ?>

			</div>
		</div>
		</div>
	</div>
	<!-- content end -->
	
	<?php require_once(TEMPLATEPATH . '/assets/includes/theme-background.php'); ?>
	
<?php get_footer(); ?>