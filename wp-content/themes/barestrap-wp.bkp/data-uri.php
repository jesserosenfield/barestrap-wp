<?php 
/*
Template Name: Data URI
*/
get_header();
?>


<?php
function get_data_uri($file) {

    $contents = file_get_contents(dirname(__FILE__) . '/assets/fonts/' . $file);
    
    $base64 = base64_encode($contents);
	
	
	$ext = new SplFileInfo($file);
		$ext = $ext->getExtension();
			
	if($ext == 'woff') {
		$mime = 'application/font-woff';
		$css = '<h1>' . $file . '</h1>';
		
		$style = '';
		
		if( strstr($file, 'italic') ) {
			$style .= ' font-style: italic;';
		} 

		if( strstr($file, 'light') ) {
			$style .= ' font-weight: 300;';
		} 

		if( strstr($file, 'bold') ) {
			$style .= ' font-weight: bold;';
		} 
						
		$css .= "<div style='font-size: 2px; line-height: 2px'>src: url(data:$mime;base64,$base64) format('woff');$style</div>";
	}
	
	return $css;
	  
}
	
	$dir = dirname(__FILE__) . '/assets/fonts/';

	$files = scandir($dir);
	
	foreach($files as $file) {
		echo get_data_uri($file);
		
		echo '<br/><br/><br/><br/><hr><br/><br/><br/><br/>';
	}
?>


<?php get_footer(); ?>