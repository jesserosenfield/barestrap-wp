<?php
	$assets = get_bloginfo('stylesheet_directory') . "/assets/images/";
	
	$slides = get_field('bf_slides');
?>

<div
	class="hw-slideshow vh100 pr"
	data-cycle-slides=".hw-slide"
>

<?php
	foreach($slides as $slide) :

		global $slide;
		global $img_sm_field;
		global $img_med_field;
		global $img_lg_field;
		global $imgfield;
		
		$img_sm_field = $slide['slide_imgmob'];
		$img_med_field = $slide['slide_imgtab'];
		$img_lg_field = $slide['slide_img'];
		
		$imgfield = $img_lg_field;
		
/*
		// interchange images
		$ic_imgs = array();
		$img_id = $slide['slide_img']['id'];
		
		
		$img_sm = '';
		$img_med = '';
		$img_lg = '';
		
		if($slide['slide_imgmob'])
			$img_sm = $slide['slide_imgmob']['url'];	
		
		if($slide['slide_imgtab'])
			$img_med = $slide['slide_imgtab']['url'];		
		
		if($slide['slide_img'])
			$img_lg = $slide['slide_img']['url'];
		
		if(!empty($img_sm)) {
			$ic_imgs[] = "[{$img_sm}, (default)]";
		} else {
			$img_sm = wp_get_attachment_image_src( $img_id, 'intch_sm' );
			$ic_imgs[] = "[{$img_sm[0]}, (default)]";
		}

		if(!empty($img_med)) {
			$ic_imgs[] = "[{$img_med}, (medium)]";
		} else {
			$img_med = wp_get_attachment_image_src( $img_id, 'intch_med' );
			$ic_imgs[] = "[{$img_med[0]}, (medium)]";		
		}

		if(!empty($img_lg)) {
			$ic_imgs[] = "[{$img_lg}, (large)]";
		} else {
			$img_lg = wp_get_attachment_image_src( $img_id, 'intch_lg' );
			$ic_imgs[] = "[{$img_lg[0]}, (large)]";		
		}
		
		$intch_html = implode(', ', $ic_imgs);
		$intch_html = "data-interchange=\"{$intch_html}\""	
*/
		include('interchange-html.php');
?>
	
	<div
		id="hw-slide<?php echo $slidecounter; ?>"
		class="hw-slide-wrap"
	>
		
		<div class="intch-loading hw-slide-wrap hw-slide-bg" <?php if(!empty($intch_html)) echo $intch_html; ?>></div>
		
		<div class="hw-slide-wrap hw-slide-text-wrap">
			<div class="table w100">
				<div class="table-cell">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12 col-992-9 col-1200-6">
		
		
								<h2 class="hw-slide-title alpha"><?php echo $slide['slide_title']; ?></h2>
								
								<div class="hw-slide-text">
									<?php echo $slide['slide_text']; ?>
								</div>						
							</div>
						</div>
	
					</div>
				</div>
			</div>
		</div>
		
	</div> <!-- slide -->

<?php endforeach; ?>

</div>