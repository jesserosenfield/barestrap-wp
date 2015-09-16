<?php 
get_header();
?>

	<?php single_cat_title( 'Category: ', true ); ?>

	<?php get_template_part('content', 'loop'); ?>

<?php get_footer(); ?>