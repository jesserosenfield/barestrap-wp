<?php
	include_once('assets/functions/cleanup.php');
	include_once('assets/functions/header-menu.php');
	include_once('assets/functions/menu-accordion.php');
	include_once('assets/functions/front-end.php');
	include_once('assets/functions/shortcodes.php');
	include_once('assets/functions/scripts-styles.php');
	include_once('assets/functions/admin-functions.php');
	
	add_theme_support('post-thumbnails');
	add_theme_support( 'menus' );
	//include_once('assets/functions/twitter.php');
 	
	include_once('assets/functions/theme-options.php');	
	include_once('assets/functions/acf-templates/acf-banner-slideshow.php');
	include_once('assets/functions/acf-templates/acf-flex.php');
	include_once('assets/functions/acf-templates/acf-theme-options.php');
	include_once('assets/functions/acf-templates/acf-post-flex.php');
	include_once('assets/functions/acf-templates/acf-schema.php');
	//include_once('assets/functions/acf-templates/acf-jump-flex.php');

	add_image_size('header_logo', 100, 60, false);
	
	add_image_size('intch_lg', 1600, 700, true);
	add_image_size('intch_med', 1000, 438, true);
	add_image_size('intch_sm', 600, 263, true);

	add_image_size('post_slide', 750, 9999, false);
	add_image_size('post_imgcol', 400, 9999, false);
	add_image_size('post_twocol', 440, 9999, false);

	add_image_size('post_slide2x', 1500, 9999, false);
	add_image_size('post_imgcol2x', 800, 9999, false);
	add_image_size('post_twocol2x', 880, 9999, false);

	add_image_size('fav16', 16, 16, true);
	add_image_size('fav32', 32, 32, true);
	add_image_size('fav57', 57, 57, true);
	add_image_size('fav60', 60, 60, true);
	add_image_size('fav72', 72, 72, true);
	add_image_size('fav76', 76, 76, true);
	add_image_size('fav96', 96, 96, true);
	add_image_size('fav114', 114, 114, true);
	add_image_size('fav120', 120, 120, true);
	add_image_size('fav144', 144, 144, true);
	add_image_size('fav152', 152, 152, true);
	add_image_size('fav180', 180, 180, true);
	add_image_size('fav196', 196, 196, true);
?>