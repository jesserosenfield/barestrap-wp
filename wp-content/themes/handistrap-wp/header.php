<?php
global $css_file_name;
global $css_file_name_all;
$SSD = get_bloginfo('stylesheet_directory');
$GLOBALS[ 'themename' ] = 'handistrap-wp';
$themename = $GLOBALS[ 'themename' ];
$ssd = get_stylesheet_directory();
$ssdurl = get_bloginfo('stylesheet_directory');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include 'lessc.inc.php';

global $css_file_name;
global $css_file_name_all;

$header_files = array( $ssd  . "/assets/css/header.less" => $ssd );
$framework_files = array( $ssd  . "/assets/css/framework.less" => $ssd );

$options = array(
	'cache_dir' =>  $ssd . "/assets/css/cache/",
	'compress' => true,
    'sourceMap'         => true,
    'sourceMapWriteTo'  => $ssd  . '/assets/css/map.map',
    'sourceMapURL'      => $ssd . '/assets/css/map.map',
);

$framework_file_name = Less_Cache::Get( $framework_files, $options );
$header_file_name = Less_Cache::Get( $header_files, $options );

/*
try {
	lessc::ccompile("library/themes/{$themename}/assets/css/style-me.less", "library/themes/{$themename}/{$themename}.css");
	lessc::ccompile("library/themes/{$themename}/assets/css/style-me-all.less", "library/themes/{$themename}/{$themename}-all.css");
} catch (exception $ex) {
	exit('lessc fatal error:<br />'.$ex->getMessage());
}
*/

//$GLOBALS[ 'critical_css' ] = get_field('critical_css', 'option');

$GLOBALS[ 'testing' ] = true; 
?>

<!DOCTYPE HTML>
<!--[if lt IE 7]><html class="ie ie6 lte9 lte8 lte7"><![endif]-->
<!--[if IE 7]><html class="ie ie7 lte9 lte8 lte7"><![endif]-->
<!--[if IE 8]><html class="ie ie8 lte9 lte8"><![endif]-->
<!--[if IE 9]><html class="ie ie9 lte9"><![endif]-->
<!--[if !IE]><!--><html><!--<![endif]-->

	<head>
		<title><?php wp_title(' – ', true, 'right'); ?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1">
 		
<!--
 		<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/plugins/loadCSS.js"></script>

		<script id="loadcss">
		  loadCSS( "<?php bloginfo('stylesheet_directory'); ?>/assets/css/font-face.css" );
		</script>
-->
		<link href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/font-face.css" rel="stylesheet">
		
		<?php if($GLOBALS[ 'testing' ] == false) { ?>
			<style><?php include($ssd . 'assets/css/framework-inline.php'); include($ssd . 'assets/css/header-inline.php'); ?></style>
		<?php } elseif($GLOBALS[ 'testing' ] == true) { ?>
			<link rel="stylesheet" href="<?php echo $ssdurl; ?>/assets/css/cache/<?php echo $framework_file_name; ?>" />
			<link rel="stylesheet" href="<?php echo $ssdurl; ?>/assets/css/cache/<?php echo $header_file_name; ?>" />
		<?php } ?>

		<!--[if lt IE 9]>
			<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/plugins/html5shiv.js"></script>
			<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/plugins/respond.js"></script>
		<![endif]-->

		<script>
			var siteurl = '<?php bloginfo('wpurl'); ?>';
		</script>
		
		<link rel="icon" type="image/png" href="<?php bloginfo('wpurl'); ?>/favicon.png" />

		<?php
			wp_enqueue_script('jquery');
			wp_head();
		?>
	</head>
	
	<body>
		<div id="content" <?php body_class(); ?>>

			<header id="header" class="group mob-menu-abs">
				<div class="container-fluid inner">
					<div class="row">
						<div class="col-xs-12">

							<div class="table logo-wrap">
								<div class="table-cell">
									<a class="logo"<?php if(!is_front_page()) { echo ' href="' . get_bloginfo('wpurl') . '"'; } ?>>
										<?php
											$logo = get_field('logo_img', 'option');
											$logoalt = get_field('logo_img_alt', 'option');
											
											$src = get_bloginfo('stylesheet_directory') . '/assets/images/logo.png';
											
											if( !empty($logo) ) {
												$src = wp_get_attachment_image_src($logo['id'], 'full');
													$src = $src[0];
											}
										?>
										
										<img src="<?php echo $src; ?>" />
									</a>
								</div>
							</div>
							
							<div class="table nav-toggle-wrap">
								<div class="table-cell">
									<button class="nav-toggle collapsed icon-menu" data-toggle="collapse" data-target="#main-nav"><span></span></button>							
								</div>
							</div>
						
							<nav id="main-nav" class="resp-header-menu nav-collapse collapse pr">
								<ul class="resp-header-menu-ul group">
									<?php 
										$menu = wp_nav_menu(array(
											'menu' => 'Header Menu',
											'container' => false,
											'container_class' => false,
											'echo' => false,
											'walker' => new Child_Wrap()
										));
										
										echo preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );				
									?>
								</ul>
							</nav>
						
						</div>						

					</div>
				</div>
							
			</header> <!-- header -->
			
			<div id="switcheroo" class="ajax-fade">
			