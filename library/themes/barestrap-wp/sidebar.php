	<?php include('search-form.php'); ?>
	
	<div class="panel-group mb2">
		<div class="">
			<a class="block pb1 panel-toggle" data-toggle="collapse" data-parent="#sidebar-accordion" href="#collapse-dates">
				Browse by Date
			</a>
		</div>
	
		<div id="collapse-dates" class="collapse">
		
				<ul>
				
					<?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12 ) ); ?>
				
				</ul>
				
		</div> <!-- body -->
	</div> <!-- accordion-group -->

	<div class="panel-group mb2">
		<div class="">
			<a class="block pb1 panel-toggle" data-toggle="collapse" data-parent="#sidebar-accordion" href="#collapse-cats">
				Browse by Category
			</a>
		</div>
	
		<div id="collapse-cats" class="collapse">
		
				<ul>
				
					<?php
						$tags = get_categories( array('orderby' => 'count', 'order' => 'DESC','number' => 10) );
						foreach($tags as $tag) {
							echo '<li><a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . ' <span>(' . $tag->count . ')</span></a></li>';
						} 					
					?>
				
				</ul>
				
		</div> <!-- body -->
	</div> <!-- accordion-group -->