<?php
	global $imgfield;
	global $img_sm_field;
	global $img_med_field;
	global $img_lg_field;
	
	if(!empty($imgfield)) :
	
		// interchange images
		$ic_imgs = array();
		$img_id = $imgfield['id'];
		
		$img_sm = '';
		$img_med = '';
		$img_lg = '';
		
		if(!empty($img_sm_field))
			$img_sm = $img_sm_field['url'];	
		
		if(!empty($img_med_field))
			$img_med = $img_med_field['url'];		
		
		if(!empty($img_lg_field))
			$img_lg = $img_lg_field['url'];
		
		if(!empty($img_sm)) {
			$ic_imgs[] = "[{$img_sm}, small]";
		} else {
			$img_sm = wp_get_attachment_image_src( $img_id, 'hw-slide-med' );
			$ic_imgs[] = "[{$img_sm[0]}, small]";
		}
	
		if(!empty($img_med)) {
			$ic_imgs[] = "[{$img_med}, medium]";
		} else {
			$img_med = wp_get_attachment_image_src( $img_id, 'hw-slide-lg' );
			$ic_imgs[] = "[{$img_med[0]}, medium]";		
			$ic_imgs[] = "[{$img_med[0]}, retina]";		
		}
	
		if(!empty($img_lg)) {
			$img_lg = wp_get_attachment_image_src( $img_id, 'hw-slide-xl' );
			$ic_imgs[] = "[{$img_lg[0]}, large]";
		} else {
			$img_lg = wp_get_attachment_image_src( $img_id, 'hw-slide-xl' );
			$ic_imgs[] = "[{$img_lg[0]}, large]";		
		}
		
		if(!empty($ic_imgs)) {
			$intch_html = implode(', ', $ic_imgs);
			$intch_html = "data-interchange=\"{$intch_html}\"";
		}
	endif;
?>