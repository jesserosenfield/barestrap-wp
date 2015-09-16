<time class="news-date" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time>


<div class="group mt1">
<?php
	
	$post_cats = get_the_terms( $post->ID, 'category' );
																					
	foreach($post_cats as $c){
		$cat = get_category( $c );
		$link = get_category_link($cat->ID);
		echo "<a class='post-tag' href='{$link}'>{$cat->name}</a>";
	}
?>
</div>

<?php
	$img = wp_get_attachment_image_src( get_the_post_thumbnail(), 'full' );
	
	if($img) {
		$src = $img[0];
	} else {
		$src = 'http://placehold.it/600x300?t=';
	}
?>

<img class="" src="<?php echo $src; ?>" />