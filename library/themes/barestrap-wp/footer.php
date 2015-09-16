			
			</div>
			
		</div> <!-- content -->

		<script>
			var homeurl = "<?php bloginfo('wpurl'); ?>";
		</script>
		
		<?php
			$themename = $GLOBALS[ 'themename' ];

			if($GLOBALS[ 'testing' ] == true) {
				wp_enqueue_style( 'all', get_bloginfo('stylesheet_directory') . '/style.php' );
			} else {
				wp_enqueue_style( 'all', get_bloginfo('stylesheet_directory') . "/{$themename}.css" );			
			}
		?>
		
		<?php
			wp_dequeue_script('twentytwelve-navigation');
			wp_footer();
		?>
				
		<script>
			$(document).ready(function(){
				$(document).foundation();
			});
		</script>
	</body>
</html>