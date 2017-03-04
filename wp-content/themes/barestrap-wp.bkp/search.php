<?php 
get_header();
global $paged;
$blogid = get_option( 'page_for_posts' );

global $query_string;
global $wp_query;

$search_query = get_search_query();
?>

	<?php get_template_part('content', 'blog'); ?>

<?php get_footer(); ?>
