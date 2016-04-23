<?php
	global $imgfield;
	global $text;
	global $title;
	global $bgcol;
	global $flexcontent;
	
	$imgfield = get_sub_field('bg_image');

	$contentwidth = get_sub_field('content_width');	
		$widthclass = '';
		
		if($contentwidth == 'md') {
			$widthclass = ' width-md';
		}
		
		if($contentwidth == 'sm') {
			$widthclass = ' width-sm';
		}
		
		if($contentwidth == 'lg') {
			$widthclass = ' width-lg';
		}
		
	include( realpath(dirname(__FILE__) . '/../interchange-html.php'));
	
	$link = get_sub_field('section_link');
	
	$xtrapad = '';
	
	if( get_sub_field('extra_padding') ) {
		$xtrapad = ' extra-padding';
	}

	if(!empty($link)) {
		$flexcontent .= "<a class=\"block bg-block-link\" href=\"{$link}\">";
	} else {
		$flexcontent .= "<div class=\"bg-block\">";
	}

	$flexcontent .= '
	<div
		class="content-block bg-cover<?php echo $xtrapad; ?>"
		<?php if( !empty($bgcol) ) { echo "style=\"background-color: {$bgcol}\""; } ?>
		<?php if( !empty($intch_html) ) echo $intch_html; ?>
	>
		' . include('section-text.php');

	$cols = get_sub_field('fl_columns');
		
	if($cols) : 

	$flexcontent .= '
		<div class="container-fluid post-content">
			<div class="row four-col">';
			
			$i = 0;
			foreach($cols as $col) :
			
				$title = $col['fl_title'];
				$text = $col['fl_txt'];
				$img = $col['fl_img'];
				$cta = $col['fl_btn'];
				$ctalink = $col['fl_btn_link'];
				$valign = $col['valign'];
				$halign = $col['fl_text_align'];
				
				$flexcontent .= '
					<div class="col-sm-6 col-md-3 tac">';
					
				if(!empty($img)) {
					$flexcontent .= "<img class=\"img-responsive inline-block\" src=\"{$img['url']}\"/>";
				}	

				if(!empty($title)) {
					$flexcontent .= "<h3>{$title}</h3>";
				}
				
				if(!empty($text)) {
					$flexcontent .= "{$text}";
				}
				$flexcontent .= '</div>';
																		
			$i++; endforeach; 


		
			$flexcontent .= '</div>';

	endif;
	
	$flexcontent .= '</div></div>';

if(!empty($link)) {
	echo "</a>"; 
} else {
	echo '</div>';
}
?>
