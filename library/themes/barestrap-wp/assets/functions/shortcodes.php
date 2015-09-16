<?php
	// Button
	function btn_func( $atts ) {
	    $a = shortcode_atts( array(
	        'title' => '',
	        'link' => '',
	        'center' => false
	    ), $atts );
	
		$output = '';
		$href = '';
		$center = '';
		
		if( $a['center'] ) {
			$center = " tac";
		}
		
		if( !empty( $a['link'] ) ) {
			$href = " href='{$a['link']}'";
		}
		
		$output .= "<p class='btn-wrap {$center}'>";
		
		$output .= "<a{$href} class='btn'>{$a['title']}</a>";

		$output .= "</p>";
		
		return $output;
	}
	add_shortcode( 'button', 'btn_func' );

	// Author
	function auth_func( $atts ) {
	    $a = shortcode_atts( array(
	        'text' => '',
	        'author' => '',
	        'link' => ''
	    ), $atts );
	
		$output = '';
		$link = '';
		$link_close = '';
		
		$center = '';
		
		if( $a['center'] ) {
			$center = " tac";
		}
		
		if( !empty( $a['link'] ) ) {
			$link = "<a href='{$a['link']}'>";
			$link_close = '</a>';
		}
		
		$output .= "<footer>";
		$output .= $a['text'] . ' ';
		$output .= "<cite title='{$a['author']}'>{$link}{$a['author']}{$link_close}<cite>";

		$output .= "</footer>";
		
		return $output;
	}
	add_shortcode( 'author', 'auth_func' );
?>