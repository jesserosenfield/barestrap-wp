<?php
	$templatedir = get_stylesheet_directory();
	$homeurl = parse_url( get_bloginfo('wpurl') );
	$SSD = get_bloginfo('stylesheet_directory');
	$themename = $GLOBALS[ 'themename' ];

	if( !empty($homeurl['path'])) {
		$path = $_SERVER['DOCUMENT_ROOT'] . $homeurl['path'];
	} else {
		$path = $_SERVER['DOCUMENT_ROOT'];
	}
	
	$options = array( 'cache_dir' =>  $templatedir . "/assets/css/cache/", 'compress'=>true );
	$parser = new Less_Parser($options);

	$parser->parseFile( $path . "/wp-content/themes/$themename/assets/css/below-fold.less", "{$SSD}/" );
	$css = $parser->getCss();
	
	file_put_contents($templatedir . "/assets/css/footer.css", $css);
	
	echo $css;
?>