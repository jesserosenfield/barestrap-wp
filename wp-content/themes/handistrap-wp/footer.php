<?php
global $below_file_name;
global $ssd;
?>			
			</div>
			
		</div> <!-- content -->
		
		<?php
			if(have_rows('schema_addresses', 'option')) : while(have_rows('schema_addresses', 'option')) : the_row();
					$name = $schemaaddress;
					$address = get_sub_field('schema_street_address');
					$city = get_sub_field('schema_city');
					$state = get_sub_field('schema_state');
					$zip = get_sub_field('schema_zip_code');
					$phone = get_sub_field('phone');
						
					if( !empty($address) ) {
						$addresshtml = "<span itemprop=\"streetAddress\">
							$address
						</span>";
					}


					if( !empty($city) ) {
						$cityhtml = "<span itemprop=\"addressLocality\">
							$city";

							if(  !empty($state) ) {
								$thestate = array_search($state, $states);
								$cityhtml .= "<span content=\"$thestate\" itemprop=\"addressRegion\">, $state</span>";
							}
						
						$cityhtml .= "</span>";
					}
					

					if(  !empty($zip) ) {
						$ziphtml = "<span itemprop=\"postalCode\">$zip</span>";
					}
					if( !empty($phone) ) {
						$phonehtml = "<span itemprop=\"telephone\" content=\"$phone\">Phone: $phone</span>";
					}
					
					$prophrs = get_sub_field('prop_hrs');
					
					$hourshtml = '';
					
					if(!empty( $prophrs )) {
						foreach( $prophrs as $hrs ) {
							$open = $hrs['hrs_open'];
							$close = $hrs['hrs_close'];
							
							$daystart = $hrs['hrs_day_start'];
							$dayend = $hrs['hrs_day_end'];
							$dayendAbbrev = '';
							
							if(!empty($dayend)) {
								$dayendAbbrev = '-' . substr($dayend, 0, 2);
								$dayend = ' - ' . $dayend;
							}
							
							$times = date("g:ia", strtotime($open)) . ' - ' . date("g:ia", strtotime($close));
							
							if($hrs['closed'] == true) {
								$open = '00:00';
								$close = '00:00';
								$times = 'Closed';
							}
						}
		
						$hourshtml = '<meta itemprop="openingHours" content="' . substr($daystart, 0, 2) . $dayendAbbrev . ' ' . $open . '-' . $close . '"><div class="table-row"><div class="table-cell">' . $daystart . $dayend . ' &nbsp; &nbsp;</div><div class="table-cell">' . $times . '</div></div>';
					}
		
		
		
					if( !empty( $name ) ) {

						echo "
							<div itemprop=\"address\" itemscope itemtype=\"https://schema.org/PostalAddress\">
								<em>$name</em>

								$addresshtml
								$cityhtml
								$ziphtml
								$phonehtml
								$hourshtml
							</div>
						";
					}
				endwhile;
			endif;	
		?>
		
		<?php include('templates/drawers.php'); ?>
		
		<script>
			var homeurl = "<?php bloginfo('wpurl'); ?>";
		</script>
		

			<style>
				<?php echo file_get_contents( get_stylesheet_directory() .'/assets/css/cache/'.$below_file_name); ?>
				<?php echo file_get_contents( get_stylesheet_directory() .'/assets/css/calc.css'); ?>

				<?php //echo file_get_contents($ssd . '/assets/css/font-face-below.css'); ?>
			</style>
		
		<?php
			//wp_dequeue_script('twentyfifteen-navigation');
			wp_footer();
		?>

		<script>
		(function(w, d, s) {
		  function go(){
		    var js, fjs = d.getElementsByTagName(s)[0], load = function(url, id) {
			  if (d.getElementById(id)) {return;}
			  js = d.createElement(s); js.src = url; js.id = id;
			  fjs.parentNode.insertBefore(js, fjs);
			};
		    load('//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5', 'facebook-jssdk');
		    load('//platform.twitter.com/widgets.js', 'tweetjs');
		  }
		  if (w.addEventListener) { w.addEventListener("load", go, false); }
		  else if (w.attachEvent) { w.attachEvent("onload",go); }
		}(window, document, 'script'));
		</script>
		
	</body>
</html>