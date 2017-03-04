<?php 
get_header();
global $paged;
global $dapostid;
global $post;

$dapostid = $post->ID;
$blogid = get_option( 'page_for_posts' );
?>

<?php
global $myindex;

$args = array(
	'posts_per_page' => -1,
	'post_type' => 'post'
);

$i = 1;
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post );
	if( $dapostid == $post->ID) {
		$myindex = $i;
		break;
	}
	$i++;
endforeach; 
wp_reset_postdata();
?>

<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		$dapostid = $post->ID;
?>

	<?php include('templates/banner-static.php'); ?>
	
	<div class="pr jump-flex-content-wrap">
		<div class="jump-flex-nav-wrap">
			<div class="container-fluid">
				<div class="row">
					<div class="col-768-4">

					<?php
						$sections = get_field('jump_section');
						
						echo '<nav id="jump-flex-nav" class="hidden-xs"><ul class="nav iota">';
						$n = 0;
						
						if( !empty($sections) ) : foreach($sections as $section) :
							$sec_title = $section['jump_section_title'];
							$sec_id = slugify($sec_title);
							$active = '';
							if($n = 0) {
								$active = ' class="active"';
								$n++;
							}
							
							echo "<li $active><a class=\"jump-flex-link\" href=\"#$sec_id\">$sec_title</a></li>";		
							
						endforeach; endif;	
						echo '</ul></nav>';
					?>					
					
					</div>				
				</div>
			</div>
		</div>

		<div class="container-fluid pr jump-flex-wrap">	
					
			<div class="row">
				<div class="col-768-8 col-768-push-4">
					<div class="jump-flex-content">
					
					<?php
						function flex_conditions($rowlayout, $slidecount){
							if( $rowlayout == 'default' ) :
								include('templates/post-flex/default.php');
							elseif ( $rowlayout == 'two_col_auto' ) :
								include('templates/post-flex/txt-cols.php');
							elseif ( $rowlayout == 'two_col' ) :
								include('templates/post-flex/two-col.php');
							elseif ( $rowlayout == 'three_column' ) :
								include('templates/post-flex/three-col.php');
							elseif ( $rowlayout == 'slider' ) :
								$slidecount++;
								include('templates/post-flex/slider.php');		
							elseif ( $rowlayout == 'imgcol' ) :
								include('templates/post-flex/img-col.php');
							elseif ( $rowlayout == 'txtimg' ) :
								include('templates/post-flex/two-col.php');
							elseif ( $rowlayout == 'full_bleed' ) :
								include('templates/post-flex/full-bleed.php');
							elseif ( $rowlayout == 'gallery' ) :
								include('templates/post-flex/gallery.php');
							endif;	
						}
						
						global $sec_id;
		
						if( have_rows('jump_section') ): while ( have_rows('jump_section') ) : the_row();
							$sec_title = get_sub_field('jump_section_title'); 
							$sec_txt = get_sub_field('jump_section_txt'); 
							$sec_img = get_sub_field('jump_section_img'); 
								$sec_img = $sec_img['url'];
							$sec_id = slugify($sec_title);
					
							echo "<div id=\"$sec_id\" class=\"jump-section pt3-768\">";
					?>
						
							<a data-target="#<?php echo $sec_id; ?>-content" data-toggle="collapse" class="block pr jump-collapse-tog">
								<div class="table-mob m0">
									<div class="table-cell jump-collapse-img-wrap">
										<img class="jump-collapse-img" src="<?php echo $sec_img; ?>" />
									</div>
									
									<div class="jump-collapse-text table-cell">
										<h2 class="alpha lite c-blue jump-collapse-title mb2-768"><?php echo $sec_title; ?></h2>
										
										<div class="eta hidden-xs c-black">
											<?php echo $sec_txt; ?>
										</div>
									</div>
								</div>
							</a>
												
					<?php
								include('templates/jump-flex.php');
							echo "</div>";
						endwhile; endif;
					?>
					</div>
				</div>
			</div>
		</div>	
	</div>


<?php endwhile; endif; ?>

<script>
	beam('<?php bloginfo('stylesheet_directory'); ?>/assets/js/jump-flex.js');
</script>

<?php get_footer(); ?>
