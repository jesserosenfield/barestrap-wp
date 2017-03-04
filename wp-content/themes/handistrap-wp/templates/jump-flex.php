<?php
	global $slidecount;
	global $flexcontent;
	global $sec_id;
	
	$flexcontent = '';
	
	$slidecount = 0;
	$flexcontent .= '<div class="collapse jump-collapse" id="' . $sec_id . '-content">';
	if( get_sub_field('post_fl') ) : while ( has_sub_field('post_fl')  ) :
		$rowlayout = get_row_layout();
						
		$flexcontent .= '<div class="post-content">';
		
?>

	<?php
		flex_conditions($rowlayout, $slidecount);
	?>

<?php
		$flexcontent .= '</div>';
		
	endwhile;
	$flexcontent .= '</div>';
	
		remove_filter('the_content', 'wpautop');
		$thecontent = apply_filters('the_content', $flexcontent);
		$filter = array("/(<p>\s*<\/p>)/", "/(<p>&nbsp;<\/p>)/", "/(<p><\/p>)/"); // empty paragraph regex
		echo preg_replace($filter, '', $thecontent);
	endif;
?>