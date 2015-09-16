<?php
	$assets = get_bloginfo('stylesheet_directory') . "/assets/images/";
	
	$slides = get_field('bf_slides');
?>

<div
	class="bf-slideshow"
	data-cycle-slides=".bf-slide"
>

<?php
	foreach($slides as $slide) :
	
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
			$img_sm = wp_get_attachment_image_src( $img_id, 'bf-slide-sm' );
			$ic_imgs[] = "[{$img_sm[0]}, (default)]";
		}

		if(!empty($img_med)) {
			$ic_imgs[] = "[{$img_med}, (medium)]";
		}

		if(!empty($img_lg)) {
			$ic_imgs[] = "[{$img_lg}, (large)]";
		} else {
			$img_lg = wp_get_attachment_image_src( $img_id, 'bf-slide-lg' );
			$ic_imgs[] = "[{$img_lg[0]}, (large)]";		
		}	
?>
	
	<div
		class="bf-slide"
		data-interchange="<?php echo implode(', ', $ic_imgs); ?>"
	>
		
		<div class="container-fluid inner">
			<div class="row">
				<div class="col-xs-6">

					<div class="table-mob">
						<div class="table-cell">
							<h2 class="bf-slide-title"><?php echo $slide['slide_title']; ?></h2>
							
							<div class="bf-slide-text">
								<?php echo $slide['slide_text']; ?>
							</div>						
						</div>
					</div>

				</div>
			</div>
		</div>
		
	</div> <!-- slide -->

<?php endforeach; ?>

</div>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/plugins/cycle2.js"></script>

<script>
	beam('<?php bloginfo('stylesheet_directory'); ?>/assets/js/bf-slideshow.js');
</script>