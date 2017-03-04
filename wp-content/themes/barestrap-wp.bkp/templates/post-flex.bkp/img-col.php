<?php
	global $flexcontent;
	
	$slides = get_sub_field('fl_imgcol');
	
	if(!empty($slides)) :
	$flexcontent .= '
		<div class="post-content-module post-content-module-wide">
		
			<div class="post-content-img-two-col group">';
		
	foreach( $slides as $slide ) :

		$img = $slide['fl_imgcol_img'];
			$img = wp_get_attachment_image_src( $img, 'post_imgcol' );
			
		$lb = $slide['fl_imgcol_lb'];
			$lb = wp_get_attachment_image_src( $lb, 'full' );
	
		$alt = get_post_meta($img , '_wp_attachment_image_alt', true);
			$alttxt = "";
			if(!empty($alt)) { $alttxt = ' alt="' . $alt . '" '; }
		
		$caption = $slide['fl_imgcol_cap'];
		
		$fancycap = '';
		
			if(!empty($caption)) {
				$fancycap = " title=\"$caption\"";
			}
		
		if( !empty($img) ) : 
			$img = $img[0];
			$flexcontent .= '
		
				<div class="post-content-img-col tac">
					<div class="pr inline-block w100">
						<img class="img-responsive" src="' . $img . '"'. $alttxt . ' />
						<noscript><img class="img-responsive" src="' . $img . '"' . $alttxt . ' /></noscript>';
					
						if( !empty($caption) ) :
							$flexcontent .= '<div class="tal wp-caption-text">' . $caption . '</div>';
					 	endif;
		
						if(!empty($lb)) {
							$flexcontent .= "<a class='fancybox post-content-img-col-fb post-content-fb-btn' href='{$lb[0]}'$fancycap></a>";
							}
			$flexcontent .= '
					</div>
				</div>';

		endif; 
	endforeach; 
	
	$flexcontent .= '
		</div>
	</div>';

endif;
?>