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
	}
?>