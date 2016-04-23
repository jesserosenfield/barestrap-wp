			
			</div>
			
		</div> <!-- content -->
		
		<?php echo get_tweet(); ?>
		<?php include('templates/instagram-feed.php'); ?>
		
		<script>
			var homeurl = "<?php bloginfo('wpurl'); ?>";
		</script>
		
		<?php
			$themename = $GLOBALS[ 'themename' ];

			if($GLOBALS[ 'testing' ] == true) {
			
				if( $GLOBALS[ 'critical_css' ] == true ) {
					wp_enqueue_style( 'all', get_bloginfo('stylesheet_directory') . '/style.php' );				
				} else {
					wp_enqueue_style( 'all', get_bloginfo('stylesheet_directory') . '/style-all.php' );				
				}
				
			} else {
			
				if( $GLOBALS[ 'critical_css' ] == true ) {
					wp_enqueue_style( 'all', get_bloginfo('stylesheet_directory') . '/style.css' );				
				} else {
					wp_enqueue_style( 'all', get_bloginfo('stylesheet_directory') . '/style-all.css' );				
				}
				
			}
		?>
		
		<?php include('templates/internal-nav-script.php'); ?>

		<?php
			wp_dequeue_script('twentyfifteen-navigation');
			wp_footer();
		?>
				
		<script>
			jQuery(document).ready(function($){
				$(document).foundation();
			});
		</script>

 		<script src="https://apis.google.com/js/platform.js" async defer></script>
		
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		
		<!-- Please call pinit.js only once per page -->
		<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
		
	</body>
</html>