<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');

add_shortcode( 'icon_social', 'icon_social' );

function icon_social( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'email' => '',
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
		'icon_color' => '',
		'size' => '',
		'align' => '',
		'css_animation' => ''
    ), $atts));
	$out = $animated = $animated_data = '';
	if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}
	$out .= '<div class="clearfix social_shortcode social '.$align.$animated.'"'.$animated_data.'>';
		if($twitter){
			$out .= '<a href="'.$twitter.'" target="blank"><i class="icons-social-twitter" style="color:'.$icon_color.'; font-size:'.$size.'px; line-height:'.$size.'px;"></i></a>';
		}
		if($facebook){
			$out .= '<a href="'.$facebook.'" target="blank"><i class="icons-social-facebook" style="color:'.$icon_color.'; font-size:'.$size.'px; line-height:'.$size.'px;"></i></a>';
		}
		if($dribbble){
			$out .= '<a href="'.$dribbble.'" target="blank"><i class="icons-social-dribbble" style="color:'.$icon_color.'; font-size:'.$size.'px; line-height:'.$size.'px;"></i></a>';
		}
		if($rss){
			$out .= '<a href="'.$rss.'" target="blank"><i class="icons-rss" style="color:'.$icon_color.'; font-size:'.$size.'px; line-height:'.$size.'px;"></i></a>';
		}
		if($github){
			$out .= '<a href="'.$github.'" target="blank"><i class="icons-social-github" style="color:'.$icon_color.'; font-size:'.$size.'px; line-height:'.$size.'px;"></i></a>';
		}
		if($linkedin){
			$out .= '<a href="'.$linkedin.'" target="blank"><i class="icons-social-linkedin" style="color:'.$icon_color.'; font-size:'.$size.'px; line-height:'.$size.'px;"></i></a>';
		}
		if($pinterest){
			$out .= '<a href="'.$pinterest.'" target="blank"><i class="icons-social-pinterest" style="color:'.$icon_color.'; font-size:'.$size.'px; line-height:'.$size.'px;"></i></a>';
		}
		if($google){
			$out .= '<a href="'.$google.'" target="blank"><i class="icons-social-google-plus" style="color:'.$icon_color.'; font-size:'.$size.'px; line-height:'.$size.'px;"></i></a>';
		}
		if($skype){
			$out .= '<a href="'.$skype.'" target="blank"><i class="icons-social-skype" style="color:'.$icon_color.'; font-size:'.$size.'px; line-height:'.$size.'px;"></i></a>';
		}
		if($soundcloud){
			$out .= '<a href="'.$soundcloud.'" target="blank"><i class="icons-social-soundcloud" style="color:'.$icon_color.'; font-size:'.$size.'px; line-height:'.$size.'px;"></i></a>';
		}
		if($youtube){
			$out .= '<a href="'.$youtube.'" target="blank"><i class="icons-social-youtube" style="color:'.$icon_color.'; font-size:'.$size.'px; line-height:'.$size.'px;"></i></a>';
		}
		if($tumblr){
			$out .= '<a href="'.$tumblr.'" target="blank"><i class="icons-social-tumblr" style="color:'.$icon_color.'; font-size:'.$size.'px; line-height:'.$size.'px;"></i></a>';
		}
		if($flickr){
			$out .= '<a href="'.$flickr.'" target="blank"><i class="icons-social-flickr" style="color:'.$icon_color.'; font-size:'.$size.'px; line-height:'.$size.'px;"></i></a>';
		}
		if($email){
			$out .= '<a href="mailto:'.$email.'" target="_top"><i class="icons-mail" style="color:'.$icon_color.'; font-size:'.$size.'px; line-height:'.$size.'px;"></i></a>';
		}
		
	$out .= '</div>';
	
	return $out;
}
