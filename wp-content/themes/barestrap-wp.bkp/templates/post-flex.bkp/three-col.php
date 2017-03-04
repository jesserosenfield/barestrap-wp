<?php
	global $flexcontent;
	
	$txt1 = get_sub_field('col_1_txt');
	$txt2 = get_sub_field('col_2_txt');
	$img = get_sub_field('col_img');


	if(!empty($txt1) && !empty($txt2) && !empty($img)) : 

		$img = wp_get_attachment_image_src( $img['id'], 'large' );
			$img = $img[0];
		$alt = get_post_meta($img , '_wp_attachment_image_alt', true);
			$alttxt = "";
			
			if(!empty($alt)) { $alttxt = ' alt="' . $alt . '" '; }
				
		$flexcontent .= '
			<div class="post-content-module post-content-module-xtra-wide post-content-module-three-col">				
				<div class="container-fluid p0">
					<div class="three-col-row">
						<div class="three-col-item">
							' . $txt1 . '			
						</div>
		
						<div class="three-col-item">
							<img data-src="' . $img . '"' . $alttxt . ' />
							<noscript><img src="' . $img . '"' . $alttxt .' /></noscript>
						</div>

						<div class="three-col-item">
							' . $txt2 . '			
						</div>									
					</div>
				</div>
			</div>
		</div>';

	endif;
?>