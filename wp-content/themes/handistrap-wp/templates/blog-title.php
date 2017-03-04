<?php
	global $paged;
	global $blogid;
	global $search_query;
	
	if( is_home() ) {
		$datitle = get_the_title($blogid);
	}
	
	if( is_category() || is_tag() ) {
		$datitle = single_tag_title('', false);
	} elseif( is_archive() ) {
		$datitle = single_month_title('', false);
	}
	
	if( is_search() ) {
		$datitle = "Results for: \"" . $search_query . "\"";
	}
?>

<div class="container-fluid mb2">
	<div class="row">
		<div class="col-xs-12 page-title post-content">
			<h1><?php echo $datitle; ?><?php if($paged > 0) {echo ' / Page ' . $paged ;} ?></h1>
		</div>
	</div>
</div>