<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php
		if(is_single()) {
			get_template_part('content', 'blog-single');
		} else {
			get_template_part('content', 'blog-post-preview');
		}
		
	?>

<?php endwhile; endif; ?>