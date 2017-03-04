<?php
	if(!is_admin()) {
		function bf_scripts() {

			add_action( 'wp_enqueue_scripts', 'remove_scripts', 100 );

			function remove_scripts() {
				wp_dequeue_script( 'jquery-ui-core' );
				wp_dequeue_script( 'jquery-ui-datepicker' ); 
				wp_dequeue_script( 'twentyfifteen-script' ); 
				wp_deregister_script( 'twentyfifteen-script' ); 
				wp_dequeue_script( 'twentyfifteen-skip-link-focus-fix' );			
				wp_deregister_script( 'twentyfifteen-skip-link-focus-fix' );			
			}
			
			// wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
			
			// HEADER SCRIPTS
			wp_enqueue_script( 'beam', get_bloginfo('stylesheet_directory') . '/assets/js/beam.js', false, '', false );
			wp_enqueue_script( 'imgpreload', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/jquery.imgpreload.js', false, '', false);
			wp_enqueue_script( 'bootstrap', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/bootstrap.js', false, 'jQuery', false );
			wp_enqueue_script( 'foundation', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/foundation.min.js', false, 'jQuery', false );
			// FOOTER SCRIPTS
			wp_enqueue_script( 'modernizr', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/modernizr.js', false, '', true );
			wp_enqueue_script( 'smartresize', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/jquery.smartresize.js', false, '', true );
			wp_enqueue_script( 'flickity', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/flickity.js', false, '', true );
			wp_enqueue_script( 'headroom', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/headroom.js', false, '', true );

			wp_enqueue_script( 'lazyloadxt', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/lazyloadxt.js', false, '', true );

			wp_enqueue_script( 'cssua', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/cssua.js', false, '', true );

			wp_enqueue_script( 'fancybox', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/fancybox/jquery.fancybox.pack.js', false, '', true );

			wp_enqueue_script( 'global', get_bloginfo('stylesheet_directory') . '/assets/js/global.js', false, '', true );
		}
		
		add_action('wp_enqueue_scripts', 'bf_scripts');
	}
?>