<?php 
/**
 * Template Name: Home Portofolio
 */
?>
<?php get_header(); ?>
	
	<!-- content start -->
	<div class="contentp">
		
<?php
$args = array( 'cat' => option('portfolio_category') );
$loop = new WP_Query( $args );

?>
		
		<div class="nav portfolio">
			<div class="navMask">
				<ul class="navContent">
					<li class="paging"><?php previous_posts_link('PREVIOUS &raquo;'); ?></li>
					<?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
					<?php $category = get_the_category(); ?>
					<li class="item">
						<h4><?php the_title(); ?></h4>
						
						<?php if ( meta(array('id' => $post->ID, 'meta' => 'post_background_html5_video_mp4')) == '' ) { ?>		
							<?php //error_log( image(array('image' => get_the_post_thumbnail($post->ID), 'tag' => false)) ); ?>																
					  		<p class="image"><a href="javascript:;" rel="<?php echo image(array('image' => get_the_post_thumbnail($post->ID), 'tag' => false)); ?>"><?php echo image(array('image' => get_the_post_thumbnail($post->ID), 'width' => 150, 'height' => 75)); ?></a></p>
						<?php } else { ?>
							<?php //error_log( meta(array('id' => $post->ID, 'meta' => 'post_background_html5_video_mp4')) ); ?>
							<p class="image"><a class="html5video" id="videolink" name="videolink" href="javascript:;" title="<?php echo meta(array('id' => $post->ID, 'meta' => 'post_background_html5_video_fallback')); ?>" rev="<?php echo meta(array('id' => $post->ID, 'meta' => 'post_background_html5_video_mp4')); ?>" rel="<?php echo meta(array('id' => $post->ID, 'meta' => 'post_background_html5_video_ogg')); ?>"><?php echo image(array('image' => get_the_post_thumbnail($post->ID), 'width' => 150, 'height' => 75)); ?></a></p>
						<?php } ?>
						
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

		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/browserdetect.js"></script>
		<script type="text/javascript">
		
			$(document).ready(function() {
				/*
				Hide controls in IE8
				*/
				//alert('version = ' + BrowserDetect.browser);
				if ((BrowserDetect.browser == "Explorer") && (BrowserDetect.version == "8")) {
					document.getElementById('vcontrol').style.display = 'none';
					document.getElementById('scontrol').style.display = 'none';
				}
				
				/*
				Inicio
				*/
				if ((BrowserDetect.browser == "Safari") && (BrowserDetect.version == "5")) {
					show_menus();
				} else {
				//	$('.nav.portfolio .navMask ul.navContent').animate({opacity: '0', right: '-200px'}, {queue:false, duration: 100});
					$('.nav.portfolio .navMask ul.navContent').animate({right: '-200px'}, {queue:false, duration: 100});
					$('.navigation, .footer').animate({opacity: '0'}, {queue:false, duration: 100});
					$('.footer').animate({opacity: '0'}, {queue:false, duration: 100});
					$('.logo').animate({opacity: '0'}, {queue:false, duration: 100});
					$('.videologo').animate({opacity: '1'}, {queue:false, duration: 100});
				}

						
				function show_menus() {
					$('.nav.portfolio .navMask ul.navContent').animate({opacity: '1', right: '-200px'}, {queue:false, duration: 300});
					$('.navigation, .footer').animate({opacity: '1'}, {queue:false, duration: 100});
					$('.logo').animate({opacity: '1'}, {queue:false, duration: 300});
					$('.videologo').animate({opacity: '0'}, {queue:false, duration: 300});
				}
				
				function hide_menus() {
				//	$('.nav.portfolio .navMask ul.navContent').animate({opacity: '0', right: '-200px'}, {queue:false, duration: 100});
					$('.navigation, .footer').animate({opacity: '0.1'}, {queue:false, duration: 100});
					$('.logo').animate({opacity: '0'}, {queue:false, duration: 100});
					$('.videologo').animate({opacity: '1'}, {queue:false, duration: 300});
				}

				/*
					Hover do videologo
				*/
				$('.logo').hover(function() {
					show_menus();
				},
				function(){
					hide_menus();
				});
				
				/*
					Hover do menu -->
				*/
				$('.navigation, .footer').hover(function() {
					show_menus();
				},
				function(){
					hide_menus();
				});

				/*
					Hover do menu <--
				*/
				$('.nav.portfolio .navMask ul.navContent').hover(function() {
					$('.nav.portfolio .navMask ul.navContent').animate({right: '0px'}, {queue:false, duration: 300});
					$('.navigation, .footer').animate({opacity: '1'}, {queue:false, duration: 300});
					$('.nav.portfolio .navMask ul.navContent').animate({opacity: '1'}, {queue:false, duration: 300});
					$('.logo').animate({opacity: '1'}, {queue:false, duration: 300});
					$('.videologo').animate({opacity: '0'}, {queue:false, duration: 300});
				},
				function(){
					$('.nav.portfolio .navMask ul.navContent').animate({right: '-200px'}, {queue:false, duration: 100});
					$('.navigation, .footer').animate({opacity: '0.1'}, {queue:false, duration: 100});
					//$('.nav.portfolio .navMask ul.navContent').animate({opacity: '0'}, {queue:false, duration: 300});
					$('.logo').animate({opacity: '0'}, {queue:false, duration: 100});
					$('.videologo').animate({opacity: '1'}, {queue:false, duration: 100});
				});
				
				$('.nav.portfolio .navMask ul.navContent li p.image a[name!="videolink"]').click(function() {
					//alert('IMAGE');
					$('.loading').fadeIn();
					$.ajax({
						type: 'GET',
						url: '<?php bloginfo('template_url'); ?>/assets/includes/theme-loader.php',
						data: 'background_image=' + $(this).attr('rel'),
						success: function(html) {
							//console.log('image - ' + html);
							$('#background').html(html);
							$('#background img').load(function() {
								background_resize();
								$(this).fadeIn();
								$('.loading').fadeOut();
							});
						}
					});
				});
				
				$('.nav.portfolio .navMask ul.navContent li p.image a[name="videolink"]').click(function() {
					//alert('VIDEO');
					if ((BrowserDetect.browser == "Explorer") && (BrowserDetect.version == "8"))
						return;
					
					$('.loading').fadeIn();
					$.ajax({
						type: 'GET',
						url: '<?php bloginfo('template_url'); ?>/assets/includes/theme-loader.php',
						data: 'background_image=' + $(this).attr('rev') + '&ogg=' + $(this).attr('rel') + '&fallback=' + $(this).attr('title') + '&type=html5video',
						success: function(html) {
							//console.log('video - ' + html);
							$('#background').html(html);
							
							document.getElementById('vcontrol').src='<?php bloginfo('template_url'); ?>/assets/images/pause.png';
							
							var myVideo = $('#background video');

							if (BrowserDetect.browser == "Firefox")
							{
								//console.log(myVideo);
								if (typeof myVideo.loop == 'boolean') { // loop supported
								  myVideo.loop = true;
								} else { // loop property not supported
								  myVideo.bind('ended', function () {
								    this.currentTime = 0;
								    this.play();
								  }, false);
								}
							}
							
							//myVideo.play();
																
							$('.loading').fadeOut();
						}
					});
				});

				$('#videolink').click();
				
				//$('.nav.portfolio .navMask ul.navContent li p.image a[name!="image"]:eq(0)').click(); // input[name!="newsletter"]
			});
		</script>
		<?php } ?>
		
		
	</div>
	<!-- content end -->
	
	
		<?php require_once(TEMPLATEPATH . '/assets/includes/theme-background.php'); ?>
	
	
<?php get_footer(); ?>