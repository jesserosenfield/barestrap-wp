<?php 
get_header();
?>
	
	<div class="content-block">
		<div class="container-fluid">
			<div class="inner">
				<div class="row post-content">
				
					<div class="col-md-4">
					
						<div class="acc-menu">
							<h3 class="gamma mb2 semi">Header</h3>
							
							<nav>
		
								<ul class="panel-group" id="acc-menu-nav">
									<?php 
										$menu = wp_nav_menu(array(
											'menu' => 'Sub Menu',
											'container' => false,
											'container_class' => false,
											'echo' => false,
											'walker' => new Accordion_Menu()
										));
										
										echo preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );				
									?>
								</ul>
								
							</nav>
							
						</div>					

					</div>
					
					<?php
						if ( have_posts() ) : while ( have_posts() ) : the_post();
					?>
						
						<?php the_content(); ?>
						
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>