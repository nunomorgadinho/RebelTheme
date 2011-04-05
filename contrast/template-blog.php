<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>
	<!-- content start -->
		
	<div class="content">
		<div class="content-image">
	
	<div class= "content_bg">
	<div class="nav blog" >
			<div class="navMask">
				<ul class="navContent">
					<li class="paging"><?php previous_posts_link('PREVIOUS &raquo;'); ?></li>
					<?php 
					$blog_cat = get_option('blog_category');

					if (isset($blog_cat)) 
					{
						$blog_posts = new WP_Query('cat=' . $blog_cat );
					
						if ($blog_posts->have_posts()) : while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
						<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?> <span class="date"><?php echo get_the_date(); ?></span></a></li>
						<?php endwhile; ?>
						<li class="paging"><?php next_posts_link('&laquo; NEXT'); ?></li>
						<?php else : ?>
						<h2>Nothing found.</h2>
						<?php endif; 
					
					}?>
				</ul>
			</div>
		</div>	
		
	</div>	
	</div>
	</div>
	<!-- content end -->
	
	<?php require_once(TEMPLATEPATH . '/assets/includes/theme-background.php'); ?>

<?php get_footer(); ?>
