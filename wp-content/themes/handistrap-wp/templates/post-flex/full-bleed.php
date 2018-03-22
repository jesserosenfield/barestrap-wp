<?php
	global $imgfield;
	global $img_sm_field;
	global $img_med_field;
	global $img_lg_field;
	global $flexcontent;
	
	$img_sm_field = '';
	$img_med_field = '';
	$img_lg_field = '';

	if( have_rows('group_img') ) : while ( have_rows('group_img') ) : the_row();	
		$caption = get_sub_field('fl_fb_cap');
		$imgfield = get_sub_field('fl_fb_img');
		$video = get_sub_field('video');
	endwhile; endif;

	if( have_rows('group_cta') ) : while ( have_rows('group_cta') ) : the_row();
		$title = get_sub_field('cta_title');
		$text = get_sub_field('cta_text');
		$btn = get_sub_field('cta_btn');
			$btnhtml = '';
			
			if(!empty($btn)) {
				$btn_link = $btn['url'];
				$btn_txt = $btn['title'];
				$btnhtml = "<div class='tac'><a class='btn' href='$btn_link'>$btn_txt</a></div>";
			}
		
		$cta_html = '';
		$ctaclass = '';
		
		if(!empty($title)) {
			$cta_html .= '
			
			<div class="container-fluid full-bleed--cta">
				<h2 class="mega tac">' . $title . '</h2>';
			
			if(!empty($text)) {
				$cta_html .= '<div>' . $text . '</div>';
			}
			
			$cta_html .= $btnhtml;
			
			$cta_html .= '</div>';
			
			$ctaclass = ' has-cta';
		}
			
	endwhile; endif;
	
	include( realpath(dirname(__FILE__) . '/../interchange-html.php'));

	$video_html = '';
	
	if(!empty($video)) : 
	
		$video_html = '<div class="hw-slide-wrap hw-slide-bg hw-slide-video hw-fade--out' . $ctaclass . '" data-vide-bg="' . $video['url'] . '" data-vide-options=\'className: vide-bg, loop: true, muted: true, autoplay: true\'></div>';
	
	endif;
			
	$flexcontent .= '
		</div>
		</div>

		<div
			class="post-content-module full-bleed"
		>
			<div class="pr">

			' . $cta_html . ' 
			' . $video_html . '
			
			<div
				class="bg-cover full-bleed--img' . $ctaclass . '" ';
				if( !empty($intch_html) ) $flexcontent .= $intch_html;
	
			$flexcontent .= '></div>';
		
		if( !empty($caption) && empty('group_cta') ) :
			$flexcontent .= 
				'<div class="article-wrapper">
					<div class="post-content">
						<div class="tal wp-caption-text">' . $caption . '</div>
					</div>
				</div>';
		endif; 

$flexcontent .= '	
	</div>
</div>';
?>