<?php get_header(); ?>
	
	<!-- content start -->
	<div class="content">
		<?php if (in_category(option('portfolio_category')) || is_category(option('portfolio_category'))) { ?>
		
		<div class="nav portfolio">
			<div class="navMask">
				<ul class="navContent">
					<li class="paging"><?php previous_posts_link('PREVIOUS &raquo;'); ?></li>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php $category = get_the_category(); ?>
					<li class="item">
						<h4><?php the_title(); ?></h4>
						<p class="image"><a href="javascript:;" rel="<?php echo image(array('image' => get_the_post_thumbnail($post->ID), 'tag' => false)); ?>"><?php echo image(array('image' => get_the_post_thumbnail($post->ID), 'width' => 150, 'height' => 75)); ?></a></p>
						<p class="details"><?php echo get_the_date(); ?> | <?php echo $category[0]->cat_name; ?></p>
						<p class="more"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">VIEW DETAILS</a></p>
					</li>
					<?php endwhile; ?>
					<li class="paging"><?php next_posts_link('&laquo; NEXT'); ?></li>
					<?php else : ?>
					<h2>Nothing found.</h2>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		
		<?php if (have_posts()) { ?>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.nav.portfolio .navMask ul.navContent, .navigation, .footer').hover(function() {
					$('.nav.portfolio .navMask ul.navContent').animate({right: '0px'}, {queue:false, duration: 400});
					$('.navigation, .footer').animate({opacity: '1'}, {queue:false, duration: 400});
				},
				function(){
					$('.nav.portfolio .navMask ul.navContent').animate({right: '-200px'}, {queue:false, duration: 200});
					$('.navigation, .footer').animate({opacity: '0.1'}, {queue:false, duration: 200});
				});
				
				$('.nav.portfolio .navMask ul.navContent li p.image a').click(function() {
					$('.loading').fadeIn();
					$.ajax({
						type: 'GET',
						url: '<?php bloginfo('template_url'); ?>/assets/includes/theme-loader.php',
						data: 'background_image=' + $(this).attr('rel'),
						success: function(html) {
							$('#background').html(html);
							$('#background img').load(function() {
								background_resize();
								$(this).fadeIn();
								$('.loading').fadeOut();
							});
						}
					});
				});
				
				$('.nav.portfolio .navMask ul.navContent li p.image a:eq(0)').click();
			});
		</script>
		<?php } ?>
		
		<?php } else { ?>
		
		<div class="nav blog">
			<div class="navMask">
				<ul class="navContent">
					<li class="paging"><?php previous_posts_link('PREVIOUS &raquo;'); ?></li>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?> <span class="date"><?php echo get_the_date(); ?></span></a></li>
					<?php endwhile; ?>
					<li class="paging"><?php next_posts_link('&laquo; NEXT'); ?></li>
					<?php else : ?>
					<h2>Nothing found.</h2>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		
		<?php } ?>
	</div>
	<!-- content end -->
	
	<?php if (in_category(option('portfolio_category')) || is_category(option('portfolio_category'))) { ?>
		<?php require_once(TEMPLATEPATH . '/assets/includes/theme-background.php'); ?>
	<?php } ?>
	
<?php get_footer(); ?>