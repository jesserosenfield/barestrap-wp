<?php
	class Accordion_Menu extends Walker_Nav_Menu {
		
	    function start_lvl(&$output, $depth = 0, $args = array())
	    {
	    	$curitem = $this->curItem;
	    		$curid = $curitem->ID;
	        $indent = str_repeat("\t", $depth);
	        $output .= "\n$indent<div class=\"acc-menu-collapse collapse\" id=\"sub-menu-{$curid}\"><ul class=\"acc-menu-subnav\">\n";
	    }
	    function end_lvl(&$output, $depth = 0, $args = array())
	    {
	        $indent = str_repeat("\t", $depth);
	        $output .= "$indent</ul></div>\n";
	    }
		
		function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$this->curItem = $item;
			
			global $wp_query;
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			
			// depth dependent classes
			$depth_classes = array(
			    ( $depth == 0 ? 'panel' : 'acc-menu-subnav-li' )
			);
			$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
			
			// passed classes
			// $classes = empty( $item->classes ) ? array() : (array) $item->classes;
			// $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
			
			// build html
			$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

			// link attributes
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			$attributes .= ' class="' . ( $depth > 0 ? 'acc-menu-subnav-link' : '' ) . '"';

			
			if( in_array('menu-item-has-children', $item->classes) ) {
				$item_output = "<button class=\"collapsed acc-menu-nav-btn\" data-parent=\"#acc-menu-nav\" data-toggle=\"collapse\" data-target=\"#sub-menu-{$item->ID}\"><span class=\"acc-menu-nav-btn-text\">{$item->title}</span></button>";
			} else {
				$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				    $args->before,
				    $attributes,
				    $args->link_before,
				    apply_filters( 'the_title', $item->title, $item->ID ),
				    $args->link_after,
				    $args->after
				);			
			}
			
			// build html
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}         	
	}
?>