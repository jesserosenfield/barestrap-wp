<?php
	if(is_admin()) {
	
	
	
	

		function add_twitter_contactmethod( $contactmethods ) {
			// Add Twitter
			$contactmethods['twitter'] = 'Twitter';
			
			// Remove Yahoo IM
			unset($contactmethods['yim']);
			
			return $contactmethods;
		}
		add_filter('user_contactmethods','add_twitter_contactmethod',10,1);
		
		
		
		
		
			
		function ww_save_post( $post_id ){
			if( get_post_type() == 'review' || get_post_type() == 'post' ) :
				if ( ! wp_is_post_revision( $post_id ) ){
					
					$flex = get_field('post_fl', $post_id);
					
					if(!empty($flex)) {
						global $flexcontent;
						$flexcontent = '';
						include( get_stylesheet_directory() . '/templates/post-flex-save.php' );
					}
					
					// unhook this function so it doesn't loop infinitely
					remove_action('post_updated', 'ww_save_post', 99);
					remove_action('save_post_review', 'ww_save_post', 99);
					
					// Set post content to the ACF flex field
					if(!empty($flexcontent)) {
						$args = array(
							'ID'           => $post_id,
							'post_content' => $flexcontent			
						);
			
						// update the post, which calls save_post again
						wp_update_post( $args );
					}

					// re-hook this function
					add_action('post_updated', 'ww_save_post', 99);
					add_action('save_post_review', 'ww_save_post', 99);
				}

			endif;
		}
		add_action('post_updated', 'ww_save_post', 99);
		add_action('save_post_review', 'ww_save_post', 99);	
		
		
		
		
		
	}
?>