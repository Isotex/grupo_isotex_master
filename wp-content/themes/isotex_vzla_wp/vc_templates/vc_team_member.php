<?php
if (!defined('ABSPATH')) die('-1');

add_shortcode( 'team_member', 'team_member' );

function team_member( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'name' => '',
		'photo' => '',
		'circle' => '',
		'position' => '',
		'biografi' => '',
		'email' => '',
		'phone' => '',
		'twitter' => '',
		'facebook' => '',
		'dribbble' => '',
		'rss' => '',
		'github' => '',
		'linkedin' => '',
		'pinterest' => '',
		'google' => '',
		'skype' => '',
		'soundcloud' => '',
		'youtube' => '',
		'tumblr' => '',
		'flickr' => '',
		'css_animation' => ''
    ), $atts)); 
	$out = $img = $img_id = '';
	$animated=$animated_data='';
	if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}
	$img_id = preg_replace('/[^\d]/', '', $photo);
	$img = wpb_getImageBySize(array( 'attach_id' => $img_id, 'thumb_size' => '400x400' ));
	if ( $img == NULL ) $img['thumbnail'] = '<img src="http://placekitten.com/g/400/400" /> <small>'.__('This is image placeholder, edit your page to replace it.', 'js_composer').'</small>';
	
	$out .= '<div class="team wpb_content_element'.$animated.$circle.'"'.$animated_data.'>';
		$out .= $img['thumbnail'];
		if($name != ''){$out .= '<h4>'.$name.'</h4>';}
		if($position != ''){$out .= '<small>'.$position.'</small>';}
		
		if($email != '' || $phone != ''){
			$out .= '<div class="teaminfo">';
				if($email != ''){$out .= '<span>'.__('Email','corporative').': '.$email.'</span>';}
				if($phone != ''){$out .= '<span>'.__('Phone','corporative').': '.$phone.'</span>';}
			$out .= '</div>';
		}
		if($biografi != ''){
			$out .= '<p>'.$biografi.'</p>';
		}
		
		if( $twitter != '' || $facebook != '' || $dribbble != '' || $rss != '' || $github != '' || $instagram != '' || $linkedin != '' || $pinterest != '' || $google != '' || $foursquare != '' || $skype != '' || $soundcloud != '' || $youtube != '' || $tumblr != '' || $stackexchange != '' || $flickr != '' ){
		$out .= '<div class="social tt-metro-social clearfix">';
			if($twitter != ''){$out .= '<a href="'.$twitter.'" class="toptip" original-title="twitter"><i class="icons-social-twitter"></i></a>';}
			if($facebook != ''){$out .= '<a href="'.$facebook.'" class="toptip" original-title="facebook"><i class="icons-social-facebook"></i></a>';}
			if($dribbble != ''){$out .= '<a href="'.$dribbble.'" class="toptip" original-title="dribbble"><i class="icons-social-dribbble"></i></a>';}
			if($rss != ''){$out .= '<a href="'.$rss.'" class="toptip" original-title="rss"><i class="icons-rss"></i></a>';}
			if($github != ''){$out .= '<a href="'.$github.'" class="toptip" original-title="github"><i class="icons-social-github"></i></a>';}
			if($linkedin != ''){$out .= '<a href="'.$linkedin.'" class="toptip" original-title="linkedin"><i class="icons-social-linkedin"></i></a>';}
			if($pinterest != ''){$out .= '<a href="'.$pinterest.'" class="toptip" original-title="pinterest"><i class="icons-social-pinterest"></i></a>';}
			if($google != ''){$out .= '<a href="'.$google.'" class="toptip" original-title="google plus"><i class="icons-social-google-plus"></i></a>';}
			if($skype != ''){$out .= '<a href="'.$skype.'" class="toptip" original-title="skype"><i class="icons-social-skype"></i></a>';}
			if($soundcloud != ''){$out .= '<a href="'.$soundcloud.'" class="toptip" original-title="soundcloud"><i class="icons-social-soundcloud"></i></a>';}
			if($youtube != ''){$out .= '<a href="'.$youtube.'" class="toptip" original-title="youtube"><i class="icons-social-youtube"></i></a>';}
			if($tumblr != ''){$out .= '<a href="'.$tumblr.'" class="toptip" original-title="tumblr"><i class="icons-social-tumblr"></i></a>';}
			if($flickr != ''){$out .= '<a href="'.$flickr.'" class="toptip" original-title="flickr"><i class="icons-social-flickr"></i></a>';}
		$out .= '</div>';
		}
		
	$out .= '</div>';

	return $out;
}


