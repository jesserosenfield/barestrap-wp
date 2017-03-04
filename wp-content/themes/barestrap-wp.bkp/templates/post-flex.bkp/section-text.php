<?php 
global $flexcontent; 

if($title) :

	$flexcontent .= '
	<div class="container-fluid'. $widthclass . '">
		<div class="row pb4">
			<div class="col-xs-12 post-content tac">';

			
				if( $title ) {
					$flexcontent .= '<h2 class="bo alpha mb3">' . $title . '</h2>';
				}

				if( $text ) {
					$flexcontent .= '
						<div class="bg-block-text post-content">
							' . $text . '
						</div>';
				}

	$flexcontent .= '			
			</div>
		</div>
	</div>';

endif;
?>