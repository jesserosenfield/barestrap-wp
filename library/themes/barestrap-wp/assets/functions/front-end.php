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
		
		    return '<figure ' . $id . 'class="wp-caption ' . esc_attr($align) . '" >'
		    . do_shortcode( $content ) . '<figcaption style="max-width: ' . $width . 'px" ' . $capid 
		    . 'class="wp-caption-text">' . $caption . '</figcaption></figure>';
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

	}
?>