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
						
						<?php if ( meta(array('id' => $post->ID, 'meta' => 'post_background_html5_video_mp4')) == '' ) { ?>		
							<?php //error_log( image(array('image' => get_the_post_thumbnail($post->ID), 'tag' => false)) ); ?>																
					  		<p class="image"><a href="javascript:;" rel="<?php echo image(array('image' => get_the_post_thumbnail($post->ID), 'tag' => false)); ?>"><?php echo image(array('image' => get_the_post_thumbnail($post->ID), 'width' => 150, 'height' => 75)); ?></a></p>
						<?php } else { ?>
							<?php //error_log( meta(array('id' => $post->ID, 'meta' => 'post_background_html5_video_mp4')) ); ?>
							<p class="image"><a class="html5video" id="videolink" name="videolink" href="javascript:;" rev="<?php echo meta(array('id' => $post->ID, 'meta' => 'post_background_html5_video_mp4')); ?>" rel="<?php echo meta(array('id' => $post->ID, 'meta' => 'post_background_html5_video_ogg')); ?>"><?php echo image(array('image' => get_the_post_thumbnail($post->ID), 'width' => 150, 'height' => 75)); ?></a></p>
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
		<script type="text/javascript">
		var BrowserDetect = {
				init: function () {
					this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
					this.version = this.searchVersion(navigator.userAgent)
						|| this.searchVersion(navigator.appVersion)
						|| "an unknown version";
					this.OS = this.searchString(this.dataOS) || "an unknown OS";
				},
				searchString: function (data) {
					for (var i=0;i<data.length;i++)	{
						var dataString = data[i].string;
						var dataProp = data[i].prop;
						this.versionSearchString = data[i].versionSearch || data[i].identity;
						if (dataString) {
							if (dataString.indexOf(data[i].subString) != -1)
								return data[i].identity;
						}
						else if (dataProp)
							return data[i].identity;
					}
				},
				searchVersion: function (dataString) {
					var index = dataString.indexOf(this.versionSearchString);
					if (index == -1) return;
					return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
				},
				dataBrowser: [
					{
						string: navigator.userAgent,
						subString: "Chrome",
						identity: "Chrome"
					},
					{ 	string: navigator.userAgent,
						subString: "OmniWeb",
						versionSearch: "OmniWeb/",
						identity: "OmniWeb"
					},
					{
						string: navigator.vendor,
						subString: "Apple",
						identity: "Safari",
						versionSearch: "Version"
					},
					{
						prop: window.opera,
						identity: "Opera"
					},
					{
						string: navigator.vendor,
						subString: "iCab",
						identity: "iCab"
					},
					{
						string: navigator.vendor,
						subString: "KDE",
						identity: "Konqueror"
					},
					{
						string: navigator.userAgent,
						subString: "Firefox",
						identity: "Firefox"
					},
					{
						string: navigator.vendor,
						subString: "Camino",
						identity: "Camino"
					},
					{		// for newer Netscapes (6+)
						string: navigator.userAgent,
						subString: "Netscape",
						identity: "Netscape"
					},
					{
						string: navigator.userAgent,
						subString: "MSIE",
						identity: "Explorer",
						versionSearch: "MSIE"
					},
					{
						string: navigator.userAgent,
						subString: "Gecko",
						identity: "Mozilla",
						versionSearch: "rv"
					},
					{ 		// for older Netscapes (4-)
						string: navigator.userAgent,
						subString: "Mozilla",
						identity: "Netscape",
						versionSearch: "Mozilla"
					}
				],
				dataOS : [
					{
						string: navigator.platform,
						subString: "Win",
						identity: "Windows"
					},
					{
						string: navigator.platform,
						subString: "Mac",
						identity: "Mac"
					},
					{
						   string: navigator.userAgent,
						   subString: "iPhone",
						   identity: "iPhone/iPod"
				    },
					{
						string: navigator.platform,
						subString: "Linux",
						identity: "Linux"
					}
				]

			};
			BrowserDetect.init();
			
		
			$(document).ready(function() {

				/*
					Hover do menu -->
				*/
				$('.navigation').hover(function() {
					$('.nav.portfolio .navMask ul.navContent').animate({opacity: '1', right: '-200px'}, {queue:false, duration: 300});
					$('.navigation, .footer').animate({opacity: '1'}, {queue:false, duration: 100});
					$('.logo').animate({opacity: '1'}, {queue:false, duration: 300});
					$('.videologo').animate({opacity: '0'}, {queue:false, duration: 300});
				},
				function(){
					$('.nav.portfolio .navMask ul.navContent').animate({opacity: '0.1', right: '-200px'}, {queue:false, duration: 100});
					$('.navigation, .footer').animate({opacity: '0.1'}, {queue:false, duration: 100});
					$('.logo').animate({opacity: '0.1'}, {queue:false, duration: 100});
					$('.videologo').animate({opacity: '1'}, {queue:false, duration: 100});
				});

				/*
					Hover do menu <--
				*/
				$('.nav.portfolio .navMask ul.navContent').hover(function() {
					$('.nav.portfolio .navMask ul.navContent').animate({right: '0px'}, {queue:false, duration: 300});
					$('.navigation .footer').animate({opacity: '1'}, {queue:false, duration: 300});
					$('.nav.portfolio .navMask ul.navContent').animate({opacity: '1'}, {queue:false, duration: 300});
					$('.logo').animate({opacity: '1'}, {queue:false, duration: 300});
					$('.videologo').animate({opacity: '0'}, {queue:false, duration: 300});
				},
				function(){
					$('.nav.portfolio .navMask ul.navContent').animate({right: '-200px'}, {queue:false, duration: 100});
					$('.navigation .footer').animate({opacity: '0.1'}, {queue:false, duration: 100});
					$('.nav.portfolio .navMask ul.navContent').animate({opacity: '0'}, {queue:false, duration: 300});
					$('.logo').animate({opacity: '0.1'}, {queue:false, duration: 100});
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
					$('.loading').fadeIn();
					$.ajax({
						type: 'GET',
						url: '<?php bloginfo('template_url'); ?>/assets/includes/theme-loader.php',
						data: 'background_image=' + $(this).attr('rev') + '&ogg=' + $(this).attr('rel') + '&type=html5video',
						success: function(html) {
							//console.log('video - ' + html);
							$('#background').html(html);

							var myVideo = $('#background video');
	
							//console.log(myVideo);
							if (typeof myVideo.loop == 'boolean') { // loop supported
							//  myVideo.loop = true;
							} else { // loop property not supported
							//  myVideo.bind('ended', function () {
							 //   this.currentTime = 0;
							 //   this.play();
							//  }, false);
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