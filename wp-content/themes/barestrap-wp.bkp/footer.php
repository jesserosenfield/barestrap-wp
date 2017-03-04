			
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
		
		<script>
			jQuery(document).ready(function($){
				$(document).foundation();
			});
		</script>
		
		<?php
			wp_dequeue_script('twentyfifteen-navigation');
			wp_footer();
		?>

		<script>
		(function(w, d, s) {
		  function go(){
		    var js, fjs = d.getElementsByTagName(s)[0], load = function(url, id) {
			  if (d.getElementById(id)) {return;}
			  js = d.createElement(s); js.src = url; js.id = id;
			  fjs.parentNode.insertBefore(js, fjs);
			};
		    load('//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5', 'facebook-jssdk');
		    load('//platform.twitter.com/widgets.js', 'tweetjs');
		  }
		  if (w.addEventListener) { w.addEventListener("load", go, false); }
		  else if (w.attachEvent) { w.attachEvent("onload",go); }
		}(window, document, 'script'));
		</script>
		
	</body>
</html>