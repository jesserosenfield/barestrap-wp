<?php 
get_header();
?>
	
	<div class="content-block">
		<div class="container-fluid">
			<div class="inner">
				<div class="row">
					
					<div class="col-xs-12 post-content">
						
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