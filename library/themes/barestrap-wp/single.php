<?php 
get_header();
global $paged;
$blogid = get_option( 'page_for_posts' );
?>
	
	<?php include('templates/post-flex.php'); ?>

<?php get_footer(); ?>
