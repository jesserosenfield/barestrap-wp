<?php
	global $slidecount;
	global $flexcontent;
	$flexcontent = '';
	
	$slidecount = 0;
	
	function flex_conditions($rowlayout, $slidecount){
		if( $rowlayout == 'default' ) :
			include('post-flex/default.php');
		elseif ( $rowlayout == 'two_col' ) :
			include('post-flex/txt-cols.php');
		elseif ( $rowlayout == 'three_column' ) :
			include('post-flex/three-col.php');
		elseif ( $rowlayout == 'slider' ) :
			$slidecount++;
			include('post-flex/slider.php');		
		elseif ( $rowlayout == 'imgcol' ) :
			include('post-flex/img-col.php');
		elseif ( $rowlayout == 'txtimg' ) :
			include('post-flex/two-col.php');
		elseif ( $rowlayout == 'full_bleed' ) :
			include('post-flex/full-bleed.php');
		elseif ( $rowlayout == 'gallery' ) :
			include('post-flex/gallery.php');
		endif;	
	}
	
	if( have_rows('post_fl') ) : while ( have_rows('post_fl') ) : the_row();
		$rowlayout = get_row_layout();
		
		$flexcontent .= '<div class="article-wrapper pb0 pt0">
			<div class="post-content">';
		
?>

	<?php
		flex_conditions($rowlayout, $slidecount);
	?>

<?php
		$flexcontent .= '</div></div>';
		
	endwhile;
	
		//$flexcontent = apply_filters('the_content', $flexcontent);
		//echo $flexcontent;
		remove_filter('the_content', 'wpautop');
		$thecontent = apply_filters('the_content', $flexcontent);
		echo preg_replace("/<p[^>]*><\\/p[^>]*>/",'', $thecontent);
	
	else :
	
		echo '<div class="article-wrapper pb0 pt0">
			<div class="post-content">';
							
			the_content();
		
		echo '</div></div>';
	endif;
?>