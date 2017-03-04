<article class="post-preview mb3">
	<time class="news-date block mbh" datetime="<?php echo get_the_time( 'c' ); ?>">
		<a title="View more posts from <?php echo get_the_time('F Y'); ?>" href="<?php echo get_month_link(get_the_time( 'Y' ), get_the_time( 'n' )); ?>"><?php echo get_the_time(); ?></a>
	</time>
	
	<h2 class="gamma pb2"><?php the_title(); ?></h2>

		
	<div class="group mb2">
	<?php
		global $post;
		$post_cats = get_the_terms( $post->ID, 'category' );
																						
		foreach($post_cats as $c){
			$cat = get_category( $c );
			$link = get_category_link($cat->cat_ID);
			
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
	
	<img class="mb2" src="<?php echo $src; ?>" />	
	
	<div class="post-content mb2">
		<?php echo the_content(); ?>
	</div>	
</article>
