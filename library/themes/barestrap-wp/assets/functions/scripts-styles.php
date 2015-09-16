<?php
	if(!is_admin()) {
		function bf_scripts() {
			// wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
			
			// HEADER SCRIPTS
			wp_enqueue_script( 'thejquery', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/jquery.js', false, '', false );
			wp_enqueue_script( 'beam', get_bloginfo('stylesheet_directory') . '/assets/js/beam.js', false, '', false );
				
			// FOOTER SCRIPTS
			wp_enqueue_script( 'modernizr', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/modernizr.js', false, '', true );
			wp_enqueue_script( 'bootstrap', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/bootstrap.js', false, '', true );
			wp_enqueue_script( 'smartresize', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/jquery.smartresize.js', false, '', true );
			wp_enqueue_script( 'foundation', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/foundation.min.js', false, '', true );
			wp_enqueue_script( 'flickity', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/flickity.js', false, '', true );
			wp_enqueue_script( 'global', get_bloginfo('stylesheet_directory') . '/assets/js/global.js', false, '', true );
		}
		
		add_action('wp_enqueue_scripts', 'bf_scripts');
	}
?>