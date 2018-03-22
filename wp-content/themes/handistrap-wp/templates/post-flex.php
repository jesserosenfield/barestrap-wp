<?php
	global $slidecount;
	global $acc_count;
	global $flexcontent;
	$flexcontent = '';
	
	$tabs_count = 0;
	$acc_count = 0;
	$slidecount = 0;
	
	function flex_conditions($rowlayout, $slidecount, $acc_count, $tabs_count){
		
		if( $rowlayout == 'default' ) :
			include('post-flex/default.php');
		elseif ( $rowlayout == 'two_col_auto' ) :
			include('post-flex/txt-cols.php');
		elseif ( $rowlayout == 'two_col' ) :
			include('post-flex/two-col.php');
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
		elseif ( $rowlayout == 'accordion' ) :
			$acc_count++;
			include('post-flex/accordion.php');
		elseif ( $rowlayout == 'gallery' ) :
			include('post-flex/gallery.php');
		elseif ( $rowlayout == 'video' ) :
			include('post-flex/video.php');
		elseif ( $rowlayout == 'tabs' ) :
			$tabs_count++;
			include('post-flex/tabs.php');
		endif;	
	}
	
	if( have_rows('post_fl') ) : while ( have_rows('post_fl') ) : the_row();
		$rowlayout = get_row_layout();
		
		$flexcontent .= '<div class="article-wrapper">
			<div class="post-content">';
		
?>

	<?php
		flex_conditions($rowlayout, $slidecount, $acc_count, $tabs_count);
	?>

<?php
		$flexcontent .= '</div></div>';
		
	endwhile;
	
		//$flexcontent = apply_filters('the_content', $flexcontent);
		//echo $flexcontent;
		remove_filter('the_content', 'wpautop');
		$thecontent = apply_filters('the_content', $flexcontent);
		$filter = array("/(<p>\s*<\/p>)/", "/(<p>&nbsp;<\/p>)/", "/(<p><\/p>)/"); // empty paragraph regex
		echo preg_replace($filter, '', $thecontent);
	
	else :
	
		echo '<div class="article-wrapper pb0 pt0">
			<div class="post-content">';
							
			the_content();
		
		echo '</div></div>';
	endif;
?>