<?php
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

if(!is_admin()) {
	function linkify_tweet($tweet) {
	
	  //Convert urls to <a> links
	  $tweet = preg_replace("/([\w]+\:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/", "<a target=\"_blank\" href=\"$1\">$1</a>", $tweet);
	
	  //Convert hashtags to twitter searches in <a> links
	  $tweet = preg_replace("/#([A-Za-z0-9\/\.]*)/", "<a target=\"_new\" href=\"http://twitter.com/search?q=$1\">#$1</a>", $tweet);
	
	  //Convert attags to twitter profiles in <a> links
	  $tweet = preg_replace("/@([A-Za-z0-9\/\.]*)/", "<a href=\"http://www.twitter.com/$1\">@$1</a>", $tweet);
	
	  return $tweet;
	
	}

	function get_tweet() {
		// new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);
		
		$connection = new TwitterOAuth('oesxogt6d7y7yqf0ISc4RAuZh', 'm7YcPBURCuLieCpdigUkwLvag4qEe2xtblw5IfoCtuYUNyrl3F', '95908609-n18KbLk5fSeTOshqGVcLqDQJ9sKf77WOoLOoTsel1', 'LRpx31qTUPa5p8ZMraRApJ5hMhsnwaOt0YXD88fDPDQ3K');
		$content = $connection->get("account/verify_credentials");

		$statuses = $connection->get(
			"statuses/user_timeline",
			array(
				"count" => 1,
				"exclude_replies" => true,
				'screen_name' => 'barefingers_net'
			)
		);

		$output = '';
		
		foreach($statuses as $status) {
			$date = strtotime($status->created_at);
			
			$text = $status->text;						
				$pattern = '/(http:\/\/[a-z0-9\.\/]+)/i';
				$replacement = '<a href="$1" target="_blank">$1</a>';
				
				$source = preg_replace($pattern, $replacement, $text); 

			$output .= '<p>' . linkify_tweet($status->text) . '<br/><br/>' . '– <a href="' . get_option('twitter_link') . '">Barefingers (@barefingers_net)</a> ' . date('F j, Y', $date) . '</p>';
		}
		
		return $output;
	}
}
		
?>