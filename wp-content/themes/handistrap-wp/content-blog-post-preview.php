<article class="post-preview mb3">
	<?php
		$img = wp_get_attachment_image_src( get_the_post_thumbnail(), 'full' );
		
		if($img) {
			$src = $img[0];
		} else {
			$src = 'http://placehold.it/600x300?t=';
		}
	?>
	
	<a href="<?php the_permalink(); ?>"><img class="" src="<?php echo $src; ?>" /></a>
	
	<h2 class="gamma pt2 pb2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	
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

	<time class="news-date block mbh" datetime="<?php echo get_the_time( 'c' ); ?>">
		<a title="View more posts from <?php echo get_the_time('F Y'); ?>" href="<?php echo get_month_link(get_the_time( 'Y' ), get_the_time( 'n' )); ?>"><?php echo get_the_time(); ?></a>
	</time>
	
	<?php
		$uid = get_the_author_meta('ID');
		echo get_avatar( $uid, 60 );
	?>
	
	<div>Author <?php the_author_posts_link(); ?></div>
	
	<div class="post-preview-desc mb2">
		<?php echo substr(get_the_excerpt(), 0,30); ?>
	</div>
	
	<a class="btn" href="<?php the_permalink(); ?>">Read More</a>

	<div class="mt2 somed-btns">
		<div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button_count"></div>

		<a href="<?php the_permalink(); ?>" class="twitter-share-button">Tweet</a>
		
		<div class="gplus">
			<div class="g-plusone" data-href="<?php the_permalink(); ?>"></div>
		</div>
		
		<a data-pin-do="buttonBookmark" class="pinterest-btn" href="<?php the_permalink(); ?>"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a>

	</div>

	<div class="somed-share valign-m delta mb3">
		<span class="gotham bo smaller valign-m inline-block">Share this: </span>
		
		<a
			class="icon-facebook valign-m inline-block"
			href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>&t=<?php urlencode(get_the_title()); ?>"
			onclick="var w = window.open(this.href, 'newwin', 'width=480, height=480'); w.focus(); return false;"
		></a>
		
		<a	
			class="icon-twitter valign-m inline-block"
			href="http://twitter.com/share?text=<?php echo urlencode(get_the_title()); ?>&url=<?php echo urlencode(get_permalink()); ?>"
			onclick="var w = window.open(this.href, 'newwin', 'width=480, height=480'); w.focus(); return false;"
		>
		
		</a>
	</div>
</article>
