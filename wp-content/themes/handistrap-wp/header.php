<?php
global $below_file_name;
global $framework_file_name;
global $header_file_name;
$SSD = get_bloginfo('stylesheet_directory');
$themename = $GLOBALS[ 'themename' ];
$ssd = get_stylesheet_directory();
$ssdurl = get_bloginfo('stylesheet_directory');

$GLOBALS[ 'testing' ] = false;
$GLOBALS[ 'themename' ] = 'handistrap-wp';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$header_files = array( $ssd  . "/assets/css/header.less" => $ssd );
$framework_files = array( $ssd  . "/assets/css/framework.less" => $ssd );
$below_files = array( $ssd  . "/assets/css/below-fold.less" => $ssd );

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



$fav = get_field('favicon', 'option');
$fav = $fav['id'];

$fav16 = wp_get_attachment_image_src($fav, 'fav16');
$fav32 = wp_get_attachment_image_src($fav, 'fav32');
$fav96 = wp_get_attachment_image_src($fav, 'fav96');
$fav196 = wp_get_attachment_image_src($fav, 'fav196');

$fav57 = wp_get_attachment_image_src($fav, 'fav57');
$fav60 = wp_get_attachment_image_src($fav, 'fav60');
$fav72 = wp_get_attachment_image_src($fav, 'fav72');
$fav76 = wp_get_attachment_image_src($fav, 'fav76');
$fav114 = wp_get_attachment_image_src($fav, 'fav114');
$fav120 = wp_get_attachment_image_src($fav, 'fav120');
$fav144 = wp_get_attachment_image_src($fav, 'fav144');
$fav152 = wp_get_attachment_image_src($fav, 'fav152');
$fav180 = wp_get_attachment_image_src($fav, 'fav180');
$fav192 = wp_get_attachment_image_src($fav, 'fav192');
=======
include('templates/header/less.php');
include('templates/header/favicon.php');
>>>>>>> 5ec886a4030c0e55cd610834e2d6ce8b1229300f
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
		

		<style>
			<?php
				$thecss = file_get_contents($ssd . '/assets/css/cache/' . $framework_file_name);
				$thecss .= file_get_contents($ssd . '/assets/css/cache/' . $header_file_name);
				
				echo $thecss;
			?>
		</style>

		<!--[if lt IE 9]>
			<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/plugins/html5shiv.js"></script>
			<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/plugins/respond.js"></script>
		<![endif]-->

		<script>
			var siteurl = '<?php bloginfo('wpurl'); ?>';
		</script>
		
		<?php if(empty($fav)) : ?>
			<link rel="icon" href="/favicon.png" sizes="16x16" type="image/png">
		<?php else : ?>
			<link rel="icon" href="<?php echo $fav16[0]; ?>" sizes="16x16" type="image/png">
			<link rel="icon" href="<?php echo $fav32[0]; ?>" sizes="32x32" type="image/png">
			<link rel="icon" href="<?php echo $fav96[0]; ?>" sizes="96x96" type="image/png">
			<link rel="icon" href="<?php echo $fav196[0]; ?>" sizes="196x196" type="image/png">

			<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $fav57[0]; ?>">
			<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $fav60[0]; ?>">
			<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $fav72[0]; ?>">
			<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $fav76[0]; ?>">
			<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $fav114[0]; ?>">
			<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $fav120[0]; ?>">
			<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $fav144[0]; ?>">
			<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $fav152[0]; ?>">
			<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $fav180[0]; ?>">
			<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $fav16[0]; ?>">
			<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $fav96[0]; ?>">
			<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $fav16[0]; ?>">
			<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $fav32[0]; ?>">
		<?php endif; ?>
		
		<?php
			wp_enqueue_script('jquery');
			wp_head();
		?>
	</head>
	
	<body<?php if(get_field('sticky_header', 'option') == true) { echo ' class="header-fixed"'; } ?>>
		<div id="content" <?php body_class(); ?>>

			<header id="header" class="group mob-menu-abs">
				<div class="container-fluid inner">
					<div class="row">
						<div class="col-xs-12">

							<div class="table logo-wrap">
								<div class="table-cell">
										<?php
											$logo = get_field('logo_img', 'option');
											$logoalt = get_field('logo_img_alt', 'option');
											
											$src = get_bloginfo('stylesheet_directory') . '/assets/images/logo.png';
											
											if( !empty($logo) ) {
												$src = wp_get_attachment_image_src($logo['id'], 'header_logo');
													$src = $src[0];
												
												echo '<a class="logo"'; if(!is_front_page()) { echo ' href="' . get_bloginfo('wpurl') . '"'; } echo '>
													<img src="' . $src . '" />
												</a>';
											}
										?>
										
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
			