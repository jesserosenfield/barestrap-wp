<?php
	global $flexcontent;
	
	global $slidecount;
	$slides = get_sub_field('fl_slides');
	
	if(!empty($slides)) :

	$flexcontent .= '
		<div
			class="post-content-module post-content-slider post-content-module-wide flickity-yeah gallery"		
		>';

	foreach( $slides as $slide ) :
		$imgid = $slide['fl_slide_img'];
			
			$img = wp_get_attachment_image_src( $imgid, 'post_slide' );

			$lb = wp_get_attachment_image_src( $imgid, 'full' );
			
			
/*
		$lb = $slide['fl_slide_lb'];
		if(!empty($lb)) {
			$lb = wp_get_attachment_image_src( $lb, 'full' );		
		} else [
		]
*/
		
		$alt = get_post_meta($img , '_wp_attachment_image_alt', true);
			$alttxt = "";
			if(!empty($alt)) { $alttxt = ' alt="' . $alt . '" '; }
		
		$caption = $slide['fl_slide_cap'];

		$fancycap = '';
		
			if(!empty($caption)) {
				$captionatt = strip_tags( $caption );
				$fancycap = " title=\"$captionatt\"";
			}
			
		if( !empty($img) ) : 
	
			$flexcontent .= '
		
				<div class="post-content-slide">
					<img class="post-content-slide-img" src="' . $img[0] . '"' . $alttxt .' />';
					
			if( !empty($caption) ) :
				$flexcontent .= '
						<div class="wp-caption-text">' . $caption . '</div>';
			endif;

			$flexcontent .= "
				<a rel='slider-$slidecount' class='fancybox post-content-fb-btn' href='{$lb[0]}'$fancycap></a>"; 			
			
			$flexcontent .= '
				</div>';
	
	 	endif;
 	endforeach; 
 		
	$flexcontent .= '</div> <!-- module -->';

endif;
?>