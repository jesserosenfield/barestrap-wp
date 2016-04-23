<?php
	function barestrap_setup() {
// SET PERMALINKS
		function bs_set_permalinks() {
		    global $wp_rewrite;
		    $wp_rewrite->set_permalink_structure( '/%year%/%monthnum%/%postname%/' );
		}
		
		// add_action( 'init', bs_set_permalinks() );
		
		
// CREATE LANDING PAGE, USE LANDING TEMPLATE
		update_option( 'show_on_front', 'page' );
		update_option('default_ping_status', 0);
		update_option('default_comment_status', 0);
		update_option('comments_notify', 0);
		
// REMOVE META BOXES FROM DEFAULT POSTS SCREEN
		function remove_default_post_screen_metaboxes() {
			remove_meta_box( 'postcustom','post','normal' ); // Custom Fields Metabox
			remove_meta_box( 'commentstatusdiv','post','normal' ); // Comments Metabox
			remove_meta_box( 'trackbacksdiv','post','normal' ); // Talkback Metabox
			remove_meta_box( 'slugdiv','post','normal' ); // Slug Metabox
			remove_meta_box( 'authordiv','post','normal' ); // Author Metabox
		}
		add_action('admin_menu','remove_default_post_screen_metaboxes');
		
		
// REMOVE META BOXES FROM DEFAULT PAGES SCREEN
		function remove_default_page_screen_metaboxes() {
			remove_meta_box( 'postcustom','page','normal' ); // Custom Fields Metabox
			remove_meta_box( 'commentstatusdiv','page','normal' ); // Comments Metabox
			remove_meta_box( 'trackbacksdiv','page','normal' ); // Talkback Metabox
			remove_meta_box( 'slugdiv','page','normal' ); // Slug Metabox
			remove_meta_box( 'authordiv','page','normal' ); // Author Metabox
		}
		
		add_action('admin_menu','remove_default_page_screen_metaboxes');
	}
	
	add_action( 'after_setup_theme', 'barestrap_setup' );

function tfc_remove_page_templates( $templates ) {
    unset( $templates['page-templates/contributors.php'] );
    return $templates;
}
add_filter( 'theme_page_templates', 'tfc_remove_page_templates' );
?>