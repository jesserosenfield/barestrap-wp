<?php 
get_header();
?>
	
	<div class="content-block">
		<div class="container-fluid">
			<div class="inner">
				<div class="row">
				
					<div class="col-992-4">
					
						<div class="acc-menu">
							<h3 class="gamma mb2 semi">Header</h3>
							
							<?php get_template_part('content', 'accordion-menu'); ?>
							
						</div>					

					</div>
					
					<div class="col-992-8 post-content">
						
						<?php
							if ( have_posts() ) : while ( have_posts() ) : the_post();
						?>
							
							<?php the_content(); ?>
							
						<?php endwhile; endif; ?>
					
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>