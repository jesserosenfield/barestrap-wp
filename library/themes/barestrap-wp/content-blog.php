<?php include('templates/blog-title.php'); ?>

<div class="container-fluid wide">
	<div class="row" role="main">
		<section class="col-sm-8">
			<?php get_template_part('content', 'blog-loop'); ?>
		</section>
		
		<div class="col-sm-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<?php foundationpress_pagination(); ?>
		</div>
	</div>
</div>