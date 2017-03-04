<?php
	global $imgfield;
	global $img_sm_field;
	global $img_med_field;
	global $img_lg_field;
	global $flexcontent;
	
	$img_sm_field = '';
	$img_med_field = '';
	$img_lg_field = '';
	
	$caption = get_sub_field('fl_fb_cap');
	$imgfield = get_sub_field('fl_fb_img');
	include( realpath(dirname(__FILE__) . '/../interchange-html.php'));
	
	$flexcontent .= '
		</div>
		</div>

		<div
			class="post-content-module full-bleed"
		>
			<div
				class="bg-cover full-bleed-img" ';
				if( !empty($intch_html) ) $flexcontent .= $intch_html;
	
			$flexcontent .= '></div>';

		if( !empty($caption) ) :
			$flexcontent .= 
				'<div class="article-wrapper">
					<div class="post-content">
						<div class="tal wp-caption-text">' . $caption . '</div>
					</div>
				</div>';
		endif; 

$flexcontent .= '	
</div>';
?>