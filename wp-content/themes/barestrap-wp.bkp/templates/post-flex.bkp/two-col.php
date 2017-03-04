<?php
	global $flexcontent;
	
	$txt = get_sub_field('fl_txtimg_txt');
	$img = get_sub_field('fl_txtimg_img');

	$dir = get_sub_field('fl_txtimg_rtl');
		$dirclass = "";
		
		if($dir == true) {
			$dirclass = " rtl";
		}
		
	if(!empty($txt) && !empty($img)) : 
	
		$flexcontent .= '
			<div class="post-content-module post-content-module-xtra-wide">				
				<div class="container-fluid p0">
					<div class="row two-col">
						<div class="table w100' . $dirclass .'">';
						
							$attachment = get_post( $img );
								$cap = $attachment->post_excerpt;
								
							$theimg = wp_get_attachment_image_src( $img, 'post_twocol' );
								$imgfull = wp_get_attachment_image_src( $img, 'full' );
							
							$alt = get_post_meta($img , '_wp_attachment_image_alt', true);
								$alttxt = "";
								
								if(!empty($alt)) { $alttxt = ' alt="' . $alt . '" '; }
								
							$flexcontent .= '
								<div class="table-cell">
									' . $txt . '			
								</div>
		
								<div class="table-cell">
									<div class="pr">
										<figure class="wp-caption aligncenter">
											<a class="fancybox fancybox-img" href="' . $imgfull[0] . '">
												<img class="mb0" src="' . $theimg[0] . '"' . $alttxt . ' />
												<span class="fancybox post-content-img-col-fb post-content-fb-btn"></span>
												<noscript><img src="' . $theimg[0] . '"' . $alttxt .' /></noscript>
											</a>';
							
							if(!empty($cap)) {
								$flexcontent .= '<div class="tal wp-caption-text">' . $cap . '</div>';
							}
							
							$flexcontent .= '
										</figure>
									</div>
								</div>';
									
		$flexcontent .= '			
					</div>
				</div>
			</div>
		</div>';

	endif;
?>