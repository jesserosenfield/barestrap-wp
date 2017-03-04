<?php
	global $postid;
	global $flexcontent;
	
	$specflag = false;
	
	$specs = array(
		'case' => null,
		'movement' => null,
		'dial' => null,
		'lume' => null,
		'lens' => null,
		'strap' => null,
		'water' => null,
		'dimensions' => null,
		'thickness' => null,
		'lug_width' => null,
		'crown' => null,
		'warranty' => null,
		'price' => null
	);
	
	foreach($specs as $key => $value) {
		$field = get_field_object($key, $postid);
		
		if(!empty($field)) {
			$specs[$key] = $field;
			
			if($specflag == false) {
				$specflag = true;
			}
		}
	}
	
	if($specflag == true) :
	
	$flexcontent .= '
	<div class="article-wrapper pb0 pt0 watch-specs">
	    <div class="post-content">
	        <div class="post-content-module post-content-module-xtra-wide">
	        	<div class="bg-hash group">
	        		<div class="watch-specs-img">';

	$imgid = get_field('reviews_image', $postid);
	$img = wp_get_attachment_image_src($imgid, 'brand_thumb');
	
	if(empty($img[0])) {
		$imgid = get_post_thumbnail_id($postid);
		$img = wp_get_attachment_image_src($imgid, 'brand_thumb');
	}
	
	$price = get_field('price');
	
	$title = get_the_title();
	
				$flexcontent .= '
						<div class="item">
							<div class="review-item bg-item-wrap">';
				
				$flexcontent .= "
								<div class=\"review-item-inner bg-item shadow\" data-bg=\"{$img[0]}\">
									<div class=\"bg-item-label c-white smaller bo\">
										\${$price}
									</div>
								</div>
							</div>
						</div>
					
					</div>
					
					<div class=\"watch-specs-text\">";
					
	        			$title = get_the_title();
	        				$title = str_replace('review', '', $title);
	        			
	        			$flexcontent .= "<h3>$title</h3>";
	        			
	        			$flexcontent .= '<div class="specs-wrap">';
	        			
	        			$numbers = array(
	        				'dimensions',
	        				'thickness',
	        				'lug_width',
	        			);
	        			
	        			foreach($specs as $key => $spec) {
	        				$flexcontent .= '<div class="spec-item"><div class="small-caps demi c-gold2">' . $spec['label'] . '</div>';
	        				
	        				if($key == 'price') {
	        					$flexcontent .= '$';
	        				}
	        				
	        				$flexcontent .= $spec['value'];
	        				
	        				if(in_array($key, $numbers)) {
	        					$flexcontent .= 'mm';
	        				}
	        				
	        				$flexcontent .= '</div>';
	        			}
	        			
	        			$flexcontent .= '</div>';
	
		$flexcontent .= "
	        		</div>
	        	</div>
	        </div>
	    </div>
	</div>";
	
endif;
?>