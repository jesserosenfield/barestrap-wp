<?php 
get_header();
global $paged;
$blogid = get_option( 'page_for_posts' );
?>

	<?php get_template_part('content', 'blog'); ?>

<?php get_footer(); ?>
