<?php
	$fb = get_option('facebook_link');
	$tw = get_option('twitter_link');
	$pi = get_option('pinterest_link');
	$in = get_option('instagram_link');
	$yt = get_option('youtube_link');
	$go = get_option('google_link');
	$li = get_option('linkedin_link');

?>

<?php if(!empty($fb)) { ?><a class="footer-somed icon-facebook" href="<?php echo $fb; ?>"></a><?php } ?>
<?php if(!empty($tw)) { ?><a class="footer-somed icon-twitter" href="<?php echo $tw; ?>"></a><?php } ?>
<?php if(!empty($pi)) { ?><a class="footer-somed icon-pinterest" href="<?php echo $pi; ?>"></a><?php } ?>
<?php if(!empty($in)) { ?><a class="footer-somed icon-instagram" href="<?php echo $in; ?>"></a><?php } ?>
<?php if(!empty($yt)) { ?><a class="footer-somed icon-youtube" href="<?php echo $yt; ?>"></a><?php } ?>
<?php if(!empty($go)) { ?><a class="footer-somed icon-youtube" href="<?php echo $go; ?>"></a><?php } ?>
<?php if(!empty($li)) { ?><a class="footer-somed icon-youtube" href="<?php echo $li; ?>"></a><?php } ?>