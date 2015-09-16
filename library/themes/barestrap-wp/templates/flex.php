<?php
	function acc_conditions($rowlayout){
		if( $rowlayout == 'ipsum' ) :
			include('templates/ipsum.php');
		elseif ( $rowlayout == 'lorem' ) :
			include('templates/lorem.php');		
		endif;	
	}
	
	if( have_rows('lorem_flex') ) : while ( have_rows('lorem_flex') ) : the_row();
		$rowlayout = get_row_layout();
		
		$title = get_sub_field('fl_title');
		$text = get_sub_field('fl_text');
		$bgcol = get_sub_field('fl_bg_col');
		$btn = get_sub_field('fl_btn');
		$btnlink = get_sub_field('fl_btn_link');

?>

	<?php
		acc_conditions($rowlayout);
	?>

<?php
	endwhile; endif;
?>