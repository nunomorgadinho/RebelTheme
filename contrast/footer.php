
	<!-- footer start -->
	<div class="footer">
		<?php if (option('contact_social') == '1') { ?>
		<ul class="social">
			<?php if (option('contact_social_rss') == '1') { ?><li><a href="<?php bloginfo('rss_url'); ?>" class="social-rss">RSS</a></li><?php } ?>
			<?php if (option('contact_social_facebook') == '1') { ?><li><a href="<?php echo option('contact_social_facebook_text'); ?>" class="social-facebook">Facebook</a></li><?php } ?>
			<?php if (option('contact_social_twitter') == '1') { ?><li><a href="<?php echo option('contact_social_twitter_text'); ?>" class="social-twitter">Twitter</a></li><?php } ?>
			<?php if (option('contact_social_friendfeed') == '1') { ?><li><a href="<?php echo option('contact_social_friendfeed_text'); ?>" class="social-friendfeed">FriendFeed</a></li><?php } ?>
			<?php if (option('contact_social_flickr') == '1') { ?><li><a href="<?php echo option('contact_social_flickr_text'); ?>" class="social-flickr">Flickr</a></li><?php } ?>
		</ul>
		<?php } ?>
		
		<div class="copyright">
			<?php if (option('copyright') == '0') { ?>
			<p>Copyright &copy; <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>. All Rights Reserved. Powered by <a href="http://www.widgilabs.com">WidgiLabs</a></p>
			<? } else { ?>
			<p><?php echo option('copyright_text'); ?></p>
			<?php } ?>
		</div>
	</div>
	<!-- footer end -->
</div>

<?php if (option('seo_google_analytics') == '1') { echo option('seo_tracking_code'); } ?>
<?php wp_footer(); ?>

</body>
</html>