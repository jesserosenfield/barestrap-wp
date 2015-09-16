<nav>
								
	<?php 
		$menu = wp_nav_menu(array(
			'menu' => 'Sub Menu',
			'container' => false,
			'container_class' => false,
			'echo' => false,
			'walker' => new Accordion_Menu()
		));
		
		if($menu) { echo '<ul class="panel-group" id="acc-menu-nav">'; }
			echo preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
		if($menu) { echo '</ul>'; }				
	?>
									
</nav>

<script>
	$(document).ready(function(){
		var $collapse = $('#acc-menu-nav li');
		
		$collapse.find('.acc-menu-collapse').on('show.bs.collapse', function () {
			var $me = $(this).parents('li');
			
			$collapse.filter('.shown').removeClass('shown');
			$me.addClass('shown')
		});

		$collapse.find('.acc-menu-collapse').on('hide.bs.collapse', function () {
			var $me = $(this).parents('li');
			
			$me.removeClass('shown');
		});
	});
</script>