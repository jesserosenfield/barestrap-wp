<?php 
ob_start();
header('Content-type: text/css');
include "lessc.inc.php";
	
$parser->parseFile( $_SERVER['DOCUMENT_ROOT'] . $homeurl['path'] . "/wp-content/themes/{$themename}/assets/css/style-me.less", "url({$ssd}/assets/" );
$css = $parser->getCss();
	$css = squeezeme($css);
	
	echo $css;
?>