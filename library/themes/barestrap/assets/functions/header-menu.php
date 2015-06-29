<?php
	class Child_Wrap extends Walker_Nav_Menu {
		
	    function start_lvl(&$output, $depth = 0, $args = array())
	    {
	    	$curitem = $this->curItem;
	    		$curid = $curitem->ID;
	        $indent = str_repeat("\t", $depth);
	        $output .= "\n$indent<div class=\"sub-menu-wrap collapse\" id=\"sub-menu-{$curid}\"><div class=\"sub-menu-inner\"><ul class=\"sub-menu\">\n";
	    }
	    function end_lvl(&$output, $depth = 0, $args = array())
	    {
	        $indent = str_repeat("\t", $depth);
	        $output .= "$indent</ul></div></div>\n";
	    }
		
		function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$this->curItem = $item;
			
			global $wp_query;
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			
			// depth dependent classes
			$depth_classes = array(
			    ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
			    ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
			    ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
			    'menu-item-depth-' . $depth
			);
			$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
			
			// passed classes
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
			
			// build html
			$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
			
			if( in_array('menu-item-has-children', $item->classes) ) {
				$output .= "<button class=\"collapsed resp-header-menu-sub-toggle\" data-toggle=\"collapse\" data-target=\"#sub-menu-{$item->ID}\">{$item->title}</button>";
			}
			// link attributes
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
			
			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
			    $args->before,
			    $attributes,
			    $args->link_before,
			    apply_filters( 'the_title', $item->title, $item->ID ),
			    $args->link_after,
			    $args->after
			);
			
			// build html
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}         	
		
	}

	function add_classes_wpse_130358($classes, $item, $args) {
		$classes[] = 'resp-header-menu-li';
		return $classes;
	}
	
	add_filter('nav_menu_css_class','add_classes_wpse_130358',1,3);
?>