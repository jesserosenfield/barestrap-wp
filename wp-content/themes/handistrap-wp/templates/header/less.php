<?php
global $framework_file_name;
global $header_file_name;

$SSD = get_bloginfo('stylesheet_directory');
$themename = $GLOBALS[ 'themename' ];
$ssd = get_stylesheet_directory();
$ssdurl = get_bloginfo('stylesheet_directory');



include realpath(dirname(__FILE__)) . '/../../lessc.inc.php';

$below_files = array( $ssd  . "/assets/css/below-fold.less" => $SSD );
$header_files = array( $ssd  . "/assets/css/header.less" => $SSD );
$framework_files = array( $ssd  . "/assets/css/framework.less" => $SSD );

$options = array(
	'cache_dir' =>  $ssd . "/assets/css/cache/",
	'compress' => true,
    'sourceMap'         => true,
    'sourceMapWriteTo'  => $ssd  . '/assets/css/map.map',
    'sourceMapURL'      => $ssd . '/assets/css/map.map',
);

$framework_file_name = Less_Cache::Get( $framework_files, $options );
$header_file_name = Less_Cache::Get( $header_files, $options );
$below_file_name = Less_Cache::Get( $below_files, $options );


// DELETE CACHE
$files = glob($ssd  . "assets/css/cache/*"); // get all file names

foreach($files as $file){ // iterate files

	if(is_file($file) && pathinfo($file, PATHINFO_EXTENSION) == 'css' && !strstr($file, $below_file_name) && !strstr($file, $header_file_name) && !strstr($file, $framework_file_name)) { 			unlink($file);
	}
  	
}
?>