<?php
/**
 * Format the time when displaying our latest Tweets
 */
function ago($time){
   $periods = array("second", "minute", "hour", "day", "week", "month", "year");
   $lengths = array("60","60","24","7","4.35","12","10");

   $now = time();
   $difference = $now - $time;
   $tense = "ago";

   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
	   $difference /= $lengths[$j];
   }

   $difference = round($difference);

   if($difference != 1) {
	   $periods[$j].= "s";
   }

   return "$difference $periods[$j] ago ";
}

/**
 * Display out latest Tweets using the Twitter 1.1 API
 */
function display_latest_tweets($username,$no_tweets,$reply){
	 $twitterConnection = new TwitterOAuth(
		rd_options('reedwan_tweet_consumer_key'),	// Consumer Key
		rd_options('reedwan_tweet_consumer_secret'), // Consumer secret
		rd_options('reedwan_tweet_access_token'),	// Access token
		rd_options('reedwan_tweet_token_secret')    // Access token secret
		);

	$twitterData = $twitterConnection->get(
		'statuses/user_timeline',
		  array(
			'screen_name'     => $username, 	// Your Twitter Username
			'count'           => $no_tweets, 		// Number of Tweets to display
			'exclude_replies' => $reply
		  )
		);	

		if($twitterData && is_array($twitterData)) {
		?>
                    <?php foreach($twitterData as $tweet): ?>
                    <li>
						<i class="fa-twitter"></i>
                        <span>
                        <?php
                        $latestTweet = $tweet->text;
                        $latestTweet = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="http://$1" target="_blank">http://$1</a>', $latestTweet);
						echo $latestTweet;
                        ?>
                        </span>
                        <?php
                        $twitterTime = strtotime($tweet->created_at);
                        $timeAgo = ago($twitterTime);
                        ?>
                        <div class="meta"><a href="http://twitter.com/<?php echo $tweet->user->screen_name; ?>/statuses/<?php echo $tweet->id_str; ?>" class="jtwt_date"><?php echo $timeAgo; ?></a></div>
                    </li>
                    <?php endforeach; ?>
	<?php
	}
}