<?php if($title) : ?>
	<div class="container-fluid<?php echo $widthclass; ?>">
		<div class="row pb4">
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
<?php endif; ?>