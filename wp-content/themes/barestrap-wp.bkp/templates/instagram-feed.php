<?php
	require realpath(dirname(__FILE__) . "/../assets/functions/instagram/src/instagram.php");
	use MetzWeb\Instagram\Instagram;

		global $instagram;
		
		$instagram = new Instagram(array(
		    'apiKey'      => '26adb95081c44cc1b885df78191efc0a',
		    'apiSecret'   => '539ac0c6b08f4f50bd44b3a364405ce7',
		    'apiCallback' => '74192290ed20455bacc91c2d72d52834'
		));
		
		$data = $instagram->getOAuthToken('74192290ed20455bacc91c2d72d52834');
		$instagram->setAccessToken($data);

	
	$result = $instagram->getUserMedia('358523637', 5);
	
	foreach ($result->data as $media) {
		$content = "<li>";
		
		// output media
		if ($media->type === 'video') {
			continue;
		} else {
			// image
			$image = $media->images->low_resolution->url;
			$content .= "<img class=\"media\" src=\"{$image}\"/>";
		}
		
		// create meta section
		$avatar = $media->user->profile_picture;
		$username = $media->user->username;
		$comment = (!empty($media->caption->text)) ? $media->caption->text : '';
		$content .= "<div class=\"content\">
		               <div class=\"avatar\" style=\"background-image: url({$avatar})\"></div>
		               <p>{$username}</p>
		               <div class=\"comment\">{$comment}</div>
		             </div>";
		
		// output media
		echo $content . "</li>";
	}
?>