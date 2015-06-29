<!DOCTYPE HTML>
<!--[if lt IE 7]><html class="ie ie6 lte9 lte8 lte7"><![endif]-->
<!--[if IE 7]><html class="ie ie7 lte9 lte8 lte7"><![endif]-->
<!--[if IE 8]><html class="ie ie8 lte9 lte8"><![endif]-->
<!--[if IE 9]><html class="ie ie9 lte9"><![endif]-->
<!--[if !IE]><!--><html><!--<![endif]-->

<html>
	<head>
		<title><?php wp_title(' – ', true, 'right'); ?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		      
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.php" />

		<!--[if lt IE 9]>
			<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/plugins/html5shiv.js"></script>
			<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/plugins/respond.js"></script>
		<![endif]-->
				
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/plugins/jquery.js"></script>
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/plugins/modernizr.js"></script>
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/plugins/bootstrap.js"></script>
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/plugins/jquery.smartresize.js"></script>
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/beam.js"></script>
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/global.js"></script>
	</head>
	
	<body>
		<div id="content" <?php body_class(); ?>>

			<header id="header" class="group">
				<div class="row-fluid inner">
 					<button class="nav-toggle collapsed icon-menu" data-toggle="collapse" data-target="#main-nav"><span></span></button>					
				</div>
				
				<div class="row-fluid inner">
					<div class="span12">
					
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
							
			</header> <!-- header -->
			
			<div id="switcheroo" class="ajax-fade">
			