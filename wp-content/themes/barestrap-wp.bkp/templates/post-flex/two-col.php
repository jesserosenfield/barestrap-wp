<?php
	global $flexcontent;
	
	$txt1 = get_sub_field('fl_tc_txt1');

	$txt2 = get_sub_field('fl_tc_txt2');
	
	$flexcontent .= '

<div class="post-content-module">
	<div class="row">
		<div class="col-1200-6">'. $txt1 . '</div>
		<div class="col-1200-6">'. $txt2 . '</div>
	</div>
</div>';
?>