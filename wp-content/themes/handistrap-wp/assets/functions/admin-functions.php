<?php
	if(is_admin()) {
		
		function cc_mime_types($mimes) {
		  $mimes['svg'] = 'image/svg+xml';
		  return $mimes;
		}
		add_filter('upload_mimes', 'cc_mime_types');
		
		function common_svg_media_thumbnails($response, $attachment, $meta){
		    if($response['type'] === 'image' && $response['subtype'] === 'svg+xml' && class_exists('SimpleXMLElement'))
		    {
		        try {
		            $path = get_attached_file($attachment->ID);
		            if(@file_exists($path))
		            {
		                $svg = new SimpleXMLElement(@file_get_contents($path));
		                $src = $response['url'];
		                $width = (int) $svg['width'];
		                $height = (int) $svg['height'];
		
		                //media gallery
		                $response['image'] = compact( 'src', 'width', 'height' );
		                $response['thumb'] = compact( 'src', 'width', 'height' );
		
		                //media single
		                $response['sizes']['full'] = array(
		                    'height'        => $height,
		                    'width'         => $width,
		                    'url'           => $src,
		                    'orientation'   => $height > $width ? 'portrait' : 'landscape',
		                );
		            }
		        }
		        catch(Exception $e){}
		    }
		
		    return $response;
		}
		add_filter('wp_prepare_attachment_for_js', 'common_svg_media_thumbnails', 10, 3);
		
		
		
		
		
		
		function add_twitter_contactmethod( $contactmethods ) {
			// Add Twitter
			$contactmethods['twitter'] = 'Twitter';
			
			// Remove Yahoo IM
			unset($contactmethods['yim']);
			
			return $contactmethods;
		}
		add_filter('user_contactmethods','add_twitter_contactmethod',10,1);
		
		
		
		
		
			
		function bf_save_post( $post_id ){
			if( get_post_type() == 'post' ) :
				if ( ! wp_is_post_revision( $post_id ) ){
					
					$flex = get_field('post_fl', $post_id);
					$jumpflex = get_field('jump_section', $post_id);

					global $flexcontent;
					$flexcontent = '';
						
					if(!empty($jumpflex)) {
						include( get_stylesheet_directory() . '/templates/jump-flex-save.php' );				
					} else{
						if(!empty($flex)) {
							include( get_stylesheet_directory() . '/templates/post-flex-save.php' );
						}					
					}
					
					// unhook this function so it doesn't loop infinitely
					remove_action('post_updated', 'bf_save_post', 99);
					remove_action('save_post_review', 'bf_save_post', 99);
					
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
					add_action('post_updated', 'bf_save_post', 99);
					add_action('save_post_review', 'bf_save_post', 99);
				}

			endif;
		}
		add_action('post_updated', 'bf_save_post', 99);
		add_action('save_post_review', 'bf_save_post', 99);	
		
	}
?>