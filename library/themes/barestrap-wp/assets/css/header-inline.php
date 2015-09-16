<?php
	$homeurl = parse_url( get_bloginfo('wpurl') );
	$ssd = get_bloginfo('stylesheet_directory');
	$less = new lessc($_SERVER['DOCUMENT_ROOT'] . $homeurl['path'] . "/library/themes/{$themename}/assets/css/header.less");
	$css = $less->parse();
	
		$css = str_replace("url(assets/", "url({$ssd}/assets/", $css);
		$css = squeezeme($css);
		
	echo $css;
?>