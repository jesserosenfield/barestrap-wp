<?php
	$intnav = get_field('intnav_links');	
	if($intnav) :	
		$linkcount = 0;
		$linkHtml = array();
		
		foreach($intnav as $links) :
			$linkHtml[] = "$('<li><a href=\"#{$links['intnav_link']}\">{$links['intnav_title']}</a></li>')";
			
		$linkcount++; endforeach;
		
		if(!empty($linkHtml)) {
?>

<script>
	var $intnav = [<?php echo implode(',', $linkHtml); ?>];
</script>


<?php } endif; ?>