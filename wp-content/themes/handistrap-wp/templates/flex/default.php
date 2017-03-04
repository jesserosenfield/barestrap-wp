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
	<div class="container-fluid<?php echo $widthclass; ?>">
		<div class="row">
			<div class="col-xs-12 post-content tac">
					
						<?php if( $title ) { ?><h2 class="bo alpha mb3"><?php echo $title; ?></h2><?php } ?>
						
						<?php if( $text ) { ?>
							<div class="bg-block-text post-content">
								<?php echo $text; ?>
							</div>
						<?php } ?>
		
			</div>
		</div>
	</div>
</div>

<?php if(!empty($link)) { echo "</a>"; } else { echo '</div>'; } ?>
