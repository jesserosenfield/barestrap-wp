<?php
	if(is_admin()) {
		include_once('theme-setup.php');


		function my_acf_admin_head() {
			?>
			<script type="text/javascript">
			(function($){
		
				$(window).load(function(){
		            $( ".layout" ).not('.-collapsed').find('.acf-fc-layout-handle').each(function( index ) {
		              $( this ).click();
		            });		            
		        });
		
			})(jQuery);
			</script>
			<?php
		}
		
		add_action('acf/input/admin_head', 'my_acf_admin_head');
				
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


add_action( 'transition_post_status', 'a_new_post', 10, 3 );

function a_new_post( $new_status, $old_status, $post )
{
    if ( 'publish' !== $new_status or 'publish' === $old_status )
        return;

    if ( 'page' !== $post->post_type )
        return; // restrict the filter to a specific post type
	
	require realpath(dirname(__FILE__)) . '/../../vendor/autoload.php';
	
	Crew\Unsplash\HttpClient::init([
		'applicationId'	=> '42956eef4633e6e52ce96b2d9840c60eb01e74fa567263796a844e36f380d4e1',
		'secret'		=> '985dfd3d3be0783f20c3c274de990d93173c1a94c66b2b1c591c91fe32a15815',
		'callbackUrl'	=> 'urn:ietf:wg:oauth:2.0:oob',
		'utmSource' => 'handistrap'
	]);
	
	// Or apply some optional filters by passing a key value array of filters
	$filters = [
	    'query'    => 'green',       // string Limit selection to photos matching a search term..
	    'w'        => 3000,            // integer Image width in pixels.
	    'h'        => 9999,            // integer Image height in pixels.
	];
	$photo = Crew\Unsplash\Photo::random($filters);
	$links = $photo->urls;
	$photo = $links['full'];
	
	function save_image($inPath,$outPath) { //Download images from remote server
	    $in=    fopen($inPath, "rb");
	    $out=   fopen($outPath, "wb");
	    while ($chunk = fread($in,8192))
	    {
	        fwrite($out, $chunk, 8192);
	    }
	    fclose($in);
	    fclose($out);
	}
	
	$ssd = get_stylesheet_directory();
	$date = new DateTime();
	// Get the path to the upload directory.
	$wp_upload_dir = wp_upload_dir();
	
	$filename = $wp_upload_dir['path'] . '/image' . $date->getTimestamp() . '.jpg';
	save_image($photo, $filename);
	
	$filetype = wp_check_filetype( basename( $filename ), null );
	
	// Prepare an array of post data for the attachment.
	$attachment = array(
		'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
		'post_mime_type' => $filetype['type'],
		'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
		'post_content'   => '',
		'post_status'    => 'inherit'
	);
	
	// Insert the attachment.
	$attach_id = wp_insert_attachment( $attachment, $filename, $post->ID );
	
	// Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	
	// Generate the metadata for the attachment, and update the database record.
	$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
	wp_update_attachment_metadata( $attach_id, $attach_data );

	set_post_thumbnail( $post->ID, $attach_id );
}
?>