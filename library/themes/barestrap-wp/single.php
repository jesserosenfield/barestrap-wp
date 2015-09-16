<?php 
/*
Template Name: Lorem Ipsum
*/
get_header();
?>

	<div class="inner container-fluid post-content">
		<div class="row">
			<div class="col-xs-12">
				<h1><?php the_title(); ?></h1>
				
				<?php
					if ( have_posts() ) : while ( have_posts() ) : the_post();
				?>
					<?php the_content(); ?>
					
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>