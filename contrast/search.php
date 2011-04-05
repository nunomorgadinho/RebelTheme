<?php get_header(); ?>

	<!-- content start -->
	<div class="content">
		<div class="content-image">
		<div class="nav blog">
			<div class="navMask">
				<ul class="navContent">
					<li class="paging"><?php previous_posts_link('PREVIOUS &raquo;'); ?></li>
					<h2>SEARCHED FOR "<?php the_search_query(); ?>"</h2>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php $category = get_the_category(); ?>
					<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?> <span class="date"><b><?php echo $category[0]->cat_name; ?></b> | <?php the_time('j.m.Y'); ?></span></a></li>
					<?php endwhile; ?>
					<li class="paging"><?php next_posts_link('&laquo; NEXT'); ?></li>
					<?php else : ?>
					<h2>Nothing found.</h2>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		</div>
	</div>
	<!-- content end -->

<?php get_footer(); ?>