<?php
	global $flexcontent;
	
	$txt = get_sub_field('fl_tc_txt');
	$title = get_sub_field('section_title');

	if(!empty($title)) {
		$flexcontent .= '<h2 class="tac">' . $title . '</h2>';
	}
	
	$flexcontent .= '

<div class="post-content-module txt-cols">
	
	'. $txt . '
</div>';
?>