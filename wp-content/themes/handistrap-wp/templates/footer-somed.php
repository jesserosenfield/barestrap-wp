<?php
	$fb = get_field('site_facebook', 'option');
	$tw = get_field('site_twitter', 'option');
	$pi = get_field('site_pinterest', 'option');
	$in = get_field('site_instagram', 'option');
	$yt = get_field('site_youtube', 'option');
	$go = get_field('site_google', 'option');
	$li = get_field('site_linkedin', 'option');
?>

<?php if(!empty($fb)) { ?><a class="footer-somed icon-facebook" href="<?php echo $fb; ?>"></a><?php } ?>
<?php if(!empty($tw)) { ?><a class="footer-somed icon-twitter" href="<?php echo $tw; ?>"></a><?php } ?>
<?php if(!empty($pi)) { ?><a class="footer-somed icon-pinterest" href="<?php echo $pi; ?>"></a><?php } ?>
<?php if(!empty($in)) { ?><a class="footer-somed icon-instagram" href="<?php echo $in; ?>"></a><?php } ?>
<?php if(!empty($yt)) { ?><a class="footer-somed icon-youtube" href="<?php echo $yt; ?>"></a><?php } ?>
<?php if(!empty($go)) { ?><a class="footer-somed icon-youtube" href="<?php echo $go; ?>"></a><?php } ?>
<?php if(!empty($li)) { ?><a class="footer-somed icon-youtube" href="<?php echo $li; ?>"></a><?php } ?>