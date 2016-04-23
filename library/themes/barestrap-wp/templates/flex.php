<?php
	function flex_conditions($rowlayout){
		if( $rowlayout == 'default' ) :
			include('flex/default.php');
		elseif ( $rowlayout == 'two_col' ) :
			include('flex/two-col.php');		
		elseif ( $rowlayout == 'four_col' ) :
			include('flex/four-col.php');
		elseif ( $rowlayout == 'three_col' ) :
			include('flex/three-col.php');
		endif;	
	}
	
	if( have_rows('flex_layout') ) : while ( have_rows('flex_layout') ) : the_row();
		$rowlayout = get_row_layout();
		
		$title = get_sub_field('fl_title');
		$text = get_sub_field('fl_txt');
		$bgcol = get_sub_field('fl_bg_col');
		$btn = get_sub_field('fl_btn');
		$btnlink = get_sub_field('fl_btn_link');

		$cssclass = get_sub_field('css_class');
		
		if( empty($cssclass) ) {
			$cssclass = '';
		} else {
			echo "<div class=\"" . $cssclass . "\">";
		}

?>
	<?php
		flex_conditions($rowlayout);
		if(!empty($cssclass)) {echo '</div>';}
	?>

<?php
	endwhile; endif;
?>