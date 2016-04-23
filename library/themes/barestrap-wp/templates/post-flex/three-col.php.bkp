<?php
	global $imgfield;
	global $text;
	global $title;
	global $bgcol;
	
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
?>

<?php 
	if(!empty($link)) {
		echo "<a class=\"block bg-block-link\" href=\"{$link}\">";
	} else {
		echo "<div class=\"bg-block\">";
	}
?>

<div
	class="content-block bg-cover<?php echo $xtrapad; ?>"
	<?php if( !empty($bgcol) ) { echo "style=\"background-color: {$bgcol}\""; } ?>
	<?php if( !empty($intch_html) ) echo $intch_html; ?>
>
	<?php include('section-text.php'); ?>

<?php
	$cols = get_sub_field('fl_columns');
		
	if($cols) : 
?>

	<div class="container-fluid post-content">
		<div class="row three-col">
		<?php
			$i = 0;
			foreach($cols as $col) :
				$title = $col['fl_title'];
				$text = $col['fl_txt'];
				$img = $col['fl_img'];
				$cta = $col['fl_btn'];
				$ctalink = $col['fl_btn_link'];
				$valign = $col['valign'];
				$halign = $col['fl_text_align'];
		?>
			<div class="col-sm-4 tac">
			<?php if(!empty($img)) { echo "<img class=\"img-responsive inline-block\" src=\"{$img['url']}\"/>";} ?>	
			
			<?php if(!empty($title)) { echo "<h3>{$title}</h3>";} ?>
			<?php if(!empty($text)) { echo "{$text}";} ?>
			</div>
																		
		<?php $i++; endforeach; ?>
		
		</div>
						
		<?php endif; ?>
	
	</div>
</div>

<?php if(!empty($link)) { echo "</a>"; } else { echo '</div>'; } ?>
