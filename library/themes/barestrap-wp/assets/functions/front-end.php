<?php
	if(!is_admin()) {

		function squeezeme($buffer) {	
			// Remove comments
			$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
			// Remove space after colons
			$buffer = str_replace(': ', ':', $buffer);
			// Remove whitespace
			$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
			
			return $buffer;
		}	
	
	
		function slugify($text) { 
			// replace non letter or digits by -
			$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
			
			// trim
			$text = trim($text, '-');
			
			// transliterate
			$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
			
			// lowercase
			$text = strtolower($text);
			
			// remove unwanted characters
			$text = preg_replace('~[^-\w]+~', '', $text);
			
			if (empty($text))
			{
			return 'n-a';
			}
			
			return $text;
		}

		function foundationpress_pagination() {
			global $wp_query;
		
			$big = 999999999; // This needs to be an unlikely integer
		
			// For more options and info view the docs for paginate_links()
			// http://codex.wordpress.org/Function_Reference/paginate_links
			$paginate_links = paginate_links( array(
				'base' => str_replace( $big, '%#%', html_entity_decode( get_pagenum_link( $big ) ) ),
				'current' => max( 1, get_query_var( 'paged' ) ),
				'total' => $wp_query->max_num_pages,
				'mid_size' => 5,
				'prev_next' => true,
			    'prev_text' => __( '', 'FoundationPress' ),
			    'next_text' => __( '', 'FoundationPress' ),
				'type' => 'list',
			) );
		
			$paginate_links = str_replace( "<ul class='page-numbers'>", "<ul class='pagination'>", $paginate_links );
			$paginate_links = str_replace( '<li><span class="page-numbers dots">', "<li><a href='#'>", $paginate_links );
			$paginate_links = str_replace( "<li><span class='page-numbers current'>", "<li class='current'><a href='#'>", $paginate_links );
			$paginate_links = str_replace( '</span>', '</a>', $paginate_links );
			$paginate_links = str_replace( "<li><a href='#'>&hellip;</a></li>", "<li><span class='dots'>&hellip;</span></li>", $paginate_links );
			$paginate_links = preg_replace( '/\s*page-numbers/', '', $paginate_links );
		
			// Display the pagination if more than one page is found
			if ( $paginate_links ) {
				echo '<div class="pagination-centered">';
				echo $paginate_links;
				echo '</div><!--// end .pagination -->';
			}
		}

		function is_the_blog() {
			if(is_home() || is_tag() || is_date() || is_category() || is_search() || is_author()) {
				return true;
			}
		}

		add_action('wp_head', 'body_classes');
		
		function body_classes() {
			global $post;
			
			function in_array_r($needle, $haystack, $strict = false) {
			    foreach ($haystack as $item) {
			        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
			            return true;
			        }
			    }
			
			    return false;
			}
			
			
			// Add specific CSS class by filter
			add_filter( 'body_class', 'my_class_names' );
			function my_class_names( $classes ) {
				global $post;
				$postid = $post->ID;
				$postflex = get_field('post_fl', $postid);
			
				if(!empty($postflex)) {
					$in_array = in_array_r('three_column', $postflex, $strict = true);
					
					if($in_array == true) {
						// add 'class-name' to the $classes array
						$classes[] = 'three-column';
						// return the $classes array
					} else {
						$classes[] = 'no-three-column';
					}
				}
				
				if( is_the_blog() ) {
					// add 'class-name' to the $classes array
					$classes[] = 'the-blog';
					// return the $classes array
				}
				
				return $classes;
			}
		
		}







		// POST FUNCTIONS
		
		add_action( 'wp_head', 'single_scripts' );
		
		function single_scripts() {
			if( is_single() || ( is_page() && !is_front_page() ) ) {
				
				function div_wrapper($content) {
				    // match any iframes
				    $pattern = '~<iframe.*</iframe>|<embed.*</embed>~';
				    preg_match_all($pattern, $content, $matches);
				
				    foreach ($matches[0] as $match) {
				        // wrap matched iframe with div
				        $wrappedframe = '<div class="video-wrapper">' . $match . '</div>';
				
				        //replace original iframe with new in content
				        $content = str_replace($match, $wrappedframe, $content);
				    }
				
				    return $content;    
				}
				
				add_filter('the_content', 'div_wrapper');
				
				
					// Replace SRC with data-src
				function add_lazyload($content) {
					$dom = new DOMDocument();
					@$dom->loadHTML( mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8') );
					
					
					foreach ($dom->getElementsByTagName('img') as $node) {  
						$class = $node->getAttribute('class');
						
						$oldsrc = $node->getAttribute('src');
						
						if(!empty($oldsrc) && $class !== 'post-content-slide-img') {
							$node->removeAttribute('src');
							$node->setAttribute("data-src", $oldsrc );				
						} else {
							continue;
						}
		/*
						
						$node->removeAttribute("src");
						$noscript = $dom->createElement( 'noscript' );
						
						$noscriptnode = $node->parentNode->insertBefore($noscript, $node);
		
						$newimg = $dom->createElement('IMG');
						
						$fallback_image = $noscriptnode->appendChild($newimg);
						$fallback_image->setAttribute('src', $oldsrc);		
						$fallback_image->setAttribute('alt', $alt);		
						$fallback_image->setAttribute('class', $class);	
		*/				
					}
					$newHtml = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $dom->saveHTML()));
					return $newHtml;
				}
				
				add_filter('the_content', 'add_lazyload');

				
				function filter_ptags_on_images($content){
				   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
				}
				
				add_filter('the_content', 'filter_ptags_on_images');
		
				add_filter('img_caption_shortcode', 'my_img_caption_shortcode_filter',10,3);
				function my_img_caption_shortcode_filter($val, $attr, $content = null)
				{
				    extract(shortcode_atts(array(
				        'id'    => '',
				        'align' => '',
				        'width' => '',
				        'caption' => ''
				    ), $attr));
				
				    if ( 1 > (int) $width || empty($caption) )
				        return $val;
				
				    $capid = '';
				    if ( $id ) {
				        $id = esc_attr($id);
				        $capid = 'id="figcaption_'. $id . '" ';
				        $id = 'id="' . $id . '" aria-labelledby="figcaption_' . $id . '" ';
				    }
					
					//style="max-width: ' . $width . 'px"
					
				    return '<figure ' . $id . 'class="wp-caption ' . esc_attr($align) . '" >'
				    . do_shortcode( $content ) . '<figcaption ' . $capid 
				    . 'class="wp-caption-text">' . $caption . '</figcaption></figure>';
				}
							
						
				
		
				add_action( 'the_post', function( $post ) {
				    if ( false !== strpos( $post->post_content, '<!--nextpage-->' ) ) 
				    {
				        // Reset the global $pages:
				        $GLOBALS['pages']     = [ $post->post_content ];
				
				        // Reset the global $numpages:
				        $GLOBALS['numpages']  = 0;
				
				       // Reset the global $multipage:
				        $GLOBALS['multipage'] = false;
				    }
				
				}, 99 );		
			}		
		}








		
		function disable_srcset( $sources ) {
		return false;
		}
		add_filter( 'wp_calculate_image_srcset', 'disable_srcset' );
		
	}
?>