
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>">
	
		<div class="table table-mob">
			<div class="table-cell">
				<input type="text" id="s" value="<?php the_search_query(); ?>" name="s" data-swplive="true" class="search-input m0 bg-white form-control" placeholder="Search." />
			
			</div>
			
			<div class="table-cell">
				<button class="m0 search-btn icon-search" type="submit"></button>									
			</div>
		</div>
	
	</form>