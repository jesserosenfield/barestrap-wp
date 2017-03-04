<?php
	$teams = get_sub_field('tm_rpt');
	
	foreach($teams as $team) :
	
		$name = get_sub_field('tm_name');
		$title = get_sub_field('tm_title');
		$img = get_sub_field('tm_img');
		$bio = get_sub_field('tm_bioprev');
		$biofull = get_sub_field('tm_biofull');
		$linked = get_sub_field('tm_li');
		$tw = get_sub_field('tm_tw');
?>
	

<?php endforeach; ?>