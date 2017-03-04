<?php
	global $flexcontent;
	
	$txt = get_sub_field('fl_tc_txt');
	$txt = apply_filters('the_content', $txt);
	$flexcontent .= '

<div class="post-content-module txt-cols">
	
	'. $txt . '
</div>';
?>